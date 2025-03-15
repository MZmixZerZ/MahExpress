<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * from provinces";
$sq = "SELECT * from box";
$se = "SELECT * FROM user WHERE id1='$id' ";
$query = mysqli_query($conn,$sql);
$quer = mysqli_query($conn,$sq);
$result=mysqli_query($conn,$se);
$row=mysqli_fetch_array($result)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add address</title>
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-sm-4">
    <div class="h4 text-center alert alert-success  mb-4 mt-4 " role="alert"> แก้ไขข้อมูลผู้ส่ง </div>
    <form method="POST" action="updatesend_placeuser.php">
	<label>รหัสบัตรประชาชน</label>
        <input type="text" name="id_cus" class="form-control" readonly value="<?=$row['id1']?>" require><br>
	<label>ชื่อ</label>
        <input type="text" name="name1" class="form-control"value="<?=$row['name1']?>" require><br>
        <label>นามสกุล</label>
        <input type="text" name="lname1"  class="form-control" value="<?=$row['lname1']?>" require><br>
        <label>บ้านเลขที่</label>
        <input type="text" name="address1"  class="form-control" value="<?=$row['address1']?>" required ><br>
        <label>เบอร์โทรศัพท์</label>
        <input type="number" name="phone_number1"  class="form-control" value="<?=$row['phone_number1']?>" required ><br>

    <label>จังหวัด</label>
        <select name="provinces" id="provinces" class="form-control">
			<option value="" selected disabled>เลือกจังหวัด </option>
			<?php foreach ($query as $value){?>
				<option value="<?=$value['code']?>"><?=$value['name_th']?></option>
			<?php }?>
		</select><br>
        <label>อำเภอ</label>
		<select name="district" id="district" class="form-control"></select><br>

		<label>ตำบล</label>
		<select name="subdistrict" id="subdistrict" class="form-control"></select><br>

		<label>เลขไปรษณีย์</label>
		<input type="text" name="zip_code" id="zip_code" readonly class="form-control"> <br>

		<label>ขนาดกล่อง</label>
		<select name="box" id="box" class="form-control">
			<option value="" selected disabled>เลือกขนาด</option>
			<?php foreach ($quer as $value){?>
				<option value="<?=$value['idbox']?>"><?=$value['size']?></option>
			<?php }?>
		</select><br>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
		<script type="text/javascript">
			$('#provinces').change(function() {
				var code = $(this).val()
				 $.ajax({
				 	type: "post",
        			url: "address.php",
        			data: {code:code,funtion:'provinces'},
        			success: function (data) {
        				$('#district').html(data);
        				$('#subdistrict').html(' ');
        				$('#zip_code').val(' ');
        	}
    	});
	});
			$('#district').change(function() {
				var code_d = $(this).val()
				 $.ajax({
				 	type: "post",
        			url: "address.php",
        			data: {code:code_d,funtion:'district'},
        			success: function (data) {
        				//console.log(data)
        				$('#subdistrict').html(data);
        				$('#zip_code').val(' ');
        	}
    	});
	});
			$('#subdistrict').change(function() {
				var code_s = $(this).val()
				 $.ajax({
				 	type: "post",
        			url: "address.php",
        			data: {code:code_s,funtion:'subdistrict'},
        			success: function (data) {
        				//console.log(data)
        				$('#zip_code').val(data);
        	}
    	});
	});

		</script>
        


        <input type="submit" value="update" class="btn btn-success">
        <a href="boxsend.php" class="btn btn-danger" >Cancel</a>
</form>
</div>
</div>
</div>
</body>
</html>