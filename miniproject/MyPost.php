<?php
class MyPost extends DB{
    public $id;
    public $date;
    public $name;
    public $detil;
   public function insert($name,$detil){
       $str1="INSERT INTO MyPost (MyPost_date, MyPost_name,MyPost_detil,MyPost_status) VALUES ('";
       $str2="', '";
       $str3="')";
        $sql = $str1.date("Y-m-d H:i:s").$str2.$name.$str2.$detil.$str2.'1'.$str3;

   if($this->query($sql)){
       return true;
   }else{
       return false;
   }
           
    }

}


?>