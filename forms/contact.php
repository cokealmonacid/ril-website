<?php
$to = "jorgealmonacid24@gmail.com";
$subject = "Mensaje de contacto";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $body = "Nombre: $name\n";
    $body .= "Correo: $email\n\n";
    $body .= "Mensaje:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo json_encode(["success" => true]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false]);
    }
} else {
    http_response_code(500);
    echo json_encode(["success" => false]);
}
?>