<?php

namespace App\Http\Controllers\DataApi;

use App\Apartment;
use App\Feedback;
use App\FeedbackPR;
use App\FeedbackWarehouse;
use App\Http\Controllers\Controller;
use App\Review360;
use Carbon\Carbon;
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
        $data = Review360::select(DB::raw("review_360.id, review_360.note, apartments.name as apartment, review_360.option, users.name,GROUP_CONCAT(CONCAT('- ', improve_360.content) SEPARATOR '<br>') as content"))
            ->join('review_improve_360', 'review_360.id', '=', 'review_improve_360.review_360_id')
            ->join('improve_360', 'improve_360.id', '=', 'review_improve_360.improve_360_id')
            ->leftJoin('users', 'users.id', '=', 'review_360.user_id')
            ->join('apartments', 'review_360.apartment_id', '=', 'apartments.id')
            ->orderBy('review_360.updated_at', 'desc')
            ->groupBy("review_360.id", "review_360.note", "option", "name", "apartments.name")
            ->where('review_360.create_by', Auth::id());

        // $products->user;
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', function ($dt) {
                if ($dt['name'] == null) {
                    return "Feedback Phòng ban";
                } else {
                    return $dt['name'];
                }
            })
            ->setRowId('data-{{$id}}')
            ->rawColumns(['content'])
            ->make(true);
    }

    public function feedbackMeData()
    {
        $data = Review360::select(DB::raw("review_360.id, review_360.note, review_360.option, GROUP_CONCAT(CONCAT('- ', improve_360.content) SEPARATOR '<br>') as content"))
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
            ->rawColumns(['action', 'content'])
            ->make(true);
    }

    public function feedbackApartmentData()
    {
        $apartment = Apartment::where('user_id', Auth::id())->where('status', 0)->get();
        if (sizeof($apartment) < 1) return null;

        $data = Review360::select(DB::raw("review_360.id, review_360.apartment_id, review_360.note,users.name as name, review_360.option, GROUP_CONCAT(CONCAT('- ', improve_360.content) SEPARATOR '<br>') as content"))
            ->join('review_improve_360', 'review_360.id', '=', 'review_improve_360.review_360_id')
            ->join('improve_360', 'improve_360.id', '=', 'review_improve_360.improve_360_id')
            ->join('apartments', 'review_360.apartment_id', '=', 'apartments.id')
            ->leftJoin('users', 'users.id', '=', 'review_360.user_id')
            ->orderBy('review_360.updated_at', 'desc')
            ->groupBy("review_360.id", "review_360.note", "option", "apartment_id", "name")
            ->where("apartments.user_id", Auth::id());

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
            ->editColumn('name', function ($dt) {
                if ($dt['name'] == null) {
                    return "Feedback Phòng ban";
                } else {
                    return $dt['name'];
                }
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'apartment_id', 'content'])
            ->make(true);
    }

    public function feedbackWarehouseData()
    {
        $data = FeedbackWarehouse::select(DB::raw("feedback_warehouse.id,feedback_warehouse.amount,feedback_warehouse.code_product,feedback_warehouse.type,GROUP_CONCAT(CONCAT('- ', improve_360.content) SEPARATOR '<br>') as content"))
            ->leftjoin('feedback_warehouse_improve', 'feedback_warehouse.id', '=', 'feedback_warehouse_improve.feedback_warehouse_id')
            ->leftjoin('improve_360', 'improve_360.id', '=', 'feedback_warehouse_improve.improve_360_id')
            ->leftjoin('users', 'users.id', '=', 'feedback_warehouse.user_id')
            ->orderBy('feedback_warehouse.updated_at', 'desc')
            ->groupBy("feedback_warehouse.id", "feedback_warehouse.code_product", "feedback_warehouse.amount", "feedback_warehouse.type", "feedback_warehouse.created_at")
            ->where("feedback_warehouse.user_id", Auth::id());

        return Datatables::of($data)
            ->editColumn('type', function ($dt) {
                if ($dt['type'] == 'CC') {
                    return "Chạy cửa";
                } elseif ($dt['type'] == 'BT') {
                    return "Bỏ toa";
                } elseif ($dt['type'] == 'SKU') {
                    return "SKU";
                } else {
                    return "Chất lượng";
                }
            })
            ->editColumn('created_at', function ($dt) {
                return Carbon::parse($dt['created_at'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'apartment_id', 'content'])
            ->make(true);
    }

    public function feedbackWarehouseDataManager()
    {
        $apartment_user = Apartment::select('id')->where('status', 0)->where('user_id', \Auth::id())->get()->pluck('id')->toArray();
        if (!(in_array(20, $apartment_user, true) || Auth::user()->role != "user")) return null;
        $data = FeedbackWarehouse::select(DB::raw("feedback_warehouse.id,feedback_warehouse.amount,feedback_warehouse.code_product,feedback_warehouse.type,feedback_warehouse.created_at,GROUP_CONCAT(CONCAT('- ', improve_360.content) SEPARATOR '<br>') as content"))
            ->leftjoin('feedback_warehouse_improve', 'feedback_warehouse.id', '=', 'feedback_warehouse_improve.feedback_warehouse_id')
            ->leftjoin('improve_360', 'improve_360.id', '=', 'feedback_warehouse_improve.improve_360_id')
            ->leftjoin('users', 'users.id', '=', 'feedback_warehouse.user_id')
            ->orderBy('feedback_warehouse.updated_at', 'desc')
            ->groupBy("id", "amount", "type", "code_product", "feedback_warehouse.created_at");

        return Datatables::of($data)
            ->editColumn('type', function ($dt) {
                if ($dt['type'] == 'CC') {
                    return "Chạy cửa";
                } elseif ($dt['type'] == 'BT') {
                    return "Bỏ toa";
                } elseif ($dt['type'] == 'SKU') {
                    return "SKU";
                } else {
                    return "Chất lượng";
                }
            })
            ->editColumn('created_at', function ($dt) {
                return Carbon::parse($dt['created_at'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'apartment_id', 'content'])
            ->make(true);
    }

    public function feedbackPRData()
    {
        $data = FeedbackPR::where("user_id", Auth::id())->orderBy('updated_at', 'desc')->get();

        return Datatables::of($data)
            ->editColumn('created_at', function ($dt) {
                return Carbon::parse($dt['created_at'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->make(true);
    }

    public function feedbackPRDataManager()
    {
        $data = FeedbackPR::orderBy('updated_at', 'desc')->get();

        return Datatables::of($data)
            ->editColumn('created_at', function ($dt) {
                return Carbon::parse($dt['created_at'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->make(true);
    }

    public function feedbackCustomerData()
    {
        $data = Feedback::where("user_id", Auth::id())->orderBy('updated_at', 'desc')->get();

        return Datatables::of($data)
            ->editColumn('created_at', function ($dt) {
                return Carbon::parse($dt['created_at'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->make(true);
    }

    public function feedbackCustomerDataManager()
    {
        $data = Feedback::select("feedbacks.*", "users.name")
            ->join("users", "feedbacks.user_id", "=", "users.id")
            ->orderBy('updated_at', 'desc')->get();

        return Datatables::of($data)
            ->editColumn('created_at', function ($dt) {
                return Carbon::parse($dt['created_at'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->make(true);
    }

}
