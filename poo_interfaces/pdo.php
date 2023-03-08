<?php

// Define Database
class Database
{
    private $host;
    private $dbname;
    private $charset;
    private $username;
    private $password;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'test';
        $this->charset = 'utf8mb4';
        $this->username = 'root';
        $this->password = '';
    }
    public function connect()
    {
        $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . $this->charset;
        $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $dbh = new PDO($dns, $this->username, $this->password, $opt);
        return $dbh;
    }
}

// Define interface
interface IModel
{
    public function create(object $data): bool;
    public function update(object $data): bool;
    public function delete(int $id): bool;
    public function read(): array;
    public function readById(int $id): object;
}

// Define super Class Model
class Model
{
    protected Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
}


// Define User Entity
class User {
    private int $id;
    private string $username;
    private string $password;
    private int $rol;
    // Setters
    public function setId(int $value)
    {
        $this->id = $value;
    }
    public function setUsername(string $value)
    {
        $this->username = $value;
    }
    public function setPassword(string $value)
    {
        $this->password = $value;
    }
    public function setRol(int $value)
    {
        $this->rol = $value;
    }
    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRol()
    {
        return $this->rol;
    }
}

// Define User Model
class UserModel extends Model implements IModel{
    public function create(User $data): bool
    {
        try {
            $sql = "INSERT INTO users (username, password, rol) VALUES (?, ?, ?)";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $data->getUsername(),
                $data->getPassword(),
                $data->getRol()
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function update(object $data): bool
    {
        try {
            $sql = "UPDATE users SET username = ?, password = ?, rol = ? WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $data->getUsername(),
                $data->getPassword(),
                $data->getRol(),
                $data->getId()
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([$id]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function read(): array
    {
        try {
            $sql = "SELECT * FROM users";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([]);
            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach ($rows as $row ) {
                $user = new User;
                $user->setId($row->id);
                $user->setUsername($row->username);
                $user->setPassword($row->password);
                $user->setRol($row->rol);
                $users[] = $user;
            }

            return $users;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function readById(int $id): object
    {
        try {
            $sql = "SELECT * FROM users WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([$id]);
            $row = $stm->fetch(PDO::FETCH_OBJ);

            $user = new User;
            $user->setId($row->id);
            $user->setUsername($row->username);
            $user->setPassword($row->password);
            $user->setRol($row->rol);

            return $user;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
}

// Instance

$UserModel = new UserModel;

$chris = new User;
$chris->setUsername('nihilc');
$chris->setPassword('123456');
$chris->setRol(1);

echo "User chris";
print_r($chris);

$juan = new User;
$juan->setUsername('juan12');
$juan->setPassword('654321');
$juan->setRol(2);

echo "User juan";
print_r($juan);

$UserModel->create($chris);
$UserModel->create($juan);

$data = $UserModel->read();
echo "DATA";
print_r($data);