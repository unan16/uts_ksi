<?php

namespace App\Http\Controllers;

use App\Models\Supir;

class SupirController extends Controller
{
    public function show($id)
    {
        $supir = Supir::with('kendaraan', 'riwayatPerjalanans')->findOrFail($id);

        return view('supir.show', compact('supir'));
    }
}
