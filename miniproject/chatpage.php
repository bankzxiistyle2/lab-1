<?php
    include('db.php');
    include('MyPost.php');

    
    
    if(isset($_POST['submit'])){
        $db=new MyPost();
    $db->connect();
        
       $db->insert($_POST['name'],$_POST['detil']);
        //$db->insert($_POST["name"],$_POST["detil"]);
    }
?>
    <html>

    <head>
        <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <meta charset="UTF-8">
        <style>
            .containner {}
            
          
        </style>
    </head>

    <body  style="background-color: wheat;">
        <div class="containner">
            <div style="margin-left: 50px;background-color: white;height: 300px;width: 500px;overflow: auto;float:left;" id="chat"></div>
            <div style="margin-left: 50px;background-color: white;height: 300px;width: 200px;overflow: auto;" id="listname"></div>

            <div id="sendtext">
        <form method="post" action="chatpage.php">
                    <textarea id="detil" name="detil"></textarea>
                    <input id='name' name="name" type='hidden' value=<?php echo $_POST['name'] ?>>
                    <input type="submit" name="submit" value="Send" id="contactSend">
                </form>

                
            </div>

        </div>
         <form method="post" action="logout.php">
                    <input id='name' name="name" type='hidden' value=<?php echo $_POST['name'] ?>>
                    <input type="submit" name="submit" value="logout" id="contactSend"> 
                    
                </form>

                
            </div>
            <h1><?php echo $_POST['name'] ?></h1>
        </div>
        <script>
            function loadXMLDoc(myurl, id) {
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    // code for IE7+,firefox,Chome ,opere , safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    //code for IE6 ,IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function() {


                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById(id).innerHTML = xmlhttp.responseText;
                    }
                }

                xmlhttp.open("GET", myurl, true);

                xmlhttp.send();
            }

            function myfunction() {
                loadXMLDoc("chat.php", "chat");
                loadXMLDoc("listname.php", "listname");
                 

            }
            function down(){
                 var elem = document.getElementById('chat');
            elem.scrollTop = elem.scrollHeight;
            }
         down();
           setInterval(down,1000);
            myfunction();
            setInterval(myfunction, 2000);
           
        </script>



    </body>

    </html>