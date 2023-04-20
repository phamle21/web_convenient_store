<?php
    setcookie('login_kh', $_COOKIE['login_kh'], time() -10, '/');
    header('Location: ../');
?>