Employee SIN is not a primary key as it is an important attribute that needs to stay hidden<br>
Gender specified as it's possibly a legality['M','F','O']<br>
Departments can't exist without a manager<br>
Locations on a new table since departments can be in a list of locations and projects can be in a list of locations.<br>
There's always a main department who's making the projects. Many to one relation.<br>
Theres many locations that can fit into one department. Many to one relation<br>
A project can only be in so many locations<br>
A supervisor and subordinates is a role of an employee.<br>
Many subordinates to one supervisor.<br>
Dependancy information in a seperate table for ease of exporting to insurers<br>
<hr/>
<br>


___Department___ <br>
ID: PK int<br>
NAME: MEDIMUMTEXT UNIQUE;<br>
MANAGER:INT NOT NULL[BLUE]<br>
<br>
___LOCATIONS___<br>
ID:PK Loc_id<br>
NAME[ADDRES]: Mediumtext unique<br>
<br>
___Project___<br>
ID: PK INT<br>
NAME:MEDIUMTEXT UNIQUE    ----- The Building it's in<br>
ADDRESS: MEIDUMTEXT       ----- Where it is in the world      [BLUE]<br>
<br>
___EMPLOYEE___<br>
ID: PK ID<br>
NAME: MEDIUM TEXT<br>
SIN: INT UNIQUE<br>
BIRTHDATE:DATE<br>
ADDRESS:MEDIUMTEXT<br>
PHONE:CHAR(12)<br>
SALARY:INT<br>
GENDER:CHAR(1)            'M' 'F' 'O'<br>
DEPT_ID: INT      [BLUE]<br>
<br>
___Dependents___<br>
ID: PK ID<br>
NAME: MEDIUM TEXT<br>
DIN: INT UNIQUE<br>
BIRTHDATE:DATE<br>
GENDER: CHAR(1)<br>
Employee_ID: int     [BLUE]<br>

Relation tables of <br>
Locted in | Responsible projucts . Responsible for . Works on  . Supervisor Role . <br>
L_ID D_ID | <br>
Many one  | <br>
