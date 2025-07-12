<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$files = array_filter(scandir('./'), function($f) { 
  return pathinfo($f, PATHINFO_EXTENSION) === 'pdf'; 
});
echo json_encode(array_values($files));
?>
