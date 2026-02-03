<aside class="w-full lg:w-[380px] flex-shrink-0 lg:h-auto">
    <div class="relative flex justify-center z-20 -mb-12 lg:mb-0">
        <div class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 bg-gradient-to-tr from-blue-400 to-blue-900 rounded-[35px] sm:rounded-[45px] flex items-center justify-center overflow-hidden ] border-4 border-white dark:border-black/20 pointer-events-auto">
            <img src="{{ asset($profile['profile_image']) }}" class="w-full h-full object-cover object-top scale-100" alt="Avatar {{ $profile['name'] }}">
        </div>
    </div>

    <div class="glass-card bg-white/60 dark:bg-white/5 border border-white dark:border-white/10 rounded-[35px] sm:rounded-[45px] lg:-mt-20 lg:pt-28 pt-16 pb-8 sm:pb-10 px-4 sm:px-8 text-center shadow-xl dark:shadow-2xl relative">
        <button onclick="toggleTheme()" class="absolute z-50 top-4 lg:top-20 right-4 lg:right-5 w-12 h-12 flex items-center justify-center rounded-full bg-slate-200 dark:bg-white/10 text-slate-700 dark:text-yellow-400 transition-all hover:scale-110 active:scale-90 pointer-events-auto">
            <i id="theme-icon" class="fas fa-moon"></i>
        </button>

        <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
            {{ $profile['name'] }}
        </h1>
        <p class="text-blue-600 dark:text-blue-400 text-xs sm:text-sm font-semibold mt-1 tracking-wide">
            {{ $profile['title'] }}
        </p>

        <p class="hidden lg:block text-[11px] sm:text-sm text-slate-600 dark:text-slate-400 mt-3 sm:mt-4 leading-relaxed px-2 text-justify">
            {{ $profile['description'] }}
        </p>

        <!-- Mobile: Horizontal Layout -->
        <div class="mt-4 sm:mt-6 flex flex-row lg:hidden items-center justify-center gap-1 w-full border-t border-slate-200 dark:border-white/5 pt-6">
            <div class="flex flex-row items-center justify-center gap-1.5 flex-1 min-w-0">
                <span class="w-7 h-7 flex items-center justify-center bg-slate-200 dark:bg-white/10 rounded-full shrink-0">
                    <i class="fas fa-user-graduate text-blue-500 text-[10px]"></i>
                </span>
                <span class="font-medium text-[9px] text-slate-600 dark:text-slate-300 leading-tight text-left">
                    {{ $profile['education'] }}
                </span>
            </div>

            <div class="w-[1px] h-6 bg-slate-200 dark:bg-white/10"></div>

            <div class="flex flex-row items-center justify-center gap-1.5 flex-1 min-w-0">
                <span class="w-7 h-7 flex items-center justify-center bg-slate-200 dark:bg-white/10 rounded-full shrink-0">
                    <i class="fas fa-map-marker-alt text-red-500 text-[10px]"></i>
                </span>
                <span class="font-medium text-[9px] text-slate-600 dark:text-slate-300 leading-tight text-left">
                    {{ $profile['location'] }}
                </span>
            </div>

            <div class="w-[1px] h-6 bg-slate-200 dark:bg-white/10"></div>

            <div class="flex flex-row items-center justify-center gap-1.5 flex-1 min-w-0">
                <span class="w-7 h-7 flex items-center justify-center bg-slate-200 dark:bg-white/10 rounded-full shrink-0">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                </span>
                <span class="font-semibold text-green-600 dark:text-green-400 text-[9px] leading-tight text-left">
                    {{ $profile['status'] }}
                </span>
            </div>
        </div>

        <!-- Desktop: Vertical Layout (Rata Kiri) -->
        <div class="hidden lg:flex flex-col gap-3 mt-6">
            <!-- S1 Teknologi Informasi -->
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 flex items-center justify-center bg-slate-200 dark:bg-white/10 rounded-full shrink-0">
                    <i class="fas fa-user-graduate text-blue-500 text-sm"></i>
                </span>
                <span class="font-medium text-sm text-slate-600 dark:text-slate-300 text-left">
                    {{ $profile['education'] }}
                </span>
            </div>

            <!-- Jakarta, Indonesia -->
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 flex items-center justify-center bg-slate-200 dark:bg-white/10 rounded-full shrink-0">
                    <i class="fas fa-map-marker-alt text-red-500 text-sm"></i>
                </span>
                <span class="font-medium text-sm text-slate-600 dark:text-slate-300 text-left">
                    {{ $profile['location'] }}
                </span>
            </div>

            <!-- Available for Hire -->
            <div class="flex items-center gap-3">
                <span class="w-9 h-9 flex items-center justify-center bg-slate-200 dark:bg-white/10 rounded-full shrink-0">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                </span>
                <span class="font-semibold text-green-600 dark:text-green-400 text-sm text-left">
                    {{ $profile['status'] }}
                </span>
            </div>
        </div>

        {{--  blade-formatter-disable --}}
        <a href="{{ asset($profile['cv_url']) }}" download class="mt-6 sm:mt-7 w-full inline-flex items-center justify-center gap-2 bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-6 py-3 rounded-2xl font-bold text-sm hover:scale-105 active:scale-95 transition-all shadow-lg hover:shadow-xl">
        {{-- blade-formatter-enable --}}
            <i class="fas fa-download"></i>
            <span>Download CV</span>
        </a>
    </div>

    <p class="hidden lg:block text-[12px] text-slate-500 text-center mt-2 dark:text-slate-400">
        © {{ date('Y') }} {{ $profile['name'] }}. All rights reserved.
    </p>
</aside>
