<?php 
session_start();
include('db.php');
include('MyPost.php');
    $db=new MyPost ();
    $db->connect();
    $db->logout($_SESSION['name']);
    $db->close_connect();
session_destroy();

?>