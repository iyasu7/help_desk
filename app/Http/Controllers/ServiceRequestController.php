<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServiceRequestRequest;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::info('ServiceRequest');
        Log::info(ServiceRequest::all());
        return ServiceRequest::all();
    }
    // public function add(Request $request)
    // {
    //     Log::info('ServiceRequest');
    //     Log::info($request);
    //     return ServiceRequest::all();
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequestRequest $request)
    {
        Log::info('$request service ReQUEST');
        Log::info($request);
        $req = $request->validated();
        Log::info('$request service user');
        $user = Auth::user();
        Log::info($user->id);
        // $idUser = $request['user_id'];
        // $idCate = $request[ ];
        // $idType = $request['service_type_id'];
        // $user = User::find($idUser);
        $serviceRequest = new ServiceRequest;
        // $serviceRequest->user_id = Auth::User().id;
        $serviceRequest->service_category_id = $request['service_category_id'];
        $serviceRequest->service_type_id = $request['service_type_id'];
        $serviceRequest->description = $request['description'];
        $serviceRequest->user()->associate($user)->save();
        Log::info($serviceRequest);

        // ServiceRequest::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequestRequest $request, $id)
    {
        $serviceRequest = ServiceRequest::find($id);
        $serviceRequest->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $serviceRequest = ServiceRequest::find($id);
        $serviceRequest->delete();
    }
    
}
