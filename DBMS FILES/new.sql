\c project
varchar x='01FB15ECS301'
select * from personal_details where usn=x;
select usn,( sub1 + sub2 + sub3 + sub4 + sub5) as total from marks where test='T1' and usn=x;
select usn, sub1 , sub2 , sub3 , sub4 , sub5  from marks where test='T1' and usn=x;
select name from student where usn=x;

