<?php
session_start();
include("connect.php");
if($_SESSION["studentid"]==true)
{

error_reporting(0);
$total_questions = $_POST['tq'];
$starting_mark = 1;
$mytotal_marks = 0;
$exam_id = $_POST['eid'];
$record = $_POST['ri'];
//echo "<br>HELLO 2";
//echo $record;
echo "<pre>";

while ($starting_mark <= $total_questions) {
	//echo "<br>".strtoupper(base64_decode($_POST['ran'.$starting_mark.'']))."<br>";
	//echo strtoupper($_POST['an'.$starting_mark.'']);

//echo (strtoupper(base64_decode($_POST['ran'.$starting_mark.'']))).'=='.(strtoupper($_POST['an'.$starting_mark.'']));
	//echo strlen(strtoupper(base64_decode($_POST['ran'.$starting_mark.'']))).'=='.strlen(strtoupper($_POST['an'.$starting_mark.'']));
	
	if(preg_replace('/\s+/', '', (base64_decode($_POST['ran'.$starting_mark.''])
)) == preg_replace('/\s+/', '', ($_POST['an'.$starting_mark.''])
)){
  // if(($_POST['ran'.$starting_mark.'']) == base64_encode($_POST['an'.$starting_mark.''])){

	//if('INTERFACE'=='INTERFACE'){
	echo "<br>corect";
$mytotal_marks = $mytotal_marks + 1;

}else{
	
}
$starting_mark++;

}


//echo $mytotal_marks;exit;
$percent_score = ($mytotal_marks / $total_questions) * 100;
$percent_score = floor($percent_score);
$passmark = $_POST['pm'];

if ($percent_score >= $passmark) {
$status = "PASS";

}else{
$status = "FAIL";	
}

$_SESSION['record_id'] = $record;
//echo $record;exit;

$sql = "UPDATE assesmenttbl SET score='$percent_score', status='$status' WHERE recordid='$record'";
//echo $sql;exit;
if (mysql_query($sql) === TRUE) {

   header("location:./assessment_info.php");
} else {
   header("location:./assessment_info.php");
}

mysql_close($con);
?>
<?php }
else
	header('location:login.php');
?>

