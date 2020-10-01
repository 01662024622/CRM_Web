<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{
    function __construct(UserService $userService)
    {
        $this->middleware('auth.api');
//        parent::__construct($userService, array('active' => '', 'group' => ''));
    }

    public function profile()
    {
        $apartment = Apartment::find(Auth::user()->apartment_id);
        if ($apartment) {
            $apartment = $apartment->name;
        } else $apartment = '';
        return view('users.profile', ['group' => '', 'active' => '', 'apartment' => $apartment]);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->only(['skype', 'email_htauto', 'phone', 'birth_day']);
        if ($request->hasFile('avata')) {
            $name = time() . "-" . Auth::id() . "-" . $request->image_2->getClientOriginalExtension();
            $request->avata->storeAs('/', $name, 'public');
            $data['avata'] = $name;
        }
        $data['birth_day'] = Carbon::createFromFormat('d/m/Y', $data['birth_day'])->format('Y/m/d');
        return User::find(Auth::id())->update($data);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->only(['old_passowrd', 'new_passowrd', 'ver_passowrd']);
        if (Auth::user()->getAuthPassword() == Hash::make($data['old_password'])) {
            User::find(Auth::id())->update(['password' => Hash::make($request->new_password)]);
            return response()->json([
                'code' => 500,
                'message' => 'Thàng công!'
            ], 500);
        }
        return response()
            ->json([
                'code' => 400,
                'message' => $request->old_password
            ], 400);
    }

    public function password()
    {
        return view('users.password', ['group' => '', 'active' => '']);
    }
}
