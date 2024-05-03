<?php

declare(strict_types=1);

namespace App\Model;

use App\DataObjects\FeedbackData;
use PDO;

class Feedback
{
    public function __construct(private readonly \PDO $pdo)
    {
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM feedback');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function get(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM feedback WHERE id = :id');

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }

    public function create(FeedbackData $data): bool
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO feedback (id, text, rating)

            VALUES (:id, :text, :rating);
        ');

        $stmt->bindValue(':id', $data->id, PDO::PARAM_INT);
        $stmt->bindValue(':id', $data->text, PDO::PARAM_STR);
        $stmt->bindValue(':id', $data->rating, PDO::PARAM_INT);

        return $stmt->execute();
    }
}