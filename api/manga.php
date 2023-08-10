<?php
class Manga
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllMangas()
    {
        $stmt = $this->conn->prepare("SELECT * FROM catalogo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMangaById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM catalogo WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addManga($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO catalogo (title, author, description, publish, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$data['title'], $data['author'], $data['description'], $data['publish'], $data['image']]);
        return $this->conn->lastInsertId();
    }

    public function updateManga($data)
    {
        $stmt = $this->conn->prepare("UPDATE catalogo SET title=?, author=?, description=?, publish=?, image=? WHERE id=?");
        $stmt->execute([$data['title'], $data['author'], $data['description'], $data['publish'], $data['image'], $data['id']]);
        return true;
    }

    public function deleteManga($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM catalogo WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    }
}
