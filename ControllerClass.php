<?php
include_once 'Config.php';

class ControllerClass extends Config
{

    public function getClassroom($id = 0)
    {
        $pdo = $this->conn;
        $query = "SELECT * FROM class";
        if ($id != 0) {
            $verifId = $this->testInput($id);
            $query .= " WHERE id=" . $verifId . " LIMIT 1 ";
        }
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function insertClassroom()
    {
        $pdo = $this->conn;
        if (!empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['heure'])) {
            $name = $this->testInput($_POST['name']);
            $date = $this->testInput($_POST['date']);
            $heure = $this->testInput($_POST['heure']);
            $query = "INSERT INTO class (nom, date, heure) VALUES ('$name', '$date', '$heure')";
            $statement = $pdo->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result, JSON_PRETTY_PRINT);
        } else {
            echo $this->returnedmessage('Error adding classroom', 'error');
        }
    }


    public function deleteClassroom($id)
    {
        $pdo = $this->conn;
        $query = "DELETE FROM class WHERE id = $id";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["message" => "la classe numéro"], JSON_PRETTY_PRINT);
    }


    public function updateClassroom($id)
    {
        $pdo = $this->conn;
        $name = $this->convertput("name");
        $date = $this->convertput("date");
        $heure = $this->convertput("heure");
        $name = $this->testInput($name);
        $date = $this->testInput($date);
        $heure = $this->testInput($heure);
        $query = "UPDATE class SET nom = '$name', date = '$date', heure = '$heure' WHERE id = $id";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}