<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css"> --}}
    {{-- flexslide --}}
    <link rel="stylesheet" href="{{ asset('vendor/FlexSlider/flexslider.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- Glider plugin --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script> --}}
    <script src="{{ asset('vendor/js/glider.min.js') }}"></script>
    {{-- flexslide --}}
    <script src="{{ asset('vendor/FlexSlider/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/FlexSlider/jquery.flexslider-min.js') }}"></script>
    {{-- tailwind --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')

        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function dropdown(params) {
            return {
                open: false,
                show() {
                    if (this.open) {
                        // cierra
                        this.open = false
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    } else {
                        // abre
                        this.open = true
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                    }
                },
                close() {
                    this.open = false
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                }
            }
        }
    </script>
    @stack('script')
</body>

</html>
