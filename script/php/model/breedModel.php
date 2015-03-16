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

            $breed['mice'] = $this->getMice($breed_id);
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

    public function getMiceInCage($cageId) {
        $stmt =     "SELECT * ".
                    "FROM `mouse` ".
                    "WHERE cage_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $cageId);

        if($stmt->execute() && $mice = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            return $mice;
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
            return $mice;
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

}

?>