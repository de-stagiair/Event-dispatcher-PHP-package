<?php

namespace Stagiair\EventDispatcher;

interface ListenerInterface
{
    public function trigger(array $data): void;
}