<?php

namespace App\Http\Controllers;

use App\Services\CmsService;
use App\Services\EventService;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct(
        protected EventService $eventService
    ) {}

    public function index(): View
    {
        try {
            $events = $this->eventService->getAllEvents();
            if ($events->isEmpty()) {
                $events = collect(CmsService::getEvents());
            }
        } catch (\Throwable $e) {
            $events = collect(CmsService::getEvents());
        }

        try {
            $featuredEvents = $this->eventService->getFeaturedEvents();
            if ($featuredEvents->isEmpty()) {
                $featuredEvents = collect(CmsService::getFeaturedEvents());
            }
        } catch (\Throwable $e) {
            $featuredEvents = collect(CmsService::getFeaturedEvents());
        }

        $recurringPrograms = CmsService::getRecurringPrograms();

        return view('pages.events', compact('events', 'featuredEvents', 'recurringPrograms'));
    }
}
