<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|unique:labels|max:100',
        ]);

        $label = new Label();
        $label->title =  $request->input('title');
        $label->bcolor = $request->input('bcolor');
        $label->tcolor = $request->input('tcolor');
        
        $label->save();

        return redirect()->back()->with('success', 'Лейбл успешно создан');

    }
}
