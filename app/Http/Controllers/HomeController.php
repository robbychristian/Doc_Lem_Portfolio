<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailSent;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Visitors;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emails = EmailSent::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw("MONTH(created_at) as month"))
            ->where('created_at', ">", Carbon::today()->subMonth())
            ->groupBy('month_name', 'month')
            ->orderBy('month')
            ->get();

        $visitors = Visitors::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"), \DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '>', Carbon::today()->subMonth())
            ->groupBy('month_name', 'month')
            ->orderBy('month')
            ->get();

        $email_data = [];
        $visitors_data = [];

        foreach ($emails as $email) {
            $email_data['label'][] = $email->month_name;
            $email_data['data'][] = (int) $email->count;
        }

        foreach ($visitors as $visitor) {
            $visitors_data['label'][] = $visitor->month_name;
            $visitors_data['data'][] = (int) $visitor->count;
        }

        $email_data['chart_data'] = json_encode($email_data);
        // dd($email_data);
        // dd($visitors_data);
        return view('home', [
            'email_data' => $email_data,
            'visitors_data' => $visitors_data
        ]);
    }
}
