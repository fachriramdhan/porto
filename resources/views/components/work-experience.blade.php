<div class="space-y-3 sm:space-y-4">
    <div class="flex justify-between items-center px-1 sm:px-2">
        <h2 class="text-[10px] sm:text-xs md:text-sm font-black uppercase tracking-[0.2em] sm:tracking-[0.3em] text-slate-400 dark:text-slate-500">
            Work Experience
        </h2>
        <span class="text-[9px] sm:text-[10px] text-slate-400  flex items-center gap-1 xl:hidden">
            SWIPE <i class="fas fa-arrow-right"></i>
        </span>
    </div>

    <div class="flex xl:grid xl:grid-cols-3 overflow-x-auto xl:overflow-visible gap-4 no-scrollbar pb-6 xl:pb-0 snap-x snap-mandatory xl:snap-none px-1 sm:px-2">
        @foreach($workExperience as $work)
        <div class="flex-shrink-0 w-[240px] sm:w-[280px] xl:w-auto snap-start">
            <div class="glass-card bg-white/40 dark:bg-white/5 border border-white/20 dark:border-white/10 rounded-[28px] sm:rounded-[32px] p-5 sm:p-6 shadow-sm flex flex-col gap-2 hover:shadow-lg transition-all relative overflow-hidden h-full">
                <div class="absolute inset-0 opacity-10 dark:opacity-5 bg-no-repeat bg-right bg-contain pointer-events-none" style="background-image: url('{{ $work['logo'] }}');"></div>

                <h3 class="text-sm font-bold text-slate-800 dark:text-white truncate relative z-10">
                    {{ $work['company'] }}
                </h3>
                <span class="text-[10px] sm:text-[11px] text-slate-500 uppercase font-semibold relative z-10">
                    {{ $work['position'] }}
                </span>
            </div>
        </div>
        @endforeach

        <div class="flex-shrink-0 w-4 xl:hidden"></div>
    </div>
</div>
