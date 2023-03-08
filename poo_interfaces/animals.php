<?php

interface IAnimal
{
    public function move_x(int $distance);
    public function move_y(int $distance);
}

class Animal
{
    public string $name;
    public string $race;

    public function say_hello()
    {
        echo "Hello i'm " . $this->name . " and i'm a " . $this->race . PHP_EOL;
    }
}

class Perro extends Animal implements IAnimal
{
    public int $post_y;
    public int $post_x;

    public function __construct(string $name, string $race, int $initial_x, int $initial_y)
    {
        $this->name = $name;
        $this->race = $race;
        $this->post_x = $initial_x;
        $this->post_y = $initial_y;
    }

    public function move_x(int $distance)
    {
        $this->post_x += $distance;
    }
    public function move_y(int $distance)
    {
        $this->post_y += $distance;
    }
    public function say_post()
    {
        echo "Estoy en X=" . $this->post_x . " y Y=" . $this->post_y . PHP_EOL;
    }
}

$perro_1 = new Perro('Lucas', 'Akita', 3, 4);
$perro_1->say_hello();
$perro_1->say_post();
$perro_1->move_x(2);
$perro_1->move_y(5);
$perro_1->say_post();

$perro_2 = new Perro('Toby', 'Doberman', 9, 1);
$perro_2->say_hello();
$perro_2->say_post();
$perro_2->move_x(-4);
$perro_2->move_y(3);
$perro_2->say_post();
