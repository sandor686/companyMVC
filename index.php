<?php
include 'app\controller\EmployeeController.php';
use app\controller\EmployeeController;

include 'app\controller\EmployeeCategoryController.php';
use app\controller\EmployeeCategoryController;

    //Eldönti, hogy melyik controllernek kapja meg a kérést.
    // ?controller=employee - URL ehhez hasonló
    // Ha meg van határozva a controller, akkor töltse be a controller kulcshoz tartozó értéket
    // Ha nincs beállítvan, akkor az employeeController kerüljön betöltésre
    $controllerName = (isset($_GET['controller'])) ? $_GET['controller'] : 'employee';

    // ?controller=employee&actionName = list - employee controllernek kell mukodnie, listázás művelet
    //Ha be van állítva a művelet (list, create, update, delete), akkor töltse be azt a műveletet
    // egyébként ha nincs beállítva semmi, akkor listázzunk
    $actionName = (isset($_GET['action'])) ? $_GET['action'] : 'list';

    switch ($controllerName) {
        case 'employee':
            $controller = new EmployeeController();
            switch ($actionName) {
                case 'list':
                    $content = $controller -> listAllEmployees();
                    break;
                case 'create':
                    $content = $controller -> saveEmployee();
                    break;
                case 'delete':
                    $content = $controller -> loadEmployeeToDelete($_GET['id']);
                    break;
                case 'del':
                    $content = $controller -> deleteEmployeeById($_GET['id']);
                    break;
                case 'edit':
                    $content = $controller -> loadEmployeeToEdit($_GET['id']);
                    break;
                case 'update':
                    $content = $controller -> updateEmployeeById($_GET['id']);
                    break;
                case 'listProgrammers':
                    $content = $controller -> getAllProgrammer();
                    break;
            }
            break;
        case 'employeeCategory':
            $controller = new EmployeeCategoryController();
            switch ($actionName) {
                case 'list':
                    $content = $controller -> listAllEmployeeCategories();
                    break;
                case 'create':
                    $content = $controller -> saveEmployeeCategory();
                    break;
                case 'edit':
                    $content = $controller -> loadEmployeeCategoryToEdit($_GET['id']);
                    break;  
                case 'update':
                    $content = $controller -> updateEmployeeCategoryById($_GET['id']);
                    break;    
                
                case 'delete':
                    $content = $controller -> loadEmployeeCategoryToDelete($_GET['id']);
                    break;    
                
                case 'del':
                    $content = $controller -> deleteEmployeeCategoryById($_GET['id']);
                    break;    
                }
            break;
    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Dolgozói nyilvántartás</title>
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>