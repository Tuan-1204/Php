<?php
include_once(__DIR__ . '/connect.php');
class data_user
{
    public function select_user($user = null)
    {
        global $conn;
        if ($user) {
            $sql = "SELECT * FROM user WHERE username='$user'";
        } else {
            $sql = "SELECT * FROM user";
        }
        return mysqli_query($conn, $sql);
    }
    public function select_user_by_id($id)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE id_user='$id'";
        return mysqli_query($conn, $sql);
    }
    public function register($user, $pass, $add, $ava, $gender, $hobby)
    {
        global $conn;
        $sql = "INSERT INTO user(username,password,address,avatar,gender,hobby)
           VALUES ('$user','$pass','$add','$ava','$gender','$hobby')";
        return mysqli_query($conn, $sql);
    }
    public function login($user, $pass)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
        return mysqli_query($conn, $sql);
    }
    public function update_user($id, $add, $gender, $hobby)
    {
        global $conn;
        $sql = "UPDATE user SET address='$add', gender='$gender', hobby='$hobby' WHERE id_user='$id'";
        return mysqli_query($conn, $sql);
    }
    public function delete_user($id)
    {
        global $conn;
        $sql = "DELETE FROM user WHERE id_user='$id'";
        return mysqli_query($conn, $sql);
    }
}
?>
