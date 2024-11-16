<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $events = Event::all();
        return response()->json($events, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string|max:255',
            'published' => 'required|boolean',
        ]);

        $event = Event::create($validated);

        return response()->json([
            'message' => 'Event created successfully.',
            'data' => $event,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Event  $event
     * @return JsonResponse
     */
    public function show(Event $event): JsonResponse
    {
        return response()->json($event, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Event  $event
     * @return JsonResponse
     */
    public function update(Request $request, Event $event): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'image' => 'sometimes|string|max:255',
            'published' => 'sometimes|boolean',
        ]);

        $event->update($validated);

        return response()->json([
            'message' => 'Event updated successfully.',
            'data' => $event,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Event  $event
     * @return JsonResponse
     */
    public function destroy(Event $event): JsonResponse
    {
        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully.',
        ], 200);
    }
}
