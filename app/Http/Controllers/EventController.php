<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->flash('page_task', self::INDEX);
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Event;
        $action = self::STORE;
        session()->flash('page_task', 'Create Event');
        return view('event.partial', compact('model', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:5|max:255',
            'venue' => 'string|min:5|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        Event::firstOrCreate($request->only([
            'title',
            'venue',
            'start_date',
            'end_date'
        ]));

        session()->flash('message', __('messages.success'));

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    // public function show(Event $event)
    // {
    //     $model = $event;
    //     $action = self::SHOW;
    //     session()->flash('page_task', self::SHOW);
    //     session()->flash('page_title', $event->title);
    //     return view('event.partial', compact('model', 'action'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $model = $event;
        $action = self::UPDATE;
        session()->flash('page_task', self::EDIT);
        session()->flash('page_title', $model->title);
        return view('event.partial', compact('model', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => 'required|string|min:5|max:255',
            'venue' => 'string|min:5|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $event->update($request->only([
            'title',
            'venue',
            'start_date',
            'end_date'
        ]));

        session()->flash('message', __('messages.success'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
