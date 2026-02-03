<div class="space-y-3 sm:space-y-4">
    <div class="flex justify-between items-center px-1 sm:px-2">
        <h2 class="text-[10px] sm:text-xs md:text-sm font-black uppercase tracking-[0.2em] sm:tracking-[0.3em] text-slate-400 dark:text-slate-500">
            Featured Projects
        </h2>
        <div class="flex items-center gap-3">
            <span class="text-[9px] sm:text-[10px] text-slate-400 flex items-center gap-1 xl:hidden">
                SWIPE <i class="fas fa-arrow-right"></i>
            </span>
            <!-- Desktop Navigation -->
            <div class="hidden xl:flex items-center gap-2">
                <button onclick="projectSlider.prev()" class="w-9 h-9 rounded-full bg-slate-200 dark:bg-white/10 flex items-center justify-center hover:bg-slate-300 dark:hover:bg-white/20 transition-all">
                    <i class="fas fa-chevron-left text-xs text-slate-700 dark:text-white"></i>
                </button>
                <button onclick="projectSlider.next()" class="w-9 h-9 rounded-full bg-slate-200 dark:bg-white/10 flex items-center justify-center hover:bg-slate-300 dark:hover:bg-white/20 transition-all">
                    <i class="fas fa-chevron-right text-xs text-slate-700 dark:text-white"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Container dengan padding top untuk memberi ruang badge -->
    <div class="pt-4 pb-2">
        <div class="relative">
            <!-- Slider Container -->
            <div id="projectSlider" class="flex gap-4 overflow-x-auto xl:overflow-hidden no-scrollbar snap-x snap-mandatory scroll-smooth pb-6 px-1 sm:px-2">
                @foreach($projects as $index => $project)
                <div class="flex-shrink-0 w-[240px] sm:w-[280px] xl:w-[calc(33.333%-11px)] snap-start project-slide">
                    <div class="relative h-full group">
                        <!-- Badge Number -->
                        <div class="absolute -top-3 -right-3 w-11 h-11 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 dark:from-blue-400 dark:to-blue-500 flex items-center justify-center z-20 shadow-lg border-[3px] border-white dark:border-slate-900">
                            <span class="text-xs font-black text-white">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <!-- Card dengan warna yang sama seperti Work Experience -->
                        <div class="glass-card bg-white/40 dark:bg-white/5 border border-white/20 dark:border-white/10 rounded-[28px] sm:rounded-[32px] p-5 sm:p-6 shadow-sm hover:shadow-lg transition-all relative overflow-hidden h-full mt-3">
                            <div class="flex flex-col h-full relative z-10">
                                <!-- Title -->
                                <div class="mb-3 pr-6">
                                    <h3 class="text-sm sm:text-base font-bold text-slate-800 dark:text-white leading-tight group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                                        {{ $project['title'] }}
                                    </h3>
                                </div>

                                <!-- Description -->
                                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-2 flex-grow">
                                    {{ $project['description'] }}
                                </p>

                                <!-- Technologies -->
                                <div class="flex flex-wrap gap-2 mb-3">
                                    @foreach($project['technologies'] as $tech)
                                    <span class="px-2.5 py-1 text-[9px] sm:text-[10px] font-semibold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-lg border border-slate-200 dark:border-slate-700">
                                        {{ $tech }}
                                    </span>
                                    @endforeach
                                </div>

                                <!-- GitHub Link -->
                                <div class="mt-auto pt-3 border-t border-slate-200 dark:border-white/10">
                                    <a href="{{ $project['github_url'] }}" target="_blank" class="group/link inline-flex items-center gap-2 text-[10px] sm:text-xs font-bold text-blue-600 dark:text-blue-400 uppercase tracking-wider hover:gap-3 transition-all">
                                        <i class="fab fa-github text-sm"></i>
                                        <span>View on GitHub</span>
                                        <i class="fas fa-arrow-right text-[8px] opacity-0 group-hover/link:opacity-100 transition-opacity"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Spacer untuk mobile -->
                <div class="flex-shrink-0 w-4 xl:hidden"></div>
            </div>

            <!-- Pagination Dots -->
            <div id="projectDots" class="flex justify-center gap-2 mt-3">
                @foreach($projects as $index => $project)
                <button onclick="projectSlider.goTo({{ $index }})" class="project-dot w-2 h-2 rounded-full bg-slate-300 dark:bg-slate-700 transition-all {{ $index === 0 ? 'w-8 bg-blue-500 dark:bg-blue-500' : '' }}" data-index="{{ $index }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
