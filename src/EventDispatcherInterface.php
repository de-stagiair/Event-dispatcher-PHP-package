<?php

namespace Stagiair\EventDispatcher;

interface EventDispatcherInterface
{
    public function dispatch(string $name, array $data): void;
}