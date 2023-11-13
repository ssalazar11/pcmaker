<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Interviews - PCMaker';
        $user = Auth::user();
        $viewData['interviews'] = $user->interviews;

        return view('interviews.index')->with('viewData', $viewData);
    }

    public function create()
    {
        return view('interviews.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $newInterview = new Interview();
        $newInterview->setUserId($user->getId());
        $newInterview->setQuestions($request->input('questions'));
        $newInterview->save();

        return back();
    }

    public function edit(int $id)
    {
        $interview = Interview::find($id);

        return view('interviews.edit', compact('interview'));
    }

    public function update(Request $request, int $id)
    {
        $user = Auth::User();
        $interview = Interview::find($id);
        if ($interview && $interview->getUserId() == $user->getId()) {
            $interview->setQuestions($request->input('questions'));
            $interview->save();

            return redirect()->route('interview.index');
        }

        return back()->withErrors('Interview not found');
    }

    public function delete(int $id)
    {
        $user = Auth::user();
        Interview::destroy($id);
        return back();
    }
}
