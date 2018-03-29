<?php

namespace App;

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
}

?>