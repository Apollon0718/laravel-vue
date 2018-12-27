<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Note::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Note
     */
    public function store(Request $request)
    {
        $filename = $request->file('file')->store('public/files/');
        $filename = Storage::url($filename);
        $request->request->add(['file' => $filename]);

        return Note::create($request->request->all());
    }

    /**
     * Display the specified resource.
     * @param Note $note
     * @return Note|\Illuminate\Http\JsonResponse
     */
    public function show(Note $note)
    {
        return $note;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Note $note
     * @return Note|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Note $note)
    {
        $note->name = $request->get('name');
        $note->content = $request->get('content');
        $note->save();

        return $note;
    }

    /**
     * Remove the specified resource from storage.
     * @param Note $note
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json(['message' => 'Record is deleted'], 204);
    }
}
