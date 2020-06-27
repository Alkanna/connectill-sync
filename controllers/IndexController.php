<?php

use Laminas\Diactoros\Response;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexController
{
    protected $templateRenderer;

    public function __construct(Engine $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
        $this->templateRenderer->setDirectory('../templates');
        $this->templateRenderer->setFileExtension('tpl');
    }

    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $body = $this->templateRenderer->render('pages/index');
        $response = new Response;

        $response->getBody()->write($body);
        return $response->withStatus(200);
    }
}