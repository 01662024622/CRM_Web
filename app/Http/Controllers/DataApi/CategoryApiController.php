<?php

namespace App\Http\Controllers\DataApi;

use App\Apartment;
use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryApiController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }
    public function anyData(Request $request)
    {

        $data = Category::select('categories.*')->where('status', 0);

        // $products->user;
        return Datatables::of($data)
            ->addColumn('action', function ($dt) {
                return '<button type="button" class="btn btn-xs btn-warning"data-toggle="modal"
			onclick="getInfo(' . $dt['id'] . ')" href="#add-modal"><i class="fas fa-pencil-alt"
			aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-primary"data-toggle="modal"
			onclick="setRole(' . $dt['id'] . ')" href="#configuration"><i class="fas fa-cog"
			aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-danger" onclick="alDelete(' . $dt['id'] . ')">
			<i class="fa fa-trash" aria-hidden="true"></i></button>

			';
            })
            ->editColumn('parent_id', function ($dt) {
                $user = Category::find($dt['parent_id']);
                if ($user) {
                    return $user->name;
                } else return "Main Category";
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action'])
            ->make(true);
    }
}
