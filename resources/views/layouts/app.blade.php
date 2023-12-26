<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
	    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/_app.css','resources/css/_aside.css','resources/css/_navbar.css','resources/css/_footer.css','resources/css/_button.css','resources/css/_card.css','resources/css/_hero.css','resources/css/_icon.css','resources/css/app.css','resources/css/_table.css', 'resources/js/app.js'])
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <x-banner />

        <div class="app">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <nav id="navbar-main" class="navbar is-fixed-top">
						  <div class="navbar-brand">
							<a class="navbar-item mobile-aside-button">
							  <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
							</a>
							<div class="navbar-item">
							  <div class="control"><input placeholder="Search everywhere..." class="input"></div>
							</div>
						  </div>
						  <div class="navbar-brand is-right">
							<a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
							  <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
							</a>
						  </div>
						  <div class="navbar-menu" id="navbar-menu">
							<div class="navbar-end">
							  <div x-data="{ isOpen: false }" class="navbar-item dropdown has-divider has-user-avatar">
								<a @click="isOpen = !isOpen" class="navbar-link">
								  <div class="user-avatar">
									<img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
								  </div>
								  <div class="is-user-name"><span>{{auth()->user()->name}}</span></div>
								  <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
								</a>
								 
								  <div x-show="isOpen" @click.away="isOpen = false" class="navbar-dropdown">
								<div class="navbar-item">
									<span class="icon"><i class="mdi mdi-account"></i></span>
									<x-dropdown-link  class="block px-4 py-2 account-link" href="{{ route('profile.show') }}">
									 {{ __('My Profile') }}
								     </x-dropdown-link>
								  	</div>  
								  
								  <hr class="navbar-divider">
								 
								<div class="navbar-item">
								  <span class="icon"><i class="mdi mdi-logout"></i></span>
								   <form method="POST" action="{{ route('logout') }}" x-data>
									@csrf
									<x-dropdown-link class="block px-4 py-2 account-link" href="{{ route('logout') }}" @click.prevent="$root.submit();">
									  {{ __('Log Out') }}
									</x-dropdown-link>
								  </form>
								</div>

								</div>
							  </div>
							 
							</div>
						  </div>
						</nav>

                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
