<html>

<head>
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <style>
        .containner {}
        
        #chat {
            width: 40%;
            height: 30%;
            overflow: auto;
        }
    </style>
</head>

<body style="background-color: wheat;">
    <form method="post" action="chatpage.php" style='float:left;'>
                    <textarea id="detil" name="detil"></textarea>
                    <input id='name' name="name" type='hidden' value=<?php echo $_POST['name'] ?>>
                    <input type="submit" name="submit" value="Send" id="contactSend" > gg
                    </button>
                </form>
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
        loadXMLDoc('login.html', 'gg');
    </script>



</body>

</html>