<?php

declare(strict_types=1);

namespace ac2\www\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

final class SessionMiddleware
{
    public function __invoke(Request $request, RequestHandler $next): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $response = $next->handle($request);
        session_write_close();
        return $response;
    }
}