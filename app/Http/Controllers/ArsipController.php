<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $arsips = Arsip::search($search)->paginate(5);
        return view('admin.arsip.index', compact('arsips', 'search'));
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
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = 'Arsip-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/arsip', $filename);
            $data['upload'] = $filename;
        } else {
            $data['upload'] = null;
        }
        Arsip::create($data);
        return redirect(currentRole() . '/arsip')->with('success', 'Arsip baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Arsip $arsip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsip $arsip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsip $arsip)
    {
        $data = $request->except('upload');
        if ($request->hasFile('upload')) {
            if ($arsip->upload) {
                Storage::delete('public/uploads/arsip/' . $arsip->upload);
            }
            $file = $request->file('upload');
            $filename = 'Arsip-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/arsip', $filename);
            $data['upload'] = $filename;
        }
        $arsip->update($data);
        return redirect(currentRole() . '/arsip')->with('success', 'Arsip telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        $arsip->delete();
        return redirect(currentRole() . '/arsip')->with('danger', 'Arsip telah dihapus');
    }

    public function download($filename)
    {
        return Storage::download('public/uploads/arsip/' . $filename);
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('admin.arsip.export.pdf', [
            'arsips' => Arsip::all()
        ]);
        return $pdf->stream('arsip.pdf');
    }
}
