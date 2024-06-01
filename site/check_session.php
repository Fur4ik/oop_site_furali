<?php
session_start();
$response = array();

if (isset($_SESSION['login'])) {
    $response['status'] = 'logged_in';
    $response['login'] = $_SESSION['login'];
} else {
    $response['status'] = 'logged_out';
}

echo json_encode($response);
?>