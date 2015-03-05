<?php
namespace model;

class breedModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getGeneralData($user_id) {
        $stmt =     "SELECT id, name ".
                    "FROM `breed` ".
                    "WHERE user_id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $user_id);

        if($stmt->execute() && $breeds = $stmt->fetchAll()) {
            return $breeds;
        } else {
            return false;
        }
    }

    public function getData($breed_id) {
        $stmt =     "SELECT * ".
                    "FROM `breed` ".
                    "WHERE id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breed_id);

        if($stmt->execute() &&  $breed = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return $breed;
        } else {
            return Array();
        }
    }

}

?>