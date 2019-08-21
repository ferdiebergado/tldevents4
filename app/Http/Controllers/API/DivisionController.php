<?php

namespace App\Http\Controllers\API;

use App\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Traits\DatatableHelper;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class DivisionController extends Controller
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
            'length' => 'required|integer', Rule::in(config('custom.perpage')),
        ]);
        $data = $this->buildDatatable($request, new Division, null, true);
        if ($request->filled('region')) {
            $data = $data->where('region_id', $request->input('region'))->orderBy('name');
            $data = $data->paginate($request->input('length'));
        }
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
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        //
    }
}
