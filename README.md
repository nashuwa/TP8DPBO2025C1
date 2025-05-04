# TP8DPBO2025C1
*Saya Nashwa Nadria Futi dengan NIM 2308130 mengerjakan Tugas Praktikum 8 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin*

```
## Struktur Kode MVC
├── controllers/
│   ├── Departments.controller.php
│   ├── Students.controller.php
│   └── Universities.controller.php
│
├── models/
│   ├── DB.class.php
│   ├── Departments.class.php
│   ├── Students.class.php
│   └── Universities.class.php
│
├── templates/
│   ├── departments.html
│   ├── index.html
│   └── universities.html
│
├── views/
│   ├── Departments.view.php
│   ├── DepartmentsEdit.view.php
│   ├── Students.view.php
│   ├── StudentsEdit.view.php
│   ├── Template.class.php
│   ├── Universities.view.php
│   └── UniversitiesEdit.view.php
│
├── conf.php
├── departments.php
├── index.php
└── tp_mvc.sql
```

## Penjelasan Alur
1. User mengakses index.php atau students.php.
2. File itu memanggil controller seperti Students.controller.php.
3. Controller menggunakan model (Students.class.php) untuk mengambil data dari database.
4. Data dikirim ke view (Students.view.php), yang menampilkannya ke browser.
5. Jika perlu edit, controller akan memanggil StudentsEdit.view.php, lalu user bisa input perubahan.

## Screenshot

![Screenshot 2025-05-04 225413](https://github.com/user-attachments/assets/c119b4f6-448e-47d1-ac55-f3d3931b8ebd)
![Screenshot 2025-05-04 225338](https://github.com/user-attachments/assets/10b3badc-a0a5-49b7-b044-277e6e5201a5)
![Screenshot 2025-05-04 225327](https://github.com/user-attachments/assets/ac889ee7-014c-4677-9bab-e8869abb7a6d)
![Screenshot 2025-05-04 225319](https://github.com/user-attachments/assets/10723cc9-5a8e-425b-b059-dc70163e1b4c)
![Screenshot 2025-05-04 225430](https://github.com/user-attachments/assets/0c364a2d-5045-41ff-8bde-2d4d7f4bc97b)
![Screenshot 2025-05-04 225422](https://github.com/user-attachments/assets/e2957edc-e8d3-4b5c-b0fe-de9d8f37ebd9)

## Desain Program
![Screenshot 2025-05-04 234005](https://github.com/user-attachments/assets/a308b194-dbcd-4f46-8283-bffbc31de6c0)
