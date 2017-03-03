<html>
    <head>
        <meta charset='UTF-8'>
        
    </head>
    <body>
<?php

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
<div id='paber'>
    <div id='header'><?php echo "Name : ".$_SESSION['name']; ?><span id='logout'></span>
    </div>
    


</div>
<?php
}
?>
    </body>
</html>