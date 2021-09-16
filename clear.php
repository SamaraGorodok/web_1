<?php
session_start();
    if (isset($_SESSION["Answer"])){
        $_SESSION["Answer"] = array();
    }
?>