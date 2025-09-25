<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserApprovalController extends Controller
{
    public function index()
    {
        $estudiantes = DB::table('usuarios_pendientes')->get();
        return view('admin.user-approval', compact('estudiantes'));
    }
}