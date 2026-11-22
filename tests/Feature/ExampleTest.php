<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test halaman utama tanpa parameter tamu menampilkan acara default wanita (2 kartu acara).
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('isTamuPria', false);
        $response->assertViewHas('targetCountdown', '2026-12-22T08:00:00+07:00');
        $response->assertSee('Akad Nikah');
        $response->assertSee('Resepsi Pernikahan');
        $response->assertSee('Rumah Bapak Rekso Wibowo');
        $response->assertSee('Dsn. Nglaban RT 033 RW 009');

        // Pastikan Google Calendar URL mengarah ke tanggal 22 Desember 2026
        $gcalUrl = $response->viewData('gcalUrl');
        $this->assertStringContainsString('dates=20261222', $gcalUrl);
    }

    /**
     * Test tamu pihak pria hanya menampilkan 1 kartu acara "Ngunduh Mantu" dan lokasi pria.
     */
    public function test_tamu_pria_menampilkan_satu_acara_ngunduh_mantu(): void
    {
        $slugTamuPria = config('wedding.tamu_pria.0', 'dewi-magetan');
        $response = $this->get('/' . $slugTamuPria);

        $response->assertStatus(200);
        $response->assertViewHas('isTamuPria', true);
        $response->assertViewHas('targetCountdown', '2026-12-23T10:00:00+07:00');
        $response->assertSee('Ngunduh Mantu');
        $response->assertSee('Kediaman Mempelai Pria (Bpk. Subagyo)');
        $response->assertSee('Dsn. Nglawak Ds. Nglawak');

        // Pastikan TIDAK merender Akad Nikah dan Resepsi Pernikahan untuk tamu pria
        $response->assertDontSee('Akad Nikah');
        $response->assertDontSee('Resepsi Pernikahan');

        // Pastikan Google Calendar URL mengarah ke tanggal 23 Desember 2026 (Bukan 22 Desember)
        $gcalUrl = $response->viewData('gcalUrl');
        $this->assertStringContainsString('dates=20261223', $gcalUrl);
        $this->assertStringContainsString('Ngunduh+Mantu', $gcalUrl);
    }

    /**
     * Test tamu pihak pria lain dari daftar config (dewi-magetan).
     */
    public function test_tamu_pria_dewi_magetan(): void
    {
        $response = $this->get('/dewi-magetan');

        $response->assertStatus(200);
        $response->assertViewHas('isTamuPria', true);
        $response->assertViewHas('targetCountdown', '2026-12-23T10:00:00+07:00');
        $response->assertSee('Ngunduh Mantu');

        $gcalUrl = $response->viewData('gcalUrl');
        $this->assertStringContainsString('dates=20261223', $gcalUrl);
    }

    /**
     * Test halaman utama menampilkan data amplop / rekening digital.
     */
    public function test_amplop_menampilkan_data_rekening(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('BRI');
        $response->assertSee('375001034021539');
        $response->assertSee('BCA');
        $response->assertSee('0184566636');
        $response->assertSee('Salin Rekening');
        $response->assertSee('Salin No. Saja');
    }
}
