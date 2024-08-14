<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $suratKeluar = SuratKeluar::search($search)->paginate(5);
        return view('admin.surat-keluar.index', compact('suratKeluar', 'search'));
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
            $filename = 'SuratKeluar-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/surat-keluar', $filename);
            $data['upload'] = $filename;
        } else {
            $data['upload'] = null;
        }
        SuratKeluar::create($data);
        return redirect(currentRole() . '/surat-keluar')->with('success', 'Surat keluar baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $data = $request->all();
        if ($request->hasFile('upload')) {
            if ($suratKeluar->upload) {
                Storage::delete('public/uploads/surat-keluar/' . $suratKeluar->upload);
            }
            $file = $request->file('upload');
            $filename = 'SuratKeluar-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/surat-keluar', $filename);
            $data['upload'] = $filename;
        }
        $suratKeluar->update($data);
        return redirect(currentRole() . '/surat-keluar')->with('success', 'Surat keluar telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        $suratKeluar->delete();
        return redirect(currentRole() . '/surat-keluar')->with('danger', 'Surat keluar telah dihapus');
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('admin.surat-keluar.export.pdf', [
            'suratKeluar' => SuratKeluar::all()
        ]);
        return $pdf->stream('surat-keluar.pdf');
    }

    public function download($filename)
    {
        return Storage::download('public/uploads/surat-keluar/' . $filename);
    }

    public function report(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $laporanPerBulan = SuratKeluar::selectRaw('MONTH(tgl_surat) as bulan, COUNT(*) as total')
            ->whereYear('tgl_surat', $tahun)
            ->groupBy('bulan')
            ->get()
            ->keyBy('bulan')
            ->toArray();
        return view('admin.surat-keluar.report', compact('laporanPerBulan', 'tahun'));
    }

    public function export(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $bulan = $request->input('bulan');

        $query = SuratKeluar::whereYear('tgl_surat', $tahun);
        if ($bulan) {
            $query->whereMonth('tgl_surat', $bulan);
        }

        $suratKeluar = $query->get();
        $firstSurat = $suratKeluar->first();
        if ($firstSurat) {
            $tanggalSurat = \Carbon\Carbon::parse($firstSurat->tgl_surat)->format('m-Y');
        } else {
            $tanggalSurat = date('d-m-Y');
        }

        $pdf = PDF::loadView('admin.surat-keluar.export', compact('suratKeluar', 'tahun', 'bulan'));
        $filename = 'laporan surat keluar ' . $tanggalSurat . '.pdf';
        return $pdf->stream($filename);
    }
}
