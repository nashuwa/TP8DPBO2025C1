<?php
include_once("conf.php");
include_once("models/Universities.class.php");
include_once("models/Departments.class.php");
include_once("views/Departments.view.php");
include_once("views/DepartmentsEdit.view.php");

class DepartmentsController
{
    // Properti kontroller
    private $universities;
    private $departments;

    // Konstruktor
    function __construct()
    {
        $this->universities = new Universities(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->departments = new Departments(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Method umum
    public function index()
    {
        // Membuka jalur ke database
        $this->universities->open();
        $this->departments->open();

        // Meneruskan request dari view
        $this->universities->getUniversities();
        $this->departments->getDepartments();

        // Inisiasi variabel berbentuk array untuk menyimpan kedua data table
        $data = array(
            'universities' => array(),
            'departments' => array()
        );

        // Push 1 per 1 data yang berbentuk objek dan diteruskan ke variabel yg telah dibuat sebelumnya
        while ($row = $this->universities->getResult()) {
            array_push($data['universities'], $row);
        }
        while ($row = $this->departments->getResult()) {
            array_push($data['departments'], $row);
        }

        // Menutup jalur
        $this->universities->close();
        $this->departments->close();

        // Inisiasi variable untuk memanggil kelas views dan meneruskan datanya
        $view = new DepartmentsView();
        $view->render($data);
    }

    function add($data)
    {
        // Lengkapin controller untuk melakukan add data
        $this->departments->open();
        $this->departments->add($data);
        $this->departments->close();

        header("location:departments.php");
    }

    function edit($id)
    {
        // Lengkapin controller untuk melakukan edit data
        $this->departments->open();
        $this->departments->edit($id);
        $departments = $this->departments->getResult();

        $this->universities->open();
        $this->universities->getUniversities();

        $data = array(
            'departments' => $departments,
            'universities' => array()
        );  

        while ($row = $this->universities->getResult()) {
            array_push($data['universities'], $row);
        }
        
        $this->universities->close();
        $this->departments->close();

        $view = new DepartmentsEditView();
        $view->render($data);
    }

    function update($data)
    {
        
        $this->departments->open();
        $this->departments->update($data);
        $this->departments->close();
        
        header("location:departments.php");
    }

    function delete($id)
    {
        // Lengkapin controller untuk melakukan delete data
        $this->departments->open();
        $this->departments->delete($id);
        $this->departments->close();

        header("location:departments.php");
    }
}
