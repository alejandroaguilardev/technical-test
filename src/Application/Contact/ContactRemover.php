<?php
declare (strict_types = 1);

final class ContactRemover
{
    public function __construct(private readonly ContactRepository $contactRepository)
    {}

    public function remove(int $id): string
    {

        $contactId = $this->contactRepository->deleteContact($id);

        return "Contacto Eliminado con éxito. ID: $contactId";

    }
}
