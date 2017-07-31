<!DOCTYPE html>
<?php
// Connecting, selecting database
$dbconn = pg_connect("host=127.0.0.1 dbname=project user=postgres password=awesum")
    or die('Could not connect: ' . pg_last_error());
	$usn = $_POST['usn'];
	
    $query="select name from student where usn='".$usn."';";       
	$res=pg_query($query);
     $row=pg_fetch_array($res,null,PGSQL_ASSOC);
     
?>
<html>
<style>
input[type=text], select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 30%;
    background-color: #0f213f;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
</style>
<title>tudent Database</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <h2>PES University</h2>
  <p>Logged in as Student</p>
</div>

<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="opentab('Profile')">Profile</button>
  <button class="w3-bar-item w3-button" onclick="opentab('Marks')">Marks</button>
  <button class="w3-bar-item w3-button" onclick="opentab('Attendance')">Attendance</button>
  <button class="w3-bar-item w3-button" onclick="opentab('Analysis')">Analysis</button>
</div>
<div id="Profile" class="w3-container tab">
  <h2>Profile</h2>
  <p>View your details here.</p><hr>
  <div>
	  <h2>
   <?php echo $row['name']; echo '<br>';
		  ?>
	  </h2><hr>
	  <?php
		$query="select * from personal_details where usn ilike '".$usn."';";       
		$res=pg_query($query);
		$row=pg_fetch_array($res,null,PGSQL_ASSOC);
		echo 'USN - ';echo $row['usn']; echo '<br>';
		echo 'Email - ';echo $row['email']; echo '<br>';
		echo 'CGPA - ';echo $row['cgpa']; echo '<br>';
		echo 'Semester - ';echo $row['semester']; echo '<br>';
		echo 'Year of Admission - ';echo $row['year']; echo '<br>';
		echo 'Phone - ';echo $row['phone']; echo '<br>';
		echo 'Address - ';echo $row['address']; echo '<br>';
		echo 'Board Marks - ';echo $row['board_marks']; echo '<br>';
	  ?>
  </div>
</div>

<div id="Marks" class="w3-container tab" style="display:none">
  <h2>Marks</h2>
  <p>Score Card.</p> 
   <div>
	   <?php
		$query="create temp table marks_view as select test,sub1,sub2,sub3,sub4,sub5 from marks where semester = 4 and usn ilike ;'".$usn."';";
		$res=pg_query($query);
		$row=pg_fetch_array($res,null,PGSQL_ASSOC);
		
	  ?>
  </div>
</div>

<div id="Attendance" class="w3-container tab" style="display:none">
   <div>
	   
	   <?php
	   $drop="drop view less3";
    $query="create view less3 as select sum(sub1)*100/max(total_classes) as sub1,sum(sub2)*100/max(total_classes) as sub2,sum(sub3)*100/max(total_classes) as sub3,sum(sub4)*100/max(total_classes) as sub4 ,sum(sub5)*100/max(total_classes) as sub5
	 from attendance natural join student where semester = 4 and usn like '".$usn."';";

   $query2="select max(name), sum(sub1) as attended , max(total_classes) as total,max( total_classes)-sum(sub1) as classes_required,sum(sub1)*100/max(total_classes) as attendance_percent 
	from attendance natural join student where usn like '".$usn."' and semester =4 ;";

   $query3="select max(name), sum(sub2) as attended , max(total_classes) as total,max( total_classes)-sum(sub2) as classes_required,sum(sub2)*100/max(total_classes) as attendance_percent 
	from attendance natural join student where usn like '".$usn."' and semester =4 ;";

    $query4="select max(name), sum(sub3) as attended , max(total_classes) as total,max( total_classes)-sum(sub3) as classes_required,sum(sub3)*100/max(total_classes) as attendance_percent 
	from attendance natural join student where usn like '".$usn."' and semester =4 ;";

    $query5="select max(name), sum(sub4) as attended , max(total_classes) as total,max( total_classes)-sum(sub4) as classes_required,sum(sub4)*100/max(total_classes) as attendance_percent 
	from attendance natural join student where usn like '".$usn."' and semester =4 ;";

    $query6="select max(name), sum(sub5) as attended , max(total_classes) as total,max( total_classes)-sum(5) as classes_required,sum(sub5)*100/max(total_classes) as attendance_percent 
	from attendance natural join student where usn like '".$usn."' and semester =4 ;";
	$dr=pg_query($drop);
   $res=pg_query($query);
  $view="select * from less3;";
  $viewres=pg_query($view);
  $result=pg_query($query2);  
  $result2= pg_query($query3);
  $result3= pg_query($query4);
  $result4= pg_query($query5);
  $result5= pg_query($query6);
	//$res=pg_query($query);
 $details=pg_fetch_array($result,null,PGSQL_ASSOC);
 $details2=pg_fetch_array($result2,null,PGSQL_ASSOC);
