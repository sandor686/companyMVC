<?php
   // echo "<pre>";
    //var_dump($employees);
    //echo "</pre>";
?>
<div class="row">
    <div class="jumbotron bg-info text-white pt-3 pb-3">
        <h1 class="display3 text-center">Dolgozók</h1>
    </div>
</div>

<div class="container">
    <table class="table table-hover mt-5 text-center">
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Beosztás</th>
            <th>Fizetés</th>
            <th>Munkavégzés kezdete</th>
            <th>Állapot</th>
            <th>Műveletek</th>
        </tr>
        <?php
            foreach ($employees as $employee) {
               echo "<tr>";
                    echo "<td>" .$employee->id . "</td>";
                    echo "<td>" .$employee->last_name . " " . $employee->first_name ."</td>";
                    echo "<td>" .$employee->name . "</td>";
                    echo "<td>" .$employee->salary . "</td>";
                    echo "<td>" .$employee->job_start . "</td>";
                    echo "<td>";
                    $employee->status ? print "Aktív" : print "Inaktív";
                    echo  "</td>";
                    echo "<td>";
                        echo "<a class='btn btn-warning' href='index.php?controller=employee&action=edit&id=$employee->id'> Módosít </a> ";
                        echo "<a class='btn btn-danger' href='index.php?controller=employee&action=delete&id=$employee->id'> Töröl </a>";
                    echo "</td>";
               echo "</tr>";
            }
        ?>
    </table>
    <a href="index.php?controller=employee&action=create" class="btn btn-info text-white">Új dolgozó</a>
    <a href="index.php?controller=employeeCategory&action=list" class="btn btn-primary text-white">Beosztások</a>
    <a href="index.php?controller=employee&action=listProgrammers" class="btn btn-success text-white">Programozók</a>
 
</div>
