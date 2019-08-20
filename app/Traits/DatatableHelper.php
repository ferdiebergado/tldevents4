<?php

namespace App\Traits;

use App\Http\BaseModel;
use Illuminate\Http\Request;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

trait DatatableHelper
{
    protected function buildDatatable(Request $request, BaseModel $model)
    {
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');

        $query = $model::dataTableQuery($column, $orderBy, $searchValue);
        return $query->paginate($length);
    }
}