$details3=pg_fetch_array($result3,null,PGSQL_ASSOC);
$details4=pg_fetch_array($result4,null,PGSQL_ASSOC);
$details5=pg_fetch_array($result5,null,PGSQL_ASSOC);
$row=pg_fetch_array($viewres,null,PGSQL_ASSOC);
    
 
 ?>
 <table border="true">
  <tr><th>Subject</th><th>attendance percentage</th><th>Classes Attended</th><th>Total classes</th><th>Classes required for full attendance </th></tr>
  <tr><td>Sub1</td><td><?php echo $row['sub1']?>%</td><td><?php echo $details['attended']?></td><td><?php echo $details['total']?></td><td><?php echo $details['classes_required']?></td></tr>
  <tr><td>Sub2</td><td><?php echo $row['sub2']?>%</td><td><?php echo $details2['attended']?></td><td><?php echo $details2['total']?></td><td><?php echo $details2['classes_required']?></td></tr>
  <tr><td>Sub3</td><td><?php echo $row['sub3']?>%</td><td><?php echo $details3['attended']?></td><td><?php echo $details3['total']?></td><td><?php echo $details3['classes_required']?></td></tr></tr>
  <tr><td>Sub4</td><td><?php echo $row['sub4']?>%</td><td><?php echo $details4['attended']?></td><td><?php echo $details4['total']?></td><td><?php echo $details4['classes_required']?></td></tr></tr>
  <tr><td>Sub5</td><td><?php echo $row['sub5']?>%</td><td><?php echo $details5['attended']?></td><td><?php echo $details5['total']?></td><td><?php echo $details5['classes_required']?></td></tr></tr>
</table>


    


	   
  </div>
</div>
<div id="Analysis" class="w3-container tab">
  <h2>Analysis</h2>
  <p>Tools to analyse your performance</p>
  <div>
   <?php 

$view1="select  sub1,student.name from marks,student where test='T1' and sub1>=(select max(sub1) from marks) and marks.usn=student.usn  limit 1;"; 
$query12="select sub2,student.name from marks,student where test='T1' and sub2>=(select max(sub2) from marks) and marks.usn=student.usn   limit 1;"; 
$query13="select sub3,student.name from marks,student where test='T1' and sub3>=(select max(sub3) from marks) and marks.usn=student.usn limit 1;";
$query14="select sub4,student.name from marks,student where test='T1' and sub4>=(select max(sub4) from marks) and marks.usn=student.usn   limit 1;";
$query15="select sub5,student.name from marks,student where test='T1' and sub5>=(select max(sub5) from marks) and marks.usn=student.usn   limit 1;";


$query16="select student.name,(sub1 +sub2+sub3+sub4+sub5) as Total from marks,student where  test='T1' and student.usn=marks.usn;";
$query17="select student.name,(sub1 +sub2+sub3+sub4+sub5) as Total from marks,student where test='T2' and student.usn=marks.usn;";

$query18="select student.name,(sub1 +sub2+sub3+sub4+sub5)/3 as Total from marks,student where marks.usn='".$usn."' and test='ESA' and student.usn=marks.usn;";
$query19="select floor(100-(t1+t2))as marks_required_for_S from neww8,neww9 ;";
//$q1="create view neww8 as select .375*(sub1) as t1  from marks where usn like '".$usn."' and test='T1';";
//$q2=" create view neww9 as select .375*(sub1) as t2  from marks where usn like '".$usn."' and test='T2';";

 $viewres0=pg_query($view1);
  $result20=pg_query($query12);  
  $result12= pg_query($query13);
  $result13= pg_query($query14);
  $result14= pg_query($query15);

  $result15= pg_query($query16);
  $result17= pg_query($query17);
  $result18= pg_query($query18);
 
  //$result10= pg_query($q1);
  //$result11= pg_query($q2);
   $result19= pg_query($query19);

$row2=pg_fetch_array($viewres0,null,PGSQL_ASSOC);
$details17=pg_fetch_array($result19,null,PGSQL_ASSOC);
$details12=pg_fetch_array($result12,null,PGSQL_ASSOC);
$details13=pg_fetch_array($result13,null,PGSQL_ASSOC);
$details14=pg_fetch_array($result14,null,PGSQL_ASSOC);

 
$details15=pg_fetch_array($result15,null,PGSQL_ASSOC);

$details18=pg_fetch_array($result17,null,PGSQL_ASSOC);

$details19=pg_fetch_array($result18,null,PGSQL_ASSOC);
$details20=pg_fetch_array($result20,null,PGSQL_ASSOC);

    
 
 ?>
<h2>Subject-wise Top scorers</h2>
 <table border="true">
<tr><th>Sub1</th><td><?php echo $row2['name']?></td><td><?php echo $row2['sub1'] ?></td></tr>
<tr><th>Sub2</th><td><?php echo $details20['name']?></td><td><?php echo $details20['sub2'] ?></td></tr>
<tr><th>Sub3</th><td><?php echo $details12['name']?></td><td><?php echo $details12['sub3'] ?></td></tr>
<tr><th>Sub4</th><td><?php echo $details13['name']?></td><td><?php echo $details13['sub4'] ?></td></tr>
<tr><th>Sub5</th><td><?php echo $details14['name']?></td><td><?php echo $details14['sub5'] ?></td></tr>
</table>

<h2>Highest Total Marks</h2>
 <table border="true">
<tr><th>T-1</th><td><?php echo $details15['name']?></td><td><?php echo $details15['total'] ?></td></tr>
<tr><th>T-2</th><td><?php echo $details18['name']?></td><td><?php echo $details18['total'] ?></td></tr>
<tr><th>ESA</th><td><?php echo $details19['name']?></td><td><?php echo $details19['total'] ?></td></tr>

</table>
<h2>Predictive_analysis for S - grade based on T1 and T2 marks</h2>
<table border="true">
    <tr><th>Subject</th><th>Predicted marks to be scored in ESA to get an S- grade</th></tr>
    <tr><th>Sub1</th><td><?php echo $details17['marks_required_for_s']?></td></tr>
    </table>
  </div>
<script>
function opentab(tabName) {
    var i;
    var x = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(tabName).style.display = "block";  
}
</script>
<script>
	opentab('Profile');
</script>
</body>
</html>
