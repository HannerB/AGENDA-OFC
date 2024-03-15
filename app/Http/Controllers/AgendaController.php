<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::paginate(7);
        return view('agenda.index')
            ->with('agendas', $agendas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agenda.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
            'phone' => 'required|max:10',
            'secondPhone' => 'required|max:10',
            'address' => 'required|max:30',
            'email' => 'required|max:25'

        ]);

        $agenda = Agenda::create($request->only('name', 'phone', 'email', 'secondPhone', 'address'));

        Session::flash('mensaje', 'Contacto creado con Éxito');

        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $agendaItem = Agenda::findOrFail($id); // Buscar el contacto por su ID

        return view('agenda.show', compact('agendaItem')); // Pasar el contacto encontrado a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('agenda.form')
            ->with('agenda', $agenda);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'name' => 'required|max:15',
            'phone' => 'required|max:10',
            'secondPhone' => 'required|max:10',
            'address' => 'required|max:30',
            'email' => 'required|max:25'
        ]);

        $agenda->name = $request['name'];
        $agenda->phone = $request['phone'];
        $agenda->secondPhone = $request['secondPhone'];
        $agenda->address = $request['address'];
        $agenda->email = $request['email'];
        $agenda->save();

        Session::flash('mensaje', 'Contacto editado con Éxito');

        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        Session::flash('mensaje', 'Contacto eliminado con Éxito');

        return redirect()->route('agenda.index');
    }

    // public function listado(Request $request)
    // {
    //     $query = $request->input('query');

    //     $results = Agenda::where('name', 'like', '%' . $query . '%')
    //         ->orWhere('phone', 'like', '%' . $query . '%')
    //         ->orWhere('email', 'like', '%' . $query . '%')
    //         ->get();

    //     return view('agenda.listado', compact('results'));
    //     // O cualquier lógica para obtener los contactos
    //     // return view('agenda.listado');
    // }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
