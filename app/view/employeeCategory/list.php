<?php
   //echo "<pre>";
   //var_dump($employeeCategories);
    //echo "</pre>";
?>
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Beosztások</h1>
    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($employeeCategories as $employeeCategory) {
               echo "<tr>";
                    echo "<td>" .$employeeCategory->id . "</td>";
                    echo "<td>" .$employeeCategory->name ."</td>";
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=employeeCategory&action=edit&id=$employeeCategory->id'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=employeeCategory&action=delete&id=$employeeCategory->id'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
    <a href="index.php?controller=employeeCategory&action=create" class="btn btn-info text-white">Új beosztás</a>
    <a href="index.php" class="btn btn-success text-white">Dolgozók</a>
</div>
