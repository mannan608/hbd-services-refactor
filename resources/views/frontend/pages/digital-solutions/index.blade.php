@extends('frontend.layouts.app')

@section('content')
@php
    $steps = [
        ['01', 'Manage learners', 'Centralise enrolments, student records, communication and administration.', 'bg-brand-600'],
        ['02', 'Deliver learning', 'Build engaging learning journeys and keep resources accessible online.', 'bg-accent-one-500'],
        ['03', 'Assess skills', 'Map competencies, record assessment outcomes and track compliance.', 'bg-brand-700'],
        ['04', 'Capture workplace evidence', 'Connect learners, employers and assessors with real-world progress.', 'bg-brand-500'],
    ];

    $products = [
        ['Student Management', 'Administration', 'Complete lifecycle administration from enrolment and course records to compliance and reporting.', '#student', 'brand', 'lucide:user-round'],
        ['Learning Management', 'Learning', 'Engaging learning experiences, structured paths, online assessments, and instant progress tracking.', '#learning', 'green', 'lucide:book-open'],
        ['Skills-based Education', 'Competency', 'Real-time competency mapping, workforce authorization, and early skills-gap identification.', '#skills', 'navy', 'lucide:award'],
        ['Work-based Education', 'Field & Work', 'Mobile digital logbooks, real-world field evidence capture, and seamless employer collaboration.', '#workplace', 'cyan', 'lucide:briefcase-business'],
    ];

    $security = [
        ['lucide:cloud', 'Cloud hosting', 'Resilient infrastructure and dependable access.'],
        ['lucide:shield-check', 'Access protection', 'Role-based permissions help keep sensitive information protected.'],
        ['lucide:badge-check', 'Compliance support', 'Support audit readiness and consistent processes.'],
        ['lucide:clipboard-check', 'Traceable records', 'Keep key actions and evidence organised.'],
    ];

    $testimonials = [
        ['MC', 'Melissa Carter', 'Operations Director, Health Skills Australia', 'bg-brand-600', 'We replaced four disconnected systems with HBD. Audit preparation went from three weeks to three days — the evidence is simply always there.'],
        ['DR', 'David Reeves', 'Training Manager, Mining Academy', 'bg-accent-one-500', 'Our apprentices log evidence from site on their phones. Supervisors sign off the same day. The competency matrix has transformed how we plan training.'],
        ['PN', 'Priya Nair', 'CEO, Capital College Group', 'bg-brand-500', 'The LMS and student management connection is seamless. Enrolments flow straight into learning paths — our admin team saves over 20 hours a week.'],
    ];

    $solutions = [
        ['Private RTO', 'Gain complete control of your training management with a system that lets you focus on learner engagement.', '/solutions/private-rto', 'text-brand-700', 'bg-brand-50'],
        ['TAFE', 'Deliver a better student and apprentice experience with a system that integrates with all of yours.', '/solutions/university', 'text-brand-600', 'bg-accent-one-500-light'],
        ['Government', 'Improve your training outcomes with a secure platform that conforms to the needs of your agency.', '/solutions/government', 'text-accent-two-500', 'bg-accent-two-500-light'],
        ['Enterprise', 'Give your staff the tools they need to thrive at work with a training solution that does all the heavy lifting.', '/solutions/enterprise', 'text-brand-700', 'bg-sky-light'],
    ];

    $universities = collect([
        ['name' => 'Nomi College', 'logo' => asset('frontend/rto/nomi-logo.png')],
        ['name' => 'The Wales Institute Pty Ltd', 'logo' => asset('frontend/rto/twi-logo.webp')],
        ['name' => 'Sydney International School', 'logo' => asset('frontend/rto/sis-logo.png')],
        ['name' => 'Australian Scholar’s College', 'logo' => asset('frontend/rto/asc.png')],
        ['name' => 'Horizon International College', 'logo' => asset('frontend/rto/hic-logo.jpg')],
        ['name' => 'Infinity Business College Pty Ltd', 'logo' => asset('frontend/rto/ibc-logo.png')],
        ['name' => 'Professions TA AVM Skills Institute', 'logo' => asset('frontend/rto/avm.png')],
        ['name' => 'Nomi College', 'logo' => asset('frontend/rto/nomi-logo.png')],
        ['name' => 'The Wales Institute Pty Ltd', 'logo' => asset('frontend/rto/twi-logo.webp')],
        ['name' => 'Sydney International School', 'logo' => asset('frontend/rto/sis-logo.png')],
    ])->filter(fn ($university) => !empty($university['name']) && !empty($university['logo']))->values();
