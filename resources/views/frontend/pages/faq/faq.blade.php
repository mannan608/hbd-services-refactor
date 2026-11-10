@extends('frontend.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <section class="relative py-8 md:py-0 min-h-80 md:min-h-90 lg:min-h-110 flex items-center overflow-hidden -mt-4">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('frontend-img/breadcrumb.jpg') }}" alt="Training" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-linear-to-r  bg-secondary-500/75 to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="max-w-2xl">

                <h1 class="text-white font-bold text-2xl sm:text-3xl lg:text-4xl leading-tight mb-4 sm:mb-6">
                    Empowering the Next Generation of Professionals
                </h1>

                <p class="text-slate-200 text-base sm:text-lg leading-relaxed mb-6 sm:mb-8">
                    At HBD Services, we bridge the gap between academic knowledge
                    and industry demands. Our mission is to provide world-class
                    vocational education that transforms careers and fuels
                    professional growth.
                </p>


                <div class="flex flex-col sm:flex-row gap-4">

                    <a href="{{ route('courses') }}"
                        class="inline-flex items-center justify-center
                        bg-brand-600 text-white
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500
                        transition duration-300">
                        Our Courses
                    </a>

                </div>

            </div>

        </div>
    </section>

    <section class="py-8 md:py-12 lg:py-14 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex flex-col  mb-3 md:mb-4 lg:mb-6">
                <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-3"></div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-neutral-900 tracking-tight">Contact Details</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-[65%_35%] gap-6 md:gap-0">
                <div class="content pr-0 md:pr-8 lg:pr-10">
                    <p class="lg:text-base text-sm text-neutral-500">
                        If you have a question about HBD Services Australia, please contact our friendly team of Course
                        and Careers advisers. For those new to replica watches, visiting <a
                            href="https://www.skwatches.com/" class="text-brand-500">https://www.skwatches.com/</a> provides
                        an excellent starting point. The site offers comprehensive information about different Rolex models
                        and their replica counterparts.</p>


                    <div class="flex flex-col mb-4 md:mb-6 lg:mb-8 mt-4 md:mt-6 lg:mt-8">
                        <div class="h-1.5 w-14 bg-brand-500 rounded-full mb-1 "></div>
                        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-neutral-900 tracking-tight">
                            Student
                            Information Forms</h1>
                        <p class="text-neutral-500 text-sm mt-2">You can download our student information forms here</p>
                    </div>

                    <div class="form-lists flex flex-wrap gap-4">
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Application
                            form</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Complaints
                            and Appeals Form</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Deferral
                            Application Form</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">International
                            Student Handbook</a>
                        <a href=""
                            class="inline-flex items-center justify-center
                        bg-white text-brand-500 border border-brand-500
                        px-5 py-3 lg:px-6 lg:py-3
                        rounded-lg
                        hover:bg-brand-500 hover:text-white
                        transition duration-300">Course
                            Withdrawal/ Fee Refund or Variation of a Course Form</a>
                    </div>

                </div>
                <div class="border border-neutral-200 p-6 w-full rounded-lg bg-white max-w-150 mx-auto" id="get-in-touch-form">
                
                    <div class="md:mb-4 mb-3 lg:mb-6">
                        <h1 class="text-center text-xl md:text-2xl lg:text-3xl font-bold text-neutral-900">Any Questions? Ask
                            Us!!</h1>
                    </div>
                    <x-frontend.get-in-touch />
            </div>
            </div>

        </div>
    </section>
    <!-- Contact Info -->
    <section class="py-14 sm:py-20 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <!-- Heading -->
            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900">
                    General Contact Information
                </h2>
            </div>
            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-8">
                <!-- Address -->
                <div class="bg-neutral-50 rounded-2xl p-6 sm:p-8 shadow-sm border">
                    <div class="mb-5">
                        <svg class="w-8 h-8 text-neutral-900" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 11.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            <path d="M12 21s8-4.5 8-10.5S15.314 3 12 3 4 6.5 4 10.5 12 21 12 21z" />
                        </svg>
                    </div>
                    <p class="text-neutral-700 text-sm sm:text-base leading-7">
                        Level 3, 235 Church St, PARRAMATTA,NSW, Australia 2150
                    </p>

                </div>

                <!-- Phone -->
                <div class="bg-neutral-50 rounded-2xl p-6 sm:p-8 shadow-sm border">

                    <div class="mb-5">
                        <svg class="w-8 h-8 text-neutral-900" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                    </div>
                    <a href="tel:6190376310" class="text-neutral-700 text-sm sm:text-base hover:text-brand-600 transition">
                        Head-Office : +61 (02) 9037 6310
                    </a> <br>
                    <a href="tel:61410219553"
                        class="text-neutral-700 text-sm sm:text-base hover:text-brand-600 transition mt-2">
                        Head-Office : +61410 219 553
                    </a>

                </div>
                <!-- Office Time -->
                <div class="bg-neutral-50 rounded-2xl p-6 sm:p-8 shadow-sm border">

                    <div class="mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75m19.5 0v.243a2.25 2.25 0 0 1-.876 1.782l-7.5 5.625a2.25 2.25 0 0 1-2.748 0l-7.5-5.625A2.25 2.25 0 0 1 2.25 6.993V6.75" />
                        </svg>
                    </div>
                    <p class="text-neutral-700 text-sm sm:text-base leading-7">
                        info@hbdservices.edu.au
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- Map Section -->
    <section class="pb-14 sm:pb-20 lg:pb-24 bg-white">
        <div class="max-w-7xl mx-auto px-5 md:px-8">
            <!-- Heading -->
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-neutral-900">
                    Other Campus Contacts
                </h2>
            </div>
            <!-- Map -->
            <div class="rounded-2xl overflow-hidden shadow-md border">
                <iframe class="w-full h-75 sm:h-100 lg:h-125"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.948203948252!2d151.00044497657777!3d-33.81364971620606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a31facbfffff%3A0x682bea26a4fba3b!2sShop%203%2F235%20Church%20St%2C%20Parramatta%20NSW%202150%2C%20Australia!5e0!3m2!1sen!2sbd!4v1781672839236!5m2!1sen!2sbd"
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>
@endsection
