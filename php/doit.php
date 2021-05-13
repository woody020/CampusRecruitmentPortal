<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://localhost/css/mystyle.css"/>         

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<style type="text/css">
	.card
	{
		position: fixed;
		right: 0%;
		bottom:0%;
	}
	.header
	{
		position: fixed;
	}
	</style>
	<title></title>
</head>
<body style="background-color: aliceblue;">
	<header class="header">
		<img style="position: relative;left:200px;width: 140px;height: 150px; padding-top: 30px" src="https://upload.wikimedia.org/wikipedia/en/9/9b/Thapar_Institute_of_Engineering_and_Technology_University_logo.png" align="left" alt="" class="rectangle responsive-img">
      <center><h1 style="padding-top: 30px"><b style="transform: translate(-50%, -50%);">  THAPAR INSTITUTE OF TECHNOLOGY</b></h1>
				<a href="http://localhost/html/homepage.html">Back</a></center>
	</header>
	<br>
	<br>
	<br><br>
	<hr>
	<div >
	<img style="position: fixed;" src="http://localhost/images/thapar.jpg">
	
	
	<?php
	
	$con=mysqli_connect('localhost','root','',db3);
	$name=mysqli_real_escape_string($con,$_POST['namer']);
	$username=mysqli_real_escape_string($con,$_POST['uname']);
	$password=mysqli_real_escape_string($con,$_POST['psw']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$roll=mysqli_real_escape_string($con,$_POST['roll']);
	$branch=mysqli_real_escape_string($con,$_POST['branch']);
	$contact=mysqli_real_escape_string($con,$_POST['contact']);
	$_SESSION['contact']=$contact;
	


	
	if(! $con)
	{
		 echo "SERVER IS DOWN TRY AGAIN";

	}
	else
	{
		

		 
		 ?>
		 	<br>

		 <?php

			$rows=0;
			$a=mysqli_select_db($con,"db3");
			$existchecker="SELECT * FROM resgistration1 WHERE roll='$roll'";
			$d=mysqli_query($con, $existchecker);
			
			if($d){
			$rows=mysqli_num_rows($d);
			}
			$q="INSERT INTO resgistration1 (name,username,password,email,roll,branch,contact) VALUES ('$name','$username','$password','$email','$roll','$branch','$contact')";
		
			$c=mysqli_query($con,$q);
			
			if ($c && rows==0) {
				
				?>
					<form id="reverse" action="#">

					<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
						<script>
						Swal.fire(				
						{
							imageUrl: 'https://eastwesthealing.com/wp-content/uploads/2015/04/signup.png',
							  imageWidth: 400,
							  imageHeight: 100,
							  imageAlt: 'Custom image',
							  animation: true,
							title:'LOGIN DETAILS',
							text:"YOUR ACCOUNT CREATION IS SUCCESSFULLY DONE!",
							confirmButtonText: 'GO TO LOGIN',
							type:'success',
							
						}
						)
						
						setTimeout(revert,5000);

						function revert()
						{
							document.getElementById('reverse').action='http://localhost/php/login.php';
							document.getElementById('reverse').submit();
						}
					</script>
				</form>
				
				<?php
			}
			else if ($rows>0) {
				?>

				<form id="reverse" action="#">

					<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
						<script>
						Swal.fire(				
						{
							imageUrl: 'https://eastwesthealing.com/wp-content/uploads/2015/04/signup.png',
							  imageWidth: 400,
							  imageHeight: 100,
							  imageAlt: 'Custom image',
							  animation: true,
							title:'LOGIN DETAILS',
							text:"YOUR ACCOUNT ALREADY EXIST IN THIS WEBSITE",
							confirmButtonText: 'PROCEED WITH LOGIN',
							type:'info',
							
						}
						)
						
						setTimeout(revert,5000);

						function revert()
						{
							document.getElementById('reverse').action='http://localhost/php/login.php';
							document.getElementById('reverse').submit();
						}
					</script>
				</form>
				
				<?php
			}
			else
			{

				?>


				<form id="reverse" action="#">

					<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
						<script>
						Swal.fire(				
						{
							imageUrl: 'https://eastwesthealing.com/wp-content/uploads/2015/04/signup.png',
							  imageWidth: 400,
							  imageHeight: 100,
							  imageAlt: 'Custom image',
							  animation: true,
							title:'LOGIN DETAILS',
							text:"YOUR ACCOUNT COULDN'T BE CREATED!",
							confirmButtonText: 'TRY AGAIN',
							type:'error',
							
						}
						)
						
						setTimeout(revert,5000);

						function revert()
						{
							document.getElementById('reverse').action='http://localhost/php/login.php';
							document.getElementById('reverse').submit();
						}
					</script>
				</form>
				
				

				<?php
			}
		}			
	?>
</div>
</body>
</html>

