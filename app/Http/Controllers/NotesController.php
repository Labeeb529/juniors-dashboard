<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function loadNotes()
    {
        $sem1Notes = Notes::where('semester', 1)->get();
        $sem2Notes = Notes::where('semester', 2)->get();
        $sem3Notes = Notes::where('semester', 3)->get();
        $sem4Notes = Notes::where('semester', 4)->get();
        $sem5Notes = Notes::where('semester', 5)->get();
        $sem6Notes = Notes::where('semester', 6)->get();
        $sem7Notes = Notes::where('semester', 7)->get();
        $sem8Notes = Notes::where('semester', 8)->get();

        return view('notes', compact(
            'sem1Notes',
            'sem2Notes',
            'sem3Notes',
            'sem4Notes',
            'sem5Notes',
            'sem6Notes',
            'sem7Notes',
            'sem8Notes'
        ));
    }
}
