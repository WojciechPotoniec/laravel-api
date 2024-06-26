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
            'status' => 'success',
            'message' => 'Ok',
            'results' => $projects
        ], 200);
    }
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with('technologies', 'type')->first();
        if ($project) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ok',
                'results' => $project
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'error',
            ], 404);
        }
    }
}
