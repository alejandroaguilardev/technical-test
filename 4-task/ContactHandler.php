<?php

require_once '../vendor/autoload.php';
require '../src/Domain/Shared/ValueObject/ErrorDomain.php';
require '../src/Domain/Shared/ValueObject/StringValueObject.php';

require '../src/Domain/Contact/ContactEmail.php';
require '../src/Domain/Contact/ContactName.php';
require '../src/Domain/Contact/ContactLastName.php';
require '../src/Domain/Contact/ContactRepository.php';

require '../src/Application/Contact/ContactCreator.php';
require '../src/Application/Contact/ContactSearch.php';
require '../src/Application/Contact/ContactUpdater.php';
require '../src/Application/Contact/ContactRemover.php';

require '../src/Infrastructure/Environment.php';
require '../src/Infrastructure/Database.php';
require '../src/Infrastructure/Contact/MysqlContactRepository.php';

class ContactFormHandler
{
    public function handleRequest(Database $db)
    {
        $contactRepository = new MysqlContactRepository($db->getConnection());
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            switch ($_POST['_method']) {
                case 'POST':
                    $contactCreator = new ContactCreator($contactRepository);
                    $response = $contactCreator->create($_POST["name"], $_POST["lastName"], $_POST["email"]);
                    http_response_code(200);
                    echo json_encode(["success" => $response]);
                    break;

                case 'PUT':
                    $contactUpdater = new ContactUpdater($contactRepository);
                    $response = $contactUpdater->update($_POST["id"], $_POST["name"], $_POST["lastName"], $_POST["email"]);
                    http_response_code(200);
                    echo json_encode(["success" => $response]);
                    break;
                case 'REMOVE':
                    $contactRemover = new ContactRemover($contactRepository);
                    $response = $contactRemover->remove($_POST["id"]);
                    http_response_code(200);
                    echo json_encode(["success" => $response]);
                    break;
                default:
                    http_response_code(405);
                    echo "Método no permitido. Solo se aceptan solicitudes POST.";
                    break;
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $contactSearch = new ContactSearch($contactRepository);
            $response = $contactSearch->search();
            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(405);
            echo "Método no permitido. Solo se aceptan solicitudes POST.";
        }
    }
}

$env = Environment::get();
$db = new Database($env->db_host, $env->db_user, $env->db_pass, $env->db_name, $env->db_port);
try {
    $handler = new ContactFormHandler($db);
    $handler->handleRequest($db);
} catch (Exception $e) {
    http_response_code($e->getCode() ?? 500);
    echo json_encode(["error" => $e->getMessage() ?? "Error server"]);
} finally {
    $db->close();
}
