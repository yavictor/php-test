<?php
//1.Разработать приложение, имитирующее иерархию (3 уровня иерархии) домашней мебели.В
//коде должны присутствовать абстрактные классы.Классы должны иметь набор произвольных
//методов, но обязательно должен присутствовать метод сохранения экземпляра класса в БД.
abstract class Furniture
{
    protected $name;
    protected $material;

    function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }

    abstract function getCategory();

    public function getMaterial()
    {
        return $this->material;
    }

    public function dbInsert(): string
    {
        $query = "INSERT INTO " . $this->table_name . "
            SET name=:name, price=:price, description=:description,
            category_id=:category_id, image=:image, created=:created";
        return 'Succesfully inserted';
    }
};

abstract class WoodenFurniture extends Furniture
{
    protected $name;
    protected $material = 'Wooden';

    function __construct($name)
    {
        $this->name = $name;
    }
};

class Table extends WoodenFurniture
{
    protected $name;
    protected $price;
    protected $description;
    protected $category_id;
    protected $image;

    function __construct($name, $price, $description, $category_id, $image)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
        $this->image = $image;
    }

    //getter and setters

    public function getCategory(): string
    {
        return 'Wooden Furniture';
    }
};

