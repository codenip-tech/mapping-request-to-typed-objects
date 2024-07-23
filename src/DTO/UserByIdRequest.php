<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

readonly class UserByIdRequest
{
    public function __construct(
        #[Assert\Type('bool')]
        public bool $active,
    )
    {
    }
}
