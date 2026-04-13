<header class="fixed top-0 left-0 w-full z-50 bg-black/90 backdrop-blur">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        <!-- Brand -->
        <div class="flex items-center gap-2 text-white font-medium">
            <span class="text-lg">©</span>
            <span>Radhitia Dwijaya</span>
        </div>

        <!-- Center Menu -->
        <nav class="hidden md:flex items-center gap-6 text-sm text-white/70">
            <a href="#about" class="nav-link">About</a>
            <span class="opacity-40">•</span>
            <a href="#impact" class="nav-link">Impact</a>
            <span class="opacity-40">•</span>
            <a href="#approach" class="nav-link">Approach</a>
        </nav>

        <!-- CTA -->
        <a href="https://wa.me/6281932606005?text=Hi%20Radhitia,%20I%20found%20your%20website%20and%20would%20love%20to%20discuss%20a%20potential%20collaboration."
            target="_blank" rel="noopener"
            class="hidden md:flex items-center gap-2 px-6 py-2 rounded-full border border-white/40 text-white hover:bg-white hover:text-black transition">
            Lets Collaborate!
            <svg class="w-4 h-4 mt-[1px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14"/>
                <path d="M13 5l7 7-7 7"/>
            </svg>
        </a>

        <!-- Mobile -->
        <button id="menuBtn" class="md:hidden text-white text-2xl">☰</button>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobileMenu" class="fixed inset-0 z-50 bg-black hidden flex-col px-6 py-6">

    <div class="flex items-center justify-between">
        <div class="font-semibold">© Radhitia Dwijaya</div>
        <button id="closeBtn" class="text-2xl">✕</button>
    </div>

    <nav class="flex flex-col items-center gap-6 mt-20 text-lg">
        <a href="#about">About</a>
        <a href="#impact">Impact</a>
        <a href="#approach">Approach</a>
        <a href="#contact">Contact</a>
    </nav>

    <div class="mt-auto text-center text-sm text-white/60">
        © Radhitia Dwijaya
    </div>
</div>