@endphp

{{-- 1. HERO --}}
<section class="relative isolate overflow-hidden  py-16 lg:py-20">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div data-reveal>
                <span class="mb-5 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-accent-one-500-light px-4 py-2 text-sm font-semibold text-brand-800">
                    <iconify-icon icon="lucide:shield-check" class="text-base"></iconify-icon>
                    One connected training platform
                </span>
                <h1 class="mb-6 text-[40px] font-semibold leading-[1.12] tracking-[-0.03em] text-black sm:text-[48px] lg:text-[52px]">
                    Complete Training &amp; Work-Based Skills Management
                </h1>
                <p class="mb-8 max-w-xl text-base leading-7 text-brand-600">
                    Seamlessly link student management, e-learning, workplace logbooks, and compliance in one modern, scalable cloud software.
                </p>
                <div class="mb-8 flex flex-wrap gap-3">
                    <a href="#contact" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-brand-700 to-brand-500 px-6 py-3.5 font-semibold text-white shadow-md transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                        <iconify-icon icon="lucide:calendar-check" class="text-lg"></iconify-icon>
                        Book Free Demo
                    </a>
                    <a href="#overview" class="inline-flex items-center gap-2 rounded-xl border border-brand-100 bg-white px-6 py-3.5 font-semibold text-brand-700 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-brand-200 hover:text-brand-700">
                        Explore Features <iconify-icon icon="lucide:arrow-down" class="text-base"></iconify-icon>
                    </a>
                </div>
                <div class="flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium text-brand-600">
                    <span class="inline-flex items-center gap-2"><iconify-icon icon="lucide:check-circle" class="text-accent-one-500"></iconify-icon>RTO Compliant</span>
                    <span class="inline-flex items-center gap-2"><iconify-icon icon="lucide:check-circle" class="text-accent-one-500"></iconify-icon>Digital Logbooks</span>
                    <span class="inline-flex items-center gap-2"><iconify-icon icon="lucide:check-circle" class="text-accent-one-500"></iconify-icon>Live Analytics</span>
                </div>
            </div>

            <div data-reveal>
                <div class="overflow-hidden rounded-2xl border border-brand-100 bg-white shadow-md transition duration-500 hover:-translate-y-2">
                    <div class="flex items-center gap-2 border-b border-brand-100 bg-brand-25 px-4 py-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-red-500"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-accent-two-500"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-accent-one-500"></span>
                        <span class="ml-2 text-xs text-brand-500">http://hbdservices/admin/dashboard</span>
                    </div>
                    <div class="bg-brand-25 p-3 sm:p-5">
                        <img src="{{ asset('dashboard-preview.png') }}" alt="Dashboard Preview" class="w-full rounded-xl shadow-md">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 2. LEARNER JOURNEY --}}
<section class="bg-brand-25 py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto mb-12 max-w-2xl text-center" data-reveal>
            <span class="mb-3 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-brand-700">
                <span class="h-0.5 w-7 rounded-full bg-gradient-to-r from-brand-600 to-brand-500"></span>
                A connected learner journey
            </span>
            <h2 class="mb-4 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">One platform. Every stage of training.</h2>
            <p class="text-base leading-7 text-brand-600">From enrolment to assessment and workplace evidence, keep every learner, trainer and administrator moving in the same direction.</p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($steps as $step)
            <div class="" data-reveal>
                <article  class="group rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-brand-200">
                    <span class="mb-5 inline-flex h-11 w-11 items-center justify-center rounded-xl {{ $step[3] }} text-sm font-bold text-white shadow-md">{{ $step[0] }}</span>
                    <h3 class="mb-2 text-base font-semibold text-black">{{ $step[1] }}</h3>
                    <p class="text-sm leading-6 text-brand-600 line-clamp-2">{{ $step[2] }}</p>
                </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 3. SERVICES --}}
