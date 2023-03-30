<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ServiceCategoryController;
use App\Models\ServiceRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// GET	        /photos	                index	    photos.index
// GET	        /photos/create	        create	    photos.create
// POST	        /photos	                store	    photos.store
// GET	        /photos/{photo}	        show	    photos.show
// GET	        /photos/{photo}/edit	edit	    photos.edit
// PUT/PATCH	/photos/{photo}	        update	    photos.update
// DELETE	    /photos/{photo}	        destroy	    photos.destroy


Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('create', [UserController::class, 'store']);
        Route::get('show/{user}', [UserController::class, 'show']);
        Route::put('update/{user}', [UserController::class, 'update']);
        Route::delete('delete/{id}', [UserController::class, 'destroy']);
        Route::get('agents',[UserController::class,'roleUsers']);
    });
    Route::get('/logout', [AuthController::class, 'logout']);
    // Route::apiResource('/roles', RoleController::class);
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('create', [RoleController::class, 'store']);
        Route::get('show/{id}', [RoleController::class, 'show']);
        Route::put('update/{id}', [RoleController::class, 'update']);
        Route::delete('delete/{id}', [RoleController::class, 'destroy']);
        Route::post('permissions/{id}', [Rolecontroller::class,'givePermission']);
        Route::delete('{id}/permissions/{perId}' , [RoleController::class,'revokePermission']);
    });
    Route::apiResource('/permissions', PermissionController::class);
    // Route::apiResource('/serviceCategory', ServiceCategoryController::class);

    Route::prefix('serviceCategory')->group(function(){
        Route::get('/',[ServiceCategoryController::class,'index']);
        Route::get('show/{id}',[ServiceCategoryController::class,'show']);
        Route::post('create',[ServiceCategoryController::class,'store']);
        Route::put('update/{id}',[ServiceCategoryController::class,'update']);
        Route::delete('delete/{id}',[ServiceCategoryController::class,'destroy']);
    });
    // Route::apiResource('/serviceType', ServiceTypeController::class);

    // Route::apiResource('/serviceRequest', ServiceRequestController::class);
    Route::prefix('serviceRequest')->group(function(){
        Route::get('/',[ServiceRequestController::class,'index']);
        Route::get('show/{id}',[ServiceRequestController::class,'show']);
        // Route::post('add',[ServiceRequestController::class,'add']);
        Route::post('create',[ServiceRequestController::class,'store']);
        Route::put('update/{id}',[ServiceRequestController::class,'update']);
        Route::delete('delete/{id}',[ServiceRequestController::class,'destroy']);
    });
    // service type
    Route::prefix('serviceType')->group(function () {
        Route::get('/', [ServiceTypeController::class, 'index']);
        Route::post('create', [ServiceTypeController::class, 'store']);
        Route::get('show/{id}', [ServiceTypeController::class, 'show']);
        Route::put('update/{id}', [ServiceTypeController::class, 'update']);
        Route::delete('delete/{id}', [ServiceTypeController::class, 'destroy']);
        Route::get('serviceCategory/{id}', [ServiceTypeController::class, 'getTypeByCategory']);
    });

    //SLA
    Route::prefix('sla')->group(function(){
            Route::get('/',[SLAController::class,'index']);
            Route::get('show/{id}',[SLAController::class,'show']);
            Route::post('create',[SLAController::class,'store']);
            Route::put('update/{id}',[SLAController::class,'update']);
            Route::delete('delete/{id}',[SLAController::class,'destroy']);
    });

        // Route::post('/roles/{role}/permissions', [UserController::class, 'givePermission']);
        // Route::post('/users/{user}/roles', [UserController::class, 'assignRole']);
        // Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
        // Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
        // Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});
Route::post('/login', [AuthController::class, 'login']);
