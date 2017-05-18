<?php

namespace RouteGroupTest;

class MyEntitiesFactory
{
    public function createEntities($class)
    {
        return new $class();
    }
}