<?php
session_start();
$status = '999';

unset ($_SESSION['loggedIn']);
if(session_destroy()){
    $status = '1';
}

echo $status;
?>