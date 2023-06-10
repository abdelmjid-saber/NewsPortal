    <!-- Start Header -->
    <header class="container max-w-7xl mx-auto py-6 px-6 lg:px-8 flex items-center justify-between ">
        <!-- logo -->
        <a href="/">
            <img src="{{ asset('uploads/' . $global_setting_data->logo) }}" alt="logo" class="w-40">
        </a>
        <!-- main menu -->
        <ul class="hidden md:flex space-x-6  text-white text-[16px] font-semibold relative">
            <li class="rtl:ml-6"><a href="{{ route('home') }}"
                    class="hover:text-violet-700 {{ request()->route()->named('home')? 'active': '' }}">{{ trans('main_trans.home') }}</a>
            </li>
            <li><a href="{{ route('blog') }}"
                    class="relative hover:text-violet-700 {{ request()->route()->named('blog')? 'active': '' }}">{{ trans('main_trans.blog') }}</a>
            </li>
            <li><a href="{{ route('photo_gallery') }}"
                    class="dropdown-hover hover:text-violet-700 {{ request()->route()->named('photo_gallery')? 'active': '' }}">{{ trans('main_trans.photo_gallery') }}</a>
            </li>
            @if ($global_page_data->contact_status == 'Show')
                <li><a href="{{ route('contact') }}"
                        class="hover:text-violet-700 {{ request()->route()->named('contact')? 'active': '' }}">{{ $global_page_data->contact_title }}</a>
                </li>
            @endif
        </ul>
        <!-- button menu mobile -->
        <div id="hamburger" class="md:hidden cursor-pointer">
            <i class="fa-solid fa-bars text-2xl text-white active:text-violet-700"></i>
        </div>
        <!-- main menu mobile -->
        <div id="menu"
            class="md:hidden absolute -top-4 left-0 bg-[#000000b4] w-full h-full flex-col justify-center items-center text-violet-700 duration-300 z-50 translate-y-full hidden">
            <div id="closeMenu" class="absolute top-6 right-6 cursor-pointer">
                <i class="fa-solid fa-xmark text-2xl text-violet-700 active:text-indigo-400"></i>
            </div>
            <ul class="space-y-6 text-white font-semibold text-center">
                <li><a href="{{ route('home') }}"
                        class="hover:text-violet-700 {{ request()->route()->named('home')? 'active': '' }}">{{ trans('main_trans.home') }}</a>
                </li>
                <li><a href="{{ route('blog') }}"
                        class="relative hover:text-violet-700 {{ request()->route()->named('blog')? 'active': '' }}">{{ trans('main_trans.blog') }}</a>
                </li>
                <li><a href="{{ route('photo_gallery') }}"
                        class="dropdown-hover hover:text-violet-700 {{ request()->route()->named('photo_gallery')? 'active': '' }}">{{ trans('main_trans.photo_gallery') }}</a>
                </li>
                @if ($global_page_data->contact_status == 'Show')
                    <li><a href="{{ route('contact') }}"
                            class="hover:text-violet-700 {{ request()->route()->named('contact')? 'active': '' }}">{{ $global_page_data->contact_title }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </header>
    <!-- End Header -->
