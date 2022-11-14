<?php
    //echo "<pre>";
    //var_dump($employeeCategories);
    //echo "</pre>";
?>

<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Új dolgozó felvitel</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="" method="POST">
            <div class="form-group">
                <label for="lastName">Vezetéknév*</label>
                <input type="text" class="form-control" name="employee[lastName]" id="lastName" required>
            </div>
            <div class="form-group">
                <label for="firstName">Keresztnév*</label>
                <input type="text" class="form-control" name="employee[firstName]" id="firstName" required>
            </div>  
            <div class="form-group">
                <label for="employee[employeeCategory]">Beosztás*</label>
                <select class="form-select" name="employee[employeeCategory]" id="employee[employeeCategory]">
                    <?php
                        foreach ($employeeCategories as $employeeCategory) {
                           echo "<option value=" .$employeeCategory->id ."> $employeeCategory->name </option>";
                        } 
                    ?>
                </select>
            </div>  
            <div class="form-group">
                <label for="salary">Fizetés*</label>
                <input type="number" class="form-control" name="employee[salary]" id="salary" required>
            </div>
            <div class="form-group">
                <label for="jobStart">Munkavégzés kezdete*</label>
                <input type="date" class="form-control" name="employee[jobStart]" id="jobStart" required>
            </div>
            <div class="form-check mt-3">
                <input type="checkbox" name="employee[status]" id="status" checked>
                <label for="status">Aktív</label>
            </div>
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="save"> MENT </button>
            </div>
        </form>
    </div>
</div>