<?php

require_once __DIR__ . '/../lib/database.php';


// Cette classe est utilisée pour stocker et manipuler les tâches avant de les enregistrer en base de données ou de les afficher sur l'interface utilisateur.
class Task
{
    private int $id;
    private string $title;
    private string $description;
    private string $status;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = htmlspecialchars($title);
    }

    public function setDescription(string $description): void
    {
        $this->description = htmlspecialchars($description);
    }

    public function setStatus(string $status): void
    {
        $this->status = htmlspecialchars($status);
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}