<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
      //  $questionTypes = QuestionType::all();
        $questionTypes = QuestionType::orderBy('name')->get();
        return view('QuestionType.index', ['questionTypes' => $questionTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('QuestionType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $questiontype = new QuestionType();
        $questiontype->fill($request->All());
        $questiontype->save();
        return redirect(route('questiontype.index'))->with('status','Question type ' . $questiontype->name. ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionType  $questiontype
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(QuestionType $questiontype)
    {
        return view('QuestionType.view',compact('questiontype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionType  $questiontype
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(QuestionType $questiontype)
    {
        return view('questiontype.edit', compact('questiontype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionType  $questiontype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionType $questiontype)
    {
        $questiontype->fill($request->all());
        $questiontype->save();
        return redirect(route('questiontype.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionType  $questiontype
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(QuestionType $questiontype)
    {
        $questiontype->delete();
        return redirect(route('questiontype.index'))->with('status','Question type ' . $questiontype->name. ' deleted!');
    }
}
