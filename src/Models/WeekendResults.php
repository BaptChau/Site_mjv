<?php

namespace App\Models;

use App\Base\Bdd;
use DateTime;

class WeekendResults extends Bdd{

    public function create($date, string $result){
        $sql = "INSERT INTO week_end_results VALUES (NULL, ? , ?)";
        $this->executeQueryNoReturn($sql,[$date,$result]);
    }

    public function delete(int $id){
        $sql = "DELETE FROM week_end_results WHERE id_results = ?";

        $this->executeQuery($sql,[$id]);
    }

}