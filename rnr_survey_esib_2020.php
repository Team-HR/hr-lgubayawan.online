<?php
date_default_timezone_set("Asia/Manila");

$host = "localhost";
$user = "root";
$password = "Xpanner09";//"teamhrmo2019";
$database = "hrnibai";

$mysqli = new mysqli($host, $user, $password, $database);
$mysqli->set_charset("utf8");

// ######## DISPLAY ALL PHP ERRORS START
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// ######## DISPLAY ALL PHP ERRORS END

$data = json_decode(file_get_contents('php://input'), true);
// echo json_encode($user);
// echo json_encode("Ok");
if ($data['surveyed']) {
    // var_dump($data);
    echo json_encode("Ok");
    $answers = $mysqli->real_escape_string(serialize($data["answers"]));
    $sql = "INSERT INTO `rnr_survey_esib_records` (`answers`, `created_at`,	`updated_at`) VALUES ('$answers', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
    $mysqli->query($sql);
    echo json_encode("Ok");
}

