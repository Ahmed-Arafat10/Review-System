<?php
session_start();
/**
 * check if the user logged in or not
 * @return bool
 */
function IsLoggedIn()
{
    return isset($_SESSION['user']) ? 1:0;
}