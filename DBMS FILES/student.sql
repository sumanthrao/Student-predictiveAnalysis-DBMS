\c project
create temp table marks_view as select test,sub1,sub2,sub3,sub4,sub5 from marks where semester = 4 and usn ilike '01fb15ecs001';
\echo Marks of the student:
table marks_view;
update marks_view 
	set
		sub1 = 0.375*sub1,
		sub2 = 0.375*sub2,
		sub3 = 0.375*sub3,
		sub4 = 0.375*sub4,
		sub5 = 0.375*sub5
	where
		test like 'T1' or test like 'T2';
update marks_view
	set
		sub1 = 7*sub1,
		sub2 = 7*sub2,
		sub3 = 7*sub3,
		sub4 = 7*sub4,
		sub5 = 7*sub5
	where
		test like 'ESA';
\echo Grade Card with Percentage scored in each Subject:
create temp view grade_card(sub1,sub2,sub3,sub4,sub5) as select SUM(sub1),SUM(sub2),SUM(sub3),SUM(sub4),SUM(sub5) from marks_view;
table grade_card;
\echo Final CGP:
select (sub1/10 + sub2/10 + sub3/10 + sub4/10 + sub5/10)/5 as cgp from grade_card;

