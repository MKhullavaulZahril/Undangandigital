<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Ucapan;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'rsvps'        => Rsvp::latest()->get(),
            'ucapans'      => Ucapan::latest()->get(),
            'totalHadir'   => Rsvp::where('status', 'hadir')->sum('jumlah'),
            'totalTidak'   => Rsvp::where('status', 'tidak_hadir')->count(),
        ]);
    }
}