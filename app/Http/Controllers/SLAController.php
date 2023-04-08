<?php

namespace App\Http\Controllers;

use App\Models\Sla;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SLAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Sla::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('request File');
        Log::info($request);
    }
    public function upload(Request $request){
        
            
        // $request->validate([
        //    'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        // ]);

        // $fileUpload = new FileUpload;

        // if($request->file()) {
        //     $file_name = time().'_'.$request->file->getClientOriginalName();
        //     $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

        //     $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
        //     $fileUpload->path = '/storage/' . $file_path;
        //     $fileUpload->save();

        //     return response()->json(['success'=>'File uploaded successfully.']);
        // }
   }
//    public function upload(Request $request)
//    {
//     if ($request->hasFile('file')) {
//         $file = $request->file('file');
//         $fileName = $file->getClientOriginalName();
//         $path = 'public/files/' . $fileName;
//         Storage::disk('local')->put($path, file_get_contents($file));
//         return response()->json("Uploaded successfully.");
//     }
//     return response()->json("File not found");
//     }
//     public function removeFile(Request $request)
//     {
//         $file = "public/files/" . $request->name;
//         Storage::delete($file);
//         return response()->json("Deleted successfully.");
//     }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
