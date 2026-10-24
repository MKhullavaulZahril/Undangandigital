<?php

namespace App\Http\Controllers;

use App\Models\Ucapan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UcapanController extends Controller
{
    // Daftar 20 ucapan terbaru (JSON)
    public function index(): JsonResponse
    {
        $data = Ucapan::latest()->take(20)->get()->map(fn ($u) => [
            'id'     => $u->id,
            'nama'   => $u->nama,
            'ucapan' => $u->ucapan,
            'waktu'  => $u->created_at?->diffForHumans(),
        ]);

        return response()->json($data);
    }

    // Simpan ucapan baru
    public function store(Request $request): JsonResponse
    {
        // Honeypot: bot biasanya mengisi field tersembunyi ini
        if ($request->filled('website')) {
            return response()->json(['success' => true, 'message' => 'Terima kasih.']);
        }

        $validator = Validator::make($request->all(), [
            'nama'   => ['required', 'string', 'max:100'],
            'ucapan' => ['required', 'string', 'max:500'],
        ], [
            'nama.required'   => 'Nama wajib diisi.',
            'ucapan.required' => 'Ucapan wajib diisi.',
            'nama.max'        => 'Nama maksimal 100 karakter.',
            'ucapan.max'      => 'Ucapan maksimal 500 karakter.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $ucapan = Ucapan::create([
            'nama'   => strip_tags($request->input('nama')),
            'ucapan' => strip_tags($request->input('ucapan')),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih atas ucapan dan doanya.',
            'data'    => [
                'id'     => $ucapan->id,
                'nama'   => $ucapan->nama,
                'ucapan' => $ucapan->ucapan,
                'waktu'  => $ucapan->created_at?->diffForHumans(),
            ],
        ], 201);
    }
}