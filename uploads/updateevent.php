<?php
include('config.php');

if(isset($_POST["id"]))
{
    $title = $_POST['title'];
    $start_event = $_POST['start'];
    $end_event = $_POST['end'];
    $id = $_POST['id'];
    mysqli_query($conn, "UPDATE events SET title='$title', start_event='$start_event', end_event='$end_event' WHERE id='$id'");

}

?>