<?php

class Students extends DB
{
    function getStudents()
    {
        $query = "SELECT s.*, d.name as department_name, u.name as university_name 
                    FROM students s 
                    LEFT JOIN departments d ON s.department_id = d.id
                    LEFT JOIN universities u ON d.university_id = u.id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = isset($data['name']) ? $data['name'] : '';
        $nim = isset($data['nim']) ? $data['nim'] : '';
        $phone = isset($data['phone']) ? $data['phone'] : '';
        $join_date = isset($data['join_date']) ? $data['join_date'] : '';
        $department_id = isset($data['department_id']) ? $data['department_id'] : '';
        
        $query = "INSERT INTO students (name, nim, phone, join_date, department_id) 
                    VALUES ('$name', '$nim', '$phone', '$join_date', '$department_id')";

        return $this->execute($query);
    }

    function edit($id)
    {
        $query = "SELECT * FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function update($data)
    {
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $name = isset($data['name']) ? $data['name'] : '';
        $nim = isset($data['nim']) ? $data['nim'] : '';
        $phone = isset($data['phone']) ? $data['phone'] : '';
        $join_date = isset($data['join_date']) ? $data['join_date'] : '';
        $department_id = isset($data['department_id']) ? $data['department_id'] : '';
        
        $query = "UPDATE students 
                    SET name = '$name', 
                        nim = '$nim', 
                        phone = '$phone', 
                        join_date = '$join_date', 
                        department_id = '$department_id' 
                    WHERE id = $id";
                
        return $this->execute($query);
    }

    function delete($id)
    {
        $id = (int)$id;
        $query = "DELETE FROM students WHERE id = $id";
        return $this->execute($query);
    }
}