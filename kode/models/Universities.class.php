<?php

class Universities extends DB
{
    function getUniversities()
    {
        $query = "SELECT * FROM universities";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = isset($data['name']) ? $data['name'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $accreditation = isset($data['accreditation']) ? $data['accreditation'] : '';
        
        $query = "INSERT INTO universities (name, address, accreditation) 
                    VALUES ('$name', '$address', '$accreditation')";

        return $this->execute($query);
    }

    function edit($id)
    {
        $query = "SELECT * FROM universities WHERE id = '$id'";
        return $this->execute($query);
    }
    
    function update($data)
    {
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $name = isset($data['name']) ? $data['name'] : '';
        $address = isset($data['address']) ? $data['address'] : '';
        $accreditation = isset($data['accreditation']) ? $data['accreditation'] : '';
        
        $query = "UPDATE universities 
                    SET name = '$name', 
                        address = '$address', 
                        accreditation = '$accreditation' 
                    WHERE id = $id";
                    
        return $this->execute($query);
    }

    function delete($id)
    {
        $id = (int)$id;
        $query = "DELETE FROM universities WHERE id = $id";
        return $this->execute($query);
    }
}