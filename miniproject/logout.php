<?php
     include('db.php');
    include('MyPost.php');

    
    
    if(isset($_POST['name'])){
        $db=new MyPost();
    $db->connect();
        
       $db->logout($_POST['name']);
        
    }

?>