<?php
<<<<<<< HEAD

=======
require_once("../../../wp-load.php");
require_once MARINE_RESERVATION_DIR . '/admin/function.php';
// get data sent from js axios 
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

$message = "Nouvele reservation";

$headers = array('Content-Type: text/html; charset=UTF-8');

try {
    wp_mail($data['email'], "Nouvelle reservation", $message, $headers);
} catch (\Throwable $th) {
    throw new Exception("Error sending email");
}

try {
    addReservation($data);
} catch (\Throwable $th) {
    throw new Exception("Error adding reservation");
}
>>>>>>> 900f957f537a1c17c8c81c0fb4f6e527c9e89b91
