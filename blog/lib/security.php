<?php
    function isAllowed() {
        checkSession();
        if (isset($_SESSION['auth']) && $_SESSION['auth']) {
            return true;
        } else {
            return false;
        }
    }
?>