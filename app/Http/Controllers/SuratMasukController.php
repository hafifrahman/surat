<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');
        $suratMasuks = SuratMasuk::search($search)->paginate(10);
        return view('admin.surat-masuk.index', compact('suratMasuks', 'search'));
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
            'nomor_surat' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
            'perihal' => ['required', 'string', 'max:255'],
            'tgl_surat' => ['required', 'date'],
            'upload' => ['nullable', 'mimes:pdf,doc,docx,xlsx,png,jpg,jpeg'],
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = 'SuratMasuk-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/surat-masuk', $filename);
            $validated['upload'] = $filename;
        }

        SuratMasuk::create($validated);
        return redirect()->route(currentRole() . '.surat-masuk.index')->with('success', 'Surat masuk baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $validated = $request->validate([
            'nomor_surat' => ['required', 'string', 'max:255'],
            'penerima' => ['required', 'string', 'max:255'],
            'perihal' => ['required', 'string', 'max:255'],
            'tgl_surat' => ['required', 'date'],
            'upload' => ['nullable', 'mimes:pdf,doc,docx,xlsx,png,jpg,jpeg'],
        ]);

        if ($request->hasFile('upload')) {
            if ($suratMasuk->upload) {
                Storage::delete('public/uploads/surat-masuk/' . $suratMasuk->upload);
            }
            $file = $request->file('upload');
            $filename = 'SuratMasuk-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads/surat-masuk', $filename);
            $validated['upload'] = $filename;
        }

        $suratMasuk->update($validated);
        return redirect()->route(currentRole() . '.surat-masuk.index')->with('success', 'Surat masuk telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        $suratMasuk->delete();
        return redirect(currentRole() . '/surat-masuk')->with('danger', 'Surat masuk telah dihapus');
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('admin.surat-masuk.export.pdf', [
            'suratMasuk' => SuratMasuk::all(),
        ]);
        return $pdf->stream('surat-masuk.pdf');
    }

    public function download($filename)
    {
        return Storage::download("public/uploads/surat-masuk/$filename");
    }

    public function report(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $laporanPerBulan = SuratMasuk::selectRaw('MONTH(tgl_surat) as bulan, COUNT(*) as total')
            ->whereYear('tgl_surat', $tahun)
            ->groupBy('bulan')
            ->get()
            ->keyBy('bulan')
            ->toArray();
        return view('admin.surat-masuk.report', compact('laporanPerBulan', 'tahun'));
    }

    public function export(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $bulan = $request->input('bulan');

        $query = SuratMasuk::whereYear('tgl_surat', $tahun);
        if ($bulan) {
            $query->whereMonth('tgl_surat', $bulan);
        }

        $suratMasuk = $query->get();
        $firstSurat = $suratMasuk->first();
        if ($firstSurat) {
            $tanggalSurat = Carbon::parse($firstSurat->tgl_surat)->format('m-Y');
        } else {
            $tanggalSurat = date('d-m-Y');
        }

        $pdf = PDF::loadView('admin.surat-masuk.export', compact('suratMasuk', 'tahun', 'bulan'));
        $filename = 'laporan surat masuk ' . $tanggalSurat . '.pdf';
        return $pdf->stream($filename);
    }
}
