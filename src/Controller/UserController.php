<?php

namespace App\Controller;

use App\DTO\CreateUserRequest;
use App\DTO\UserByIdRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('users')]
class UserController extends AbstractController
{
    #[Route(
        '',
        name: 'create_user',
        methods: ['POST']
    )]
    public function create(#[MapRequestPayload] CreateUserRequest $request): Response
    {
        return $this->json([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    #[Route(
        '/{id}',
        name: 'get_user_by_id',
        methods: ['GET']
    )]
    public function getUserById(
        string $id,
        #[MapQueryString] UserByIdRequest $request
        ): Response
    {
        return $this->json([
            'id' => $id,
            'active' => $request->active ? 'active' : 'not active',
        ]);
    }
}
