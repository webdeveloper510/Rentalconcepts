<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $data = Upload::select('file')->get()->toArray();
        return view('upload-video', compact('data'));
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mp4,mov,ogg,qt| max:20000'
        ]);
      
        $upload =  new Upload();
        $upload->uploaded_by = Session::get('userloginid');
        $file = $request['file'];
        $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalName();
        $path = public_path() . '/videouploads/';
        $file->move($path, $filename);
        $upload->file=$filename;
        $upload->save();
        return back()->with('success', 'Video uploaded successfully!');
    }
    public function viewtraining()
    {
        $data = Upload::select('file')->get()->toArray();
        return view('sales-training', compact('data'));
    }
}
