<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $allAdmin = DB::table('users')
            ->where('id', '>=', 2)
            ->get();
        return view('features.admins', [
            'admins' => $allAdmin
        ]);
    }

    public function addAdmin(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function editAdmin(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password' => Hash::make($request->password)
            ]);
    }

    public function deleteAdmin(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->delete();
    }
}
