<?php 
session_start();
include_once('header.php'); 
include_once('validation.php');




if(isset($_POST['submit']))
{

	$error =  validate_data();
	if(empty($error))
	{

		$username = test_input($_POST['username']);
		$email = test_input($_POST['email']);
		$password = test_input($_POST['password']);
		$hash = password_hash($password,PASSWORD_DEFAULT);
		$birth_date = test_input($_POST['birth_date']);
		$mobile_number = $_POST['mobile_number'];
		$address1 = test_input($_POST['address1']);
		$address2 = test_input($_POST['address2']);
		$city = test_input($_POST['city']);
		$state = test_input($_POST['state']);
		$country = test_input($_POST['country']);
		$reason_registration = test_input($_POST['reason_registration']);
		$pdf_file = $_FILES['pdf']['name'];
		$pdf_file_temp = $_FILES['pdf']['tmp_name'];

		move_uploaded_file($pdf_file_temp,"pdf/$pdf_file");


		if(isset($_FILES['img1']['name']))
		{
			$image1_file = $_FILES['img1']['name'];
			$image1_file_temp = $_FILES['img1']['tmp_name'];
			move_uploaded_file($image1_file_temp,"image/$image1_file");

		}
		if(isset($_FILES['img2']['name']))
		{
			$image2_file = $_FILES['img2']['name'];
			$image2_file_temp = $_FILES['img2']['tmp_name'];
			move_uploaded_file($image2_file_temp,"image/$image2_file");

		}
		if(isset($_FILES['img3']['name']))
		{
			$image3_file = $_FILES['img3']['name'];
			$image3_file_temp = $_FILES['img3']['tmp_name'];
			move_uploaded_file($image3_file_temp,"image/$image3_file");

		}
		if(isset($_FILES['img4']['name']))
		{
			$image4_file = $_FILES['img4']['name'];
			$image4_file_temp = $_FILES['img4']['tmp_name'];
			move_uploaded_file($image4_file_temp,"image/$image4_file");

		}
		if(isset($_FILES['img5']['name']))
		{
			$image5_file = $_FILES['img5']['name'];
			$image5_file_temp = $_FILES['img5']['tmp_name'];
			move_uploaded_file($image5_file_temp,"image/$image5_file");

		}


		$query = "INSERT INTO `task`( `username`, `email`, `password`, `birth_date`, `mobile_number`, `address1`, `address2`, `city`, `state`, `country`, `reason`, `pdf`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES ('$username','$email','$hash','$birth_date','$mobile_number','$address1','$address2','$city','$state','$country','$reason_registration','$pdf_file','$image1_file','$image2_file','$image3_file','$image4_file','$image5_file')";

		   $run = mysqli_query($con, $query);

		  if (isset($run))
		  {  
			 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				  <strong>Successfully</strong>  Data Inserted !</div>";
				  $_SESSION['username'] = $username;
				  header('location:pdf.php');



				 
		  }			 
		 else 
		 {
			echo "Error: " . $query . "<br>" ;
		 }

		 mysqli_close($con);


	}
	else
	{
		echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				  <strong>woops </strong>".$error."</div>";
	}
	

	
}

?>



<div class="row mt-5">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-4 text-center">

			<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post" enctype="multipart/form-data">
			  <div class="form-group mt-2">
			    <label for="Username">Username *</label>
			    <input type="text" name="username" class="form-control" id="username" value="<?php if(isset($_POST['username']))echo $_POST['username'];?>" required="">
			  </div>
			  <div class="form-group mt-2">
			    <label for="email">Email *</label>
			    <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>" required="">
			  </div>
			    <div class="form-group mt-2">
			    <label for="password">Password *</label>
			    <input type="password" name="password" class="form-control" id="password" required="">
			  </div>
			    <div class="form-group mt-2">
			    <label for="re_enter_password">Re-enter Password *</label>
			    <input type="password" name="re_password" class="form-control" id="re_enter_password" required="">
			  </div>
			  <div class="form-group mt-2">
			    <label for="date fo birth">Date of Birth *</label>
			    <input type="date" name="birth_date" class="form-control" value="<?php if(isset($_POST['birth_date']))echo $_POST['birth_date'];?>" id="birthdate" required="">
			  </div>
			  <div class="form-group mt-2">
			    <label for="mobile_number">Mobile Number *</label>
			    <input type="tel" name="mobile_number" class="form-control" value="<?php if(isset($_POST['mobile_number']))echo $_POST['mobile_number'];?>" id="mobile_number" required="">
			  </div>
			  <div class="form-group mt-2">
			    <label for="address1">Address Line-1</label>
			    <input type="text" name="address1" class="form-control" value="<?php if(isset($_POST['address1']))echo $_POST['address1'];?>" id="address1">
			  </div>
			  <div class="form-group mt-2">
			    <label for="address2">Address Line-2</label>
			    <input type="text" name="address2" value="<?php if(isset($_POST['address2']))echo $_POST['address2'];?>" class="form-control" id="address2">
			  </div>
			  <div class="form-group mt-2">
			    <label for="city">City</label>
			    <input type="text" name="city" class="form-control" value="<?php if(isset($_POST['city']))echo $_POST['city'];?>" id="exampleInputPassword1">
			  </div>
			  <div class="form-group mt-2">
			    <label for="state">State</label>
			    <input type="text" name="state" class="form-control" value="<?php if(isset($_POST['state']))echo $_POST['state'];?>" id="state">
			  </div>
			    <div class="form-group mt-2">
			    <label for="country">Country</label>
			    <input type="text" name="country" class="form-control" value="<?php if(isset($_POST['country']))echo $_POST['country'];?>" id="country">
			  </div>
			    <div class="form-group mt-2">
			    <label for="reason for registration">Reason for Registration</label>
			    <input type="text" name="reason_registration" class="form-control" value="<?php if(isset($_POST['reason_registration']))echo $_POST['reason_registration'];?>" id="reason">
			  </div>
			  
			  <div class="form-group mt-2">
			    <label for="pdf_upload ">PDF Upload</label>
			    <input type="file" name="pdf" class="form-control" id="pdf">
			  </div>
			  <div class="form-group mt-2">
			    <label for="image upload">Image1 Upload(Optional)</label>
			    <input type="file" name="img1" class="form-control" id="image1">
			  </div>
			   <div class="form-group mt-2">
			    <label for="image upload">Image2 Upload(Optional)</label>
			    <input type="file" name="img2" class="form-control" id="image2">
			  </div>
			   <div class="form-group mt-2">
			    <label for="image upload">Image3 Upload(Optional)</label>
			    <input type="file" name="img3" class="form-control" id="image3">
			  </div>
			   <div class="form-group mt-2">
			    <label for="image upload">Image4 Upload(Optional)</label>
			    <input type="file" name="img4" class="form-control" id="image4">
			  </div>
			  <div class="form-group mt-2">
			    <label for="image upload">Image5 Upload(Optional)</label>
			    <input type="file" name="img5" class="form-control" id="image5">
			  </div>

			 
			  <button type="submit" name="submit" class="btn btn-primary mt-5">Register</button>
			</form>

		
	</div>
	<div class="col-md-4">
		
	</div>
</div>
<script type="">
	
	 document.getElementById('birthdate').max = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
</script>
<?php include_once('footer.php'); ?>