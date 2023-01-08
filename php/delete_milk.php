<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    @include "../php/config.php";
$conn = mysqli_connect('localhost','root','','produse_eco');


$sql = "DELETE FROM `milk` WHERE id= '$id'  ";
$result=mysqli_query($conn,$sql);
if($result){
        echo "Deleted successfull";
    header("location:../menu/milk_admin.php");
}
else{
        die(mysqli_error($conn));
}
}


?>
