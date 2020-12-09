<?php
    function isAllowed() {
        session_start();
        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
            return true;
        } else {
            return false;
        }
    }
?>