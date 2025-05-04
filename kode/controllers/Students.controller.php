<?php
include_once("conf.php");
include_once("models/Students.class.php");
include_once("models/Universities.class.php");
include_once("models/Departments.class.php");
include_once("views/Students.view.php");
include_once("views/StudentsEdit.view.php");

class StudentsController
{
    // Properti kontroller
    private $students;
    private $universities;
    private $departments;

    // Konstruktor
    function __construct()
    {
        $this->students = new Students(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->universities = new Universities(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->departments = new Departments(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Method umum
    public function index()
    {
        // Membuka jalur ke database
        $this->students->open();
        $this->universities->open();
        $this->departments->open();

        // Meneruskan request dari view
        $this->students->getStudents();
        $this->universities->getUniversities();
        $this->departments->getDepartments();

        // Inisiasi variabel berbentuk array untuk menyimpan kedua data table
        $data = array(
            'students' => array(),
            'universities' => array(),
            'departments' => array()
        );

        // Push 1 per 1 data yang berbentuk objek dan diteruskan ke variabel yg telah dibuat sebelumnya
        while ($row = $this->students->getResult()) {
            array_push($data['students'], $row);
        }
        while ($row = $this->universities->getResult()) {
            array_push($data['universities'], $row);
        }
        while ($row = $this->departments->getResult()) {
            array_push($data['departments'], $row);
        }

        // Menutup jalur
        $this->students->close();
        $this->universities->close();
        $this->departments->close();

        // Inisiasi variable untuk memanggil kelas views dan meneruskan datanya
        $view = new StudentsView();
        $view->render($data);
    }

    function add($data)
    {
        $this->students->open();
        $this->students->add($data);
        $this->students->close();

        header("location:index.php");
    }

    function edit($id) // untuk page edit
    {
        // Get the student data for editing
        $this->students->open();
        $this->students->edit($id);
        $student = $this->students->getResult();
        
        $this->departments->open();
        $this->departments->getDepartments();
        
        $data = array(
            'student' => $student,
            'departments' => array()
        );
        
        while ($row = $this->departments->getResult()) {
            array_push($data['departments'], $row);
        }
        
        $this->departments->close();
        $this->students->close();
        
        // edit view
        $view = new StudentsEditView();
        $view->render($data);
    }
    
    function update($data)
    {
        
        $this->students->open();
        $this->students->update($data);
        $this->students->close();
        
        header("location:index.php");
    }

    function delete($id)
    {
        $this->students->open();
        $this->students->delete($id);
        $this->students->close();

        header("location:index.php");
    }
}