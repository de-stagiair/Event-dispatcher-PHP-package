<?php

declare(strict_types=1);

namespace Stagiair\EventDispatcher;

class Event
{
    public function __construct(private array $listeners = [])
    {

    }

    public function attachListenerToEvent(ListenerInterface $listener): Event
    {
        $this->listeners[] = $listener;
        return $this;
    }

    public function trigger(array $data): void
    {
        foreach ($this->listeners as $listener) {
            $listener->trigger($data);
        }
    }
}