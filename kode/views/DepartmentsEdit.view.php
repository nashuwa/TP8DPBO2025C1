<?php

class DepartmentsEditView
{
    public function render($data)
    {
        $department = $data['departments'];
        $universities = $data['universities'];
        
        $universityOptions = '';
        foreach ($universities as $university) {
            $selected = ($university['id'] == $department['university_id']) ? 'selected' : '';
            $universityOptions .= "<option value='" . $university['id'] . "' " . $selected . ">" . 
                                    $university['name'] . "</option>";
        }
        
        $editForm = "
        <div class='container mt-5'>
            <div class='card'>
                <div class='card-header bg-primary text-white'>
                    <h2 class='card-title'>Edit Department</h2>
                </div>
                <div class='card-body'>
                    <form action='departments.php' method='post'>
                        <input type='hidden' name='id' value='" . $department['id'] . "'>
                        
                        <div class='mb-3'>
                            <label for='name' class='form-label'>Department Name</label>
                            <input type='text' class='form-control' id='name' name='name' value='" . $department['name'] . "' required>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='faculty' class='form-label'>Faculty</label>
                            <input type='text' class='form-control' id='faculty' name='faculty' value='" . $department['faculty'] . "' required>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='university_id' class='form-label'>University</label>
                            <select class='form-select' id='university_id' name='university_id' required>
                                <option value=''>Select University</option>
                                " . $universityOptions . "
                            </select>
                        </div>
                        
                        <div class='d-grid gap-2'>
                            <button type='submit' name='update' class='btn btn-primary'>Update Department</button>
                            <a href='departments.php' class='btn btn-secondary'>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
        
        $tpl = new Template("templates/departments.html");
        $tpl->replace("JUDUL", "Edit Department");
        $tpl->replace("DATA_TABEL", $editForm);
        $tpl->write();
    }
}