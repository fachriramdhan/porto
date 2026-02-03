<div class="space-y-3 sm:space-y-4 px-2">
    <h2 class="text-[10px] sm:text-xs md:text-sm font-black uppercase tracking-[0.2em] sm:tracking-[0.3em] text-slate-400 dark:text-slate-500">
        Tech Stack
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @foreach($techStack as $category => $technologies)
        <div class="w-full">
            <div class="glass-card bg-white/40 dark:bg-white/5 border border-white/10 dark:border-white/5 rounded-[28px] sm:rounded-[32px] p-5 sm:p-6 shadow-sm hover:shadow-lg transition-all relative overflow-hidden">
                <!-- Background Text -->
                <div class="absolute inset-0 flex items-center justify-center opacity-10 dark:opacity-5 text-4xl sm:text-5xl md:text-6xl font-extrabold uppercase text-slate-400 dark:text-white select-none pointer-events-none">
                    {{ ucfirst($category) }}
                </div>

                <!-- Tech Icons Container -->
                <div class="relative z-10 flex gap-3 overflow-x-auto no-scrollbar snap-x snap-mandatory px-1">
                    @foreach($technologies as $tech)
                    <div class="flex flex-col items-center gap-1.5 flex-shrink-0 w-[50px] sm:w-[60px] group cursor-default snap-start">
                        <div class="w-7 h-7 sm:w-9 sm:h-9 flex items-center justify-center">
                            <img src="{{ asset($tech['icon']) }}"
                                 alt="{{ $tech['name'] }}"
                                 class="w-full h-full object-contain group-hover:scale-110 transition-transform {{ isset($tech['dark_invert']) && $tech['dark_invert'] ? 'dark:invert' : '' }}">
                        </div>
                        <span class="text-[8px] sm:text-[9px] font-bold text-slate-500 dark:text-slate-400 text-center leading-tight">
                            {{ $tech['name'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
