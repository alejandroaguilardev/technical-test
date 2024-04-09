<?php
declare (strict_types = 1);

interface ContactRepository
{
    public function getAllContacts();
    public function createContact(ContactName $name, ContactLastName $lastName, ContactEmail $email);
    public function updateContact(int $id, ContactName $name, ContactLastName $lastName, ContactEmail $email);
    public function deleteContact(int $id);
}
