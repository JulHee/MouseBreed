<?php
namespace model;

class breedModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getGeneralData($userId) {
        $stmt =     "SELECT id, name, time_of_creation, target ".
                    "FROM `breed` ".
                    "WHERE user_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $userId);

        if($stmt->execute() && $breeds = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {

            for($i = 0; $i < count($breeds); ++$i) {
                $breeds[$i]['numberOfMice'] = $this->getNumberOfMice( $breeds[$i]['id']);
                $breeds[$i]['numberOfCages'] = $this->getNumberOfCages( $breeds[$i]['id']);
            }

            return $breeds;
        } else {
            return Array();
        }
    }

    public function getData($breed_id) {
        $stmt =     "SELECT * ".
                    "FROM `breed` ".
                    "WHERE id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breed_id);

        if($stmt->execute() &&  $breed = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $breed['cages'] = $this->getCages($breed_id);

            return $breed;
        } else {
            return Array();
        }
    }

    public function newBreed($user_id, $target, $name) {
        $stmt =     "INSERT INTO `breed` ".
                    "(user_id, target, name) ".
                    "VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($stmt);

        if($stmt->execute(array($user_id, $target, $name))) {
            return $this->db->lastInsertId('id');
        } else {
            return -1;
        }
    }

    public function newCage($max_number_of_mice, $breed_id) {
        $stmt =     "INSERT INTO `cage` ".
                    "(max_number_of_mice, breed_id) ".
                    "VALUES (?, ?)";
        $stmt = $this->db->prepare($stmt);

        if($stmt->execute(array($max_number_of_mice, $breed_id))) {
            return $this->db->lastInsertId('id');
        } else {
            return -1;
        }
    }

    public function newMouse($cage_id, $breed_id, $user_id, $gender, $genotyp, $weight, $mother_id, $father_id, $age, $img_name) {
        $stmt = "SELECT name ".
                "FROM `".(($gender == 0) ? "nameboys" : "namegirls")."` ".
                "ORDER BY RAND() ".
                "LIMIT 1";
        $stmt = $this->db->prepare($stmt);
        if($stmt->execute() && $row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $name = $row['name'];
        } else {
            return array("id" => -1);
        }

        $stmt = "INSERT INTO `mouse` ".
                "(cage_id, breed_id, user_id, gender, name, genotyp, weight, mother_id, father_id, age, img_name) ".
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($stmt);

        if($stmt->execute(array($cage_id, $breed_id, $user_id, $gender, $name, $genotyp, $weight, $mother_id, $father_id, $age, $img_name))) {
            return array("id" => $this->db->lastInsertId('id'), "name" => $name);
        } else {
            return array("id" => -1);
        }
    }

    public function getMiceInCage($cageId) {
        $stmt =     "SELECT * ".
                    "FROM `mouse` ".
                    "WHERE cage_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $cageId);

        if($stmt->execute() && $mice = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            $miceReturn = Array();

            foreach($mice as $mouse) {
                $miceReturn[$mouse['id']] = $mouse;
            }

            return $miceReturn;
        } else {
            return Array();
        }
    }

    public function getMice($breedId) {
        $stmt =     "SELECT * ".
                    "FROM `mouse` ".
                    "WHERE breed_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        if($stmt->execute() && $mice = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            $miceReturn = Array();

            foreach($mice as $mouse) {
                $miceReturn[$mouse['id']] = $mouse;
            }

            return $miceReturn;
        } else {
            return Array();
        }
    }


    public function getCages($breedId) {
        $stmt =     "SELECT * ".
                    "FROM `cage` ".
                    "WHERE breed_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        if($stmt->execute() && $cages = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            $cagesReturn = Array();

            foreach($cages as $cage) {
                $cage['mice'] = $this->getMiceInCage($cage['id']);
                $cagesReturn[$cage['id']] = $cage;
            }

            return $cagesReturn;
        } else {
            return Array();
        }
    }

    public function getNumberOfMice($breedId) {
        $stmt =     "SELECT COUNT(*) ".
                    "FROM `mouse` ".
                    "WHERE breed_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        if($stmt->execute() &&  $num = $stmt->fetch(\PDO::FETCH_NUM)) {
            return $num[0];
        } else {
            return -1;
        }
    }

    public function getNumberOfCages($breedId) {
        $stmt =     "SELECT COUNT(*) ".
                    "FROM `cage` ".
                    "WHERE breed_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        if($stmt->execute() &&  $num = $stmt->fetch(\PDO::FETCH_NUM)) {
            return $num[0];
        } else {
            return -1;
        }
    }

    public function saveBreed($breed) {

        foreach($breed['cages'] as $cage) {
            foreach($cage['mice'] as $mouse) {
                $stmt =     "UPDATE mouse ".
                            "SET cage_id = ?, weight = ?, age = ? ".
                            "WHERE id = ?";
                $stmt = $this->db->prepare($stmt);

                if(!$stmt->execute(array($mouse['cage_id'], $mouse['weight'], $mouse['age'], $mouse['id']))) {
                    return false;
                }
            }
        }

        return true;
    }

}

?>