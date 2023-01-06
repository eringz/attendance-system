<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model
    {
        function get_attendance_of_the_day($subject_code)
        {
            $query = "SELECT users.id, first_name, last_name, 
            roles.id AS role_id, role, 
            subject_code, subject_name, subject_sched,
            seat.id AS seat_no  
            FROM attendances
            INNER JOIN users ON users.id = attendances.user_id
            INNER JOIN subjects ON subjects.id = attendances.subject_id
            INNER JOIN seats ON seats.id = attendances.seat_id
            WHERE subject_code = ?";
            $values = array($subject_code);
            return $this->db->query($query, $values)->result_array();
        }
        
    }