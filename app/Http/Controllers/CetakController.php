<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use PDF;

class CetakController extends Controller
{
    public function __invoke()
    {
        $trans = Transaksi::all();
        $pdf = PDF::loadview('cetak', compact('trans'));
        $pdf->setPaper('F4', 'landscape');

        return $pdf->stream();
    }
}
