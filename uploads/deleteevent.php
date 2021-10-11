<?php
include('config.php');

if(isset($_POST["id"]))
{
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE from events WHERE id='$id'");

}

?>