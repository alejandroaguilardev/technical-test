<?php
declare (strict_types = 1);

final class ContactCreator
{
    public function __construct(private readonly ContactRepository $contactRepository)
    {}

    public function create(string $name, string $lastName, string $email): string
    {

        $contactId = $this->contactRepository->createContact(
            new ContactName($name),
            new ContactLastName($lastName),
            new ContactEmail($email)
        );

        return "Contacto creado con éxito. ID: $contactId";
    }
}
