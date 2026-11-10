<section class="relative z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="surface-stats rounded-3xl -mt-20 relative overflow-hidden shadow-2xl reveal-on-scroll opacity-0 translate-y-10 transition-all duration-1000 ease-out">
            <div class="grid grid-cols-1 md:grid-cols-[1fr_auto_1fr_auto_1fr] items-center">
                <div
                    class="flex flex-col items-center justify-center px-6 py-8 sm:py-10 transition-all duration-700 ease-out delay-100">
                    <span x-data="{ count: 0, target: 10000 }" x-init="let start = 0;
                    let duration = 1800;
                    let startTime = null;
                    const animate = (timestamp) => {
                        if (!startTime) startTime = timestamp;
                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        count = Math.floor(progress * target);
                        if (progress < 1) { requestAnimationFrame(animate); }
                    };
                    requestAnimationFrame(animate);"
                        class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white">
                        <span x-text="count.toLocaleString()"></span>+
                    </span>
                    <span class="mt-2 text-sm sm:text-base lg:text-lg font-medium text-white/80">
                        Courses
                    </span>
                </div>
                <div class="hidden md:flex justify-center h-20">
                    <div class="w-px h-full bg-white/20 transition-opacity duration-700 delay-150"></div>
                </div>
                <div
                    class="flex flex-col items-center justify-center px-6 py-8 sm:py-10 transition-all duration-700 ease-out delay-200">
                    <span x-data="{ count: 0, target: 3000 }" x-init="let duration = 1800;
                    let startTime = null;
                    const animate = (timestamp) => {
                        if (!startTime) startTime = timestamp;
                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        count = Math.floor(progress * target);
                        if (progress < 1) { requestAnimationFrame(animate); }
                    };
                    requestAnimationFrame(animate);"
                        class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white">
                        <span x-text="count.toLocaleString()"></span>+
                    </span>
                    <span class="mt-2 text-sm sm:text-base lg:text-lg font-medium text-white/80">
                        Institutions
                    </span>
                </div>
                <div class="hidden md:flex justify-center h-20">
                    <div class="w-px h-full bg-white/20 transition-opacity duration-700 delay-250"></div>
                </div>
                <div
                    class="flex flex-col items-center justify-center px-6 py-8 sm:py-10 transition-all duration-700 ease-out delay-300">
                    <span x-data="{ count: 0, target: 1000 }" x-init="let duration = 1800;
                    let startTime = null;
                    const animate = (timestamp) => {
                        if (!startTime) startTime = timestamp;
                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        count = Math.floor(progress * target);
                        if (progress < 1) { requestAnimationFrame(animate); }
                    };
                    requestAnimationFrame(animate);"
                        class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white">
                        <span x-text="count.toLocaleString()"></span>+
                    </span>
                    <span class="mt-2 text-sm sm:text-base lg:text-lg font-medium text-white/80">
                        Verified Experts
                    </span>
                </div>

            </div>

        </div>
    </div>
</section>
