<?php
// filepath: c:\Users\PNPh\Laravel\app\Http\Controllers\FileUploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showForm()
    {
        return view('file-upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        return back()->with('success', 'File uploaded successfully!')->with('file', $fileName);
    }
}