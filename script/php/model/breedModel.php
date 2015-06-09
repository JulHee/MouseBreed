<?php
namespace model;

class breedModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getGeneralData($userId) {
        $stmt =     "SELECT id, name, time_of_creation, scenario ".
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

    public function newBreed($user_id, $scenario, $name) {
        $stmt =     "INSERT INTO `breed` ".
                    "(user_id, scenario, name) ".
                    "VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($stmt);

        if(!$stmt->execute(array($user_id, $scenario, $name))) {
            return Array('id' => -1);
        } else {
            $newBreedId = $this->db->lastInsertId('id');

            if ($scenario == "easy_1") {

                // Käfige erzeugen
                $newCageId_1 = $this->newCage(20, $newBreedId);
                $newCageId_2 = $this->newCage(20, $newBreedId);
                if ($newCageId_1 < 0 || $newCageId_2 < 0) {
                    $this->deleteBreed($newBreedId);
                    return Array('id' => -1, 'msg' => "K?fige konnten nicht erstellt werden.");
                }

                // Mäuse erzeugen
                // weiblich
                $newMouseId_f_1 = $this->newMouse($newCageId_1, $newBreedId, $user_id, 1, "AA", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_f_2 = $this->newMouse($newCageId_1, $newBreedId, $user_id, 1, "AA", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_f_3 = $this->newMouse($newCageId_1, $newBreedId, $user_id, 1, "AA", 200, NULL, NULL, 21, "-")['id'];
                if ($newMouseId_f_1 < 0 || $newMouseId_f_2 < 0 || $newMouseId_f_3 < 0) {
                    $this->deleteBreed($newBreedId);
                    return Array('id' => -1, 'msg' => "M?use konnten nicht erstellt werden.");
                }

                // männlich
                $newMouseId_m_1 = $this->newMouse($newCageId_2, $newBreedId, $user_id, 0, "BB", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_m_2 = $this->newMouse($newCageId_2, $newBreedId, $user_id, 0, "BB", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_m_3 = $this->newMouse($newCageId_2, $newBreedId, $user_id, 0, "BB", 200, NULL, NULL, 21, "-")['id'];
                if ($newMouseId_m_1 < 0 || $newMouseId_m_2 < 0 || $newMouseId_m_3 < 0) {
                    $this->deleteBreed($newBreedId);
                    return Array('id' => -1, 'msg' => "M?use konnten nicht erstellt werden.");
                }

            } elseif ($scenario == "easy_2") {

                // Käfige erzeugen
                $newCageId_1 = $this->newCage(20, $newBreedId);
                $newCageId_2 = $this->newCage(20, $newBreedId);
                if ($newCageId_1 < 0 || $newCageId_2 < 0) {
                    $this->deleteBreed($newBreedId);
                    return Array('id' => -1, 'msg' => "K?fige konnten nicht erstellt werden.");
                }

                // Mäuse erzeugen
                // weiblich
                $newMouseId_f_1 = $this->newMouse($newCageId_1, $newBreedId, $user_id, 1, "AB", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_f_2 = $this->newMouse($newCageId_1, $newBreedId, $user_id, 1, "AB", 200, NULL, NULL, 21, "-")['id'];
                if ($newMouseId_f_1 < 0 || $newMouseId_f_2 < 0) {
                    $this->deleteBreed($newBreedId);
                    return Array('id' => -1, 'msg' => "M?use konnten nicht erstellt werden.");
                }

                // männlich
                $newMouseId_m_1 = $this->newMouse($newCageId_2, $newBreedId, $user_id, 0, "AA", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_m_2 = $this->newMouse($newCageId_2, $newBreedId, $user_id, 0, "AA", 200, NULL, NULL, 21, "-")['id'];
                $newMouseId_m_3 = $this->newMouse($newCageId_2, $newBreedId, $user_id, 0, "AA", 200, NULL, NULL, 21, "-")['id'];
                if ($newMouseId_m_1 < 0 || $newMouseId_m_2 < 0 || $newMouseId_m_3 < 0) {
                    $this->deleteBreed($newBreedId);
                    return Array('id' => -1, 'msg' => "M?use konnten nicht erstellt werden.");
                }

            } else {
                $this->deleteBreed($newBreedId);
                return Array('id' => -1, 'msg' => "Szenario nicht gefunden.");
            }

            return Array('id' => $newBreedId);
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

    public function newMouse($cage_id, $breed_id, $user_id, $gender, $genotyp, $weight, $mating_id, $mother_id, $father_id, $age, $img_name) {
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
                "(cage_id, breed_id, user_id, gender, name, genotyp, weight, mating_id, mother_id, father_id, age, img_name) ".
                "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($stmt);

        if($stmt->execute(array($cage_id, $breed_id, $user_id, $gender, $name, $genotyp, $weight, $mating_id, $mother_id, $father_id, $age, $img_name))) {
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

    public function getMouse($mouseId) {
        $stmt =     "SELECT * ".
                    "FROM `mouse` ".
                    "WHERE id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $mouseId);

        if($stmt->execute() && $mouse = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            return $mouse;
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

    public function deleteBreed($id) {
        $stmt = "DELETE FROM breed ".
                "WHERE id = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $id);

        return $stmt->execute();
    }

    public function newMating($breed_id, $mother_id, $father_id) {
        $stmt =     "INSERT INTO `mating` ".
                    "(breed_id, mother_id, father_id) ".
                    "VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($stmt);

        if($stmt->execute(array($breed_id, $mother_id, $father_id))) {
            return $this->db->lastInsertId('id');
        } else {
            return -1;
        }
    }

    public function incrementMatings($breedId) {
        $stmt = "UPDATE mating ".
                "SET age = age + 1 ".
                "WHERE breed_id = ? AND age < 22";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        return $stmt->execute();
    }

    public function getBroods($breedId) {
        $stmt =     "SELECT * ".
                    "FROM `mating` ".
                    "WHERE breed_id = ? AND age = 21";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $breedId);

        if($stmt->execute() &&  $mating = $stmt->fetchAll(\PDO::FETCH_ASSOC)) {
            $broods = Array();

            $stmt =     "SELECT * ".
                        "FROM `mouse` ".
                        "WHERE mating_id = ?";
            $stmt = $this->db->prepare($stmt);

            foreach($mating as $m) {
                if(!$stmt->execute(Array($m['id']))) return Array();
                $mice = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                $brood = Array();
                $brood['id'] = $m['id'];
                $brood['mother'] = $this->getMouse($m['mother_id']);
                $brood['father'] = $this->getMouse($m['father_id']);
                $brood['mice'] = $mice;

                $broods[$brood['id']] = $brood;
            }

            return $broods;
        } else {
            return Array();
        }
    }

}

?>