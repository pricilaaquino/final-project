<?php
    try {
        include("config.php");
        session_start();

        if ($id = $_GET["id"]) {
        	// Get id from $_GET variable which is passed from dashboard. Use this Id to delete entry from the database
        	// After successful delete, redirect back to dashboard
            $db->query("DELETE FROM blog_entries WHERE id='{$id}'");
            header("Location: dashboard.php");
        }
    } catch (Exception $e) {

    }