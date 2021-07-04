<?php



	function validate_data(){
	include_once('db_con.php');
			

			// username validation

			if (!empty($_POST['username']))
			{

				$username = test_input($_POST['username']);

				
				if (ctype_alnum($username))
				{   

				   $query  = "SELECT * FROM `task` WHERE username = '$username'";
				   $result = mysqli_query($con,$query);
				   if(mysqli_num_rows($result)>0)
				   {
				   	 return "This Username is already taken";
				   }

					 
				}	
				else
				{
					return "Invalid username";
				}
			}
			else
			{
				return "Username is compolsory";
			}



			// email validation
			if (!empty($_POST['email']))
			{

				$email = test_input($_POST['email']);
				if(filter_var($email, FILTER_VALIDATE_EMAIL)===false)
				{
					return "E-mail is not valid";
				}

				   $query  = "SELECT * FROM `task` WHERE email = '$email'";
				   $result = mysqli_query($con,$query);
				   if(mysqli_num_rows($result)>0)
				   {
				   	 return "This E-mail is already taken";
				   }

				
			}
			else
			{
				return 'Please enter E-mail';
			}


			//Password validation
			if(!empty($_POST['password']) && ($_POST['password'] == $_POST['re_password']))
			{
    			$password = test_input($_POST["password"]);
			    $cpassword = test_input($_POST["re_password"]);

			    if (strlen($_POST["password"]) <= 8) {
			        return "Your Password Must Contain At Least 8 Characters!";
			    }
			    elseif(!preg_match("#[0-9]+#",$password)) {
			        return "Your Password Must Contain At Least 1 Number!";
			    }
			    elseif(!preg_match("#[A-Z]+#",$password)) {
			        return "Your Password Must Contain At Least 1 Capital Letter!";
			    }
			    elseif(!preg_match("#[a-z]+#",$password)) {
			        return "Your Password Must Contain At Least 1 Lowercase Letter!";
			    } else {
			        
			    }
			}
			else
			{
				return 'Password and Re-enter password are not match';
			}


			



			
			if (!empty($_POST['birth_date'])) {

				$birthDate = test_input($_POST['birth_date']);

				//date in mm/dd/yyyy format; or it can be in other formats as well
				  $date = str_replace('/', '-', $birthDate);
				   $birthDate = date('m-d-Y', strtotime($date));
				   $birthDate = str_replace('-', '/', $birthDate);
				  //explode the date to get month, day and year
				  $birthDate = explode("/", $birthDate);
				  //get age from date or birthdate
				  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
				    ? ((date("Y") - $birthDate[2]) - 1)
				    : (date("Y") - $birthDate[2]));
				 

				
				
				
			}
			else
			{
				return "Please Enter valid Birth Date";
			}

			
			if (!empty($_POST['mobile_number'])) {

				$mobile_number = test_input($_POST['mobile_number']);
					$options_for_phone = array(
									'options' => array(
														'min_range' => 1000000000,
														'max_range' => 9999999999,
														)
									);

				if (filter_var($mobile_number, FILTER_VALIDATE_INT, $options_for_phone) === false) {
					return 'invalid Mobile number';
				}

				
			}
			else
			{
				return 'Please enter Mobile number';
			}

			
			
			
			$filetype = strtolower(pathinfo($_FILES['pdf']['name'],PATHINFO_EXTENSION));

			if($filetype!=="pdf")
			{
				return 'Pdf file only';
			}


			if(isset($_FILES['img1']['name']))
			{
				$imageFileType = strtolower(pathinfo($_FILES['img1']['name'],PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType)
				 {
  					return "Sorry, only JPG, JPEG, PNG  files are allowed.";
 
				 } 
			}

			if(isset($_FILES['img2']['name']))
			{
				$imageFileType = strtolower(pathinfo($_FILES['img1']['name'],PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType)
				 {
  					return "Sorry, only JPG, JPEG, PNG  files are allowed.";
 
				 } 
			}

			if(isset($_FILES['img3']['name']))
			{
				$imageFileType = strtolower(pathinfo($_FILES['img1']['name'],PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType)
				 {
  					return "Sorry, only JPG, JPEG, PNG  files are allowed.";
 
				 } 
			}

			if(isset($_FILES['img4']['name']))
			{
				$imageFileType = strtolower(pathinfo($_FILES['img1']['name'],PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType)
				 {
  					return "Sorry, only JPG, JPEG, PNG  files are allowed.";
 
				 } 
			}

			if(isset($_FILES['img5']['name']))
			{
				$imageFileType = strtolower(pathinfo($_FILES['img1']['name'],PATHINFO_EXTENSION));
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType)
				 {
  					return "Sorry, only JPG, JPEG, PNG  files are allowed.";
 
				 } 
			}
  

		
	}


	// check that not contains any html tage
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}





	

?>
