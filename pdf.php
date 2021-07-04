<?php
session_start();
include_once('header.php'); 
if(isset($_SESSION['username']))
{

	if(isset($_POST['submit']))
{

	require('vendor/autoload.php');
	require_once('db_con.php');
	$username = $_SESSION['username'];


	$query  = "SELECT * FROM `task` WHERE username = '$username'";


	$res=mysqli_query($con,$query);

	
	if(mysqli_num_rows($res)>0){
	
		$row=mysqli_fetch_assoc($res);

		
		$html='<table class="table">';
		$html.='<tr><td>Username:</td><td>'.$row['username'].'</td></tr>';
		$html.="<tr><td>E-mail:</td><td>".$row['email']."</td></tr>";
		$html.="<tr><td>Birth Date:</td><td>".$row['birth_date']."</td></tr>";
		$html.="<tr><td>Mobile Number:</td><td>".$row['mobile_number']."</td></tr>";
		$html.="<tr><td>Address Line 1:</td><td>".$row['address1']."</td></tr>";
		$html.="<tr><td>Addrss Line2:</td><td>".$row['address2']."</td></tr>";
		$html.="<tr><td>City:</td><td>".$row['city']."</td></tr>";
		$html.="<tr><td>State:</td><td>".$row['state']."</td></tr>";
		$html.="<tr><td>Country:</td><td>".$row['country']."</td></tr>";
		$html.="<tr><td>Reason for Registration:</td><td>".$row['reason']."</td></tr>";
		$html.='</table>';

		
	


	}else{
		$html="Data not found";
	}
	$mpdf=new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);
	
	$file='media/'.time().'.pdf';
	$mpdf->output($file,'D');

}

}
else
{

	header('location:index.php');
}


	




include_once('footer.php'); 
?>
<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post" >

	<div class="container">
 	 <div class="row">
    <div class="col text-center">
      	<input type="submit" class="btn btn-primary mr- mt-5" value="Download" name="submit">
    </div>
  </div>
</div>
</form>
