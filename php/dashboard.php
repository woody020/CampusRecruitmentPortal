<?php
  session_start();
  if ( !isset($_SESSION['cid'])) {
    # code...
    header('location:http://localhost/html/companylogin.html');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>


  <link rel="stylesheet" type="text/css" href="http://localhost/css/mystyle.css"/> 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS -->
 <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 <!-- Compiled and minified CSS -->
     <!-- Compiled and minified CSS -->

  <title>
    company section
  </title>
  <style type="text/css">
.tabular{
  width: 900px;
  margin-left: 20%;
  background-color: white;

}
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
.table
{
  width: 600px;
  padding: 25px;
  margin-left: 20%;
  margin-top:20px;
  background-color: white;
 background-color: white;
 -moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000;
  
}
@media screen and (max-width: 650px)
{
  
  #overla p
  {
    font-size: 15px;
  }
 
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
.table
{
  width: 450px;
 
  margin-left: 0px;
  margin-top:20px;
  background-color: orange;
  border-radius: 2px;
  display: block;
  overflow-x:auto;
  
}
td,th
{

  padding: 20px;
}
}

</style>

</head>
<body >
<header style="background:transparent;"  id="jumbo" style="height: 100px;border-radius: 1px;">
    <img style="position: relative;left:200px;width: 140px;height: 150px; padding-top: 30px" src="https://upload.wikimedia.org/wikipedia/en/9/9b/Thapar_Institute_of_Engineering_and_Technology_University_logo.png" align="left" alt="" class="rectangle responsive-img">
      <center><h1 style="padding-top: 30px"><b style="transform: translate(-50%, -50%);">  THAPAR INSTITUTE OF TECHNOLOGY</b></h1>
     <a class="fa fa-power-off"  href="http://localhost/php/logoutcp.php" >LOGOUT</a></center>
  </header>

  <center><h6>COMPANY VIEW</h6></center><br>

 <div id="overla" ondblclick="off()" style="overflow-x:auto;">
        <p style="font-size: 25px;" id="text"><b><u style="font-size: 25px"></u></b><br>
      
  <?php
    $rowss=0;
    $result=0;
    if(isset($_POST['submit3'])){
   
    $search1=$_POST['search1'];
    $search2=$_POST['search2'];
  
    $con=mysqli_connect('localhost','root');
    mysqli_select_db($con,'db3');
    $q="SELECT * from studprofile where cgpa>=$search1 and skills LIKE '%$search2%' ";
    $result=mysqli_query($con,$q);
    }
    if($result)
    {
      $rowss=mysqli_num_rows($result);
    }

    if($rowss>0)
        {
          ?>
          <table style="background-color: white;-moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000;">
            <tr>
              <th style="background-color: black;color: white;">
                ROLL-NUMBER
              </th>
              <th style="background-color: black;color: white;">
                STUDENT-NAME
              </th>

              <th style="background-color: black;color: white;">
                USER-NAME
              </th>
              <th style="background-color: black;color: white;">
                CGPA-OBTAINED
              </th>

              <th style="background-color: black;color: white;">
                SKILLS
              </th>
              <th style="background-color: black;color: white;">
                PROGRAMMING_LANGUAGE
              </th>

              <th style="background-color: black;color: white;">
               CONTACT_NO
              </th>
              <th style="background-color: black;color: white;">
                EMAIL ID
              </th>
            </tr>

          <?php
          for($i=1;$i<=$rowss;$i++)
          {
            $out=mysqli_fetch_array($result);
            ?>
            <tr>
              <td align="center">
                <form action="http://localhost/php/searchresume.php" method="POST" >
                <input readonly type="text" name="search" value=<?php echo $out['roll']; ?> >
                <input type="submit" name="su" value="resume">
              </form>

              </td>
              <td align="center">
                <?php echo $out['stname']; ?>
              </td>

              <td align="center">
                <?php echo $out['uname']; ?>
              </td>
              <td>
                <?php echo $out['cgpa']; ?>
              </td>
              <td align="center">
                <?php echo $out['skills']; ?>
              </td>
              <td align="center">
                <?php echo $out['program']; ?>
              </td>
              <td align="center">
                <?php echo $out['contact']; ?>
              </td>
              <td align="center">
                <form action="http://localhost/php/testmail.php" method="POST">
                  <input readonly type="email" name="email" value=<?php echo $out['email']; ?>>
                  <input type="submit" name="sub" value="send mail">
                </form> 
              </td>
              
            </tr>
            
            <?php

          }
        }
        
        ?>

    </table>
    </p>

    </div>
    

<div class="tabular">

<table class="table" border="2px">
  <h1>Retrieving student details</h1>
   <form method="POST" action="http://localhost/php/dashboard.php">
  <tr><td>  CGPA:<input type="search" name="search1" placeholder="Enter cgpa criteria" style="padding-top: 10px;margin-top: 20px"><br></td></tr>
  <tr><td>  TECH SKILLS:<input type="search" name="search2" placeholder="SKILLS" style="padding-top: 10px;margin-top: 20px"><br></td></tr>
   <tr><td> <center><input type="submit" name="submit3" value="STUDENT DETAILS" class="btn btn-primary" onclick="on()" style="padding-top: 10px;margin-top: 20px"></center></td></tr>
  
  </form>
</table>
  <hr>



 

  <?php
  $y=$_SESSION['cid'];
  ?>
<table class="table" border="2px">
  <h1>Filling Up Company Criteria</h1>
<form  method="POST" action="http://localhost/php/dashboard.php">
  <tr><td>COMPANY NAME<input type="text" name="cname" value=<?php echo "$y";?> readonly></td></tr> 
  <tr><td> REQUIRED SKILLS<input type="text" name="skill" placeholder="skills needed" required><td></tr>
  <tr><td> REQUIRED CGPA<input style="margin-top: 20px" type="number" step=0.01 placeholder="CGPA needed" name="cgpa" required></td></tr>
  <tr><td>PACKAGE OFFERED(in L.P.A)<input style="margin-top: 20px" type="number" step=0.01 name="package" placeholder="package"  required></td></tr>
  <tr><td><center><input type="submit" name="submit2" value="SET CREDENTIALS"  required></center></td></tr>
  <br>
  <hr>

</form>
</table>
<hr>


<?php
  

 if(isset($_POST['submit2']))
  {
      $out=0;
      $out1=0;
      $row=0;
      $name=$_POST['cname'];
      $skill=$_POST['skill'];
      $cgpa=$_POST['cgpa'];
      $package=$_POST['package'];    
      $con=mysqli_connect('localhost','root');
      mysqli_select_db($con,'db3');
      $check= "SELECT * from companyrequirements where name='$y' ";
      $result=mysqli_query($con,$check);
      if($result)
      {
      $row=mysqli_num_rows($result);
      }
      if(!$row)
      {
      $q="INSERT into companyrequirements (cgpa,skillsneeded,package,name) values ('$cgpa','$skill','$package','$y')";
      $out=mysqli_query($con,$q);
      }
      else if($row)
      {
        $q= "UPDATE companyrequirements set cgpa='$cgpa',skillsneeded='$skill',package='$package' where name='$y'"; 
        $out1=mysqli_query($con,$q);
      }
      if($out)
      {
        ?>
          <script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://icon-library.net/images/criteria-icon/criteria-icon-22.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'ELIGIBILITY CRITERIA',
              text:"CREDENTIALS ADDED SUCCESSFULLY",
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
      else if($out1)
      {
        ?>
      <script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
            <script>
            Swal.fire(        
            {
              imageUrl: 'https://icon-library.net/images/criteria-icon/criteria-icon-22.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'ELIGIBILITY CRITERIA',
              text:"PROFILE UPDATED",
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
              imageUrl: 'https://icon-library.net/images/criteria-icon/criteria-icon-22.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                animation: true,
              title:'ELIGIBILITY CRITERIA',
              text:"SOMETHING WENT WRONG",
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



  <hr>
    <hr>
</div>  
<hr>
  </form>
   <div class="footer">
  <p>"knowledge is power"</p>
</div>


</body>
</html>










   