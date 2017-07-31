<?php 

$view="select sub1,student.name from marks,student where test='T1' and sub1>=(select max(sub1) from marks) and marks.'".$usn."'=student.'".$usn."'  limit 1;"; 
$query2="select sub2,student.name from marks,student where test='T1' and sub2>=(select max(sub2) from marks) and marks.'".$usn."'=student.'".$usn."'  limit 1;"; 
$query3="select sub3,student.name from marks,student where test='T1' and sub3>=(select max(sub3) from marks) and marks.'".$usn."'=student.'".$usn."'  limit 1;";
$query4="select sub4,student.name from marks,student where test='T1' and sub4>=(select max(sub4) from marks) and marks.'".$usn."'=student.'".$usn."'  limit 1;";
$query5="select sub5,student.name from marks,student where test='T1' and sub5>=(select max(sub5) from marks) and marks.'".$usn."'=student.'".$usn."'  limit 1;";
$query6="select student.name,(sub1 +sub2+sub3+sub4+sub5) as Total from marks,student where marks.usn='".$usn."' and test='T1' and student.usn=marks.usn;";
$query7="select student.name,(sub1 +sub2+sub3+sub4+sub5) as Total from marks,student where marks.usn='".$usn."' and test='T2' and student.usn=marks.usn;";

$query8="select student.name,(sub1 +sub2+sub3+sub4+sub5) as Total from marks,student where marks.usn='".$usn."' and test='ESA' and student.usn=marks.usn;";
$query9="select floor(100-(t1+t2)) marks_required_for_S from neww,neww2 ;";
$q1="create view neww as select .375*(sub1) as t1  from marks where '".$usn."' and test='T1';";
$q2=" create view neww2 as select .375*(sub1) as t2  from marks where '".$usn."' and test='T2';";

 $viewres=pg_query($view);
  $result=pg_query($query2);  
  $result2= pg_query($query3);
  $result3= pg_query($query4);
  $result4= pg_query($query5);
  $result5= pg_query($query6);
  $result7= pg_query($query7);
  $result8= pg_query($query8);
 
  $result10= pg_query($q1);
  $result11= pg_query($q2);
   $result9= pg_query($query9);


$details7=pg_fetch_array($result7,null,PGSQL_ASSOC);
 $details=pg_fetch_array($result,null,PGSQL_ASSOC);
 $details2=pg_fetch_array($result2,null,PGSQL_ASSOC);
$details3=pg_fetch_array($result3,null,PGSQL_ASSOC);
$details4=pg_fetch_array($result4,null,PGSQL_ASSOC);
$details5=pg_fetch_array($result5,null,PGSQL_ASSOC);
$details8=pg_fetch_array($result8,null,PGSQL_ASSOC);
$row=pg_fetch_array($viewres,null,PGSQL_ASSOC);
$details9=pg_fetch_array($result9,null,PGSQL_ASSOC);

    
 
 ?>
<h2>Subject-wise Top scorers</h2>
 <table border="true">
<tr><th>Sub1</th><td><?php echo $row['name']?></td><td><?php echo $row['sub1'] ?></td></tr>
<tr><th>Sub2</th><td><?php echo $details['name']?></td><td><?php echo $details['sub2'] ?></td></tr>
<tr><th>Sub3</th><td><?php echo $details2['name']?></td><td><?php echo $details2['sub2'] ?></td></tr>
<tr><th>Sub4</th><td><?php echo $details3['name']?></td><td><?php echo $details3['sub2'] ?></td></tr>
<tr><th>Sub5</th><td><?php echo $details4['name']?></td><td><?php echo $details4['sub2'] ?></td></tr>
</table>

<h2>Highest Total Marks</h2>
 <table border="true">
<tr><th>T-1</th><td><?php echo $details5['name']?></td><td><?php echo $details5['total'] ?></td></tr>
<tr><th>T-2</th><td><?php echo $details7['name']?></td><td><?php echo $details7['total'] ?></td></tr>
<tr><th>ESA</th><td><?php echo $details8['name']?></td><td><?php echo $details8['total'] ?></td></tr>

</table>
<h2>Predictive_analysis for S - grade based on T1 and T2 marks</h2>
<table>
    <tr><th>Subject</th><th>Predicted marks to be scored in ESA to get an S- grade</th></tr>
    <tr><th>Sub1</th><td>details9['marks_required_for_S']</td></tr>
    </table>


