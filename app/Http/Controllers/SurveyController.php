<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Resources\SurveyResource;
use App\Http\Requests\SurveyStoreRequest;
use App\Http\Requests\SurveyUpdateRequest;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return SurveyResource::collection(Survey::where('user_id',$user->id)->paginate());
    }

    // public function index(Request $request)
    // {
    //     $user = $request->user();
    //     return SurveyResource::collection(Survey::where('user_id',$user->id)->paginate());
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SurveyStoreRequest $request)
    {
        $data = $request->all();
        $survey = Survey::create($data);
        return new SurveyResource($survey);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        return new SurveyResource($survey);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SurveyUpdateRequest $request, Survey $survey)
    {
        $survey->update($request->validate());
       return new SurveyResource($survey);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey, Request $request)
    {
        $survey->delete();
        return response("deleted Successfully",204);
    }
}
