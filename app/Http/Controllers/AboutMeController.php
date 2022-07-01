<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutMeController extends Controller
{
    public function index()
    {
        $about_me_paragraphs = DB::table('about_mes')
            ->get();
        return view('features.editaboutme', [
            'paragraphs' => $about_me_paragraphs
        ]);
    }

    public function editParagraphs(Request $request)
    {
        DB::table('about_mes')
            ->where('id', $request->id)
            ->update([
                'first_paragraph' => $request->first_paragraph,
                'second_paragraph' => $request->second_paragraph,
                'third_paragraph' => $request->third_paragraph,
                'fourth_paragraph' => $request->fourth_paragraph,
            ]);
    }
}
