<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Universities.controller.php");

$universities = new UniversitiesController();

if (isset($_POST['add'])) {
    // Add a new university
    $universities->add($_POST);
} else if (isset($_POST['update'])) {
    // Handle form submission for updating a university
    $universities->update($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // Delete a university
    $id = $_GET['id_hapus'];
    $universities->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Show edit form for a university
    $id = $_GET['id_edit'];
    $universities->edit($id);
} else {
    // Show the list of universities
    $universities->index();
}