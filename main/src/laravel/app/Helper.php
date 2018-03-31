<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Helper {
    
    /**
     * Returns the name of the department given a department id and a list of departments
     * 
     * @param int $id - department id
     * @param array $depts - list of departments
     * @return string name of the department
     */
    public static function getDepartmentName(int $id, array $depts) {
        foreach ($depts as $dept) {
            if ($dept->id == $id) {
                return ($dept->name);
            }
        }

        return 'None';
    }

    /**
     * Gets the id of the requested department
     *
     * @param string $deptartment department name
     * @param array $depts list of departments
     * @return int department id
     */
    public static function getDepartmentId(string $deptartment, array $depts) {
        foreach ($depts as $dept) {
            if ($dept->name == $deptartment) {
                return ($dept->id);
            }
        }

        return 0;
    }

    /**
     * Returns the full name of a department manager given an id and list of employees
     * 
     * @param int $id - employee id
     * @param array $mana - list of employees
     * @return string name of the manager
     */
    public static function getManagerName(int $id, array $mana) {
        foreach ($mana as $man) {
            if ($man->id == $id) {
                return ($man->first_name . " " . $man->last_name);
            }
        }

        return 'None';
    }

    /**
     * Returns the full name of a location given an id and list of locations
     *
     * @param int $id - location id
     * @param array $locs - list of locations
     * @return string name of location
     */
    public static function getLocationName(int $id, array $locs) {
        foreach ($locs as $loc) {
            if ($loc->id == $id) {
                return ($loc->name);
            }
        }

        return 'None';
    }

    /**
     * Returns the full gender string
     * 
     * @param string $gender - gender abbreviation
     * @return string full gender description
     */
    public static function getFullGender(string $gender) {
        if ($gender == 'M') {
            return 'Male';
        } else if ($gender == 'F') {
            return 'Female';
        }

        return 'Other';
    }

    /**
     * Gets the department to which a project belongs
     *
     * @param int $id project id
     * @return string project's departments
     */
    public static function getProjectDepartment(int $id) {
        $dept = DB::select('SELECT * FROM responsible_for, department WHERE department_id = id AND project_id = :id;', ['id' => $id]);

        if (count($dept)) {
            return ($dept[0]->name);
        }

        return 'None';
    }

    /**
     * Checks if an employee's sin already exists in the DB
     *
     * @param int $sin social insurance number
     * @return bool true if duplicate SIN is detected, false otherwise
     */
    public static function duplicateSINChecker(int $sin) {
        $sins = DB::select('SELECT sin FROM employee WHERE sin <> :s', ['s' => $sin]);

        foreach ($sins as $s) {
            if (intval($s->sin) == $sin) {
                return true;
            }
        }

        return false;
    }
}

?>