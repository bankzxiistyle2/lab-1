<html>
    <head>
        <meta charset='UTF-8'>
        <link rel="stylesheet" type='text/css' href='style.css'>
    </head>
    <body>
<?php

include('db.php');
include('MyPost.php');

session_start();
if($_GET['logout']){//logout
    session_destroy();
    header("Location: index.php");
}
if(isset($_POST['submitname'])){ //check login button
    if(isset($_POST['name'])){
        $_SESSION['name']=$_POST['name'];
        echo '<script type="text/javascript">alert("login complete");</script>';
    }else{
        echo '<script type="text/javascript">alert("error to login");</script>';
    }
}
if(isset($_POST['entertxt'])){
    if(isset($_POST['detil'])){
        $db=new MyPost();
        $db->insert($_SESSION['name'],$_POST['detil']);
    }
}
if(!isset($_SESSION['name'])){ //login page 
    ?>

<div id='login'>
     <form action='index.php' method='post'>
     inter name :
     <input type='text' name='name' id='name'>
     <input type='submit' name='submitname' id='submitname'>
     
     </form>
     </div>

    <?php 
}else{//in the chat room
 ?>
<div id='paper'>

    <div id='header'>
    <div id='name'><?php echo "Name : ".$_SESSION['name']; ?></div>
    <div id='logout'><a href='index.php?logout=true'>logout</a></div>
    </div>

    <div id='chatbox'></div>

    <div id='sendform'>
        <form action="" method='POST'>
            <input type='text' name='detil' id='detil' >
            <input type='submit' name='entertxt' id='entertxt' value='send'>
        </form>

    </div>
    
</div>
<?php
}
?>
    </body>
</html>