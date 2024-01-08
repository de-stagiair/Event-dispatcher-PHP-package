<?php

namespace Stagiair\EventDispatcher;

use Exception;

class EventDispatcher implements EventDispatcherInterface
{
    public function __construct( private array $events = [])
    {
    }

    /**
     * @throws Exception
     */
    public function addEvent(string $name, Event $event): EventDispatcher
    {
        if (isset($this->events[$name]))
        {
            throw new \RuntimeException("Event '$name' already exists.");
        }
        $this->events[$name] = $event;
        return $this;
    }

    public function dispatch(string $name, array $data): void
    {
        foreach ($this->events as $key => $event)
        {
            if ($key === $name)
            {
                $event->trigger($data);
            }
        }
    }
}