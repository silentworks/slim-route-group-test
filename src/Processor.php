<?php

namespace RouteGroupTest;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Processor
{
    private $entitiesFactory;
    
    public function __construct($factory)
    {
        $this->entitiesFactory = $factory;
    }

    public function search(ServerRequestInterface $request, ResponseInterface $response)
    {
        $class = $request->getAttribute('entity');
        $instance = $this->entitiesFactory->createEntities($class);
        $entities = $instance->getEntities();
        $response->getBody()->write(json_encode(['data' => $entities]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function getById(ServerRequestInterface $request, ResponseInterface $response)
    {
        $class = $request->getAttribute('entity');
        $instance = $this->entitiesFactory->createEntities($class);
        $response->getBody()->write(json_encode([
            'data' => $instance->getEntityById($request->getAttribute('id'))
        ]));
        return $response->withHeader('Content-Type', 'application/json');
    }
}