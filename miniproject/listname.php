<?php
    include('db.php');
    include('MyPost.php');

    $db=new MyPost ();
    $db->connect();
    $db->query("select MyPost_name from MyPost group by MyPost_name");
    

    //"id: " . $row["Post_id"]. 
    // output data of each row
    while($row = mysqli_fetch_array($db->result)) {
        echo "<div class='post '>";
        echo " <div >" . $row["MyPost_name"]."</div>";
        echo "</div> ";
    }

?>