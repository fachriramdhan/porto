<div class="grid grid-cols-5 gap-3 sm:gap-4">
    @foreach($socialLinks as $social)
    <a href="{{ $social['url'] }}"
       target="_blank"
       data-color="{{ $social['color'] }}"
       class="social-link glass-card bg-white/40 dark:bg-white/5 border border-white/60 dark:border-white/10 rounded-2xl sm:rounded-3xl p-3 sm:p-4 flex flex-col sm:flex-row items-center justify-center gap-1 sm:gap-2 shadow-sm group transition-all">
        <div class="social-icon text-lg sm:text-xl text-slate-800 dark:text-white transition-colors">
            <i class="{{ $social['icon'] }}"></i>
        </div>
        <span class="social-text text-[8px] sm:text-[10px] uppercase font-bold text-slate-800 dark:text-white tracking-tight transition-colors">
            {{ $social['name'] }}
        </span>
    </a>
    @endforeach
</div>

<script>
document.querySelectorAll('.social-link').forEach(link => {
    const color = link.dataset.color; // Langsung ambil hex dari JSON

    link.addEventListener('mouseenter', () => {
        link.querySelector('.social-icon').style.color = color;
        link.querySelector('.social-text').style.color = color;
    });

    link.addEventListener('mouseleave', () => {
        link.querySelector('.social-icon').style.color = '';
        link.querySelector('.social-text').style.color = '';
    });
});
</script>
