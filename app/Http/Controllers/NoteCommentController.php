<?php

namespace App\Http\Controllers;

use App\NoteComment;
use Illuminate\Http\Request;
use App\Note;

class NoteCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Note $note
     * @return Array
     */
    public function index(Note $note)
    {
        return NoteComment::where(['note_id' => $note]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Note $note
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request, Note $note)
    {
        return $note->comments()->create($request->all());
    }

    /**
     * Display the specified resource.
     * @param Note $note
     * @param NoteComment $noteComment
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|\Illuminate\Database\Eloquent\Relations\HasMany[]|null
     */
    public function show(Note $note, NoteComment $noteComment)
    {
        return $noteComment;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Note $note
     * @param NoteComment $noteComment
     * @return NoteComment|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Note $note, NoteComment $noteComment)
    {
        $noteComment->update($request->all());

        return $noteComment;
    }

    /**
     * Remove the specified resource from storage.
     * @param Note $note
     * @param NoteComment $noteComment
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Note $note, NoteComment $noteComment)
    {
        $noteComment->delete();

        return response()->json(['message' => 'Record is deleted'], 204);
    }
}
