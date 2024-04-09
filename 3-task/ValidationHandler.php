<?php

require_once '../src/Domain/Shared/ValueObject/ErrorDomain.php';
require_once '../src/Domain/Shared/ValueObject/StringValueObject.php';

require_once '../src/Domain/Contact/ContactEmail.php';
require_once '../src/Domain/Contact/ContactName.php';
require_once '../src/Domain/Contact/ContactLastName.php';

class ValidationHandler
{
    public function handleRequest()
    {
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'POST':
                $this->handlePostRequest();
                break;
            default:
                http_response_code(405);
                echo "Método no permitido. Solo se aceptan solicitudes POST.";
                exit;
        }
    }

    private function handlePostRequest()
    {

        try {
            $name = new ContactName($_POST["name"]);
            $lastName = new ContactLastName($_POST["lastName"]);
            $email = new ContactEmail($_POST["email"]);

            http_response_code(200);
            echo json_encode([
                "success" => "¡La solicitud se procesó correctamente!",
                "data" => [
                    "name" => $name->value(),
                    "lastName" => $lastName->value(),
                    "email" => $email->value(),
                ],
            ]);
        } catch (Exception $e) {
            http_response_code($e->getCode() ?? 500);
            echo json_encode(["error" => $e->getMessage() ?? "Error server"]);
        }
    }

}

$handler = new ValidationHandler();
$handler->handleRequest();
