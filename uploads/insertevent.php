<?php
    include('config.php');
    
    $title = $_POST['title'];
    $start_event = $_POST['start'];
    $end_event = $_POST['end'];
    
    mysqli_query($conn,"INSERT INTO `events`(`title`, `start_event`, `end_event`) VALUES ('$title', '$start_event', '$end_event')");
?>