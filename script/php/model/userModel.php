<?php
namespace model;

class userModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function checkLogin($username, $password) {
        $stmt =     "SELECT password ".
                    "FROM `user` ".
                    "WHERE username = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $username);

        if($stmt->execute() && $row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            return crypt($password, $row['password']) == $row['password'];
        } else {
            return false;
        }
    }

    public function getData($username) {
        $stmt =     "SELECT * ".
                    "FROM `user` ".
                    "WHERE username = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $username);

        if($stmt->execute() && $row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            return $row;
        } else {
            return false;
        }
    }

    public function exists($username) {
        $stmt =     "SELECT COUNT(*) ".
                    "FROM `user` ".
                    "WHERE username = ?";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(1, $username);
        $stmt->execute();;

        if($stmt->fetchColumn()  >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function add($firstename, $lastname, $username, $email, $password) {
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
            $passwordCrypt = crypt($password, $salt);

            $stmt = "INSERT INTO `user` ".
                    "(username, password, firstname, lastname, email) ".
                    "VALUES (?, ?, ?, ?, ?)";
            $stmt =  $this->db->prepare($stmt);

            if($stmt->execute(array($username, $passwordCrypt, $firstename, $lastname, $email))) return true;
        }
        return false;
    }

    public function update($id, $keys ,$values) {
        $setKeys = "";
        foreach($keys as $key) {
            $setKeys = $setKeys."$key = ?, ";
        }
        $setKeys = rtrim($setKeys, ", ")." ";

        $stmt = "UPDATE `user` ".
                "SET $setKeys ".
                "WHERE id = ?";

        $values[] = $id;

        $stmt =  $this->db->prepare($stmt);
        if($stmt->execute($values)) return true;

        return false;
    }

}
?>