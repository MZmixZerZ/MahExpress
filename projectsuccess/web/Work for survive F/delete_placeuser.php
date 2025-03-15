<?php
include 'connect.php';
 $ids=$_GET['id'];
 $sql="DELETE FROM customer WHERE id='$ids'";
 if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูล');</script>";
    echo "<script>window.location='box.php';</script>";//กลัยไป หน้า place_user
 }else{
    echo "error : " .$sql."<br>" . mysqli_error($conn);
    echo "<script>alert('ลบข้อมูลไม่สำเร็จ');</script>";
 }
 mysqli_close($conn);
?>