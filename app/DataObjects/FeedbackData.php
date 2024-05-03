<?php

declare(strict_types=1);

namespace App\DataObjects;

class FeedbackData
{
    public function __construct(
        public readonly int $id,
        public readonly string $text,
        public readonly int $rating
    )
    {   
    }
}