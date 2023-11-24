<?php
function isLoggedin() {
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1)
        return true;
    return false; 
}