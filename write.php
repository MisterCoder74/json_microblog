<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $entries = json_decode(file_get_contents('entries.json'), true);
  $entry = [
    'id' => uniqid(),
    'author' => $_POST['author'],
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'date' => date('Y-m-d H:i:s'),
    'status' => "proposed",
    'like' => 0,
    'view' => 0,
  ];
  $entries[] = $entry;
  file_put_contents('entries.json', json_encode($entries, JSON_PRETTY_PRINT));
  header('Location: blog.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Vivacity Blog System</title>
  <link rel="stylesheet" type="text/css" href="blogstyle.css">
</head>
<body>
  <h1>Scrivi un nuovo post</h1>
  <form action="write.php" method="post">
    <div>
      <label for="author">Autore:</label>
      <input type="text" id="author" name="author">
    </div>
    <div>
      <label for="title">Titolo:</label>
      <input type="text" id="title" name="title">
    </div>
    <div>
      <label for="content">Contenuto:</label>
      <textarea id="content" name="content" cols=30 rows=8></textarea>
    </div>
    <div>
      <input type="submit" value="Invia">
    </div>
  </form>
</body>
</html>
