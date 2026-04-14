<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    public function index()
    {
        $knowledges = Knowledge::latest()->get();
        return view('knowledge.index', compact('knowledges'));
    }

    public function store(Request $request)
    {
        Knowledge::create($request->all());
        return back();
    }

    public function update(Request $request, Knowledge $knowledge)
    {
        $knowledge->update($request->all());
        return back();
    }

    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();
        return back();
    }
}