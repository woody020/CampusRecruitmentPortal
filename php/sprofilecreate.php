
<?php 
session_start();
if (!isset($_SESSION['roll'])) {
        # hcode...
    header('location:http://localhost/php/login.php');
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/css/mystyle.css"/>  
	  
	<link rel="stylesheet" type="text/css" href="http://localhost/css/sprofilecreate.css"/>   

	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->

<style type="text/css">
	        a:link, a:visited {
  background-color: blue;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
a:hover, a:active  {
  background-color: red;
}
input[type="submit"]
{
  border:none;
  outline: none;
  height: 40px;
  background: blue;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}

 input[type="submit"]:hover
{
  cursor: pointer;
  background: #ffc107;
  color: #000;

}
input[type='text'],input[type='password']
{
  border-radius: 5px;
  padding: 12px;
  width: 192px;
}

</style>

	<title>
		student section
	</title>
</head>
<body>
<header style="background-color: white;" id='jumbo'>
		 <img style="position: relative;left:200px;width: 140px;height: 150px; padding-top: 30px" src="https://upload.wikimedia.org/wikipedia/en/9/9b/Thapar_Institute_of_Engineering_and_Technology_University_logo.png" align="left" alt="" class="rectangle responsive-img">
      <center><h1 style="padding-top: 30px"><b style="transform: translate(-50%, -50%);">  THAPAR INSTITUTE OF TECHNOLOGY</b></h1>
			<a class="fa fa-arrow-circle-left" href="http://localhost/app/php/studentview1.php">Back</a></center>

		</header>
			<?php

		$x=$_SESSION['roll'];
		$y=$_SESSION['susername'];
		?>
		 <h1 style="position: relative;text-align: right;font-size: 30px;color: red;"><?php echo "Hello $y($x)";?></h1>
		<?php
		$con=mysqli_connect("localhost","root");
		mysqli_select_db($con,"db3");
		$q="SELECT * from resgistration1 where roll='$x' and username='$y' ";
		$result=mysqli_query($con,$q);
		if($result)
		{
			$rows=mysqli_num_rows($result);
			$out=mysqli_fetch_array($result);
			$name=$out['name'];
			$email=$out['email'];
			$cno=$out['contact'];
		}
	?>

	
<CENTER><a href="http://localhost/php/logoutst.php" class="fa fa-power-off" >LOGOUT</a></CENTER>
	
<div class="tabular">	
	<h1>FILL THE DETAILS </h1>
	<table  class="table" style="background-color:black;box-shadow: 0 8px 6px -6px black;">
	<form action="http://localhost/php/sprofilecreate.php" method="POST"  name="profile">
		
		<tr><td>
		<input type="text" name="stname" id="namer" value=<?php echo "$name"; ?>  readonly>
		<input type="text" name="user" id="user" value=<?php echo "'$y'"; ?>  readonly>
		<input type="text" name="rolls" value=<?php echo "$x"; ?> readonly>
		<input type="text" name="no" value=<?php echo "$cno"; ?> readonly>
		</td></tr>

		<tr><td>	
		<input type="number" step=0.01 name="cgpa" placeholder="AVERAGE CGPA" required></td></tr>

		<tr><td>
		<textarea cols="35px" name="language" placeholder="PROGRAMMING LANGUAGE KNOWN" required></textarea>

		<textarea cols="34px;" name="skill" placeholder="YOUR SKILLS" required></textarea></td></tr>		
		
		<tr><td>
		
		<input type="email" style="width: 210px;" name="email" value=<?php echo "$email"; ?> readonly>
		</td></tr>
		<tr><td><center><input  type="submit" name="sub" value="ENTER" >
		<input  type="submit" name="edit" value="EDIT"></td></tr></center>
	
	</form>
</table>

<?php
if(isset($_POST['edit'])){
		$row=0;
		$con=mysqli_connect('localhost','root');
		mysqli_select_db($con,'db3');
		$check="SELECT * from studprofile where roll='$x' ";
		$result=mysqli_query($con,$check);

		if($result)
		{
			$row=mysqli_num_rows($result);
		}
		if($row and isset($_POST['edit']))
		{
			$cgpa=$_POST['cgpa'];
			$skillss=$_POST['skill'];
			$programs=$_POST['language'];

			$q= "UPDATE studprofile set cgpa='$cgpa',skills='$skillss',program='$programs' where roll='$x'";

			$done=mysqli_query($con,$q);
			if($done)
			{
				?>
				<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://image.flaticon.com/icons/png/512/8/8912.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'PROFILE UPDATION DETAILS',
              text:"UPDATION SUCCESSFUL",
              confirmButtonText: 'DONE',
              type:'success',
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
				<?php
			}
			else
			{
				?>
				<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://image.flaticon.com/icons/png/512/8/8912.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'PROFILE UPDATION DETAILS',
              text:"UPDATION FAILED",
              confirmButtonText: 'TRY AGAIN',
              type:'error',
              
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
				<?php
			}
		}
}
?>
	

	
			<?php
			if (isset($_POST['sub'])) {
				# code...
			$row=0;
			$out=0;
			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'db3');
			$check= "SELECT * from studprofile where roll='$x' ";
			$result=mysqli_query($con,$check);
			if($result){
			$row=mysqli_num_rows($result);
			}
			if(!$row)
			{
			$name=$_POST['stname'];
			$use=$_POST['user'];
			$rol=$_POST['rolls'];
			$cgpa=$_POST['cgpa'];
			$skillss=$_POST['skill'];
			$programs=$_POST['language'];
			$contacts=$_POST['no'];
			$emai=$_POST['email'];

			$con=mysqli_connect('localhost','root');
			mysqli_select_db($con,'db3');
			$r="INSERT into studprofile (roll,stname,uname,cgpa,skills,program,contact,email) values ('$rol','$name','$use','$cgpa','$skillss','$programs',$contacts,'$emai')";
			$out=mysqli_query($con,$r);
			}
			if($out and isset($_POST['sub']))
			{
				?>
				<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://ieeecs-media.computer.org/wp-media/2018/08/18001759/psd_logo-icon.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'PROFILE DETAIL',
              text:"PROFILE CREATION IS SUCCESSFULLY DONE",
              confirmButtonText: 'DONE',
              type:'success',
              
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
      		}
          	<?php
			}
			else if($row)
			{
				?>
				<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://ieeecs-media.computer.org/wp-media/2018/08/18001759/psd_logo-icon.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'PROFILE DETAILS',
              text:"PROFILE CREATION FAILED, PROFILE ALREADY EXISTS...CLICK EDIT",
              confirmButtonText: 'TRY AGAIN',
              type:'error',
              
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
				<?php
			}
			else
			{
				?>
				<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://ieeecs-media.computer.org/wp-media/2018/08/18001759/psd_logo-icon.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'PROFILE DETAILS',
              text:"PROFILE CREATION FAILED",
              confirmButtonText: 'TRY AGAIN',
              type:'error',
              
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
				<?php
			}
			
		}
		
		?>

	

	<table  class="table" style="background-color: black;box-shadow: 0 8px 6px -6px black;">
	<form method="POST" action=""  enctype="multipart/form-data">
		
			<h1>UPLOAD RESUME IN PDF FORMAT ONLY</h1>

			<tr>
				<td><input type="text" name="roller" value=<?php echo "$x";?> readonly></td>
			</tr>
			<tr>
				<img src="https://image.flaticon.com/icons/png/512/12/12313.png" width="250px" height="300px;">
				<td><input type="file" name="upfile" value="" required></td>
			</tr>
			<tr>
				<center><td><input class="btn btn-primary" type="submit" value="upload" name="upload1"></td></center>
			</tr>
		
	</form>
	</table>
	</div>

	
	

			<?php
			$result=0;
			if(isset($_POST['upload1']) and $_FILES['upfile']['name']!='')
			{
			$name=$_FILES['upfile']['name'];
			$tempname=$_FILES['upfile']['tmp_name'];
			$roll=$x;
			$data=explode(".", "$name");
			$extension=$data[1];
			
			$allowed=array('pdf');

		
			$folder= $_SERVER['DOCUMENT_ROOT'] ."/student/"."$x".$name;
			
			if(move_uploaded_file($tempname, $folder) and $name!='' and in_array($extension, $allowed))
			{
				$con=mysqli_connect('localhost','root');
				mysqli_select_db($con,'db3');
				

				$q="UPDATE studprofile set image='$folder' where roll ='$x' ";
				
				$result=mysqli_query($con,$q);
			
				if($result)
				{
					?>
					<script type="text/javascript">
						alert("resume uploaded");
					</script>
					<?php
				}
				else
				{
					?>
					<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://cdn1.iconfinder.com/data/icons/files-and-folders-16/128/16-512.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'DOCUMENT UPLOAD DETAIL',
              text:"RESUME UPLOADED SUCCESSFULLY",
              confirmButtonText: 'OKAY',
              type:'success',
              
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
					<?php
				}
			}
			else
			{
				?>
				<script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://cdn1.iconfinder.com/data/icons/files-and-folders-16/128/16-512.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'DOCUMENT UPLOAD DETAILS',
              text:"RESUME UPLOADING FAILED",
              confirmButtonText: 'TRY AGAIN',
              type:'error',
              
            }
            )
            
            setTimeout(revert,3000);

            function revert()
            {
              
            }
          </script>
				<?php
			}

		}
			
			?>

			
</script>
<div class="footer">
  <p>"knowledge is power"</p>
</div>
</body>

</html>