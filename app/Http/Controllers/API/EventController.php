<?php

namespace App\Http\Controllers\API;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventCollection;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');

        $query = Event::dataTableQuery($column, $orderBy, $searchValue);
        $data = $query->paginate($length);

        return new DataTableCollectionResource($data);
        // $request = app()->make('request');
        // $this->validate($request, [
        //     'per_page' => 'required|integer', Rule::in([10, 25, 50, 100]),
        //     // 'sort_field' => Rule::in([])
        // ]);
        // $event = Event::query();
        // if ($request->filled('search')) {
        //     $event->where('title', 'like', "%$request->search%")->orWhere('venue', 'like', "%$request->search%");
        // }
        // if ($request->filled('sort_field')) {
        //     $event->orderBy($request->sort_field, $request->sort_dir);
        // }
        // return new EventCollection($event->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
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
        //
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
