## Crea una clase en PHP para representar un objeto del mundo real y que demuestre la encapsulación, la herencia y el polimorfismo.
 En el archivo  ``` 2-Task.php ``` definimos la clase Pet con los atributos protegidos de   $name; y  $age; 

 ### encapsulación
    creamos los métodos  getName y getAge para encapsular las propiedades esto garantiza que  solo puedan ser accedidas y modificadas de acuerdo con las reglas definidas por la clase

    ``` bash
    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age; 
    }
    ``` 

 ### herencia
 Definimos la Subclase Dog en la línea 32 ```class Dog extends Pet```  y heredamos los metodos  getName()  getAge() y makeSound() de la clase Dog


 ### polimorfismo
 Creamos un m,étodo polimórfico que sobrescribe el método makeSound de la clase padre llamado makeSound() este retornará otro texto la momento de ser invocado