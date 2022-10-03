<?php
include("db_connect.php");
include_once 'ControllerClass.php';
$request_method = $_SERVER["REQUEST_METHOD"];

$classroom = new ControllerClass();


switch ($request_method) {
    case 'GET':
        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $classroom->getClassroom($id);
        } else {
            $classroom->getClassroom();
        }
        break;

    case "POST":
        if (!empty($_POST)) {
            $classroom->insertClassroom();
        } else {
            echo json_encode(array("status" => "error", "message" => "Missing data"));
        }
        break;

    case "PUT":
        if (!empty($_GET['id'])) {

            $id = intval($_GET['id']);
            $classroom->updateClassroom($id);
        } else {
            echo json_encode(array("status" => "error", "message" => "Missing id"));
        }
        break;

    case "DELETE":
        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $classroom->deleteClassroom($id);
        } else {
            echo json_encode(array("status" => "error", "message" => "Missing id"));
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;

}

function deleteClassroom($id)
{
    global $conn;
    $query = "DELETE FROM class WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 'success',
            'message' => 'Classroom deleted successfully'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error deleting classroom'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function updateClassroom($id)
{
    global $conn;
    $name = $_POST["name"];
    $heure = $_POST["heure"];
    $date = $_POST["date"];
    var_dump($name, $heure, $date);
    $query = "UPDATE class SET name = '$name', heure = '$heure', date = '$date' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 'success',
            'message' => 'Classroom updated successfully'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error updating classroom'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function addClassroom()
{
    global $conn;
    $name = $_POST['name'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $query = "INSERT INTO class (nom, date, heure) VALUES ('$name', '$date', '$heure')";
    if (mysqli_query($conn, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'Classroom Added Successfully.',
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Classroom Addition Failed.',
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


function getClassrooms()
{
    global $conn;
    $query = " SELECT * FROM class";
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }

    // header('Content-Type : application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getClassroom($id = 0)
{
    global $conn;
    $query = "SELECT * FROM class";
    if ($id != 0) {
        $query .= " WHERE id=" . $id . " LIMIT 1 ";
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }

    //  header('Content-Type : application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}