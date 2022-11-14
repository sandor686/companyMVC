<?php
   // echo "<pre>";
   //var_dump($programmers);
   // echo "</pre>";
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
        </tr>
        <?php
            foreach ($programmers as $programmer) {
               echo "<tr>";
                    echo "<td>" .$programmer->id . "</td>";
                    echo "<td>" .$programmer->last_name . " " . $programmer->first_name ."</td>";
                    echo "<td>" .$programmer->name . "</td>";
                    echo "<td>" .$programmer->salary . "</td>";
                    echo "<td>" .$programmer->job_start . "</td>";
                    echo "<td>";
                    $programmer->status ? print "Aktív" : print "Inaktív";
                    echo  "</td>";
               echo "</tr>";
            }
        ?>
    </table>
    <a href="index.php" class="btn btn-info text-white">Dolgozók</a>
</div>