<section id="services" class="py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto mb-12 max-w-2xl text-center" data-reveal>
            <span class="mb-3 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-brand-700"><span class="h-0.5 w-7 rounded-full bg-gradient-to-r from-brand-600 to-brand-500"></span>Services we provide</span>
            <h2 class="mb-4 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Beyond the platform</h2>
            <p class="leading-7 text-brand-600">Our specialist teams also design, build, and grow your digital presence.</p>
        </div>
        <div class="grid gap-6 lg:grid-cols-2">
            <article data-reveal class="group rounded-2xl border border-brand-100 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg sm:p-9">
                <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-brand-700">Service 01</span>
                <h3 class="mb-3 text-xl font-semibold leading-snug text-black">Web Development</h3>
                <p class="text-brand-600">Specialised in building creative, high-performance websites and web applications — delivered on time and within budget.</p>
                <div class="my-6 grid gap-3 text-sm font-medium text-brand-600 sm:grid-cols-2">
                    @foreach (['Custom web applications', 'Responsive UI design', 'Education tech solutions', 'Ongoing support'] as $feature)
                        <span class="flex items-center gap-2"><iconify-icon icon="lucide:check-circle-2" class="text-accent-one-500"></iconify-icon>{{ $feature }}</span>
                    @endforeach
                </div>
                <a href="#contact" class="inline-flex items-center gap-2 rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-brand-800">Discuss your project <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </article>
            <article data-reveal class="group rounded-2xl border border-brand-100 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg sm:p-9">
                <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-brand-700">Service 02</span>
                <h3 class="mb-3 text-xl font-semibold leading-snug text-black">Digital Marketing</h3>
                <p class="text-brand-600">Data-driven campaigns that grow traffic, leads, and revenue — from SEO and content to PPC and social media.</p>
                <div class="my-6 grid gap-3 text-sm font-medium text-brand-600 sm:grid-cols-2">
                    @foreach (['SEO & content marketing', 'PPC advertising', 'Email automation', 'Social media campaigns'] as $feature)
                        <span class="flex items-center gap-2"><iconify-icon icon="lucide:check-circle-2" class="text-accent-one-500"></iconify-icon>{{ $feature }}</span>
                    @endforeach
                </div>
                <a href="#contact" class="inline-flex items-center gap-2 rounded-xl bg-brand-700 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-brand-800">Grow your reach <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </article>
        </div>
    </div>
</section>

{{-- 4. PRODUCTS OVERVIEW --}}
<section id="overview" class="bg-brand-25 py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto mb-12 max-w-3xl text-center" data-reveal>
            <span class="mb-4 inline-flex rounded-full border border-brand-200 bg-brand-50 px-4 py-2 text-sm font-semibold text-brand-700">Integrated Platform</span>
            <h2 class="mb-4 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Enterprise Education Platform</h2>
            <p class="text-base leading-7 text-brand-600">End-to-end management solutions designed to streamline administration, elevate learning experiences, track skills, and capture real-world work evidence.</p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($products as $product)
                <article data-reveal class="flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg">
                    <span class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-xl text-brand-700"><iconify-icon icon="{{ $product[5] }}"></iconify-icon></span>
                    <span class="mb-3 self-start rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-600">{{ $product[1] }}</span>
                    <h3 class="mb-2 text-base font-semibold text-black">{{ $product[0] }}</h3>
                    <p class="mb-6 flex-1 text-sm leading-6 text-brand-600">{{ $product[2] }}</p>
                    <a href="{{ $product[3] }}" class="inline-flex items-center justify-center rounded-xl border border-brand-200 px-4 py-2.5 text-sm font-semibold text-brand-700 transition hover:bg-brand-700 hover:text-white">Book Demo Now</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 5. STUDENT MANAGEMENT --}}
