<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/css/mystyle.css"/>  
  <link rel="stylesheet" type="text/css" href="http://localhost/css/register.css"/>  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">       
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      
  <!-- Latest compiled and minified CSS -->
  <script src="http://localhost/sweetalert/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://localhost/js/ajax.js"></script>


	<title></title>
  <style type="text/css">
     a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
a:hover, a:active  {
  background-color: blue;
}
  </style>
	
</head>
<body>
	<header style="background-color: white;" id="jumbo" >
    <img style="position: relative;left:200px;width: 140px;height: 150px; padding-top: 30px" src="https://upload.wikimedia.org/wikipedia/en/9/9b/Thapar_Institute_of_Engineering_and_Technology_University_logo.png" align="left" alt="" class="rectangle responsive-img">
      <center><h1 style="padding-top: 30px"><b style="transform: translate(-50%, -50%);">  THAPAR INSTITUTE OF TECHNOLOGY</b></h1>
      <a class="fa fa-arrow-circle-left" href="http://localhost/html/homepage.html">BACK</a></center>
  </header>
	<div class="tabular">
    <table class="table" style="background-color: white;-moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000;">
  
  <form name="register"  method="POST"  onsubmit ="checkit();return false" id="formreg">
    <tr><td><div class="imgcontainer">
      <img src="http://localhost/images/img_avatar.png" style="width: 100px; height:100px;" alt="Avatar" class="avatar" >
    </div></td></tr>

    <tr><td>
      <label for="uname"><b>Set Username</b></label>
      
      <input onchange="available(this.value)" type="text" placeholder="Enter Username" id="username" name="uname" required>
      
      <label id="ajax" ></label></td></tr>
      <tr><td><label for="psw"><b>Set Password</b> <i class="fa fa-lock"></i></label>
      <div class="input-group" id="show_hide_password">
      <input class="form-control" type="password" name="psw" placeholder="Enter password" required>
      <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>
      <ol>
        <li>password should be of minimum 8 and maximum 15 characters length</li>
        <li>password should contain at least one uppercase letter and one lower case letter</li>
        <li>password must have at least 1 special character</li>
        <li>password must have at least one numeric value</li>
      </ol>
      <label id="gets1" style="color: red;visibility: hidden;">INVALID PASSWORD</label></td></tr>
       

      <tr><td><label for="name"><b>Your Name</b></label>
      <input type="text" placeholder="Enter Name" name="namer" required>
      <label id="gets2" style="color: red;visibility: hidden;">INVALID NAME</label></td></tr>
      
     <tr><td>
      <label for="branch">Select Branch</label>
      <select id="branch" name="branch" value="branch">

        <option>COE</option>
        <option>ENC</option>
        <option>ECE</option>
        <option>MECHANICAL</option>
        <option>CIVIL</option>
        <option>CHEMICAL</option>
      </select>
      <br>
    </td></tr>

      <tr><td><label for="roll"><b>Your Roll Number</b></label>
      <input type="text" placeholder="Enter Roll Number" name="roll" required>
      <label id="gets3" style="color: red;visibility: hidden;">INVALID ROLLNO</label></td></tr>
       
      <tr><td><label for="contact"><b>Your Contact Number</b></label>
      <input type="text" placeholder="Enter Contact Number" name="contact" required>
      <label id="gets4" style="color: red;visibility: hidden;">INVALID NUMBER</label></td></tr>
       
      <tr><td><label for="email"><b>Your Email Id</b></label>
      <input type="email" placeholder="Enter Email Id" name="email" required>
      <label id="gets5" style="color: red;visibility: hidden;">INVALID EMAIL</label></td></tr>
       
        
      <tr><td><button type="submit">Register</button>
      
        
        <input type="reset" name="reset" value="reset">
      </td></tr>
    </div>
  </form>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script  src="/path/to/bootstrap-show-password.js"></script>
<script type="text/javascript" src="http://localhost/js/showpass.js"></script>
<script type="text/javascript">
  
  function validation()
  {
    var number=document.forms["register"]["contact"].value;
    var email=document.forms["register"]["email"].value;
    var password=document.forms["register"]["psw"].value;
    var name=document.forms["register"]["namer"].value;
    var roll=document.forms["register"]["roll"].value;
    var sub=document.forms['register']['branch'].value;
    var regx=/^[6-9][0-9]{9}$/;
    var regx1=/@thapar.edu$/;
    var regx2=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    var regx3=/[^0-9]$/;
    var regx4=/^[1][0][1-2][0-9]{6}$/;

    if(regx.test(number)==false)
    {
      document.getElementById('gets4').style.visibility='visible';
      
      number.focus();

      return false;
    }

     if(regx1.test(email)==false)
    {
      document.getElementById('gets5').style.visibility='visible';
      alert('invalid email');
      
      email.focus();
      return false;
    }
     if(regx2.test(password)==false)
    {
      document.getElementById('gets1').style.visibility='visible';
      alert('invalid password');
      
      password.focus();
      return false;
    }
     if(regx3.test(name)==false)
    {
      document.getElementById('gets2').style.visibility='visible';
      alert('invalid name');
      
      name.focus();
      return false;
    }
   if(regx4.test(roll)==false)
    {
      document.getElementById('gets3').style.visibility='visible';
      alert('invalid roll')
      
      
      roll.focus();
      return false;
    }
  
    return true;
  


  }
  function checkit()
  {
    var checker=validation();
    if(checker==true)
    {
      document.getElementById('formreg').action="http://localhost/php/doit.php";
      document.getElementById('formreg').submit();
    }
  }
</script>
</body>
</html>