@extends('layouts.app')

@section('content')

    <!-- Alpine.js Data untuk kontrol Cover, Musik & Auto Scroll -->
    <div x-data="{
        isOpen: false,
        isPlaying: false,
        isAutoScrolling: false,
        autoScrollTimer: null,
        audio: null,
        _autoScrolling: false,
        init() {
            this.audio = new Audio('{{ asset(config('wedding.media.audio')) }}');
            this.audio.loop = true;
            this.audio.volume = 0.5;

            // Hentikan auto-scroll jika user mengetik di input / textarea
            window.addEventListener('focusin', (e) => {
                if (['INPUT', 'TEXTAREA', 'SELECT'].includes(e.target.tagName)) {
                    this.stopAutoScroll();
                }
            });

            // Hentikan auto-scroll jika user scroll manual (wheel/touch)
            window.addEventListener('wheel', () => {
                if (this.isAutoScrolling) {
                    this.stopAutoScroll();
                }
            }, { passive: true });

            window.addEventListener('touchstart', () => {
                if (this.isAutoScrolling) {
                    this.stopAutoScroll();
                }
            }, { passive: true });
        },
        bukaUndangan() {
            this.isOpen = true;
            this.playMusic();
            setTimeout(() => {
                const pembuka = document.getElementById('pembuka');
                if (pembuka) {
                    pembuka.scrollIntoView({ behavior: 'smooth' });
                }
                // Mulai auto-scroll otomatis setelah cover dibuka dan transisi pembuka selesai
                setTimeout(() => {
                    this.startAutoScroll();
                }, 1000);
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
        },
        toggleAutoScroll() {
            if (this.isAutoScrolling) {
                this.stopAutoScroll();
            } else {
                this.startAutoScroll();
            }
        },
        startAutoScroll() {
            this.isAutoScrolling = true;
            if (this.autoScrollTimer) {
                clearInterval(this.autoScrollTimer);
            }
            this.autoScrollTimer = setInterval(() => {
                if (!this.isAutoScrolling) {
                    clearInterval(this.autoScrollTimer);
                    return;
                }
                // Hentikan jika scroll sudah mencapai dasar halaman
                if ((window.innerHeight + window.scrollY) >= (document.documentElement.scrollHeight - 5)) {
                    this.stopAutoScroll();
                    return;
                }
                window.scrollBy(0, 1);
            }, 25);
        },
        stopAutoScroll() {
            this.isAutoScrolling = false;
            if (this.autoScrollTimer) {
                clearInterval(this.autoScrollTimer);
                this.autoScrollTimer = null;
            }
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

        <!-- TOMBOL FLOATING (AUTO SCROLL & MUSIK) -->
        <div 
            x-show="isOpen" 
            x-transition 
            class="fixed bottom-6 right-6 z-50 flex flex-col items-center gap-3"
        >
            <!-- TOMBOL AUTO SCROLL -->
            <button 
                type="button"
                @click="toggleAutoScroll()"
                class="w-12 h-12 rounded-full text-white shadow-lg flex items-center justify-center transition-all duration-300 relative cursor-pointer"
                :class="isAutoScrolling ? 'bg-[#C5A059] ring-2 ring-[#C5A059]/50 scale-105 shadow-[#C5A059]/30' : 'bg-[#3B2F2A]/90 hover:bg-[#3B2F2A]'"
                :title="isAutoScrolling ? 'Jeda Auto Scroll' : 'Mulai Auto Scroll'"
                aria-label="Toggle Auto Scroll"
            >
                <!-- Icon saat Auto Scroll Aktif (Panah ke bawah animasi) -->
                <div x-show="isAutoScrolling" class="flex flex-col items-center justify-center">
                    <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
                    </svg>
                </div>
                <!-- Icon saat Auto Scroll Nonaktif -->
                <div x-show="!isAutoScrolling" class="flex flex-col items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </button>

            <!-- Musik berjalan otomatis, tidak ada tombol musik -->
        </div>

    </div>

@endsection