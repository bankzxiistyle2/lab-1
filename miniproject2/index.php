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
                <div id='name'>
                    <?php echo "Name : ".$_SESSION['name']; ?>
                </div>
                <div id='logout'><a href='index.php?logout=true'>logout</a></div>
            </div>

            <div id='chatbox'></div>

            <div id='sendform'>
                <form id="gg" method='POST' action>
                    <input type='text' name='detil' id='detil'>
                    <input type='submit' name='entertxt' id='entertxt' value='send' onclick=''>
                </form>

            </div>
            <div id=s1></div>
            <div id=s2></div>
        </div>
        <script>
            

            function insertData() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('s1').innerHTML = ajax.responseText;
                    }
                }
                ajax.open('POST', 'insert.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                ajax.send("name=<?php echo $_SESSION['name']; ?>&detil=<?php echo $_POST['detil'] ?>");
            }
        </script>
        <?php
}
?>
</body>

</html>