<section id="student" class="bg-white py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div data-reveal>
                <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-brand-700">Student Management System</span>
                <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Compliant, scalable student management.</h2>
                <p class="mb-7 leading-7 text-brand-600">Manage the full student lifecycle in one place, from first enquiry and enrolment through to records, reporting and completion.</p>
                <ul class="mb-8 space-y-4 text-brand-600">
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-one-500"></iconify-icon><span><strong class="text-black">Student administration:</strong> Keep profiles, enrolments, courses and key documents organised.</span></li>
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-one-500"></iconify-icon><span><strong class="text-black">Compliance and reporting:</strong> Improve visibility of records, obligations, outcomes and audit readiness.</span></li>
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-one-500"></iconify-icon><span><strong class="text-black">Audit log and workflows:</strong> Track important changes and streamline repetitive administrative tasks.</span></li>
                </ul>
                <a href="#contact" class="inline-flex items-center gap-2 rounded-xl border border-brand-200 px-5 py-3 font-semibold text-brand-700 transition hover:bg-brand-700 hover:text-white">Explore student management <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </div>
            <div data-reveal class="rounded-2xl bg-brand-25 p-4 shadow-md sm:p-6">
                <div class="mb-4 flex items-center justify-between"><h3 class="font-bold text-black">Student Records Overview</h3><span class="rounded-full bg-accent-one-500-light px-3 py-1 text-xs font-bold text-brand-600">Compliant</span></div>
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=85" alt="Student Analytics" class="w-full rounded-2xl shadow-md">
            </div>
        </div>
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ([['lucide:clipboard-check', 'Clear audit trails', 'Access a full, unalterable history of record updates and important student milestone activities.'], ['lucide:chart-no-axes-combined', 'Useful reporting', 'Make informed operational decisions with organized data views and practical export tools.'], ['lucide:plug', 'Connected systems', 'Eliminate redundant data entry by seamlessly integrating with the tools your organization relies on.']] as $feature)
                <article class="rounded-2xl border border-brand-100 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <span class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-xl text-brand-700"><iconify-icon icon="{{ $feature[0] }}"></iconify-icon></span>
                    <h3 class="mb-2 text-base font-semibold text-black">{{ $feature[1] }}</h3><p class="text-sm leading-6 text-brand-600">{{ $feature[2] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 6. LEARNING MANAGEMENT --}}
<section id="learning" class="bg-brand-25 py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div class="lg:order-2" data-reveal>
                <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-brand-600">Learning Management System</span>
                <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Engaging learning experiences, built for every learner.</h2>
                <p class="mb-7 leading-7 text-brand-600">Create and deliver structured online learning that helps learners stay engaged and gives trainers a clear view of progress.</p>
                <ul class="mb-8 space-y-4 text-brand-600">
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-one-500"></iconify-icon><span><strong class="text-black">Guided learning journeys:</strong> Organise content and activities into clear learning paths.</span></li>
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-one-500"></iconify-icon><span><strong class="text-black">Online assessments:</strong> Deliver assessments, capture responses and track results in one place.</span></li>
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-one-500"></iconify-icon><span><strong class="text-black">Progress visibility:</strong> Help learners and trainers understand completions instantly.</span></li>
                </ul>
                <a href="#contact" class="inline-flex items-center gap-2 rounded-xl border border-brand-200 px-5 py-3 font-semibold text-brand-600 transition hover:bg-accent-one-500 hover:text-white">Explore learning management <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </div>
            <div class="rounded-2xl bg-white p-4 shadow-md sm:p-6 lg:order-1" data-reveal>
                <h3 class="mb-4 font-bold text-black">Interactive Courses Dashboard</h3>
                <img src="{{ asset('lms.jpeg') }}" alt="Learning Dashboard" class="w-full rounded-2xl shadow-md">
            </div>
        </div>
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ([['lucide:play-square', 'Learning content', 'Consolidate rich multimedia resources, assignments, and curriculum material seamlessly.'], ['lucide:list-checks', 'Assessment tools', 'Support consistent grading schemes, rubrics, and immediate constructive learner feedback.'], ['lucide:messages-square', 'Learner communication', 'Keep students directly connected with instructors through built-in discussion boards and notices.']] as $feature)
                <article class="rounded-2xl border border-brand-100 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <span class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-accent-one-500-light text-xl text-brand-600"><iconify-icon icon="{{ $feature[0] }}"></iconify-icon></span>
                    <h3 class="mb-2 text-base font-semibold text-black">{{ $feature[1] }}</h3><p class="text-sm leading-6 text-brand-600">{{ $feature[2] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 7. SKILLS-BASED EDUCATION --}}
