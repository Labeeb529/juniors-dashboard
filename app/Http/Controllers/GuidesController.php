<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\GuidesModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuidesController extends Controller
{
    public function loadGuides(){
        $guides = Guide::all();
        return view('guides', ['guides' => $guides]);
    }

    public function viewSingleGuide(Guide $guide){
        $guide['body'] = Str::markdown($guide->body);
        return view('single-guide', ['guide' => $guide]);
    }

    public function createGuide(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        Guide::create($incomingFields);
        redirect('/admin');
    }
}
