<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ServiceCategory;
use App\Http\Requests\ServiceCategoryRequest;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ServiceCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceCategoryRequest $request)
    {
        ServiceCategory::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function update(ServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validated();
        $serviceCategory->update($validated);
    }

    /**
     * Update the specified resource in storage.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();
    }
}
