<?php
declare (strict_types = 1);

final class ContactUpdater
{
    public function __construct(private readonly ContactRepository $contactRepository)
    {}

    public function update(int $id, string $name, string $lastName, string $email): string
    {

        $contactId = $this->contactRepository->updateContact(
            $id,
            new ContactName($name),
            new ContactLastName($lastName),
            new ContactEmail($email)
        );

        return "Contacto actualizado con éxito. ID: $contactId";
    }
}
