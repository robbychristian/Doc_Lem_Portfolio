<?php

namespace App\Http\Controllers;

use App\Models\WorksAndExperiences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function editWorksAndExperiences(Request $request)
    {
        DB::table('works_and_experiences')
            ->where('id', $request->id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);
    }
}
