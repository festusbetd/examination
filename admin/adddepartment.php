<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Upturn Smart Online Exam System by Mayuri <br> [Master in Computer Science]
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();
if($_SESSION["userid"]==true)
{

include("header.php"); ?>

	<ol class="breadcrumb">
                <center><li class="breadcrumb-item"><h4><a href="">Add Department</a></h4></li></center>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form action="adddepartment.php" method="post">
		    <div class="col-md-6 form-group1">
              <label class="control-label">Department</label>
              <input type="text" placeholder="Department" name="deptnm" required="">
            </div>
              <div class="col-md-12 form-group2 group-mail">
              <!--<label class="control-label">Select Department </label>
            <select name="deptnm">
            	<option value="Mechanical">Mechanical</option>
            	<option value="Civil">Civil</option>
            	<option value="Chemical">Chemical</option>
            	<option value="Computer">Computer</option>
            	<option value="IT">IT</option>
				<option value="E & TC">E & TC</option>
            </select>-->
            </div>
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <button type="reset" class="btn btn-default" value="reset">Reset</button>
            </div>
		
          <div class="clearfix"> </div>
		  
		  
        </form>
    
 	<!---->
 </div>

</div>
 	<!--//grid-->
	<?php
	   include("connect.php");
	   if(isset($_POST['submit']))
       {		
           $name=$_POST['deptnm'];
		  
	       $query="insert into departmenttbl(deptid,deptname)values('','$name')";
	 
           $result= mysql_query($query);
	 
	       if($result)
		      echo "record inserted successfully";
	       else
		   mysql_error();
	       mysql_close($con);
}

	
	?>
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	</div>
</body>
</html>