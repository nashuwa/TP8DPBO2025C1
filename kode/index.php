<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Students.controller.php");

$students = new StudentsController();

if (isset($_POST['add']))
{   // Add a new student
    $students->add($_POST);
} 
else if (isset($_POST['update']))
{
    // Handle form submission for updating a student
    $students->update($_POST);
} 
else if (!empty($_GET['id_hapus']))
{
    // Delete a student
    $id = $_GET['id_hapus'];
    $students->delete($id);
}
else if (!empty($_GET['id_edit']))
{
    // Show edit form for a student
    $id = $_GET['id_edit'];
    $students->edit($id);
}
else
{
    // Show isi dari index
    $students->index();
}