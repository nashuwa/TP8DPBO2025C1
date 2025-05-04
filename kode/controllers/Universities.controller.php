<?php
include_once("conf.php");
include_once("models/Universities.class.php");
include_once("views/Universities.view.php");

class UniversitiesController
{
    // Properti kontroller
    private $universities;

    // Konstruktor Controller Grup
    function __construct()
    {
        $this->universities = new Universities(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Method yang mengarahkan ke halaman umum controller grup
    public function index()
    {
        // Menyambungkan/membuka jalur ke database
        $this->universities->open();

        // Meneruskan request umum dari views (mengambil data universities) 
        $this->universities->getUniversities();

        // Inisiasi variabel untuk menyimpan data grup
        $data = array();

        // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->universities->getResult()) {
        array_push($data, $row);
        }

        // Menutup jalur ke database
        $this->universities->close();

        // Meneruskannya ke view
        $view = new UniversitiesView();
        $view->render($data);
    }

    function add($data)
    {
        // Lengkapi controller untuk melakukan add data
        $this->universities->open();
        $this->universities->add($data);
        $this->universities->close();

        header("location:universities.php");
    }

    function edit($id)
    {
        $this->universities->open();
        $this->universities->edit($id);
        $university = $this->universities->getResult();
        
        $data = array('university' => $university);
        
        $this->universities->close();

        // Panggil view untuk form edit
        include_once("views/UniversitiesEdit.view.php");
        $view = new UniversitiesEditView();
        $view->render($data);
    }

    function update($data)
    {
        $this->universities->open();
        $this->universities->update($data);
        $this->universities->close();

        header("location:universities.php");
    }


    function delete($id)
    {
        // Lengkapi controller untuk melakukan delete data
        $this->universities->open();
        $this->universities->delete($id);
        $this->universities->close();

        header("location:universities.php");
    }
}
