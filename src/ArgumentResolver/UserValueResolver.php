<?php

namespace App\ArgumentResolver;

use App\DTO\Request\CreateUserRequest;
use App\DTO\Request\RequestInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserValueResolver implements ValueResolverInterface
{
    public function __construct(
        private readonly ValidatorInterface $validator
    )
    {
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable 
    {
        // get the argument type (e.g. BookingId)
        $argumentType = $argument->getType();
        if (
            !$argumentType
            || !is_subclass_of($argumentType, RequestInterface::class, true)
        ) {
            return [];
        }

        $dto = new $argumentType($request);

        $errors = $this->validator->validate($dto);

        if (count($errors) > 0) {
            throw new BadRequestHttpException((string) $errors);
        }

        return [$dto];
    }
}
