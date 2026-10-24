@extends('layouts.app')

@section('content')

    <!-- Alpine.js Data untuk kontrol Cover & Musik -->
    <div x-data="{
        isOpen: false,
        isPlaying: false,
        audio: null,
        init() {
            this.audio = new Audio('{{ asset(config('wedding.media.audio')) }}');
            this.audio.loop = true;
            this.audio.volume = 0.5;
        },
        bukaUndangan() {
            this.isOpen = true;
            this.playMusic();
            setTimeout(() => {
                document.getElementById('pembuka').scrollIntoView({ behavior: 'smooth' });
            }, 300);
        },
        toggleMusic() {
            if (this.isPlaying) {
                this.audio.pause();
            } else {
                this.audio.play();
            }
            this.isPlaying = !this.isPlaying;
        },
        playMusic() {
            this.audio.play().then(() => {
                this.isPlaying = true;
            }).catch(e => console.log('Autoplay blocked:', e));
        }
    }">

        <!-- SECTION 1: COVER -->
        @include('partials.cover')

        <!-- KONTEN UTAMA -->
        <div x-show="isOpen" x-transition.opacity.duration.500ms>

            <!-- SECTION 2: PEMBUKA -->
            @include('partials.pembuka')

            <!-- SECTION 3: MEMPELAI -->
            @include('partials.mempelai')

            <!-- SECTION 4: COUNTDOWN -->
            @include('partials.countdown')

            <!-- SECTION 5: ACARA -->
            @include('partials.acara')

            <!-- SECTION 6: GALERI -->
            @include('partials.galeri')

            <!-- SECTION 7: AMPLOP -->
            @include('partials.amplop')

            <!-- SECTION 8: UCAPAN -->
            @include('partials.ucapan')

            <!-- SECTION 9: RSVP -->
            @include('partials.rsvp')

            <!-- SECTION 10: PENUTUP -->
            @include('partials.penutup')

        </div>

        <!-- TOMBOL MUSIK MELAYANG -->
        <button 
            x-show="isOpen"
            x-transition
            @click="toggleMusic()"
            class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full bg-[#8A9A7B] text-white shadow-lg flex items-center justify-center hover:bg-[#7a8a6b] transition-colors"
            aria-label="Play/Pause Music"
        >
            <svg x-show="!isPlaying" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" /></svg>
            <svg x-show="isPlaying" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M5.75 3a.75.75 0 00-.75.75v12.5c0 .414.336.75.75.75h1.5a.75.75 0 00.75-.75V3.75A.75.75 0 007.25 3h-1.5zM12.75 3a.75.75 0 00-.75.75v12.5c0 .414.336.75.75.75h1.5a.75.75 0 00.75-.75V3.75a.75.75 0 00-.75-.75h-1.5z" /></svg>
        </button>

    </div>

@endsection