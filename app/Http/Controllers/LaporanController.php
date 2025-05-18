<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use Dompdf\Dompdf;

class LaporanController extends Controller
{
    public function bukuPdf()
    {
        $bukus = Buku::all();

        $pdf = new Dompdf();
        $html = view('laporan.buku', compact('bukus'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream('laporan_buku.pdf');
    }

    public function anggotaPdf()
    {
        $anggotas = Anggota::all();

        $pdf = new Dompdf();
        $html = view('laporan.anggota', compact('anggotas'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream('laporan_anggota.pdf');
    }
}
