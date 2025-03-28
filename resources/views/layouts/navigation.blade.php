<nav x-data="{ open: false, expanded: false }" 
     class="fixed left-0 top-0 bottom-0 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 z-10 transition-all duration-300"
     :class="{ 'w-64': expanded, 'w-16': !expanded }"
     @mouseover="expanded = true" 
     @mouseleave="expanded = false">
    
    <!-- Logo -->
    <div class="flex justify-center py-5">
        <a href="{{ route('dashboard') }}" class="flex items-center justify-center">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex flex-col space-y-2 px-3 py-4">
        <!-- Dashboard Link -->
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                   class="flex items-center px-3 py-3 rounded-md transition-all duration-300 overflow-hidden whitespace-nowrap"
                   x-bind:class="expanded ? 'justify-start' : 'justify-center'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="ml-3" x-bind:class="{ 'opacity-0': !expanded, 'opacity-100': expanded }">{{ __('Dashboard') }}</span>
        </x-nav-link>

        <!-- Clockify Link -->
        <x-nav-link :href="route('clockify')" :active="request()->routeIs('clockify')" 
                   class="flex items-center px-3 py-3 rounded-md transition-all duration-300 overflow-hidden whitespace-nowrap"
                   x-bind:class="expanded ? 'justify-start' : 'justify-center'">
            <svg viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" :class="request()->routeIs('clockify') ? 'text-red-600' : 'text-gray-500 dark:text-gray-400'">
                <path d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.054.038.076.06.028.029.048.062.072.094.017.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-21.483L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z" fill-rule="evenodd"/>
            </svg>
            <span class="ml-3" x-bind:class="{ 'opacity-0': !expanded, 'opacity-100': expanded }">{{ __('Clockify') }}</span>
        </x-nav-link>

        <!-- Profile Link -->
        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" 
                   class="flex items-center px-3 py-3 rounded-md transition-all duration-300 overflow-hidden whitespace-nowrap"
                   x-bind:class="expanded ? 'justify-start' : 'justify-center'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="ml-3" x-bind:class="{ 'opacity-0': !expanded, 'opacity-100': expanded }">{{ __('Profile') }}</span>
        </x-nav-link>

        <!-- Logout Link -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="flex items-center px-3 py-3 rounded-md transition-all duration-300 overflow-hidden whitespace-nowrap"
                       x-bind:class="expanded ? 'justify-start' : 'justify-center'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-3" x-bind:class="{ 'opacity-0': !expanded, 'opacity-100': expanded }">{{ __('Log Out') }}</span>
            </x-nav-link>
        </form>
    </div>

    <!-- Mobile menu button - only visible on small screens -->
    <div class="absolute top-4 right-0 transform translate-x-full sm:hidden">
        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden absolute top-16 left-0 right-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('clockify')" :active="request()->routeIs('clockify')">
                {{ __('Clockify') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>

