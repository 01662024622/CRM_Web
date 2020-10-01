<?php

namespace App\Http\Controllers\DataApi;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Review360;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReportApiController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function reviewData()
    {
        $data = Review360::select(DB::raw("review_360.id, review_360.note, apartments.name as apartment, review_360.option, users.name, GROUP_CONCAT(improve_360.content) as content"))
            ->join('review_improve_360', 'review_360.id', '=', 'review_improve_360.review_360_id')
            ->join('improve_360', 'improve_360.id', '=', 'review_improve_360.improve_360_id')
            ->join('users', 'users.id', '=', 'review_360.user_id')
            ->join('apartments', 'review_360.apartment_id', '=', 'apartments.id')
            ->orderBy('review_360.updated_at', 'desc')
            ->groupBy("review_360.id", "review_360.note", "option", "name", "apartments.name")
            ->where('review_360.create_by', Auth::id());

        // $products->user;
        return Datatables::of($data)
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->make(true);
    }

    public function feedbackMeData()
    {
        $data = Review360::select(DB::raw("review_360.id, review_360.note, review_360.option, GROUP_CONCAT(improve_360.content) as content"))
            ->join('review_improve_360', 'review_360.id', '=', 'review_improve_360.review_360_id')
            ->join('improve_360', 'improve_360.id', '=', 'review_improve_360.improve_360_id')
            ->orderBy('review_360.updated_at', 'desc')
            ->groupBy("review_360.id", "review_360.note", "option")
            ->where('review_360.user_id', Auth::id());
        // $products->user;
        return Datatables::of($data)
            ->addColumn('action', function ($dt) {
                if ($dt['option'] == "" || is_null($dt['option'])) {
                    return '<button type="button" class="btn btn-xs btn-warning"data-toggle="modal"
                    onclick="getInfo(' . $dt['id'] . ')" href="#add-modal">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i></button>';
                } else {
                    return '<button type="button" class="btn btn-xs btn-warning" disabled>
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i></button>';
                }
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action'])
            ->make(true);
    }

    public function feedbackApartmentData()
    {
        $apartment = Apartment::where('user_id', Auth::id())->where('status', 0)->get();
        if (sizeof($apartment) < 1) return null;

        $data = Review360::select(DB::raw("review_360.id, review_360.apartment_id, review_360.note, review_360.option, GROUP_CONCAT(improve_360.content) as content"))
            ->join('review_improve_360', 'review_360.id', '=', 'review_improve_360.review_360_id')
            ->join('improve_360', 'improve_360.id', '=', 'review_improve_360.improve_360_id')
            ->orderBy('review_360.updated_at', 'desc')
            ->groupBy("review_360.id", "review_360.note", "option", "apartment_id")
            ->where('review_360.user_id', 0);
        $arr = [];
        foreach ($apartment as $item) {
            array_push($arr, $item->id);
        }
        $data->whereIn('review_360.apartment_id', $arr);
        // $products->user;
        return Datatables::of($data)
            ->addColumn('action', function ($dt) {
                if ($dt['option'] == "" || is_null($dt['option'])) {
                    return '<button type="button" class="btn btn-xs btn-warning"data-toggle="modal"
                    onclick="getInfo(' . $dt['id'] . ')" href="#add-modal">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i></button>';
                } else {
                    return '<button type="button" class="btn btn-xs btn-warning" disabled>
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i></button>';
                }
            })
            ->editColumn('apartment_id', function ($dt) {
                return Apartment::find($dt['apartment_id'])->name;
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'apartment_id'])
            ->make(true);
    }

}
