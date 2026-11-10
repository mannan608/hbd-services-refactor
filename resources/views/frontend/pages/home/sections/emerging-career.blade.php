   <section class="bg-brand-100 py-12 md:py-16 lg:py-20">
       <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">

           <header
               class="mx-auto max-w-2xl px-4 pb-6 text-center  reveal-on-scroll opacity-0 translate-y-10 transition-all duration-1000 ease-out">
               <div
                   class="inline-flex items-center gap-2 px-4 py-2 bg-brand-500/10 rounded-full mb-6 transition-all duration-700 delay-100">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                       class="lucide lucide-zap w-4 h-4 text-brand-500 transition-transform duration-500 group-hover:scale-110">
                       <path
                           d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z">
                       </path>
                   </svg>
                   <span class="text-sm font-semibold text-brand-500 uppercase"> Future Proof Your Studies</span>
               </div>

               <!-- Main Heading -->
               <h1
                   class="text-2xl sm:text-3xl font-extrabold tracking-tight text-neutral-900 md:text-4xl lg:text-5xl uppercase transition-all duration-700 delay-200">
                   Emerging Career Pathways
               </h1>

               <!-- Subheading Description -->
               <p
                   class="mx-auto mt-4 max-w-2xl text-base text-neutral-600 sm:text-lg transition-all duration-700 delay-300">
                   Align your degree choices with key industry trends and high-paying jobs in the Australian market.
               </p>
           </header>

           <!-- Cards Grid -->
           <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 text-left">

               <!-- Card 1: Data Science & AI -->
               <div
                   class="relative group overflow-hidden rounded-2xl bg-[#0b132b] p-6 shadow-md border border-neutral-800/80 flex flex-col justify-between h-[380px]">
                   <!-- Background Overlay Image -->
                   <div class="absolute inset-0 opacity-25 mix-blend-screen bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                       style="background-image: url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80');">
                   </div>
                   <div class="absolute inset-0 bg-gradient-to-t from-[#0b132b] via-[#0b132b]/80 to-transparent"></div>

                   <!-- Top Badges -->
                   <div class="relative z-10 flex items-center justify-between">
                       <span
                           class="rounded-full bg-white px-3 py-1 text-[10px] font-bold text-brand-500 uppercase tracking-wider">
                           High Growth
                       </span>
                       <span class="text-xs font-semibold text-neutral-300">
                           140+ Courses
                       </span>
                   </div>

                   <!-- Card Content -->
                   <div class="relative z-10 mt-auto">
                       <h3 class="text-xl font-bold text-white tracking-tight">
                           Data Science & AI
                       </h3>
                       <p class="mt-2 text-xs leading-relaxed text-neutral-300/90 font-normal">
                           Rapidly growing demand in tech, banking, and government. Average salary $110K AUD.
                       </p>
                       <a href="{{ route('courses') }}"
                           class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-[#00a8ff] hover:text-[#33b8ff] transition-colors">
                           View Degrees
                           <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none"
                               stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                           </svg>
                       </a>
                   </div>
               </div>

               <!-- Card 2: Cybersecurity Analyst -->
               <div
                   class="relative group overflow-hidden rounded-2xl bg-[#0b132b] p-6 shadow-md border border-neutral-800/80 flex flex-col justify-between h-[380px]">
                   <!-- Background Overlay Image -->
                   <div class="absolute inset-0 opacity-25 mix-blend-screen bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                       style="background-image: url('https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80');">
                   </div>
                   <div class="absolute inset-0 bg-gradient-to-t from-[#0b132b] via-[#0b132b]/80 to-transparent"></div>

                   <!-- Top Badges -->
                   <div class="relative z-10 flex items-center justify-between">
                       <span
                           class="rounded-full bg-white px-3 py-1 text-[10px] font-bold text-brand-500 uppercase tracking-wider">
                           Urgent Need
                       </span>
                       <span class="text-xs font-semibold text-neutral-300">
                           98+ Courses
                       </span>
                   </div>

                   <!-- Card Content -->
                   <div class="relative z-10 mt-auto">
                       <h3 class="text-xl font-bold text-white tracking-tight">
                           Cybersecurity Analyst
                       </h3>
                       <p class="mt-2 text-xs leading-relaxed text-neutral-300/90 font-normal">
                           Critical skills shortage nationally. Opportunities in enterprise cloud defense networks.
                       </p>
                       <a href="{{ route('courses') }}"
                           class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-[#00a8ff] hover:text-[#33b8ff] transition-colors">
                           View Degrees
                           <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none"
                               stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                           </svg>
                       </a>
                   </div>
               </div>

               <!-- Card 3: Healthcare Specialist -->
               <div
                   class="relative group overflow-hidden rounded-2xl bg-[#0b132b] p-6 shadow-md border border-neutral-800/80 flex flex-col justify-between h-[380px]">
                   <!-- Background Overlay Image -->
                   <div class="absolute inset-0 opacity-25 mix-blend-screen bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                       style="background-image: url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=600&q=80');">
                   </div>
                   <div class="absolute inset-0 bg-gradient-to-t from-[#0b132b] via-[#0b132b]/80 to-transparent"></div>

                   <!-- Top Badges -->
                   <div class="relative z-10 flex items-center justify-between">
                       <span
                           class="rounded-full bg-white px-3 py-1 text-[10px] font-bold text-brand-500 uppercase tracking-wider">
                           PR Pathway
                       </span>
                       <span class="text-xs font-semibold text-neutral-300">
                           220+ Courses
                       </span>
                   </div>

                   <!-- Card Content -->
                   <div class="relative z-10 mt-auto">
                       <h3 class="text-xl font-bold text-white tracking-tight">
                           Healthcare Specialist
                       </h3>
                       <p class="mt-2 text-xs leading-relaxed text-neutral-300/90 font-normal">
                           Post-graduate pathways to immediate local employment and state nomination PR options.
                       </p>
                       <a href="{{ route('courses') }}"
                           class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-[#00a8ff] hover:text-[#33b8ff] transition-colors">
                           View Degrees
                           <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none"
                               stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                           </svg>
                       </a>
                   </div>
               </div>

               <!-- Card 4: AI / Machine Learning -->
               <div
                   class="relative group overflow-hidden rounded-2xl bg-[#0b132b] p-6 shadow-md border border-neutral-800/80 flex flex-col justify-between h-[380px]">
                   <!-- Background Overlay Image -->
                   <div class="absolute inset-0 opacity-25 mix-blend-screen bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                       style="background-image: url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=600&q=80');">
                   </div>
                   <div class="absolute inset-0 bg-gradient-to-t from-[#0b132b] via-[#0b132b]/80 to-transparent"></div>

                   <!-- Top Badges -->
                   <div class="relative z-10 flex items-center justify-between">
                       <span
                           class="rounded-full bg-white px-3 py-1 text-[10px] font-bold text-brand-500 uppercase tracking-wider">
                           Cutting Edge
                       </span>
                       <span class="text-xs font-semibold text-neutral-300">
                           64+ Courses
                       </span>
                   </div>

                   <!-- Card Content -->
                   <div class="relative z-10 mt-auto">
                       <h3 class="text-xl font-bold text-white tracking-tight">
                           AI / Machine Learning
                       </h3>
                       <p class="mt-2 text-xs leading-relaxed text-neutral-300/90 font-normal">
                           Specialized engineering streams focusing on predictive architectures and smart systems.
                       </p>
                       <a href="{{ route('courses') }}"
                           class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-[#00a8ff] hover:text-[#33b8ff] transition-colors">
                           View Degrees
                           <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none"
                               stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                               <path stroke-linecap="round" stroke-linejoin="round"
                                   d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                           </svg>
                       </a>
                   </div>
               </div>

           </div>
       </div>
   </section>
