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
        $search = $request->input('q');
        $arsips = Arsip::search($search)->paginate(10);
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
        $validated = $request->validate([
            'nama_arsip' => ['required', 'string', 'max:255'],
            'nomor_arsip' => ['required', 'string', 'max:255'],
            'jenis_arsip' => ['required', 'in:dokumen,gambar,surat'],
            'upload' => ['nullable', 'mimes:pdf,doc,docx,xlsx,png,jpg,jpeg'],
            'tgl_arsip' => ['required', 'date'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = 'Arsip-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/arsip', $filename);
            $validated['upload'] = $filename;
        }

        Arsip::create($validated);
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
        $validated = $request->validate([
            'nama_arsip' => ['required', 'string', 'max:255'],
            'nomor_arsip' => ['required', 'string', 'max:255'],
            'jenis_arsip' => ['required', 'in:dokumen,gambar,surat'],
            'upload' => ['nullable', 'mimes:pdf,doc,docx,xlsx,png,jpg,jpeg'],
            'tgl_arsip' => ['required', 'date'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('upload')) {
            if ($arsip->upload) {
                Storage::delete("public/uploads/arsip/$arsip->upload");
            }
            $file = $request->file('upload');
            $filename = 'Arsip-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/arsip', $filename);
            $validated['upload'] = $filename;
        }

        $arsip->update($validated);
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
        return Storage::download("public/uploads/arsip/$filename");
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('admin.arsip.export.pdf', [
            'arsips' => Arsip::all()
        ]);
        return $pdf->stream('arsip.pdf');
    }
}
