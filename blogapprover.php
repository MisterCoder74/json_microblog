<?php
$id = $_POST["id"];
$json = json_decode(file_get_contents("entries.json"), true);
foreach ($json as &$article) {
  if ($article["id"] == $id) {
    $article["status"] = "approved";
    break;
  }
}
file_put_contents("entries.json", json_encode($json));
//header("location: blogapprover.html");
?>
