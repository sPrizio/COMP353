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
}

?>