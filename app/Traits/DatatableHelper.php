<?php

namespace App\Traits;

use App\Http\BaseModel;
use Illuminate\Http\Request;

trait DatatableHelper
{
    protected function buildDatatable(Request $request, BaseModel $model, $with = '', $continue = false)
    {
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');

        $query = $model::dataTableQuery($column, $orderBy, $searchValue);

        if (!empty($with)) {
            $query = $query->withCount($with)->with($with);
        }

        if ($continue) {
            return $query;
        }

        return $query->paginate($length);
    }
}
