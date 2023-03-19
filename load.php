<?php
  // Load the entries from the JSON file
  $entries = json_decode(file_get_contents('entries.json'), true);

  $offset = $_POST['offset'];
  $limit = 10;

  // Get the next 10 entries
  $next_ten_entries = array_slice($entries, $offset, $limit);

  // Prepare response
  $response = [
    'entries' => $next_ten_entries,
    'offset' => $offset + $limit,
  ];

  header('Content-Type: application/json');
  echo json_encode($response);
  exit;
?>
