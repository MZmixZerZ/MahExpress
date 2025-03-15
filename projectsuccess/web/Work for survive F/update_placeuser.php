<?php
include 'connect.php';
$id=$_POST['id_cus'];
$f_name=$_POST['name'];
$l_name=$_POST['lname'];
$address = $_POST['address'];
$phone=$_POST['phone_number'];
$province = $_POST['provinces'];
$District = $_POST['district'];
$sub_District = $_POST['subdistrict'];
$idsend = $_POST['idsend'];

$sql = "UPDATE customer set name='$f_name',lname='$l_name',address='$address',phone_number='$phone',provinces='$province',district='$District',subdistrict='$sub_District',idsend='$idsend'
WHERE id='$id'";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึกการแก้ไข');</script>";
    echo "<script>window.location='box.php';</script>";//กลัยไป หน้า showuser
}else{
    echo "<script>alert('ไม่สำเร็จ');</script>";
}
mysqli_close($conn);
?>