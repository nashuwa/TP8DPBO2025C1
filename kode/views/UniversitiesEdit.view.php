<?php

class UniversitiesEditView
{
    public function render($data)
    {
        $university = $data['university'];
        
        $editForm = "
        <div class='container mt-5'>
            <div class='card'>
                <div class='card-header bg-primary text-white'>
                    <h2 class='card-title'>Edit University</h2>
                </div>
                <div class='card-body'>
                    <form action='universities.php' method='post'>
                        <input type='hidden' name='id' value='" . $university['id'] . "'>
                        
                        <div class='mb-3'>
                            <label for='name' class='form-label'>University Name</label>
                            <input type='text' class='form-control' id='name' name='name' value='" . $university['name'] . "' required>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='address' class='form-label'>Address</label>
                            <textarea class='form-control' id='address' name='address' rows='3'>" . $university['address'] . "</textarea>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='accreditation' class='form-label'>Accreditation</label>
                            <select class='form-select' id='accreditation' name='accreditation'>
                                <option value='A' " . ($university['accreditation'] == 'A' ? 'selected' : '') . ">A</option>
                                <option value='B' " . ($university['accreditation'] == 'B' ? 'selected' : '') . ">B</option>
                                <option value='C' " . ($university['accreditation'] == 'C' ? 'selected' : '') . ">C</option>
                                <option value='D' " . ($university['accreditation'] == 'D' ? 'selected' : '') . ">D</option>
                                <option value='Unaccredited' " . ($university['accreditation'] == 'Unaccredited' ? 'selected' : '') . ">Unaccredited</option>
                            </select>
                        </div>
                        
                        <div class='d-grid gap-2'>
                            <button type='submit' name='update' class='btn btn-primary'>Update University</button>
                            <a href='universities.php' class='btn btn-secondary'>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
        
        $tpl = new Template("templates/universities.html");
        $tpl->replace("JUDUL", "Edit University");
        $tpl->replace("DATA_TABEL", $editForm);
        $tpl->write();
    }
}