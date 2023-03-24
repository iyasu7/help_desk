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
    });
    Route::get('/logout', [AuthController::class, 'logout']);
    // Route::apiResource('/roles', RoleController::class);
    Route::prefix('roles')->group(function (){
        Route::get('/', [RoleController::class,'index']);
        Route::post('create',[RoleController::class,'store']);
        Route::get('show/{id}',[RoleController::class,'show']);
        Route::put('update/{id}',[RoleController::class,'update']);
        Route::get('delete/{id}',[RoleController::class,'destroy']);
    });
    Route::apiResource('/permissions', PermissionController::class);
    Route::apiResource('/serviceCategory', ServiceCategoryController::class);

    // Route::apiResource('/serviceType', ServiceTypeController::class);

    Route::apiResource('/serviceRequest', ServiceRequestController::class);
    
    // Route::prefix('serviceRequest')->group(function (){
        //     Route::get('/', [ServiceRequestController::class,'index']);
        //     Route::post('create',[ServiceRequestController::class,'store']);
        //     Route::put('update/{serviceRequest}',[ServiceRequestController::class,'update']);
        //     Route::delete('delete/{id}',[ServiceRequestController::class,'destroy']);
        // });s

    // Route::group(function () {
    //     Route::get('/roles', [RoleController::class,'index']);
    //     Route::get('/roles/create', 'create');
    //     Route::get('/roles/{id}', 'show');
    //     Route::get('/roles/edit/{id}', 'edit');
    //     Route::post('/roles', 'store');
    //     Route::put('/roles/{id}', 'update');
    //     Route::delete('/roles/{id}', 'destroy');
    //     Route::post('/roles/{id}/permissions', 'givePermission');
    //     Route::delete('/roles/{role}/permissions/{permission}', 'revokePermission');
    // });

        
        // service type
        Route::prefix('serviceType')->group(function () {
            Route::get('/', [ServiceTypeController::class, 'index']);
            Route::post('create', [ServiceTypeController::class, 'store']);
            Route::get('show/{serviceType}', [ServiceTypeController::class, 'show']);
            Route::put('update/{serviceType}', [ServiceTypeController::class, 'update']);
        Route::delete('delete/{id}', [ServiceTypeController::class, 'destroy']);
        Route::get('serviceCategory/{id}', [ServiceTypeController::class, 'getTypeByCategory']);

    Route::post('/roles/{role}/permissions', [UserController::class, 'givePermission'])->name('roles.permissions');
    // Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    // Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    // Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    // Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    });
});
Route::post('/login', [AuthController::class, 'login']);



