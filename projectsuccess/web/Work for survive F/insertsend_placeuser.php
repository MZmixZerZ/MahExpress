<?php
include 'connect.php';
$sId = $_POST['idsend'];
$cusId = $_POST['id1'];
$f_name = $_POST['name1'];
$l_name = $_POST['lname1'];
$address = $_POST['address1'];
$phone = $_POST['phone_number1'];
$province = $_POST['provinces'];
$District = $_POST['district'];
$sub_District = $_POST['subdistrict'];
$box = $_POST['box'];

$sql="INSERT INTO user(idsend,id1,name1,lname1,address1,phone_number1,provinces,district,subdistrict,box) VALUES('$sId','$cusId','$f_name','$l_name','$address','$phone','$province','$District','$sub_District','$box') ";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึก');</script>";
    echo "<script>window.location='boxsend.php';</script>";//กลัยไป หน้า showuser
}else{
    echo "<script>alert('ไม่สำเร็จ');</script>";
}
mysqli_close($conn);
?>