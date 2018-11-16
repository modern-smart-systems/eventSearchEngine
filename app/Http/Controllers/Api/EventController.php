<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Event\Filters\EventFilter;
use App\Event\Paginate\Paginate;
use App\Event\Transformers\EventTransformer;
use Eventbrite;

class EventController extends ApiController
{
    /**
     * EventController constructor.
     *
     * @param EventTransformer $transformer
     */
    public function __construct(EventTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Get all the events.
     *
     * @param EventFilter $filter
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(EventFilter $filter)
    {
        $events = new Paginate(Event::query()->filter($filter));

        return $this->respondWithPagination($events);
    }

    /**
     * Get the event.
     *
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function show(Event $event)
    {
        return $this->respondWithTransformer($event);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function test()
    {
        return response()->json(Eventbrite::category()->all());
    }
}