<section id="skills" class="bg-white py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div data-reveal>
                <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-brand-500">Skills-based Education</span>
                <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Make competency and compliance visible.</h2>
                <p class="mb-7 leading-7 text-brand-600">Give trainers and administrators one place to manage workforce competencies, authorisations and assessment evidence in real time.</p>
                <ul class="mb-8 space-y-4 text-brand-600">
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-brand-500"></iconify-icon><span><strong class="text-black">Competency mapping:</strong> Match skills and requirements to roles and units.</span></li>
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-brand-500"></iconify-icon><span><strong class="text-black">Skills gap visibility:</strong> Identify gaps and plan training before operational risks occur.</span></li>
                </ul>
                <a href="#contact" class="inline-flex items-center gap-2 rounded-xl border border-brand-200 px-5 py-3 font-semibold text-brand-500 transition hover:bg-brand-500 hover:text-white">Explore skills management <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </div>
            <div data-reveal class="rounded-2xl bg-brand-25 p-4 shadow-md sm:p-6">
                <h3 class="mb-4 font-bold text-black">Competency Matrix &amp; Status</h3>
                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1000&q=85" alt="Skills Matrix" class="w-full rounded-2xl shadow-md">
            </div>
        </div>
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ([['lucide:network', 'Role-based skills', 'Define clear skill profiles and prerequisites required for every job title or project assignment.'], ['lucide:shield-check', 'Risk reduction', 'Highlight expiring credentials early to prevent compliance gaps and operational downtime.'], ['lucide:clipboard-list', 'Live visibility', 'Deliver intuitive visual dashboards so decision-makers can verify team readiness instantly.']] as $feature)
                <article class="rounded-2xl border border-brand-100 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <span class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-xl text-brand-500"><iconify-icon icon="{{ $feature[0] }}"></iconify-icon></span>
                    <h3 class="mb-2 text-base font-semibold text-black">{{ $feature[1] }}</h3><p class="text-sm leading-6 text-brand-600">{{ $feature[2] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 8. WORK-BASED EDUCATION --}}
