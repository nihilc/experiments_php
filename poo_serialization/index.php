<?php
session_start();

class MyClass implements Serializable {

    public function __construct(
        private $prop1,
        private $prop2
    ) {
    }

    public function serialize() {
        return serialize(array(
            $this->prop1,
            $this->prop2,
        ));
    }

    public function unserialize($serialized) {
        list(
            $this->prop1,
            $this->prop2
        ) = unserialize($serialized);
    }

    public function setProp1($value)
    {
        $this->prop1 = $value;
    }
    public function setProp2($value)
    {
        $this->prop2 = $value;
    }

    public function getProp1()
    {
        return $this->prop1;
    }
    public function getProp2()
    {
        return $this->prop2;
    }
}

// crea una instancia de MyClass
$obj = new MyClass('valor1', 'valor2');

echo "Objecto Nuevo<pre>";
print_r($obj);
echo "</pre>";
echo $obj->getProp1();
echo $obj->getProp2();

// guarda el objeto en la sesión
$_SESSION['myobject'] = serialize($obj);

// recupera el objeto de la sesión
$serialized_obj = $_SESSION['myobject'];

// reconstruye el objeto
$obj_unserialize = unserialize($serialized_obj);

echo "Objecto Recuperado<pre>";
print_r($obj_unserialize);
echo "</pre>";
echo $obj_unserialize->getProp1();
echo $obj_unserialize->getProp2();