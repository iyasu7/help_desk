<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\ServiceTypeRequest;
use App\Http\Resources\ServiceTypeResource;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ServiceTypeResource::collection(ServiceType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceTypeRequest $request)
    {
        Log::info('$request service_category_id');
        Log::info($request['service_category_id']);
        $id = $request['service_category_id'];
        $serviceCategory = ServiceCategory::find($id);
        $serviceType = new ServiceType;
        $serviceType->service_category_id = $request['service_category_id'];
        $serviceType->name = $request['name'];
        $serviceType->description = $request['description'];
        $serviceType->serviceCategory()->associate($serviceCategory)->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceType $serviceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceTypeRequest $request, ServiceType $serviceType)
    {
        $serviceType->update($request->validated());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
    }
    public function getTypeByCategory(string $id)
    {
        return ServiceTypeResource::collection(ServiceType::where('service_category_id',$id))->all();
    }
}
