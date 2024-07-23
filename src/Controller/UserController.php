<?php

namespace App\Controller;

use App\DTO\Request\CreateUserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('users')]
class UserController extends AbstractController
{
    #[Route(
        '/{id}',
        name: 'create_user',
        methods: ['GET']
    )]
    public function getUserById(string $id): Response
    {
        return $this->json(['id' => $id]);
    }

    #[Route(
        '',
        name: 'create_user',
        methods: ['POST']
    )]
    public function createUser(CreateUserRequest $request): Response
    {
        return $this->json([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }
}