<section id="workplace" class="bg-brand-25 py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div class="lg:order-2" data-reveal>
                <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-accent-two-500">Work-based Education</span>
                <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Capture evidence from the real world of work.</h2>
                <p class="mb-7 leading-7 text-brand-600">Manage placements, apprenticeships and on-the-job training from setup through completion, connecting learners, assessors and employers.</p>
                <ul class="mb-8 space-y-4 text-brand-600">
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-two-500"></iconify-icon><span><strong class="text-black">Digital logbooks:</strong> Capture workplace activity and evidence on the go via mobile.</span></li>
                    <li class="flex gap-3"><iconify-icon icon="lucide:check-circle" class="mt-1 shrink-0 text-xl text-accent-two-500"></iconify-icon><span><strong class="text-black">Employer collaboration:</strong> Make supervisor feedback easy to share.</span></li>
                </ul>
                <a href="#contact" class="inline-flex items-center gap-2 rounded-xl border border-sky px-5 py-3 font-semibold text-accent-two-500 transition hover:bg-accent-two-500 hover:text-white">Explore work-based education <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
            </div>
            <div class="rounded-2xl bg-white p-4 shadow-md sm:p-6 lg:order-1" data-reveal>
                <h3 class="mb-4 font-bold text-black">Mobile Logbook &amp; Field Evidence</h3>
                <img src="{{ asset('workbase.jpeg') }}" alt="Mobile Workplace Logbook" class="w-full rounded-2xl shadow-md">
            </div>
        </div>
        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach ([['lucide:smartphone', 'Capture on the go', 'Allow learners to quickly record workplace notes, photo evidence, and supervisor signatures from any mobile device.'], ['lucide:calendar-check', 'Milestones in view', 'Track total placement hours, module requirements, and pending action items effortlessly in one dashboard.'], ['lucide:users', 'Keep everyone aligned', 'Maintain an active link between learners, workplace supervisors, and educational institution coordinators.']] as $feature)
                <article class="rounded-2xl border border-brand-100 bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <span class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-accent-two-500-light text-xl text-accent-two-500"><iconify-icon icon="{{ $feature[0] }}"></iconify-icon></span>
                    <h3 class="mb-2 text-base font-semibold text-black">{{ $feature[1] }}</h3><p class="text-sm leading-6 text-brand-600">{{ $feature[2] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 9. INTEGRATIONS BANNER --}}
<section class="bg-white py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="rounded-2xl border border-sky bg-sky-light p-4 shadow-md" data-reveal>
            <img src="https://cdn.prod.website-files.com/648a830e8b95457fb1b56486/648a830e8b95457fb1b566ef_moodle-stripe.png" loading="lazy" alt="Integrations Illustration" class="w-full rounded-2xl object-cover shadow-sm">
        </div>
        <div data-reveal>
            <span class="mb-3 block text-xs font-bold uppercase tracking-[0.16em] text-brand-700">Connected integrations</span>
            <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Integrate your SMS with powerful tools</h2>
            <p class="mb-7 text-base leading-7 text-brand-600">Connect your favourite apps with our RESTful APIs and third-party integrations seamlessly.</p>
            <a href="/integrations-and-api" class="inline-flex items-center gap-3 rounded-xl bg-black px-6 py-3.5 font-semibold text-white shadow-md transition hover:-translate-y-1 hover:bg-brand-700">View all integrations <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
        </div>
    </div>
</section>

{{-- 10. SECURITY --}}
<section class="relative overflow-hidden bg-brand-950 py-16 lg:py-20">
    <div class="pointer-events-none absolute -left-20 -top-32 h-96 w-96 rounded-full bg-brand-500/20 blur-3xl"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto mb-12 max-w-2xl text-center" data-reveal>
            <span class="mb-3 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-brand-300"><span class="h-0.5 w-7 rounded-full bg-gradient-to-r from-accent-two-500 to-brand-400"></span>Secure by design</span>
            <h2 class="mb-4 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-white sm:text-[32px]">One secure foundation for every module.</h2>
            <p class="leading-7 text-brand-400">Protect your training operations with a platform designed around reliable hosting, access control and compliance-minded processes.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            @foreach ($security as $item)
                <article data-reveal class="h-full rounded-2xl border border-white/15 bg-white/5 p-5 transition duration-300 hover:-translate-y-2 hover:border-brand-300/40 hover:bg-white/10 sm:p-6">
                    <iconify-icon icon="{{ $item[0] }}" class="mb-4 text-3xl text-brand-300"></iconify-icon>
                    <h3 class="mb-2 font-bold text-white">{{ $item[1] }}</h3>
                    <p class="text-sm leading-6 text-brand-400">{{ $item[2] }}</p>
                </article>
            @endforeach
        </div>
        <div class="mt-8 flex flex-wrap justify-center gap-2" data-reveal>
            @foreach (['AWS cloud infrastructure', 'Role-based access', 'Audit-friendly workflows', 'Encrypted at rest & in transit', 'Daily backups'] as $badge)
                <span class="rounded-full border border-white/15 bg-white/5 px-4 py-2 text-xs font-semibold text-brand-100">{{ $badge }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- 11. CONNECTED TOOLS --}}
