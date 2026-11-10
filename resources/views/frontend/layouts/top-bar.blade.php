

@props([
    'contacts' => [
        [
            'name' => 'Australia',
            'code' => 'AU',
            'phone' => '+61 433 674 578',
            'tel' => '+61433674578',
        ],
        [
            'name' => 'Bangladesh',
            'code' => 'BD',
            'phone' => '+880 9617 990099',
            'tel' => '+8809617990099',
        ],
    ],

    'email' => 'info@hbdservices.com',

    'socialLinks' => [
        [
            'name' => 'Facebook',
            'icon' => 'facebook',
            'url' => 'https://www.facebook.com/hbdservices',
        ],
        [
            'name' => 'Twitter',
            'icon' => 'twitter',
            'url' => 'https://twitter.com/hbdservicesbd',
        ],
        [
            'name' => 'Instagram',
            'icon' => 'instagram',
            'url' => 'https://www.instagram.com/hbd_services_bd',
        ],
        [
            'name' => 'YouTube',
            'icon' => 'youtube',
            'url' => 'https://www.youtube.com/channel/UCUKguoDorZOOTbXzfGVLgyA',
        ],
        [
            'name' => 'LinkedIn',
            'icon' => 'linkedin',
            'url' => 'https://www.linkedin.com/company/hbdservices/',
        ],
        [
            'name' => 'TikTok',
            'icon' => 'music-2',
            'url' => 'https://www.tiktok.com/@hbd_services',
        ],
    ],
])

<div class="bg-brand-800 text-xs text-white/90 md:text-sm">

    <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-2.5 lg:px-8">

        {{-- Contact Information --}}
        <div class="flex flex-wrap items-center gap-x-6 gap-y-2">

            {{-- Phone Numbers --}}
            @foreach ($contacts as $contact)

                <a
                    href="tel:{{ $contact['tel'] }}"
                    aria-label="Call {{ $contact['name'] }}: {{ $contact['phone'] }}"
                    class="flex items-center gap-2 transition-colors hover:text-white"
                >

                    <img
                        src="https://flagcdn.com/w20/{{ strtolower($contact['code']) }}.png"
                        alt="{{ $contact['name'] }} flag"
                        width="20"
                        height="14"
                        class="h-3.5 w-5 object-cover"
                        loading="lazy"
                    >

                    <span class="text-xs">
                        {{ $contact['phone'] }}
                    </span>

                </a>

            @endforeach

            {{-- Email --}}
            <a
                href="mailto:{{ $email }}"
                class="hidden items-center gap-2 transition-colors hover:text-white sm:flex"
            >

                <iconify-icon
                    icon="lucide:mail"
                    class="text-xs"
                ></iconify-icon>

                <span>{{ $email }}</span>

            </a>

        </div>

        {{-- Social Media Links --}}
        <div class="hidden items-center gap-4 text-white/70 min-[480px]:flex">

            @foreach ($socialLinks as $social)

                <a
                    href="{{ $social['url'] }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="{{ $social['name'] }}"
                    title="{{ $social['name'] }}"
                    class="transition-all duration-200 hover:-translate-y-0.5 hover:text-white"
                >

                    <iconify-icon
                        icon="simple-icons:{{ $social['icon'] }}"
                        class="text-sm"
                    ></iconify-icon>

                </a>

            @endforeach

        </div>

    </div>

</div>
