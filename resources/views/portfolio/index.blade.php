@extends('layouts.app')

@section('title', $portfolioData['profile']['name'] . ' - Portfolio')

@section('content')
<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16 h-full lg:h-full">
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 h-auto lg:h-full overflow-y-auto lg:overflow-visible">

        <!-- SIDEBAR -->
        @include('components.sidebar', ['profile' => $portfolioData['profile']])

        <!-- MAIN CONTENT -->
        <main class="flex-1 space-y-5 sm:space-y-6 lg:space-y-7 overflow-y-auto lg:overflow-y-auto pr-2 no-scrollbar pb-8 lg:pb-0">

            <!-- Social Links -->
            @include('components.social-links', ['socialLinks' => $portfolioData['social_links']])

            <!-- Contact Links -->
            @include('components.contact-links', ['contactLinks' => $portfolioData['contact_links']])

            <!-- Work Experience -->
            @include('components.work-experience', ['workExperience' => $portfolioData['work_experience']])

            <!-- Projects -->
            @include('components.projects', ['projects' => $portfolioData['projects']])

            <!-- Tech Stack -->
            @include('components.tech-stack', ['techStack' => $portfolioData['tech_stack']])

            <!-- Footer Spacing -->
            <div class="h-4"></div>
        </main>
    </div>
</div>

<!-- Script Theme Toggle -->
<script>
    const html = document.documentElement;
    const themeIcon = document.getElementById("theme-icon");

    // Cek preferensi user sebelumnya
    if (localStorage.getItem("theme") === "light") {
        html.classList.remove("dark");
        themeIcon.classList.replace("fa-moon", "fa-sun");
    }

    function toggleTheme() {
        if (html.classList.contains("dark")) {
            html.classList.remove("dark");
            themeIcon.classList.replace("fa-moon", "fa-sun");
            localStorage.setItem("theme", "light");
        } else {
            html.classList.add("dark");
            themeIcon.classList.replace("fa-sun", "fa-moon");
            localStorage.setItem("theme", "dark");
        }
    }
</script>
@endsection
