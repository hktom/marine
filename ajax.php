<?php
require_once("../../../wp-load.php");
require_once MARINE_RESERVATION_DIR . '/admin/function.php';
// get data sent from js axios 
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$message = "Nouvele reservation";

$headers = array('Content-Type: text/html; charset=UTF-8');

wp_mail($data['email'], "Nouvelle reservation", $message, $headers) or throw new Exception("Error sending email");

addReservation($data) or throw new Exception("Error adding reservation");