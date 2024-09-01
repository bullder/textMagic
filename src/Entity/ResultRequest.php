<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\Request;

readonly class ResultRequest
{
    public function __construct(
        public int $testId,
        public array $choices,
    ) {
    }

    public static function fromRequest(string $testId, Request $request): self
    {
        return new self($testId, $request->request->all());
    }
}
