<?php $dbconn = pg_connect("host=127.0.0.1 dbname=project user=postgres password=awesum")
    or die('Could not connect: ' . pg_last_error());
    
    $admin= $_POST['admin'];


    if($admin=='admin1'){
            echo "<h2>You're now logged in as Data Admin</h2>" ;
           

 
    if($_POST['insert']!=NULL){
                $query1=$_POST['insert'];
                $res1=pg_query($query1);
                if($res1){?>
                <script>
                    alert("Data inserted Successfully !!");
                </script>
                <?php
                }
            }
             if($_POST['update']!=NULL){
                $query2=$_POST['update'];
                $res2=pg_query($query2);
                if($res2){?>
                   <script> alert("Data updated Successfully !!");</script>
                <?php}
             }
            if($_POST['delete']!=NULL){
                $query=$_POST['delete'];
                $res=pg_query($query);
                if($res){?>

                    <script>alert("Data deleted Successfully !!");</script>
                <?php }

            }
    }
            else{
   echo 'authentication failed';
   }
            ?>

            <form action='admin.php' method='post'>
              <h2>INSERT VALUES</h2><hr><br>
              Relation Student :<input style="width:60% ;height:30px" type= 'text' name='insert' placeholder='insert into student (usn,name,dept_name ,year ,age ,semester) values '>
             <br> Relation marks :<input type= 'text' style="width:60% ;height:30px"  name='insert_marks' placeholder='insert into marks (usn,sub1,sub2,sub3,sub4,sub5,test,semester) values '>
              <h2>UPDATE VALUES</h2><br>
              Relation Student :<input type='text' style="width:60% ;height:30px"  name='update' placeholder='update student set column '><hr><br>
              <h2>DELETE VALUES</h2><br>
              Relation Student :<input type='text' style="width:60% ;height:30px"  name='delete' placeholder='delete from student'>
            <input type='text' name='admin' value='admin1' style="display:none"><br>
            <input type='submit'></input>
            </form>


