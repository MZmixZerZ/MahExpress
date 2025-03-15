<?php
include 'connect.php'; //เรียกใช้ file อื่น
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<div class="container" >
    <div class="h4 text-center alert alert-success  mb-1 mt-4 " role="alert"> Mahlai express </div>
    <div class="h5 text-center alert alert-info  mb-4 mt-1 " role="alert"> ผู้รับ </div>
    <a href="addplace_user.php" class="btn btn-success" >Add</a>
    <a href="boxsend.php" class="btn btn-secondary" >ผู้ส่ง</a>
<table class="table table-striped-columns">
<tr>
    <th>รหัสบัตรปะชาชน</th>
    <th>ชื่อผู้รับ</th>
    <th>นามสกุลผู้รับ</th>
    <th>ที่อยู่ลูกค้า(บ้านเลขที่)</th>
    <th>เบอร์โทรศัพท์</th>
    <th>ตำบล</th>
    <th>อำเภอ</th>
    <th>จังหวัด</th>
    <th>รหัสผู้ส่ง</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

<?php
$sql  = "SELECT * FROM customer"; //แสดงค่า database user
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
?>

<tr>
    <td><?=$row["id"]?></td>
    <td><?=$row["name"]?></td>
    <td><?=$row["lname"]?></td>
    <td><?=$row["address"]?></td>
    <td><?=$row["phone_number"]?></td>
    <td><?=$row["provinces"]?></td>
    <td><?=$row["district"]?></td>
    <td><?=$row["subdistrict"]?></td>
    <td><?=$row["idsend"]?></td>
    <td><a href="edit_placeuser.php?id=<?=$row["id"]?>" class="btn btn-warning" >แก้ไข</a></td>
    <td><a href="delete_placeuser.php?id=<?=$row["id"]?>" class="btn btn-danger" onclick="Del(this.href);return false;">delete</a></td>

</tr>
<?php
}
mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล
?>

</table>
</div>
</body>
</html>

<script language="JavaScript">
    function Del(mypage){
        var agree=confirm("ต้องการลบหรือ?");
        if(agree){
            window.location=mypage;
        }
    }
    </script>