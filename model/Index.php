<?php
class index
{
    private $link;

    function __construct($link) {
        $this->link = $link;
    }

    public function display() {          //отображение разного содержимого index.php в зависимости от того есть ли значение в $_SESSION['user']
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $name = $user['firstName'] . ' ' . $user['lastName'];
            include "./view/info.php";
        } else {
            $link = $this->link;
            include "./view/login.php";
        }
    }
}
