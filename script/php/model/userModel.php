<?php
namespace model;

class userModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function checkLogin($user, $password) {
        $stmt =     "SELECT password ".
                    "FROM `user` ".
                    "WHERE name = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bind_param('s', $user);
        $stmt->execute();

        $result = $stmt->get_result();
        if($row = $result->fetch_row()){
            return crypt($password, $row[0]) == $row[0];
        } else {
            return false;
        }
    }

    public function getUserData($user) {
        $stmt =     "SELECT id ".
                    "FROM `user` ".
                    "WHERE name = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bind_param('s', $user);
        $stmt->execute();

        $result = $stmt->get_result();
        if($row = $result->fetch_row()){
            return $row;
        } else {
            return false;
        }

    }

}
?>