<section class="overflow-hidden bg-white py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div data-reveal>
            <span class="mb-4 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.16em] text-brand-700"><iconify-icon icon="lucide:cpu" class="text-base"></iconify-icon>Connected Ecosystem</span>
            <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Fits seamlessly into the way your organisation works.</h2>
            <p class="mb-7 leading-8 text-brand-600">Bring essential systems and everyday workflows together to eliminate duplicate entry, automate routines, and make critical information instantly accessible.</p>
            <div class="flex flex-wrap gap-3">
                @foreach ([['lucide:credit-card', 'Payments'], ['lucide:messages-square', 'Communication'], ['lucide:chart-column', 'Reporting'], ['lucide:cloud-upload', 'Cloud Tools']] as $tag)
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-100 bg-brand-25 px-4 py-2.5 text-sm font-semibold text-brand-700"><iconify-icon icon="{{ $tag[0] }}" class="text-brand-700"></iconify-icon>{{ $tag[1] }}</span>
                @endforeach
            </div>
        </div>
        <div class="relative mx-auto flex aspect-square w-full max-w-lg items-center justify-center" data-reveal>
            <div class="absolute inset-[8%] rounded-full border border-dashed border-brand-200"></div>
            <div class="absolute inset-[20%] rounded-full border border-dashed border-brand-200"></div>
            <div class="absolute inset-[8%] animate-spin rounded-full border-t-2 border-brand-400/60 motion-reduce:animate-none"></div>
            <div class="relative z-10 flex h-28 w-28 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-700 to-brand-600 text-5xl text-white shadow-lg"><iconify-icon icon="lucide:network"></iconify-icon></div>
            <span class="absolute left-1/2 top-[3%] -translate-x-1/2 rounded-xl border border-brand-100 bg-white px-3 py-2 text-xs font-semibold text-brand-700 shadow-md sm:text-sm"><iconify-icon icon="lucide:users" class="mr-1 text-brand-600"></iconify-icon>Student Records</span>
            <span class="absolute right-[-1%] top-[29%] rounded-xl border border-brand-100 bg-white px-3 py-2 text-xs font-semibold text-brand-700 shadow-md sm:text-sm"><iconify-icon icon="lucide:graduation-cap" class="mr-1 text-accent-one-500"></iconify-icon>Learning</span>
            <span class="absolute bottom-[8%] right-[5%] rounded-xl border border-brand-100 bg-white px-3 py-2 text-xs font-semibold text-brand-700 shadow-md sm:text-sm"><iconify-icon icon="lucide:award" class="mr-1 text-brand-500"></iconify-icon>Skills &amp; Badges</span>
            <span class="absolute bottom-[8%] left-[5%] rounded-xl border border-brand-100 bg-white px-3 py-2 text-xs font-semibold text-brand-700 shadow-md sm:text-sm"><iconify-icon icon="lucide:briefcase-business" class="mr-1 text-brand-700"></iconify-icon>Workplace</span>
            <span class="absolute left-[-1%] top-[29%] rounded-xl border border-brand-100 bg-white px-3 py-2 text-xs font-semibold text-brand-700 shadow-md sm:text-sm"><iconify-icon icon="lucide:plug" class="mr-1 text-brand-600"></iconify-icon>APIs &amp; Webhooks</span>
        </div>
    </div>
</section>

{{-- 12. TESTIMONIALS --}}
<section class="bg-brand-25 py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto mb-12 max-w-2xl text-center" data-reveal>
            <span class="mb-3 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-brand-700"><span class="h-0.5 w-7 rounded-full bg-gradient-to-r from-brand-600 to-brand-500"></span>Client stories</span>
            <h2 class="text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Loved by training teams nationwide</h2>
        </div>
        <div class="grid gap-5 md:grid-cols-3">
            @foreach ($testimonials as $t)
                <article data-reveal class="flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg sm:p-7">
                    <div class="mb-4 tracking-[0.15em] text-brand-700">★★★★★</div>
                    <p class="flex-1 leading-7 text-brand-600">“{{ $t[4] }}”</p>
                    <div class="mt-7 flex items-center gap-3">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl {{ $t[3] }} font-bold text-white">{{ $t[0] }}</span>
                        <div><strong class="block text-sm text-black">{{ $t[1] }}</strong><span class="mt-1 block text-xs leading-5 text-brand-500">{{ $t[2] }}</span></div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- 13. RTO STANDARDS --}}
