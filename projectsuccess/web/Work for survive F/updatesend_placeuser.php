<?php
include 'connect.php';
$id=$_POST['id_cus'];
$f_name=$_POST['name1'];
$l_name=$_POST['lname1'];
$address = $_POST['address1'];
$phone=$_POST['phone_number1'];
$province = $_POST['provinces'];
$District = $_POST['district'];
$sub_District = $_POST['subdistrict'];
$box = $_POST['box'];

$sql = "UPDATE user set name1='$f_name',lname1='$l_name',address1='$address',phone_number1='$phone',provinces='$province',district='$District',subdistrict='$sub_District',box='$box'
WHERE id1='$id'";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึกการแก้ไข');</script>";
    echo "<script>window.location='boxsend.php';</script>";//กลัยไป หน้า showuser
}else{
    echo "<script>alert('ไม่สำเร็จ');</script>";
}
mysqli_close($conn);
?>