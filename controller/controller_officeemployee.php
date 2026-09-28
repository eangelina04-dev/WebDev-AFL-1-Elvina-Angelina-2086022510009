<?php
include_once(__DIR__ . "/../model/model_officeemployee.php");
include_once(__DIR__ . "/controller_employee.php");
include_once(__DIR__ . "/controller_office.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['officeemployeelist'])) {
    $_SESSION['officeemployeelist'] = array();
}

function createOfficeEmployee() {
    $employees = getAllEmployees();
    $offices = getAllOffices();
    $empIndex = $_POST['selectEmployee'];
    $offIndex = $_POST['selectOffice'];

    if (isset($employees[$empIndex]) && isset($offices[$offIndex])) {
        $oe = new OfficeEmployee();
        $oe->employeeName = $employees[$empIndex]->name;
        $oe->officeName = $offices[$offIndex]->name;
        array_push($_SESSION['officeemployeelist'], $oe);
    }
}

function getAllOfficeEmployees() {
    return $_SESSION['officeemployeelist'];
}


if (isset($_POST['button_save_officeemployee'])) {
    createOfficeEmployee();
    header("Location: ../view/view_officeemployee.php");
    exit();
}
?>