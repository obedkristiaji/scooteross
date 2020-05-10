<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
class HomeController
{
    protected $db;

    public function __construct()
    {
        $this->db = new MySQLDB("localhost", "root", "", "scooteross");
    }

    public function view_index_login()
    {
        if($_SESSION['role'] == 'login'){
            echo '<script type="text/javascript">';
            echo ' alert("Username or Password Wrong")';
            echo '</script>';
        }
        return View::createView(
            '/Home/login.php',
            []
        );
    }

    public function login()
    {
        $uname = $_GET['username'];
        $pw = $_GET['password'];
        $_SESSION['username'] = $uname;
        $_SESSION['password'] = $pw;

        $temp = "SELECT IdRole FROM pengguna WHERE email='$uname' AND password='$pw'";
        $temp_res = $this->db->executeNonSelectQuery($temp);
        $row = mysqli_fetch_row($temp_res);
        $id = $row[0];

        if($id == 1){
            $_SESSION['role'] = 'admin';
        } else if($id == 2){
            $_SESSION['role'] = 'pimpinan';
        } else if($id == 3){
            $_SESSION['role'] = 'operator';
        } else {
            $_SESSION['role'] = 'login';
        }
    }

    public function logout()
	{
		session_destroy();
	}

    public function view_home_utama()
    {
        return View::createView(
            '/Home/homeUtama.php',
            []
        );
    }
}
