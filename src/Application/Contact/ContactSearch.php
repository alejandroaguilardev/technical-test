<?php
declare (strict_types = 1);

final class ContactSearch
{
    public function __construct(private readonly ContactRepository $contactRepository)
    {}

    public function search()
    {

        $contacts = $this->contactRepository->getAllContacts();
        return $contacts;
    }
}
