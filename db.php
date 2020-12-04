<?php
// библиотека RedBeanPHP
require "lib/rb-mysql.php";

// подключаемся к БД
R::setup( 'mysql:host=localhost;dbname=login_users',
        'root', '' );
if(!R::testConnection()) die('No DB connection!');

session_start(); // Создаем сессию для авторизации
?>
