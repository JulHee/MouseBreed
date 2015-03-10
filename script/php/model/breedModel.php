<?php
namespace model;

class breedModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getGeneralData($userId) {
        $stmt =     "SELECT id, name ".
                    "FROM `breed` ".
                    "WHERE user_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $userId);

        if($stmt->execute() && $breeds = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
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

            $cages = $this->getCages($breed_id);

            for($i = 0; $i < count($cages); ++$i) {
                $cages[$i]['mice'] = $this->getMiceInCage($cages[$i]['id']);
            }

            $breed['cages'] = $cages;

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

    public function getCages($breedId) {
        $stmt =     "SELECT * ".
                    "FROM `cage` ".
                    "WHERE breed_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        if($stmt->execute() && $cages = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            return $cages;
        } else {
            return Array();
        }
    }

}

?>