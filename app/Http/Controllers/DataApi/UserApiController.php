<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserApiController extends Controller
{

    private $arrRole = ['manage', 'user', 'blocker'];

    function __construct()
    {
        $this->middleware('admin');
    }

    public function anyData(Request $request)
    {
        $data = User::select('users.*')->where('status', 0);
        $data = $data->where('role', '<>', 'admin')->get();

        // $products->user;
        return Datatables::of($data)
            ->addColumn('action', function ($dt) {
                return '
			<button type="button" class="btn btn-xs btn-primary" onclick="getAuthen(`http://crm.htauto.vn/report/user/' . $dt['authentication'] . '`)" href="#add-modal"><i class="fa fa-eye" aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getInfo(' . $dt['id'] . ')" href="#add-modal"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-danger" onclick="alDelete(' . $dt['id'] . ')"><i class="fa fa-trash" aria-hidden="true"></i></button>
			';

            })
            ->editColumn('role', function ($dt) {
                $html = '<select class="form-control" id="role_' . $dt['id'] . '" onchange="changeStatus(' . $dt['id'] . ')">';
                foreach ($this->arrRole as $role) {
                    if ($dt['role'] == $role) {
                        $html .= '<option value="' . $role . '" selected>' . $role . '</option>';
                    } else {

                        $html .= '<option value="' . $role . '">' . $role . '</option>';
                    }
                }

                $html .= '</select>';
                return $html;

            })
            ->editColumn('birth_day', function ($dt) {
                return Carbon::parse($dt['birth_day'])->format('d/m/Y');
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'birth_day', 'role'])
            ->make(true);
    }

    public function status(Request $request, $id)
    {
        if (!in_array($request->role, $this->arrRole)) {
            return response()
                ->json([
                    'code' => 400,
                    'message' => 'Cấp quyền không hợp lệ!'
                ], 400);
        }
        $data = User::find($id)->update(array('role' => $request->role));
        return $data;
    }
}
