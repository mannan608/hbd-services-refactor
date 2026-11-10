<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\Interfaces\EventRepositoryInterface;

class EventRepository implements EventRepositoryInterface
{
    public function all()
    {
        return Event::latest()->get();
    }

    public function paginate(int $limit = 10)
    {
        return Event::latest()->paginate($limit);
    }

    public function create(array $data): Event
    {
        $event = Event::create($data);

        $event->registration_link = route('events.register', $event);
        $event->save();

        return $event->refresh();
    }

    public function update(Event $event, array $data): Event
    {
        $event->update($data);

        $event->registration_link = route('events.register', $event);
        $event->save();

        return $event->refresh();
    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }
}
