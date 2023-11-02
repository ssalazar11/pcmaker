<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $viewData = [];
        $viewData["title"] = "Interviews";
        $user = Auth::user();
        $viewData["interviews"] = $user->interviews;
        return view('interviews.index')->with("viewData", $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $newInterview = new Interview();
        $newInterview->setUserId($user->getId());
        $newInterview->setQuestions($request->input('questions'));
        $newInterview->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = Auth::User();
        $interview = Interview::find($id);
        if($interview && $interview->getUserId() == $user->getId()){
            $interview->setQuestions($request->input('questions'));
            $interview->save();
            return redirect()->route('interview.index');
        }
        return back()->withErrors('Interview not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = Auth::user();
        $interview = Interview::find($id);
        if($interview && $interview->getUserId() == $user->getId()){
            $interview->delete();
            return redirect()->route('interview.index');
        }
        return back()->withErrors('Interview not found');
    }
}
