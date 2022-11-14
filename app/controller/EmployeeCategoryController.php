<?php
namespace app\controller;
require_once('app\model\EmployeeCategoryDao.php');

use app\model\EmployeeCategoryDao;

class EmployeeCategoryController {

    public function load($view, $data=[]){
        extract($data);
        ob_start();
        include("app/view/employeeCategory/{$view}.php");
        return $data;
    }

    public function listAllEmployeeCategories(){
        $employeeCategoryDaoObj = new EmployeeCategoryDao();
        $employeeCategories = $employeeCategoryDaoObj->getAllEmployeeCategory();
        return $this->load('list', [
            'employeeCategories' => $employeeCategories,
        ]);
    }

    public function saveEmployeeCategory(){
        $employeeCategoryDaoObj = new EmployeeCategoryDao();
        if (isset($_POST['save'])){
            $employeeCategoryDaoObj->save();
            header('Location: index.php?controller=employeeCategory&action=list');
        }
        return $this->load('create', [
        ]);
    }

    public function loadEmployeeCategoryToEdit(int $id){
        $employeeCategoryDaoObj = new EmployeeCategoryDao();
        $employeeCategoryData = $employeeCategoryDaoObj->getEmployeeCategoryById($id);

        return $this->load('edit', [
            'employeeCategory' => $employeeCategoryData,
        ]);
    }

    public function updateEmployeeCategoryById(int $id){
        $employeeCategoryDaoObj = new EmployeeCategoryDao();
        if (isset($_POST['update'])){
            $employeeCategoryDaoObj->update($id);
            header('Location: index.php?controller=employeeCategory&action=list');
        }
    }

    public function loadEmployeeCategoryToDelete(int $id){
        $employeeCategoryDaoObj = new EmployeeCategoryDao();
        $employeeCategoryData = $employeeCategoryDaoObj->getEmployeeCategoryById($id);
        return $this->load('delete', [
            'employeeCategory' => $employeeCategoryData,
        ]);
    }

    public function deleteEmployeeCategoryById(int $id){
        $employeeCategoryDaoObj = new EmployeeCategoryDao();
        if (isset($_POST['delete'])){
            $employeeCategoryDaoObj->delete($id);
            header('Location: index.php?controller=employeeCategory&action=list');
        }
    }



}

?>