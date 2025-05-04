<?php

class StudentsView
{
    public function render($data)
    {
        $no = 1;
        $dataStudents = null;
        $dataDepartments = null;
        
        foreach ($data['students'] as $val) 
        {
            $id = $val['id'];
            $name = $val['name'];
            $nim = $val['nim'];
            $phone = $val['phone'];
            $join_date = $val['join_date'];
            
            $department = isset($val['department_name']) ? $val['department_name'] : '-';
            
            $dataStudents .= "<tr class='text-center align-middle'>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $nim . "</td>
                        <td>" . $phone . "</td>
                        <td>" . $join_date . "</td>
                        <td>" . $department . "</td>
                        <td>
                            <a href='index.php?id_edit=" . $id . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm' 
                                onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>";

            $dataStudents .= "</tr>";
        }

        foreach ($data['departments'] as $val)
        {
            $id = $val['id'];
            $name = $val['name'];
            $faculty = isset($val['faculty']) ? $val['faculty'] : '';
            $university = isset($val['university_name']) ? $val['university_name'] : '';
            
            $dataDepartments .= "<option value='" . $id . "'>" . $name . " - " . $faculty . 
                                ($university ? " ($university)" : "") . "</option>";
        }        
        
        $tpl = new Template("templates/index.html");

        $tpl->replace("JUDUL", "Students");
        $tpl->replace("OPTION_DEPARTMENTS", $dataDepartments);
        $tpl->replace("DATA_TABEL", $dataStudents);
        $tpl->write();
    }
}