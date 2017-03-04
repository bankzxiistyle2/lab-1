<html>

<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" type='text/css' href='style.css'>
</head>

<body>
    <?php



session_start();



if($_GET['logout']){//logout
include('db.php');
include('MyPost.php');
    $db=new MyPost ();
    $db->connect();
    $db->logout($_SESSION['name']);
    $db->close_connect();
    session_destroy();
    header("Location: index.php");
}
if(isset($_POST['submitname'])){ //check login button
    if(isset($_POST['name'])){
        $_SESSION['name']=$_POST['name'];
        
    }
}

if(!isset($_SESSION['name'])){ //login page 
    ?>

        <div id='login'>
            <br>
            <h1 id='titlelogin'>Login page</h1>
            <br>
            <form action='index.php' method='post'>
             Name : 
            <input  type='text' name='name' id='name'><br><br>
             Mail : 
            <input type='email' name='email' id='email'><br><br>
            <input type='submit' value='login' name='submitname' id='submitname'>

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
            <div id='listname'></div>
            <div id='sendform'>
                
                <input type='text' name='detil' id='detil' onkeyup="count()" maxlength="100">
                <button type='button' id="send" onclick="detilsend()">send</button><br>
                <sub id='counttxt'>You can input lenght string : 100</sub>

            </div>

            
        </div>
        
        <script>
            var higthchatbox=document.getElementById('chatbox').clientHeight;
            var send=document.getElementById('detil');
            send.addEventListener("keydown",function (e){
                if(e.keyCode==13){
                    detilsend();
                }
            });
           function count() {
                 var l=document.getElementById('detil').value.length;
                 document.getElementById('counttxt').innerHTML="You can input lenght string : "+(100-l);
            }
            function autoscroll(){
                 document.getElementById('chatbox').scrollTop=document.getElementById('chatbox').scrollHeight;
            }
            function detilsend() {
                var txt = "";
                txt += document.getElementById('detil').value;
                document.getElementById('detil').value="";
                insertData(txt);
                
            }


            function insertData(txt) {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('s1').innerHTML = ajax.responseText;
                    }
                }
                ajax.open('POST', 'insert.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                ajax.send("name=<?php echo $_SESSION['name']; ?>&detil=" + txt);
            }
             function showlistname() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('listname').innerHTML = ajax.responseText;
                    }
                }
                ajax.open('POST', 'listname.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                ajax.send("name=<?php echo $_SESSION['name']; ?>");
            }
            function ajax() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('chatbox').innerHTML = ajax.responseText;
                        autoscroll();
                    }
                }
                ajax.open('POST', 'chat.php', true);
                ajax.send();
            }
            
            setInterval(ajax,1000);
            setInterval(showlistname,1000);
        </script>
        <?php
}
?>
</body>

</html>