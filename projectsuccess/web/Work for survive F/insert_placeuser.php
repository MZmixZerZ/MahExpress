<?php
include 'connect.php';
$cusId = $_POST['id'];
$f_name = $_POST['name'];
$l_name = $_POST['lname'];
$address = $_POST['address'];
$phone = $_POST['phone_number'];
$province = $_POST['provinces'];
$District = $_POST['district'];
$sub_District = $_POST['subdistrict'];
$idsend = $_POST['idsend'];

$sql="INSERT INTO customer(id,name,lname,address,phone_number,provinces,district,subdistrict,idsend) VALUES('$cusId','$f_name','$l_name','$address','$phone','$province','$District','$sub_District','$idsend') ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึก');</script>";
    echo "<script>window.location='box.php';</script>";//กลัยไป หน้า showuser
}else{
    echo "<script>alert('ไม่สำเร็จ');</script>";
}
mysqli_close($conn);
?>