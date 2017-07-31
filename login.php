<?php
// Connecting, selecting database
$dbconn = pg_connect("host=127.0.0.1 dbname=project user=postgres password=awesum")
    or die('Could not connect: ' . pg_last_error());
    $usn="314";
    $query="create view less3 as select max(name) as name,sum(sub1)*100/max(total_classes) as sub1,sum(sub2)*100/max(total_classes) as sub2,sum(sub3)*100/max(total_classes) as sub3,sum(sub4)*100/max(total_classes) as sub4 ,sum(sub5)*100/max(total_classes) as sub5
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

  $view="select * from less2;";
  $viewres=pg_query($view);
  $result=pg_query($query2);  
  $result2= pg_query($query3);
  $result3= pg_query($query4);
  $result4= pg_query($query5);
  $result5= pg_query($query6);
//	$res=pg_query($query);
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


    

