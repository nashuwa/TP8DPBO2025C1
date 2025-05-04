<?php

class DepartmentsView
{
    public function render($data)
    {
        $no = 1;
        $dataDepartments = null;
        $dataUniversities = null;
        
        foreach ($data['departments'] as $val) {
            // Access values by array keys instead of list() for safety
            $id = $val['id'];
            $name = $val['name'];
            $faculty = $val['faculty'];
            // Use university_name from the JOIN in getDepartments()
            $university = isset($val['university_name']) ? $val['university_name'] : '-';
            
            $dataDepartments .= "<tr class='text-center align-middle'>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $faculty . "</td>
                        <td>" . $university . "</td>
                        <td>
                            <a href='departments.php?id_edit=" . $id . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='departments.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm' 
                                onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>";

            $dataDepartments .= "</tr>";
        }

        foreach ($data['universities'] as $val) {
            $id = $val['id'];
            $name = $val['name'];
            $dataUniversities .= "<option value='" . $id . "'>" . $name . "</option>";
        }     
        
        $tpl = new Template("templates/departments.html");

        $tpl->replace("JUDUL", "Departments");
        $tpl->replace("OPTION_UNIVERSITIES", $dataUniversities);
        $tpl->replace("DATA_TABEL", $dataDepartments);
        $tpl->write();
    }
}