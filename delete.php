<?php
    try {
        include("config.php");
        session_start();

        if ($id = $_GET["id"]) {
            $db->query("DELETE FROM blog_entries WHERE id='{$id}'");
            header("Location: dashboard.php");
        }
    } catch (Exception $e) {

    }