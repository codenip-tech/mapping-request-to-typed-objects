<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

readonly class CreateUserRequest
{
    public function __construct(
        #[Assert\NotBlank]
        public string $name,
        #[Assert\Email]
        public string $email,
    ) {
    }
}
