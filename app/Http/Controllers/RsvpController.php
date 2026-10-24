<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RsvpController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Honeypot anti-spam
        if ($request->filled('website')) {
            return response()->json(['success' => true, 'message' => 'Terima kasih.']);
        }

        $validator = Validator::make($request->all(), [
            'nama'   => ['required', 'string', 'max:100'],
            'status' => ['required', 'in:hadir,tidak_hadir'],
            'jumlah' => ['nullable', 'integer', 'min:0', 'max:5'],
        ], [
            'nama.required'   => 'Nama wajib diisi.',
            'status.required' => 'Pilih konfirmasi kehadiran.',
            'status.in'       => 'Pilihan kehadiran tidak valid.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $status = $request->input('status');
        $jumlah = $status === 'hadir'
            ? max(1, (int) $request->input('jumlah', 1))
            : 0;

        Rsvp::create([
            'nama'   => strip_tags($request->input('nama')),
            'status' => $status,
            'jumlah' => $jumlah,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih, konfirmasi kehadiran Anda sudah kami terima.',
        ], 201);
    }
}