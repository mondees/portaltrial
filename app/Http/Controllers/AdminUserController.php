<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class AdminUserController extends Controller
{
	public function index()
	{
		if (!Auth::user()->can(['admin-view'])) return view('errors.403');

		return view('admin.user.index');
	}

	public function dashboard(Request $request)
	{
		$data = DB::table('users')
			->get();

		return Datatables::of($data)
			->addColumn('role', function ($data) {
				return DB::table(DB::raw("role_user ru"))
					->join(DB::raw("roles r"), 'r.id', 'ru.role_id')
					->where('ru.user_id', $data->id)
					->pluck('r.name')
					->toArray();
			})
			->editColumn('status_active', function ($data) {
				return $data->status_active == 'T';
			})
			->make(true);
	}
}
