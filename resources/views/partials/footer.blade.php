<footer class="bg-black text-white pb-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="overflow-hidden">

            <!-- Big Footer Brand (IMAGE) -->
            <div class="flex flex-wrap items-start gap-4 py-6">
                <img
                    src="{{ asset('assets/img/copyright.png') }}"
                    alt="© Radhitia Dwijaya"
                    class="w-full"
                />
            </div>

        </div>
    </div>

    <!-- Bottom meta -->
    <div class="border-white/10 px-6 text-white/60 text-sm">

        <!-- Desktop -->
        <div class="hidden md:flex items-center justify-between">
            <p>© {{ date('Y') }} Radhitia Dwijaya. All rights reserved.</p>
            <span class="flex-1 h-px bg-white/10 mx-6"></span>
            <p>Founder — Ragaku Studio</p>
            <span class="flex-1 h-px bg-white/10 mx-6"></span>
            <p>Crafted with care, meant to last</p>
        </div>

        <!-- Mobile -->
        <div class="flex flex-col items-center gap-3 text-center md:hidden">
            <p>© {{ date('Y') }} Radhitia Dwijaya. All rights reserved.</p>
            <p>Founder — Ragaku Studio</p>
            <p>Built with care</p>
        </div>

    </div>

    <!-- Back to top with progress -->
    <button id="backToTop"
        class="fixed bottom-6 right-6 z-50
               w-12 h-12
               rounded-full
               flex items-center justify-center
               text-white
               border border-white/30
               bg-black/60 backdrop-blur
               opacity-0 pointer-events-none
               transition-opacity duration-300">

        <!-- Arrow -->
        <span class="absolute text-sm">↑</span>

        <!-- Progress Circle -->
        <svg class="absolute inset-0 w-full h-full -rotate-90" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="45"
                fill="none"
                stroke="rgba(255,255,255,.25)"
                stroke-width="4" />
            <circle id="progressCircle"
                cx="50" cy="50" r="45"
                fill="none"
                stroke="#A3E635"
                stroke-width="4"
                stroke-dasharray="282.6"
                stroke-dashoffset="282.6"
                stroke-linecap="round" />
        </svg>

    </button>

</footer>
