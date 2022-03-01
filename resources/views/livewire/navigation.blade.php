<header class="bg-navy-500 sticky top-0 z-50" x-data="dropdown()">
    {{-- app bar --}}
    <div class="container flex items-center h-16 justify-between md:justify-start" @click.away="close()">
        <a @click="show()" :class="{'bg-opacity-100 text-ochre-400': open}"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categorías</span>
        </a>
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>
        {{-- Buscador --}}
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>
        <!-- Settings Dropdown -->
        <div class="mx-6 relative hidden md:block">
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Account Management -->
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>
        {{-- dorpdown cart --}}
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
    </div>
    {{-- menú navegación --}}
    <nav id="navigation-menu" class="bg-gray-700 bg-opacity-25 absolute w-full hidden" :class="{ 'hidden': ! open }">
        {{-- lg menu --}}
        <div class="container h-full hidden md:block">
            <div class="relative grid grid-cols-4 h-full">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-gray-500 hover:bg-ochre-400 hover:text-white">
                            <a class="py-2 px-4 text-sm flex items-center"
                                href="{{ route('categories.show', $category) }}">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                            <div class="navigation-submenu absolute bg-gray-100 w-3/4 top-0 right-0 h-full hidden">
                                <x-navigation-subcategories :category='$category' />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category='$categories->first()' />
                </div>
            </div>
        </div>
        {{-- responsive mmenú --}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-gray-200 py-2 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-gray-500 hover:bg-ochre-400 hover:text-white">
                        <a class="py-2 px-4 text-sm flex items-center"
                            href="{{ route('categories.show', $category) }}">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                        <div class="navigation-submenu absolute bg-gray-100 w-3/4 top-0 right-0 h-full hidden">
                            <x-navigation-subcategories :category='$category' />
                        </div>
                    </li>
                @endforeach
            </ul>
            <p class="uppercase text-gray-500 px-6 my-2 font-bold">usuarios</p>
            @livewire('cart-mobile')
            @auth
                <a class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-ochre-400 hover:text-white"
                    href="{{ route('profile.show') }}">
                    <span class="flex justify-center w-9">
                        <i class="far fa-address-card"></i>
                    </span>
                    Perfil
                </a>
                <a onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit()"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-ochre-400 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @else
                <a class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-ochre-400 hover:text-white"
                    href="{{ route('login') }}">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-in-alt"></i>
                    </span>
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}" document.getElementById('logout-form').submit()"
                    class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-ochre-400 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    Registrarse
                </a>
            @endauth
        </div>
    </nav>
</header>
