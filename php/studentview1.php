<?php
session_start();


    if ( !isset($_SESSION['roll'])) {
        # hcode...
    header('location:http://localhost/php/login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/css/mystyle.css"/>   

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

 <!-- Compiled and minified CSS -->
     <!-- Compiled and minified CSS -->

	<title>
		student section
	</title>
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
}
label,th,td
{
  color: black;
}
  
.tabular{
  width: 900px;
  margin-left: 20%;
  background-color: white;

}
.card:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
@media screen and (max-width: 650px)
{
      .tabular{
     position: absolute;
  margin-left: 0%;
  width: 550px;
  left: 0px;
  background-color: white;
  display: block;

}

.tabular h1
{

  font-size: 16px;
  margin-left: 0%;
}
#overla p
  {
    font-size: 15px;
  }
  #overla table
  {
    font-size: 10px;
    
    margin-left: 1%;
    padding: 0px;
  }



}
</style>

</head>
<body>
<header style="background:transparent;"  id="jumbo" style="height: 100px;border-radius: 1px;">
  <img style="position: relative;left:200px;width: 140px;height: 150px; padding-top: 30px" src="https://upload.wikimedia.org/wikipedia/en/9/9b/Thapar_Institute_of_Engineering_and_Technology_University_logo.png" align="left" alt="" class="rectangle responsive-img">
      <center><h1 style="padding-top: 30px"><b style="transform: translate(-50%, -50%);">  THAPAR INSTITUTE OF TECHNOLOGY</b></h1>
      <a class="fa fa-power-off" href="http://localhost/php/logoutst.php">LOGOUT</a></center>
  </header>

	<hr>
	<center> <b style="color: blue;font-size: 25px;"><?php	echo "USERNAME:  " .$_SESSION['susername'] ."\nROLL NO:  ". $_SESSION['roll']; ?></b></center>
    <br>

	 <div id="overla" ondblclick="off()" style="overflow-x:auto;box-shadow: 0 8px 6px -6px black;">
       <p style="font-size: 25px;z-index: 1;cursor: pointer;" onmouseover="this.style.color='yellow'" onmouseout="this.style.color='white' " id="text">
        <?php
        $row=0;
        $con=mysqli_connect('localhost','root');
        mysqli_select_db($con,'db3');
        $q="SELECT * from  companyrequirements";
        $result=mysqli_query($con,$q);
        if($result)
        {
        	$row=mysqli_num_rows($result);
        }

        if($row>0)
        {
        	?>
        	<table align="center">
        		<tr style="background-color: black;color: white;">
        			<th style="color: white;padding: 20px;
  margin: 25px;">
        				COMPANY NAME
        			</th>
        			<th style="color: white;padding: 20px;
  margin: 25px;">
        				SKILLS REQUIRED
        			</th>

        			<th style="color: white;padding: 20px;
  margin: 25px;">
        				PACKAGE OFFERED
        			</th>

        			<th style="color: white;padding: 20px;
  margin: 25px;">
        				AVERAGE CGPA NEEDED
        			</th>
        		</tr>

        	<?php
        	for($i=1;$i<=$row;$i++)
        	{
        		$out=mysqli_fetch_array($result);
        		?>
        		<tr>
        			<td align="center">
        				<?php echo $out['name']; ?>
        			</td>
        			<td align="center">
        				<?php echo $out['skillsneeded']; ?>
        			</td>
        			<td align="center">
        				<?php echo $out['package'];  ?>
        			</td>
        			<td align="center">
        				<?php echo $out['cgpa']; ?>
        			</td>
        		</tr>
        		
        		<?php

        	}
        }

        ?>
    </table>
  	</p>
    </div>
    <br>

    <script type="text/javascript">
  function on() {
  document.getElementById("overla").style.display = "block";
}

function off() {
  document.getElementById("overla").style.display = "none";
}
</script>

  
    
    
<center>
<div class="tabular">
	
    <div class="card" style="box-shadow: 0 8px 6px -6px black;" >
      
      
        
<center><h2>BUILD YOUR PROFILE HERE</h2>
<img src="https://png.pngtree.com/png-clipart/20190629/original/pngtree-vector-edit-profile-icon-png-image_4101351.jpg" width="200px" height="163px;">
<div class="data">
<a class="btn btn-primary" href="http://localhost/php/sprofilecreate.php">CREATE PROFILE</a></center>
</div>
</div>
</div>

    <div class="card" style="box-shadow: 0 8px 6px -6px black;">
<center><h2>UPDATE PROFILE</h2>
<img src="https://img.icons8.com/carbon-copy/2x/approve-and-update.png" width="200px;" height="200px;">
<div class="data">

<a class="btn btn-primary" href="http://localhost/php/sprofilecreate.php" name="edit" value="edit">EDIT PROFILE</a></center>
<pre>
  

</pre>
</div>
</div>
</div>
</div>
</center>
 <div class="footer">
  <p>"knowledge is power"</p>
</div>
</body>
