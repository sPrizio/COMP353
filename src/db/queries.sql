/* QUERY 1 */
SELECT students.sid, students.name 
FROM students 
WHERE students.sid NOT IN (SELECT members.sid FROM members);

/* QUERY 2 */
SELECT members.sid, students.name, members.tid 
FROM members, students 
WHERE students.sid = members.sid;

/* QUERY 3 */
SELECT students.sid, students.name 
FROM students
WHERE students.sid IN (SELECT members.sid FROM members) AND students.sid NOT IN (SELECT demos.sid FROM demos);

/* QUERY 4 */
SELECT teams.tid 
FROM teams 
WHERE teams.no_of_members < 4;

/* QUERY 5 */
SELECT students.name 
FROM students, members 
WHERE students.sid = members.sid AND members.tid = ??;

/* QUERY 6 */
SELECT DISTINCT demos.tid 
FROM demos 
WHERE demos.date = 'yyyy-mm-dd';

/* QUERY 7 */
SELECT teams.tid, 4 - teams.no_of_members AS 'Capacity to Increase' 
FROM teams 
WHERE teams.no_of_members < 4;

/* QUERY 8 */
/* Student ID */
SELECT members.tid 
FROM members 
WHERE members.sid = ??;

/* Student Name */
SELECT members.tid 
FROM members, students 
WHERE students.sid = members.sid AND students.name = 'Student name';

/* QUERY 9 */
/* Student ID */
SELECT students.sid, students.name 
FROM students, members 
WHERE students.sid = members.sid AND members.tid = (SELECT members.tid FROM members WHERE members.sid = ??) AND students.sid <> ??;

/* Student Name */
SELECT students.sid, students.name 
FROM students, members 
WHERE students.sid = members.sid AND members.tid = (SELECT members.tid FROM students, members WHERE students.sid = members.sid AND students.name = 'Student Name') AND students.name <> 'Student Name';