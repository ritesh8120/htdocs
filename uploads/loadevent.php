<?php
date_default_timezone_set('America/Los_Angeles');
include('config.php');
$data = array();

$qua = "SELECT * FROM `events` ORDER BY `id`";
$querys = mysqli_query($conn, $qua);
if (mysqli_num_rows($querys) > 0) {
    while ($row = mysqli_fetch_array($querys)) {
     $data[] = array(
      'id'   => $row["id"],
      'title'   => $row["title"],
      'start'   => $row["start_event"],
      'end'   => $row["end_event"]
     );
    }
}
echo json_encode($data);
?>