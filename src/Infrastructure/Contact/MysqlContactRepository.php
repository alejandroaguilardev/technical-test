<?php
declare (strict_types = 1);

final class MysqlContactRepository implements ContactRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllContacts()
    {
        $contacts = array();
        $query = $this->db->query("SELECT * FROM contacts");
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }

    public function createContact(ContactName $name, ContactLastName $lastName, ContactEmail $email)
    {
        $query = $this->db->prepare("INSERT INTO contacts (name, lastName, email ) VALUES (:name, :lastName, :email)");
        $query->execute(array(':name' => $name->value(), ':lastName' => $lastName->value(), ':email' => $email->value()));
        return $this->db->lastInsertId();
    }

    public function updateContact(int $id, ContactName $name, ContactLastName $lastName, ContactEmail $email)
    {
        $query = $this->db->prepare("UPDATE contacts SET name = :name, lastName = :lastName, email = :email WHERE id = :id");
        $query->execute(array(':id' => $id, ':name' => $name->value(), ':lastName' => $lastName->value(), ':email' => $email->value()));
        return true;
    }

    public function deleteContact($id)
    {
        $query = $this->db->prepare("DELETE FROM contacts WHERE id = :id");
        $query->execute(array(':id' => $id));
        return true;
    }
}
