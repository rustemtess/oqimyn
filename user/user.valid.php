<?php

/**
 * Check session
 */
function isSession(): bool {
    if(
        isset($_SESSION['access_token']) && $_SESSION['access_token'] != null 
    ) {
        return true;
    }
    return false;
}