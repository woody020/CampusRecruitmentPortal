<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.css">      
  <!-- Latest compiled and minified CSS -->
  <script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
	<?php
	
	$result=0;
	$cid=$_POST['cid'];
	$psw=$_POST['psw'];
	$_SESSION['cid']=$cid;
	$q="SELECT * from company where cid='$cid' and password='$psw'";
	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'db3');
	$num=0;
	$result=mysqli_query($con,$q);
	if($result)
	{
		$num=mysqli_num_rows($result);
	}
	if($num==0)
			{
				?>	
				<form id="reverse" action="#">

					<script type="text/javascript">
					Swal.fire(				
						{
							imageUrl: 'http://vaeyecenter.com/storage/app/media/client/button.png',
							  imageWidth: 400,
							  imageHeight: 100,
							  imageAlt: 'Custom image',
							  animation: true,
							title:'LOGIN DETAILS OF COMPANY',
							text:"YOUR CREDENTIALS DONT MATCH ANY EXISTING RECORD",
							confirmButtonText: 'TRY AGAIN',
							type:'error',
							
						}
						)
						
						setTimeout(revert,3000);
					function revert()
					{
						document.getElementById('reverse').action='http://localhost/html/companylogin.html';
						document.getElementById('reverse').submit();
					}
				</script>
				</form>

				<?php




			}
			else if($num>0)
			{
				$_SESSION['cid']=$cid;
				$_SESSION['psw1']=$psw;
				?>
				<form id="ahead" action="#">
					<script type="text/javascript">
						Swal.fire(
						{
							imageUrl: 'http://vaeyecenter.com/storage/app/media/client/button.png',
							  imageWidth: 400,
							  imageHeight: 100,
							  imageAlt: 'Custom image',
							  animation: true,
						title:'LOGIN DETAILS OF COMPANY',
						text:"YOUR ARE SUCCESSFULLY LOGGED IN",
						confirmButtonText: 'PROCEED',
						type:'success',
						
						}
						)
						
						
						setTimeout(ahead,3000);

					function ahead()
					{
						document.getElementById('ahead').action='http://localhost/php/dashboard.php';
						document.getElementById('ahead').submit();
					}
					</script>
				</form>

				<?php

			}

		?>

</body>
</html>