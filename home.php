<?php
session_start();
if(($_SESSION['User_Level'] != 1))
{
    header('location:members_page.php');
}
else
{
    header('location:admin_page.php');
}
?>