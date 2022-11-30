<?php
/*

        Título: Tarefa 4 - 1

        Autor:Pedro Pina Menéndez

        Data modificación: 17/11/2022
        Versión 1.0

    */
// Recupérase a información da sesión
session_start();
// E se elimina
session_destroy();
// Redirixe de novo á páxina de login
header("Location: login.php");
