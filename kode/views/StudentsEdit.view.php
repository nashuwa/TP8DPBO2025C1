<?php

class StudentsEditView
{
    public function render($data)
    {
        $student = $data['student'];
        $departments = $data['departments'];
        
        $departmentOptions = '';
        foreach ($departments as $department) {
            $selected = ($department['id'] == $student['department_id']) ? 'selected' : '';
            $departmentOptions .= "<option value='" . $department['id'] . "' " . $selected . ">" . 
                                    $department['name'] . " - " . $department['faculty'] . "</option>";
        }
        
        $editForm = "
        <div class='container mt-5'>
            <div class='card'>
                <div class='card-header bg-primary text-white'>
                    <h2 class='card-title'>Edit Student</h2>
                </div>
                <div class='card-body'>
                    <form action='departments.php' method='post'>
                        <input type='hidden' name='id' value='" . $student['id'] . "'>
                        
                        <div class='mb-3'>
                            <label for='name' class='form-label'>Name</label>
                            <input type='text' class='form-control' id='name' name='name' value='" . $student['name'] . "' required>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='nim' class='form-label'>NIM</label>
                            <input type='text' class='form-control' id='nim' name='nim' value='" . $student['nim'] . "' required>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='phone' class='form-label'>Phone</label>
                            <input type='text' class='form-control' id='phone' name='phone' value='" . $student['phone'] . "'>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='join_date' class='form-label'>Join Date</label>
                            <input type='date' class='form-control' id='join_date' name='join_date' value='" . $student['join_date'] . "'>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='department_id' class='form-label'>Department</label>
                            <select class='form-select' id='department_id' name='department_id' required>
                                <option value=''>Select Department</option>
                                " . $departmentOptions . "
                            </select>
                        </div>
                        
                        <div class='d-grid gap-2'>
                            <button type='submit' name='update' class='btn btn-primary'>Update Student</button>
                            <a href='departments.php' class='btn btn-secondary'>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
        
        $tpl = new Template("templates/departments.html");
        $tpl->replace("JUDUL", "Edit Student");
        $tpl->replace("DATA_TABEL", $editForm);
        $tpl->write();
    }
}