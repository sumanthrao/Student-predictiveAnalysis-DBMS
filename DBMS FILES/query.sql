\c project
\echo 1. STUDENT :
select name from student where usn='01FB15ECS301';

\echo 2. DETAILS :
select * from personal_details where usn='01FB15ECS301';

\echo 3. T1 MARKS :
select usn, sub1 , sub2 , sub3 , sub4 , sub5  from marks where test='T1' and usn='01FB15ECS301';

\echo 4. T1 TOTAL :
select usn,(sub1 +sub2+sub3+sub4+sub5) as Total from marks where usn='01FB15ECS301' and test='T1';

\echo 5. T2 MARKS :
select usn, sub1 , sub2 , sub3 , sub4 , sub5  from marks where test='T2' and usn='01FB15ECS301';

\echo 6. T2 TOTAL :
select usn,(sub1 +sub2+sub3+sub4+sub5) as Total from marks where usn='01FB15ECS301' and test='T2';

\echo 7. ESA MARKS :
select usn, sub1 , sub2 , sub3 , sub4 , sub5  from marks where test='ESA' and usn='01FB15ECS301';

\echo 8. ESA TOTAL :
select usn,(sub1 +sub2+sub3+sub4+sub5) as Total from marks where usn='01FB15ECS301' and test='ESA';

\echo 9. Maximum Scorers in Sub1 :
select usn,sub1 from marks where sub1 =(select max(sub1) from marks where test='T1');
