
        <!-- Header/Navbar -->
        <nav id="main-navbar" class="fixed w-full z-50 transition-all duration-500 bg-white">
            <div class="max-w-7xl mx-auto flex justify-between items-center py-3 px-4 sm:px-6 lg:px-8">
                
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <img src="{{ asset('user-assets/images/ameLogo.png') }}" 
                             alt="Ame Treks Logo" 
                             class="h-10 w-32">
                    </a>
                </div>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex items-center space-x-2 font-medium text-[#052734]">
                    <li>
                        <a href="{{ route('home') }}" 
                           class="px-4 py-2 hover:text-[#005991] transition-colors duration-300 relative group">
                            Home
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#005991] group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>

                    <!-- Nepal Dropdown -->
                    <li class="relative group">
                        <button class="px-4 py-2 flex items-center gap-1 hover:text-[#005991] transition-colors duration-300">
                            Nepal
                            <i class="bi bi-chevron-down text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
                            <!-- Everest Region -->
                            <div class="relative group/nested">
                                <div class="px-4 py-2 text-xs font-bold text-[#005991] uppercase tracking-wider flex items-center justify-between cursor-pointer hover:bg-gray-50">
                                    Everest Region
                                    <i class="bi bi-chevron-down text-xs group-hover/nested:rotate-180 transition-transform duration-300"></i>
                                </div>
                                <div class="absolute left-full top-0 mt-0 ml-1 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover/nested:opacity-100 group-hover/nested:visible transition-all duration-300 py-2">
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Peak climbing
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Base camp trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Cultural tours
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Annapurna Region -->
                            <div class="relative group/nested">
                                <div class="px-4 py-2 text-xs font-bold text-[#005991] uppercase tracking-wider flex items-center justify-between cursor-pointer hover:bg-gray-50">
                                    Annapurna Region
                                    <i class="bi bi-chevron-down text-xs group-hover/nested:rotate-180 transition-transform duration-300"></i>
                                </div>
                                <div class="absolute left-full top-0 mt-0 ml-1 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover/nested:opacity-100 group-hover/nested:visible transition-all duration-300 py-2">
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Annapurna Base Camp
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Poon Hill Trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Sanctuary Trek
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Other -->
                            <div class="relative group/nested">
                                <div class="px-4 py-2 text-xs font-bold text-[#005991] uppercase tracking-wider flex items-center justify-between cursor-pointer hover:bg-gray-50">
                                    Other
                                    <i class="bi bi-chevron-down text-xs group-hover/nested:rotate-180 transition-transform duration-300"></i>
                                </div>
                                <div class="absolute left-full top-0 mt-0 ml-1 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover/nested:opacity-100 group-hover/nested:visible transition-all duration-300 py-2">
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Langtang Trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Gosaikunda Trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300 text-sm">
                                        Valley Exploration
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Bhutan Dropdown -->
                    <li class="relative group">
                        <button class="px-4 py-2 flex items-center gap-1 hover:text-[#005991] transition-colors duration-300">
                            Bhutan
                            <i class="bi bi-chevron-down text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Tiger's Nest Trek
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Druk Path Trek
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Bumdeling Trek
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Jigme Dorji NP
                            </a>
                        </div>
                    </li>

                    <!-- Tibet Dropdown -->
                    <li class="relative group">
                        <button class="px-4 py-2 flex items-center gap-1 hover:text-[#005991] transition-colors duration-300">
                            Tibet
                            <i class="bi bi-chevron-down text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Mount Kailash
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                EBC via Tibet
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Guge Kingdom
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Tsangpo Gorge
                            </a>
                        </div>
                    </li>

                    <!-- Featured Treks Dropdown -->
                    <li class="relative group">
                        <button class="px-4 py-2 flex items-center gap-1 hover:text-[#005991] transition-colors duration-300">
                            Featured Treks
                            <i class="bi bi-chevron-down text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
                            <a href="{{ route('trek-routes') }}" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Popular Routes
                            </a>
                            <a href="{{ route('pages.treks.index') }}" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Seasonal Picks
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Budget Treks
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Luxury Expeditions
                            </a>
                        </div>
                    </li>

                    <!-- Company Dropdown -->
                    <li class="relative group">
                        <button class="px-4 py-2 flex items-center gap-1 hover:text-[#005991] transition-colors duration-300">
                            Company
                            <i class="bi bi-chevron-down text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
                            <a href="{{ route('about') }}" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                About Us
                            </a>
                            <a href="{{ route('teams') }}" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Our Team
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Blog
                            </a>
                            <a href="" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                Contact Us
                            </a>
                        </div>
                    </li>

                    <!-- Login/User Button -->
                    @auth
                        <!-- User Dropdown -->
                        <li class="relative group">
                            <button class="flex items-center space-x-2 px-4 py-2 rounded-full font-semibold text-[#052734] hover:text-[#005991] transition-all duration-300">
                                <i class="bi bi-person-circle"></i>
                                <span>{{ Auth::user()->name }}</span>
                                <i class="bi bi-chevron-down text-xs"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white/95 backdrop-blur-xl border border-gray-200 rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
                                <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                    <i class="bi bi-person mr-2"></i> My Profile
                                </a>
                                <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                    <i class="bi bi-calendar-check mr-2"></i> My Bookings
                                </a>
                                <div class="border-t border-gray-200 my-2"></div>
                                <form method="POST" action="">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 transition-all duration-300">
                                        <i class="bi bi-box-arrow-right mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    @else
                        <!-- Login Button -->
                        <li>
                            <a href="#" 
                               class="flex items-center space-x-2 px-6 py-2 bg-[#005991] rounded-full font-semibold text-white">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Login</span>
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button"
                            class="p-2 transition-colors duration-300 text-[#052734] hover:text-[#005991]">
                        <i id="menu-icon" class="bi bi-list text-2xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" 
                 class="md:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-xl border-b border-gray-200 shadow-lg transition-all duration-500 opacity-0 -translate-y-4 pointer-events-none">
                <div class="px-4 py-6 space-y-2">
                    <!-- Home -->
                    <a href="{{ route('home') }}" 
                       class="block px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300">
                        Home
                    </a>

                    <!-- Nepal Dropdown -->
                    <div>
                        <button onclick="toggleMobileDropdown('nepal')"
                                class="w-full text-left px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg flex items-center justify-between transition-all duration-300">
                            Nepal
                            <i id="nepal-chevron" class="bi bi-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="nepal-dropdown" class="mt-1 space-y-2 hidden">
                            <!-- Everest Region -->
                            <div>
                                <button onclick="toggleNestedMobileDropdown('everest-region')"
                                        class="w-full text-left px-4 py-2 text-xs font-bold text-[#005991] uppercase tracking-wider hover:bg-gray-50 rounded-lg flex items-center justify-between">
                                    Everest Region
                                    <i id="everest-chevron" class="bi bi-chevron-down text-xs transition-transform duration-300"></i>
                                </button>
                                <div id="everest-region-dropdown" class="ml-4 mt-1 space-y-1 hidden">
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Peak climbing
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Base camp trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Cultural tours
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Annapurna Region -->
                            <div>
                                <button onclick="toggleNestedMobileDropdown('annapurna-region')"
                                        class="w-full text-left px-4 py-2 text-xs font-bold text-[#005991] uppercase tracking-wider hover:bg-gray-50 rounded-lg flex items-center justify-between">
                                    Annapurna Region
                                    <i id="annapurna-chevron" class="bi bi-chevron-down text-xs transition-transform duration-300"></i>
                                </button>
                                <div id="annapurna-region-dropdown" class="ml-4 mt-1 space-y-1 hidden">
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Annapurna Base Camp
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Poon Hill Trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Sanctuary Trek
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Other -->
                            <div>
                                <button onclick="toggleNestedMobileDropdown('other-region')"
                                        class="w-full text-left px-4 py-2 text-xs font-bold text-[#005991] uppercase tracking-wider hover:bg-gray-50 rounded-lg flex items-center justify-between">
                                    Other
                                    <i id="other-chevron" class="bi bi-chevron-down text-xs transition-transform duration-300"></i>
                                </button>
                                <div id="other-region-dropdown" class="ml-4 mt-1 space-y-1 hidden">
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Langtang Trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Gosaikunda Trek
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                        Valley Exploration
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bhutan Dropdown -->
                    <div>
                        <button onclick="toggleMobileDropdown('bhutan')"
                                class="w-full text-left px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg flex items-center justify-between transition-all duration-300">
                            Bhutan
                            <i id="bhutan-chevron" class="bi bi-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="bhutan-dropdown" class="pl-4 space-y-1 mt-1 hidden">
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Tiger's Nest Trek
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Druk Path Trek
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Bumdeling Trek
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Jigme Dorji NP
                            </a>
                        </div>
                    </div>

                    <!-- Tibet Dropdown -->
                    <div>
                        <button onclick="toggleMobileDropdown('tibet')"
                                class="w-full text-left px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg flex items-center justify-between transition-all duration-300">
                            Tibet
                            <i id="tibet-chevron" class="bi bi-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="tibet-dropdown" class="pl-4 space-y-1 mt-1 hidden">
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Mount Kailash
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                EBC via Tibet
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Guge Kingdom
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Tsangpo Gorge
                            </a>
                        </div>
                    </div>

                    <!-- Featured Treks Dropdown -->
                    <div>
                        <button onclick="toggleMobileDropdown('featured')"
                                class="w-full text-left px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg flex items-center justify-between transition-all duration-300">
                            Featured Treks
                            <i id="featured-chevron" class="bi bi-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="featured-dropdown" class="pl-4 space-y-1 mt-1 hidden">
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Popular Routes
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Seasonal Picks
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Budget Treks
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Luxury Expeditions
                            </a>
                        </div>
                    </div>

                    <!-- Company Dropdown -->
                    <div>
                        <button onclick="toggleMobileDropdown('company')"
                                class="w-full text-left px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg flex items-center justify-between transition-all duration-300">
                            Company
                            <i id="company-chevron" class="bi bi-chevron-down transition-transform duration-300"></i>
                        </button>
                        <div id="company-dropdown" class="pl-4 space-y-1 mt-1 hidden">
                            <a href="{{ route('about') }}" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                About Us
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Our Team
                            </a>
                            <a href="#" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Blog
                            </a>
                            <a href="" class="block px-4 py-2 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 text-sm">
                                Contact Us
                            </a>
                        </div>
                    </div>

                    <!-- Login/Register Buttons -->
                    @auth
                        <div class="pt-4 border-t border-gray-200">
                            <a href="#" class="block px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 mb-2">
                                <i class="bi bi-person-circle mr-2"></i> My Profile
                            </a>
                            <a href="#" class="block px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300 mb-2">
                                <i class="bi bi-calendar-check mr-2"></i> My Bookings
                            </a>
                            <form method="POST" action="#">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 text-[#052734] hover:text-[#005991] hover:bg-gray-50 rounded-lg transition-all duration-300">
                                    <i class="bi bi-box-arrow-right mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="pt-4 border-t border-gray-200">
                            <a href="" 
                               class="block px-4 py-3 bg-[#005991] rounded-xl font-semibold text-white hover:bg-[#052734] transition-all duration-300 mb-2 text-center">
                                <i class="bi bi-box-arrow-in-right mr-2"></i> Login
                            </a>
                            <a href="#" 
                               class="block px-4 py-3 border-2 border-[#005991] rounded-xl font-semibold text-[#005991] hover:bg-[#005991] hover:text-white transition-all duration-300 text-center">
                                <i class="bi bi-person-plus mr-2"></i> Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-overlay" 
             class="fixed inset-0 bg-black/20 backdrop-blur-sm z-40 md:hidden hidden"
             onclick="closeMobileMenu()"></div>

       
    </div>
    
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const menuIcon = document.getElementById('menu-icon');
            
            // Scroll effect for navbar
            const navbar = document.getElementById('main-navbar');
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 10) {
                    navbar.classList.add('bg-white/95', 'backdrop-blur-xl', 'shadow-lg');
                } else {
                    navbar.classList.remove('bg-white/95', 'backdrop-blur-xl', 'shadow-lg');
                }
            });
            
            // Mobile menu toggle
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    const isOpen = mobileMenu.classList.contains('opacity-100');
                    if (isOpen) {
                        closeMobileMenu();
                    } else {
                        openMobileMenu();
                    }
                });
            }
            
            // Back to top button
            const backToTop = document.getElementById('backToTop');
            if (backToTop) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTop.classList.remove('hidden');
                    } else {
                        backToTop.classList.add('hidden');
                    }
                });
                
                backToTop.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            }
            
            // Close mobile menu when clicking a link
            const mobileLinks = document.querySelectorAll('#mobile-menu a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });
        });
        
        // Mobile menu functions
        function openMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const menuIcon = document.getElementById('menu-icon');
            
            mobileMenu.classList.remove('opacity-0', '-translate-y-4', 'pointer-events-none');
            mobileMenu.classList.add('opacity-100', 'translate-y-0');
            
            mobileOverlay.classList.remove('hidden');
            
            menuIcon.classList.remove('bi-list');
            menuIcon.classList.add('bi-x');
        }
        
        function closeMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const menuIcon = document.getElementById('menu-icon');
            
            mobileMenu.classList.remove('opacity-100', 'translate-y-0');
            mobileMenu.classList.add('opacity-0', '-translate-y-4', 'pointer-events-none');
            
            mobileOverlay.classList.add('hidden');
            
            menuIcon.classList.remove('bi-x');
            menuIcon.classList.add('bi-list');
            
            // Close all dropdowns
            closeAllMobileDropdowns();
        }
        
        function toggleMobileDropdown(dropdownId) {
            const dropdown = document.getElementById(`${dropdownId}-dropdown`);
            const chevron = document.getElementById(`${dropdownId}-chevron`);
            
            // Close other dropdowns first
            const allDropdowns = ['nepal', 'bhutan', 'tibet', 'featured', 'company'];
            allDropdowns.forEach(id => {
                if (id !== dropdownId) {
                    const otherDropdown = document.getElementById(`${id}-dropdown`);
                    const otherChevron = document.getElementById(`${id}-chevron`);
                    if (otherDropdown) {
                        otherDropdown.classList.add('hidden');
                    }
                    if (otherChevron) {
                        otherChevron.classList.remove('rotate-180');
                    }
                }
            });
            
            // Toggle current dropdown
            if (dropdown) {
                dropdown.classList.toggle('hidden');
                if (chevron) {
                    chevron.classList.toggle('rotate-180');
                }
            }
        }
        
        function toggleNestedMobileDropdown(nestedId) {
            const nestedDropdown = document.getElementById(`${nestedId}-dropdown`);
            const nestedChevron = document.getElementById(`${nestedId}-chevron`);
            
            if (nestedDropdown) {
                nestedDropdown.classList.toggle('hidden');
                if (nestedChevron) {
                    nestedChevron.classList.toggle('rotate-180');
                }
            }
        }
        
        function closeAllMobileDropdowns() {
            // Close main dropdowns
            const dropdowns = ['nepal', 'bhutan', 'tibet', 'featured', 'company'];
            dropdowns.forEach(id => {
                const dropdown = document.getElementById(`${id}-dropdown`);
                const chevron = document.getElementById(`${id}-chevron`);
                if (dropdown) dropdown.classList.add('hidden');
                if (chevron) chevron.classList.remove('rotate-180');
            });
            
            // Close nested dropdowns
            const nestedDropdowns = ['everest-region', 'annapurna-region', 'other-region'];
            nestedDropdowns.forEach(id => {
                const dropdown = document.getElementById(`${id}-dropdown`);
                const chevron = document.getElementById(`${id}-chevron`);
                if (dropdown) dropdown.classList.add('hidden');
                if (chevron) chevron.classList.remove('rotate-180');
            });
        }
        
        // Close mobile menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileMenu();
            }
        });
    </script>
    
    @stack('scripts')
