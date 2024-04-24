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
        // dd($data['getNotes']);
        return view('dashboard', $data);
    }

    public function noteCreate()
    {
        return view('create');
    }

    public function notezInsert(Request $request)
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

        Note::create($request->all());
        toastr()->addsuccess('Your Note Successfully Created');
        return redirect()->route('user.note.list');
    }
}
