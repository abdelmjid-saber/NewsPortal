    <!-- Start Footer -->
    <footer class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex justify-between border-b border-neutral-400 pb-3">
            <a href="/">
                <img src="{{ asset('uploads/' . $global_setting_data->logo) }}" alt="logo" class="w-40">
            </a>
            <ul class="hidden md:flex space-x-8 text-white text-[16px] font-semibold relative">
                <li class="ml-8"><a href="#" class="hover:text-violet-700">{{ trans('main_trans.home') }}</a></li>
                @if ($global_page_data->about_status == 'Show')
                    <li><a href="{{ route('about') }}"
                            class="hover:text-violet-700">{{ $global_page_data->about_title }}</a></li>
                @endif
                @if ($global_page_data->faq_status == 'Show')
                    <li><a href="{{ route('faq') }}"
                            class="hover:text-violet-700">{{ $global_page_data->faq_title }}</a></li>
                @endif
                @if ($global_page_data->privacy_status == 'Show')
                    <li><a href="{{ route('privacy') }}"
                            class="hover:text-violet-700">{{ $global_page_data->privacy_title }}</a></li>
                @endif
                @if ($global_page_data->terms_status == 'Show')
                    <li><a href="{{ route('terms') }}"
                            class="hover:text-violet-700">{{ $global_page_data->terms_title }}</a></li>
                @endif
                @if ($global_page_data->contact_status == 'Show')
                    <li><a href="{{ route('contact') }}"
                            class="hover:text-violet-700">{{ $global_page_data->contact_title }}</a></li>
                @endif
            </ul>
        </div>
        <div>
            <p class="text-neutral-200 text-center py-6">
                {{ trans('main_trans.copyright_©_design_and_programming_by') }}
                <span class="text-violet-700">{{ trans('main_trans.abdelmjid') }}</span></p>
        </div>
    </footer>
    <!-- End Footer -->
