<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        return Projects::all();
    }

    public function show($id)
    {
        return Projects::findOrFail($id);
    }

    public function store(Request $request)
    {
        return Projects::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Projects::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Projects::findOrFail($id);
        $article->delete();

        return 204;
    }
}
