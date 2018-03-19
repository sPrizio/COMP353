Employee SIN is not a primary key as it is an important attribute that needs to stay hidden
Gender specified as it's legality['M','F','O']
Departments can't exist without a manager
Locations on a new table since departments can be in a list of locations and projects can be in a list of locations.
There's always a main department who's making the projects. Many to one relation.
Theres many locations that can fit into one department. Many to one relation
A project can only be in so many locations
A supervisor and subordinates is a role of an employee.
Many subordinates to one supervisor.
Dependancy information in a seperate table for ease of exporting to insurers


___Department___
ID: PK int
NAME: MEDIMUMTEXT UNIQUE;
MANAGER:INT NOT NULL[BLUE]

___LOCATIONS___
ID:PK Loc_id
NAME[ADDRES]: Mediumtext unique

___Project___
ID: PK INT
NAME:MEDIUMTEXT UNIQUE    ----- The Building it's in
ADDRESS: MEIDUMTEXT       ----- Where it is in the world      [BLUE]

___EMPLOYEE___
ID: PK ID
NAME: MEDIUM TEXT
SIN: INT UNIQUE
BIRTHDATE:DATE
ADDRESS:MEDIUMTEXT
PHONE:CHAR(12)
SALARY:INT
GENDER:CHAR(1)            'M' 'F' 'O'
DEPT_ID: INT      [BLUE]

___Dependents___
ID: PK ID
NAME: MEDIUM TEXT
DIN: INT UNIQUE
BIRTHDATE:DATE
GENDER: CHAR(1)
Employee_ID: int     [BLUE]

Relation tables of 
Locted in | Responsible projucts . Responsible for . Works on  . Supervisor Role . 
L_ID D_ID | 
Many one  | 