const projectSlider = {
    container: null,
    currentIndex: 0,
    totalSlides: {{ count($projects) }},
    slidesPerView: 3,

    init() {
        this.container = document.getElementById('projectSlider');
        this.updateSlidesPerView();
        this.setupAutoScroll();

        window.addEventListener('resize', () => {
            this.updateSlidesPerView();
        });
    },

    updateSlidesPerView() {
        const width = window.innerWidth;
        if (width < 1280) {
            this.slidesPerView = 1;
        } else {
            this.slidesPerView = 3;
        }
    },

    setupAutoScroll() {
        this.container.addEventListener('scroll', () => {
            const scrollLeft = this.container.scrollLeft;
            const firstSlide = this.container.querySelector('.project-slide');
            if (!firstSlide) return;

            const slideWidth = firstSlide.offsetWidth + 16; // 16 adalah gap-4
            const newIndex = Math.round(scrollLeft / slideWidth);

            if (newIndex !== this.currentIndex) {
                this.currentIndex = newIndex;
                this.updateDots();
            }
        });
    },

    goTo(index) {
        const firstSlide = this.container.querySelector('.project-slide');
        if (!firstSlide) return;

        const slideWidth = firstSlide.offsetWidth + 16;

        // Untuk desktop (3 kolom), scroll per 3 slides
        let targetIndex = index;
        if (window.innerWidth >= 1280) {
            targetIndex = Math.floor(index / 3) * 3;
        }

        this.container.scrollTo({
            left: slideWidth * targetIndex,
            behavior: 'smooth'
        });
        this.currentIndex = targetIndex;
        this.updateDots();
    },

    next() {
        let step = 1;
        if (window.innerWidth >= 1280) {
            step = 3; // Desktop: geser 3 slides sekaligus
        }

        const nextIndex = this.currentIndex + step;
        if (nextIndex < this.totalSlides) {
            this.goTo(nextIndex);
        } else {
            this.goTo(0); // Loop ke awal
        }
    },

    prev() {
        let step = 1;
        if (window.innerWidth >= 1280) {
            step = 3; // Desktop: geser 3 slides sekaligus
        }

        const prevIndex = this.currentIndex - step;
        if (prevIndex >= 0) {
            this.goTo(prevIndex);
        } else {
            // Loop ke akhir
            const lastGroupIndex = Math.floor((this.totalSlides - 1) / step) * step;
            this.goTo(lastGroupIndex);
        }
    },

    updateDots() {
        document.querySelectorAll('.project-dot').forEach((dot, index) => {
            let isActive = false;

            if (window.innerWidth >= 1280) {
                // Desktop: highlight 3 dots sekaligus
                const groupStart = Math.floor(this.currentIndex / 3) * 3;
                const groupEnd = groupStart + 3;
                isActive = index >= groupStart && index < groupEnd;
            } else {
                // Mobile: highlight 1 dot
                isActive = index === this.currentIndex;
            }

            if (isActive) {
                dot.classList.add('w-8', 'bg-blue-500', 'dark:bg-blue-500');
                dot.classList.remove('w-2', 'bg-slate-300', 'dark:bg-slate-700');
            } else {
                dot.classList.remove('w-8', 'bg-blue-500', 'dark:bg-blue-500');
                dot.classList.add('w-2', 'bg-slate-300', 'dark:bg-slate-700');
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', () => projectSlider.init());
</script>
