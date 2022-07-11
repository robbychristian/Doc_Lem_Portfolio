<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::table('projects')
            ->get();
        return view('features.projects', [
            'projects' => $projects
        ]);
    }

    public function welcomeProjects()
    {
        $projects = DB::table('projects')
            ->get();
        return view('viewproject', [
            'projects' => $projects
        ]);
    }

    public function addProject(Request $request)
    {
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images', $file_name, 'public');


            Projects::create([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $file_name
            ]);
        }
    }

    public function deleteProject(Request $request)
    {
        DB::table('projects')
            ->where('id', $request->id)
            ->delete();
    }

    public function editProject(Request $request)
    {
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images', $file_name, 'public');

            DB::table('projects')
                ->where('id', $request->id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image_url' => $file_name,
                    'updated_at' => Carbon::now()
                ]);
        }
    }
}
