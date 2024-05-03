<?php

declare(strict_types=1);

namespace App\Controllers;

use App\DataObjects\FeedbackData;
use App\Model\Feedback;
use App\ResponseFormatter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FeedbackController
{
    public function __construct(private readonly Feedback $feedback, private readonly ResponseFormatter $responseFormatter)
    {
    }

    public function index(Request $request, Response $response): Response
    {
        $feedbacks = $this->feedback->getAll();

        return $this->responseFormatter->asJson($response, $feedbacks);
    }

    public function retrieve(Request $request, Response $response, array $args): Response
    {
        $feedback = $this->feedback->get((int) $args['id']);

        return $this->responseFormatter->asJson($response, $feedback);
    }

    public function new(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $feedback = $this->feedback->create(new FeedbackData(
            $data['id'],
            $data['text'],
            $data['rating'],
        ));

        return $this->responseFormatter->asJson($response, $feedback);
    }
}