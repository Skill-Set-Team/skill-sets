<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exercise;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $exercise_id = $request->get('exercise_id');
        if ($exercise_id) {
            $exercise = Exercise::findOrFail($request->exercise_id);
            return response()->json($exercise->answers, JsonResponse::HTTP_OK);
        }
        return response()->json(Answer::all(), JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'solution' => 'required',
            'isCorrect' => 'required|boolean',
            'exercise_id' => 'required|int|exists:exercises,id'
        ]);
        $exercise = Exercise::findOrFail($request->get('exercise_id'));
        $answer = new Answer([
            'solution' => $request->get('solution'),
            'isCorrect' => $request->boolean('isCorrect')
        ]);
        $exercise->answers()->save($answer);
        return response()->json($answer, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Answer $answer
     * @return JsonResponse
     */
    public function show(Answer $answer)
    {
        return response()->json($answer, JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Answer $answer
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Answer $answer)
    {
        $this->validate($request, [
            'solution' => 'required',
            'isCorrect' => 'boolean'
        ]);
        $answer->solution = $request->get('solution');
        $answer->isCorrect = $request->boolean('isCorrect');
        $answer->save();
        return response()->json($answer, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
