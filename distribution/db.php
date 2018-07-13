<?php
$conn= new mysqli ("localhost","root","","lostandfound");
if ($conn->connect_error)
{
die("could not connect with the server".$conn->connect_error);
}

?>