<?php

namespace App\Helpers;

class Helper {
    
    /**
     * Returns the name of the department given a department id and a list of departments
     * 
     * @param $id - department id
     * @param $depts - list of departments
     * @return name of the department
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
     * Returns the full name of a department manager given an id and list of employees
     * 
     * @param $id - employee id
     * @param $depts - list of employees
     * @return name of the manager
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
     * Returns the full gender string
     * 
     * @param $gender - gender abbreviation
     * @return full gender description
     */
    public static function getFullGender(string $gender) {
        if ($gender == 'M') {
            return 'Male';
        } else if ($gender == 'F') {
            return 'Female';
        }

        return 'Other';
    }
}

?>