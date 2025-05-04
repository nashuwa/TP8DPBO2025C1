<?php

class Departments extends DB
{
    function getDepartments()
    {
        $query = "SELECT d.*, u.name as university_name 
                    FROM departments d 
                    LEFT JOIN universities u ON d.university_id = u.id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = isset($data['name']) ? $data['name'] : '';
        $faculty = isset($data['faculty']) ? $data['faculty'] : '';
        $university_id = isset($data['university_id']) ? $data['university_id'] : '';
        
        $query = "INSERT INTO departments (name, faculty, university_id) 
                    VALUES ('$name', '$faculty', '$university_id')";

        return $this->execute($query);
    }

    function edit($id)
    {
        $query = "SELECT * FROM departments WHERE id = '$id'";
        return $this->execute($query);
    }
    
    function update($data)
    {
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $name = isset($data['name']) ? $data['name'] : '';
        $faculty = isset($data['faculty']) ? $data['faculty'] : '';
        $university_id = isset($data['university_id']) ? $data['university_id'] : '';
        
        $query = "UPDATE departments 
                    SET name = '$name', 
                        faculty = '$faculty', 
                        university_id = '$university_id' 
                    WHERE id = $id";
                    
        return $this->execute($query);
    }

    function delete($id)
    {
        $id = (int)$id;
        $query = "DELETE FROM departments WHERE id = $id";
        return $this->execute($query);
    }
}