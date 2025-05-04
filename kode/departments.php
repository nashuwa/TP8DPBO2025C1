<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Departments.controller.php");

$departments = new DepartmentsController();

if (isset($_POST['add'])) {
    // Add a new department
    $departments->add($_POST);
} else if (isset($_POST['update'])) {
    // Handle form submission for updating a department
    $departments->update($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // Delete a department
    $id = $_GET['id_hapus'];
    $departments->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Show edit form for a department
    $id = $_GET['id_edit'];
    $departments->edit($id);
} else {
    // Show the list of departments
    $departments->index();
}