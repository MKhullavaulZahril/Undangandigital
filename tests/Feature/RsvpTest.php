<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RsvpTest extends TestCase
{
    use RefreshDatabase;

    public function test_tamu_bisa_mengirim_rsvp_hadir(): void
    {
        $response = $this->postJson(route('rsvp.store'), [
            'nama'   => 'Budi & Keluarga',
            'status' => 'hadir',
            'jumlah' => 2,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'nama'        => 'Budi & Keluarga',
                    'status'      => 'hadir',
                    'status_text' => 'Insya Allah Hadir',
                    'jumlah'      => 2,
                ],
            ]);

        $this->assertDatabaseHas('rsvps', [
            'nama'   => 'Budi & Keluarga',
            'status' => 'hadir',
            'jumlah' => 2,
        ]);
    }

    public function test_tamu_bisa_mengirim_rsvp_tidak_hadir(): void
    {
        $response = $this->postJson(route('rsvp.store'), [
            'nama'   => 'Siti',
            'status' => 'tidak_hadir',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => [
                    'nama'        => 'Siti',
                    'status'      => 'tidak_hadir',
                    'status_text' => 'Mohon Maaf Belum Bisa Hadir',
                    'jumlah'      => 0,
                ],
            ]);

        $this->assertDatabaseHas('rsvps', [
            'nama'   => 'Siti',
            'status' => 'tidak_hadir',
            'jumlah' => 0,
        ]);
    }
}

