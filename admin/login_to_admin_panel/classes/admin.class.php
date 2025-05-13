<?php

include 'db_connect.class.php';

class Admin
{
    private $pdo;

    public function __construct()
    {
        $dbconn = new DBConnection;
        $this->pdo = $dbconn->connectDB();
    }


    public function login($email, $password)
{
    try {
        $sql = "SELECT * FROM employé WHERE email= :email";
        $query = $this->pdo->prepare($sql);
        $query->bindparam(":email", $email);
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            var_dump($password, $user['password']); // Add this line
            if (password_verify($password, $user['password'])) {
                echo "✅ Password match!";
                return $user;
            } else {
                echo "❌ Password does not match.";
                return false;
            }
        } else {
            echo "❌ Email not found.";
            return false;
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

}
