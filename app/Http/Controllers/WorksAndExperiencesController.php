<?php

namespace App\Http\Controllers;

use App\Models\WorksAndExperiences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorksAndExperiencesController extends Controller
{
    public function index()
    {
        $experiences = DB::table('works_and_experiences')
            ->get();
        return view('features.worksandexperiences', [
            'experiences' => $experiences
        ]);
    }

    public function addWorksAndExperiences(Request $request)
    {
        WorksAndExperiences::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    public function deleteWorksAndExperiences(Request $request)
    {
        DB::table("works_and_experiences")
            ->where('id', $request->id)
            ->delete();
    }
}
