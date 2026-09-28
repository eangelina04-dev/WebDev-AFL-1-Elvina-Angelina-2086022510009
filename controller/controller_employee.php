<?php
include_once(__DIR__ . "/../model/model_employee.php");
include_once(__DIR__ . "/../model/model_office.php");
session_start();

if (!isset($_SESSION['employeelist'])) {
    $_SESSION['employeelist'] = array();
}

function createEmployee() {
    $employee = new Employee();
    $employee->name = $_POST['inputName'];
    $employee->position = $_POST['inputPosition'];
    $employee->age = $_POST['inputAge'];
    array_push($_SESSION['employeelist'], $employee);
}

function getAllEmployees() {
    return $_SESSION['employeelist'];
}

function deleteEmployee($index) {
    unset($_SESSION['employeelist'][$index]);
}

if (isset($_POST['button_submit'])) {
    createEmployee();
    header("Location: ../view/view_employee.php");
    exit();
}

if (isset($_GET['deleteID'])) {
    deleteEmployee($_GET['deleteID']);
    header("Location: ../view/view_employee.php");
    exit();
}

?>