<section class="bg-white py-16 lg:py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        <div class="rounded-2xl border border-brand-100 bg-brand-25 p-4 shadow-md" data-reveal>
            <img src="https://cdn.prod.website-files.com/648a830e8b95457fb1b56486/685e18424665defcc29a72fe_Image.png" loading="lazy" alt="RTO Standards 2025" class="w-full rounded-2xl object-cover shadow-sm">
        </div>
        <div data-reveal>
            <h2 class="mb-5 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">Lead the way under the <span class="text-brand-700">2025 RTO Standards</span></h2>
            <p class="mb-7 text-base leading-7 text-brand-600">Explore how we're helping you stay compliant and competitive under the 2025 Standards. Plus, aXcelerate's newest features and a sneak peek at what's next.</p>
            <div class="mb-7 grid gap-3 sm:grid-cols-2">
                @foreach (['Training and Assessment', 'VET Student Support', 'VET Workforce', 'Governance'] as $feature)
                    <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-brand-25 p-4 transition hover:border-brand-200 hover:bg-brand-50">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 text-xl text-brand-700"><iconify-icon icon="lucide:badge-check"></iconify-icon></span>
                        <span class="text-sm font-semibold text-brand-800">{{ $feature }}</span>
                    </div>
                @endforeach
            </div>
            <a href="/lead-the-way-2025" target="_blank" class="inline-flex items-center gap-3 rounded-xl bg-brand-700 px-6 py-3.5 font-semibold text-white shadow-md transition hover:-translate-y-1 hover:bg-brand-800">See how we support RTOs <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
        </div>
    </div>
</section>

{{-- 14. SOLUTIONS GRID --}}
<section class="bg-brand-25 py-16 lg:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 max-w-3xl" data-reveal>
            <h2 class="mb-4 text-[28px] font-semibold leading-tight tracking-[-0.02em] sm:text-[32px] text-black sm:text-[32px]">An agile student management solution, for everyone</h2>
            <p class="text-base leading-7 text-brand-600">Tailored features and seamless integrations built to empower every type of educational provider.</p>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($solutions as $solution)
                <article class="flex h-full flex-col rounded-2xl border border-brand-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-lg">
                    <span class="mb-5 inline-flex h-14 w-14 items-center justify-center rounded-2xl {{ $solution[4] }} text-2xl {{ $solution[3] }}"><iconify-icon icon="lucide:briefcase-business"></iconify-icon></span>
                    <h3 class="mb-3 text-base font-semibold text-black">{{ $solution[0] }}</h3>
                    <p class="mb-6 flex-1 text-sm leading-6 text-brand-600">{{ $solution[1] }}</p>
                    <a href="{{ $solution[2] }}" class="inline-flex items-center gap-2 text-sm font-bold {{ $solution[3] }} transition hover:gap-3">Learn more <iconify-icon icon="lucide:arrow-right"></iconify-icon></a>
                </article>
            @endforeach
        </div>
    </div>
</section>


@endsection

@push('scripts')
    <noscript>
        <style>
            [data-reveal] {
                opacity: 1 !important;
                transform: none !important;
            }
        </style>
    </noscript>

    <script>
        (function () {
            var nodes = document.querySelectorAll('[data-reveal]');

            if (!nodes.length) {
                return;
            }

            if (!('IntersectionObserver' in window)) {
                nodes.forEach(function (node) {
                    node.classList.add('is-revealed');
                });
                return;
            }

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -60px 0px'
            });

            nodes.forEach(function (node) {
                observer.observe(node);
            });
        })();
    </script>
@endpush
