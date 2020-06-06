<?php

class Bukutamu_model
{
    private $table = 'contohaja';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTamu()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet(); // dikembalikan dalam bentuk arr asosiatif
    }

    public function getTamuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataTamu($data)
    {
        $query = "INSERT INTO $this->table VALUES ('', :nama, :email,:pesan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pesan', $data['pesan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataTamu($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editDataTamu($data)
    {
        $query = "UPDATE $this->table SET nama = :nama, email = :email, pesan = :pesan WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pesan', $data['pesan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataTamu()
    {
        $key = $_POST['keyword'];
        $query = "SELECT * FROM $this->table WHERE nama LIKE :key";
        $this->db->query($query);
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
