<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskFile;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TaskFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskFile::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg',
        ]);
        $file = $request->file('file');

        $fileName = date('dmyhis');
        $extension = $file->getClientOriginalExtension();
        $fullName = ($fileName . '.' . $extension);
        

        $task_file = new TaskFile();

        Storage::disk('local')->putFileAs('public/files/tasks/', $file, $fullName);
        $task_file->file = env("CLIENT_URL", 'http://localhost').'/storage/files/tasks/' . $fileName . '.' . $extension;
        

        $task_file->task = $request['task'];
        $task_file->save();
        return $task_file;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TaskFile::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task_file = TaskFile::find($id);
        if ($task_file) {

            $file_value = explode('/', $task_file->file);
            ob_start();
            echo end ($file_value);
            $file_name = ob_get_clean();

            File::delete('storage/files/tasks/'.$file_name);

            $task_file->delete();
            return "This Task File was deleted";
        } else {
            return "This Task File was deleted erlier";
        }
    }
}
