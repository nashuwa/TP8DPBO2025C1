<?php

class UniversitiesView
{
    public function render($data)
    {
        $no = 1;
        $dataUniversities = null;

        if (isset($data[0]) && !isset($data['universities'])) {
            $universities = $data;
            $data = ['universities' => $universities];
        }
        
        foreach ($data['universities'] as $val) {

            $id = $val['id'];
            $name = $val['name'];
            $address = $val['address'];
            $accreditation = $val['accreditation'];
            
            $dataUniversities .= "<tr class='text-center align-middle'>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $address . "</td>
                        <td>" . $accreditation . "</td>
                        <td>
                            <a href='universities.php?id_edit=" . $id . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='universities.php?id_hapus=" . $id . "' class='btn btn-danger btn-sm' 
                                onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>";

            $dataUniversities .= "</tr>";
        }      
        
        $tpl = new Template("templates/universities.html");

        $tpl->replace("JUDUL", "Universitas");
        $tpl->replace("DATA_TABEL", $dataUniversities);
        $tpl->write();
    }
}