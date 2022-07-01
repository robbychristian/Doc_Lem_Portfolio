<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailSent;
use Carbon\Carbon;

class EmailController extends Controller
{
    public function addEmailSent(Request $request)
    {
        EmailSent::create([
            'email' => $request->email
        ]);
    }
}
