<?php

namespace App\DTO\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

readonly class CreateUserRequest implements RequestInterface
{
    #[Assert\NotBlank]
    public string $name;
    #[Assert\Email]
    public string $email;

    public function __construct(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $this->name = $data['name'];
        $this->email = $data['email'];
    }
}
