<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Certifications;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = DB::table('certifications')
            ->get();
        return view('features.certifications', [
            'certifications' => $certifications
        ]);
    }

    public function addCertification(Request $request)
    {
        Certifications::create([
            'title' => $request->title,
            'description' => $request->description
        ]);
    }

    public function deleteCertification(Request $request)
    {
        DB::table("certifications")
            ->where('id', $request->id)
            ->delete();
    }
}
