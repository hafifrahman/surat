<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        return view('admin.agenda.index', [
            'agendas' => Agenda::search($search)->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Agenda::create($data);
        return redirect(currentRole() . '/agenda')->with('success', 'Agenda baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->all();
        $agenda->update($data);
        return redirect(currentRole() . '/agenda')->with('success', 'Agenda telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect(currentRole() . '/agenda')->with('danger', 'Agenda telah dihapus');
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('admin.agenda.export.pdf', [
            'agendas' => Agenda::all()
        ]);
        return $pdf->stream('agenda.pdf');
    }
}
