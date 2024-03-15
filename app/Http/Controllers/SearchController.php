<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    $query = $request->input('query');

    $results = Agenda::where('name', 'like', '%' . $query . '%')
                        ->orWhere('phone', 'like', '%' . $query . '%')
                        ->orWhere('secondPhone', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%')
                        ->orWhere('address', 'like', '%' . $query . '%')
                        ->get();

        return view('agenda.search', compact('results'));
    }

    public function edit(Agenda $agenda)
    {
        return view('agenda.form')
            ->with('result', $agenda);
    }
}
