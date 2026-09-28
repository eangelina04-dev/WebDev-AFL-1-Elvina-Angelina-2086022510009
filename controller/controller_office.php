<?php
include_once(__DIR__ . "/../model/model_office.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['officelist'])) {
    $_SESSION['officelist'] = array();
}

function createOffice() {
    $office = new Office();
    $office->name = $_POST['inputOfficeName'];
    $office->address = $_POST['inputAddress'];
    $office->city = $_POST['inputCity'];
    $office->phone = $_POST['inputPhone'];
    array_push($_SESSION['officelist'], $office);
}

function getAllOffices() {
    return $_SESSION['officelist'];
}

function deleteOffice($index) {
    unset($_SESSION['officelist'][$index]);
}

if (isset($_POST['button_submit_office'])) {
    createOffice();
    header("Location: ../view/view_office.php");
    exit();
}

if (isset($_GET['deleteOfficeID'])) {
    deleteOffice($_GET['deleteOfficeID']);
    header("Location: ../view/view_office.php");
    exit();
}

?>