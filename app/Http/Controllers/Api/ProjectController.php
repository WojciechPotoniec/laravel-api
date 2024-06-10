<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
    public function show($slug){
        $projects = Project::where('slug', $slug)->with('technologies', 'type')->first();
        if ($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Project not found'
            ]);
        }
    }
}
