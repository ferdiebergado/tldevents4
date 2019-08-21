<?php

namespace App\Http\Controllers\API;

use App\Event;
use Illuminate\Http\Request;
use App\Traits\DatatableHelper;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class EventController extends Controller
{
    use DatatableHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'length' => 'required|integer', Rule::in([10, 25, 50, 100]),
        ]);
        $data = $this->buildDatatable($request, new Event, 'participants');
        return new DataTableCollectionResource($data);
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
