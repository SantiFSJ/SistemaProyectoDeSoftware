<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AllowAll implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Lógica para permitir todas las solicitudes antes de que lleguen al controlador
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Lógica después de que la respuesta se ha generado
        return $response;
    }
}
