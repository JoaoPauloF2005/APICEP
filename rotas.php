<?php

use ApiCep\Controller\EnderecoController;

$url = parse_url($_SERVE['REQUEST_URI'], PHP_URL_PATH);

switch ($url)
{
    /**
     * [OK] Exemplo de Acesso:
     */
    case '/endereco/by-cep':
        EnderecoController::getLogradouroByCep();
    break;
}