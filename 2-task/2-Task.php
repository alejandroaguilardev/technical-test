<?php
declare (strict_types = 1);

class Pet
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function makeSound()
    {
        return "Haciendo algún sonido genérico...";
    }
}

class Dog extends Pet
{
    protected $breed;

    public function __construct($name, $age, $breed)
    {
        parent::__construct($name, $age);
        $this->breed = $breed;
    }

    public function makeSound()
    {
        return "¡Guau guau!";
    }

    public function getBreed()
    {
        return $this->breed;
    }
}

$pet = new Pet("Mascota", 5);
echo "Nombre de la mascota: " . $pet->getName() . "<br>";
echo "Edad de la mascota: " . $pet->getAge() . "<br>";
echo "Sonido de la mascota: " . $pet->makeSound() . "<br>";

$dog = new Dog("Baldo", 3, "Mestizo");
echo "<br>Nombre del perro: " . $dog->getName() . "<br>";
echo "Edad del perro: " . $dog->getAge() . "<br>";
echo "Raza del perro: " . $dog->getBreed() . "<br>";
echo "Sonido del perro: " . $dog->makeSound() . "<br>";
