<?php

namespace App\Models;

use App\Base\Bdd;
use DateTime;

class WeekendResults extends Bdd{

    public function create($date, string $result): bool{
        $sql = "INSERT INTO week_end_results VALUES (NULL, ? , ?)";
        return $this->executeQueryNoReturn($sql,[$date,$result]);
    }

    public function delete(int $id): bool{
        $sql = "DELETE FROM week_end_results WHERE id_results = ?";

        return $this->executeQueryNoReturn($sql,[$id]);
    }

    public function read(): array{
        $sql = "SELECT * FROM week_end_results";
       return $this->executeQuery($sql);
    }

    public function update(int $id,$date ,string $result): bool{
        $sql = "UPDATE week_end_results SET results = ?, weekend = ? where id_results = ?";

        return $this->executeQueryNoReturn($sql,[$result,$date,$id]);
    }
}