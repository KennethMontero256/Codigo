<?php

function getConnection() {

    $mysqli = new mysqli("localhost", "root", "", "tostador");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    return $mysqli;
}
?>
