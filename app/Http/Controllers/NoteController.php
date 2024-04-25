<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function noteList(Request $requet)
    {
        $data['getNotes'] = Note::getNote(Auth::user()->id);
        return view('dashboard', $data);
    }

    public function noteCreate()
    {
        return view('create');
    }

    public function noteInsert(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string', 
        ]);

        if ($validator->fails()) {  
            $firstErrorMessage = $validator->errors()->first();
            toastr()->adderror($firstErrorMessage);
            return redirect()->to('/register')
            ->withInput();
        }

        $note = Note::make($request->except('user_id'));
        $note->user_id = Auth::user()->id;
        $note->save();
        toastr()->addsuccess('Your Note Successfully Created');
        return redirect()->route('user.note.list');
    }

    public function noteEdit(Request $request, Note $note)
    {
        $data['getNote'] = $note;
        return view('edit', $data);
    }

    public function noteUpdate(Request $request, Note $note)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string', 
        ]);

        if ($validator->fails()) {  
            $firstErrorMessage = $validator->errors()->first();
            toastr()->adderror($firstErrorMessage);
            return redirect()->back()
                             ->withInput();
        }
        $note->update($request->all());
        toastr()->addsuccess('Your Note Successfully Updated');
        return redirect()->route('user.note.list');
    }

    public function noteDelete($id)
    {  
        $note = Note::find($id);
        $note->delete();
        toastr()->addsuccess('Your Note Successfully Deleted');
        return redirect()->route('user.note.list');
    }
}
