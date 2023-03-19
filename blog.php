<?php
$entries = json_decode(file_get_contents('entries.json'), true);
$offset = max(0, count($entries) - 10);
$limit = 10;
if (isset($_GET['offset'])) {
  $offset = (int) $_GET['offset'];
}
$entries = array_slice($entries, $offset, $limit);
$entries = array_reverse($entries);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Vivacity Blog System</title>
  <link rel="stylesheet" type="text/css" href="blogstyle.css">
</head>
<body>
<center>
  <h1>Mini Blog System</h1>
    <hr>
  <a href="write.php">Scrivi nuovo post</a>
  <hr>
  <div id="entries">
  
  <!-- to use the approver, change this php code to filter only 'approved' posts from json file -->
  
    <?php foreach ($entries as $entry): ?>
      <div class="entry">
        <h2><?php echo $entry['title']; ?></h2>
        <p class="author">di <?php echo $entry['author']; ?></p>
        <p class="date"><?php echo $entry['date']; ?></p>
        <p class="content"><?php echo substr($entry['content'], 0, 120); ?> <a title="Carica l' articolo" href="entry.php?id=<?php echo $entry['id']; ?>">[...]</a></p>
        <hr>
        <p class="date">Like ricevuti: <?php echo ($entry['like']); ?><br>
        Letture riconosciute: <?php echo ($entry['view']); ?></p>
        <hr>
        <p><a title="Carica l' articolo" href="entry.php?id=<?php echo $entry['id']; ?>">Leggi tutto</a></p>
      </div>
    <?php endforeach; ?>
  </div>
      <hr>
  <div id="load-more">
    <?php if ($offset > 0): ?>
      <a href="blog.php?offset=<?php echo $offset - $limit; ?>">Precedenti</a>
    <?php endif; ?>
    <?php if ($offset + $limit < count($entries)): ?>
      <a href="blog.php?offset=<?php echo $offset + $limit; ?>">Successivi</a>
    <?php endif; ?>
  </div>
      <hr>
      </center>
</body>
</html>
