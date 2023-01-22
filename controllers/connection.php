<?php


$username = "root";
$servername = "localhost";
$password = "";
$dbname = "resume";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    echo $conn->connect_error;
}

function getgenralidnfo($conn){
    $sql = "SELECT * FROM gerenal_info limit 1";
    $select = $conn->query($sql);

    $data = $select->fetch_assoc();
    return $data;

}
function getEexperience($conn,){
    $sql = "SELECT * FROM experience ";
    $select = $conn->query($sql);
    $data = [];
    while($row = $select->fetch_assoc()){
        array_push($data,$row);
    }
    return $data;

}


function geteducation($conn){
    $sql = "SELECT * FROM education ";
    $data =[];
    $select = $conn->query($sql);
    while($row = $select->fetch_assoc()){
        array_push($data,$row);
    }
    return $data;
}

function getskill($conn){
    $sql = "SELECT * FROM skills ";
    $select = $conn->query($sql);
    $data = [];
    while($row = $select->fetch_assoc()){
        array_push($data,$row);
    }
    return $data;

}


function getawards($conn){
    $sql = "SELECT * FROM awards ";
    $select = $conn->query($sql);
    $data = [];
    while($row = $select->fetch_assoc()){
        array_push($data,$row);
    }
    return $data;

}

function getskilltool($conn){
    $sql = "SELECT * FROM skills_tools ";
    $select = $conn->query($sql);
    $data = [];
    while($row = $select->fetch_assoc()){
        array_push($data,$row);
    }
    return $data;

}

$awz = getawards($conn);
$edu = geteducation($conn);
$exp = getEexperience($conn);
$ski = getskill($conn);
$ski_tool = getskilltool($conn);
$genralinforesualt = getgenralidnfo($conn);




?>
