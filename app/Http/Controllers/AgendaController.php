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
        $search = $request->input('q');
        $agendas = Agenda::search($search)->paginate(10);
        return view('admin.agenda.index', compact('agendas'));
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
        $validated = $request->validate([
            'nama_acara' => ['required', 'string', 'max:255'],
            'tempat' => ['required', 'string', 'max:255'],
            'tgl_mulai' => ['required', 'date'],
            'tgl_selesai' => ['required', 'date'],
            'waktu' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'string', 'in:pending,completed'],
        ]);

        Agenda::create($validated);
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
        $validated = $request->validate([
            'nama_acara' => ['required', 'string', 'max:255'],
            'tempat' => ['required', 'string', 'max:255'],
            'tgl_mulai' => ['required', 'date'],
            'tgl_selesai' => ['required', 'date'],
            'waktu' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['required', 'string', 'in:pending,completed'],
        ]);

        $agenda->update($validated);
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
