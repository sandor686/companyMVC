<?php
namespace app\model;

class EmployeeCategory {

    private int $id;
    private string $name;
    private bool $deleted;

    function __construct(string $name){
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }
}
?>