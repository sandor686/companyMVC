<?php
    //echo "<pre>";
    //var_dump($employeeCategory);
    //echo "</pre>";
?>

<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Beosztás módosítás</h1>
    </div>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-sm-6">
        <form action="index.php?controller=employeeCategory&action=update&id=<?php echo $employeeCategory->id;?>" method="POST">
            <div class="form-group">
                <label for="name">Név* - egyedinek kell lennie</label>
                <input type="text" class="form-control" name="employeeCategory[name]" id="name" value='<?php echo $employeeCategory->name; ?>' required>
            </div>
            <div class="form-group mt-3 justify-content-between d-flex">
                <a href="javascript:history.go(-1)" class="btn btn-warning">Vissza</a>
                <button type="submit" class="btn btn-success text-white" name="update"> MÓDOSÍT </button>
            </div>
        </form>
    </div>
</div>