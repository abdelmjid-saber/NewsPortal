@extends('front.layout.app')
@section('title', 'Devs Mix')
@section('main_content')
    <div class="container mx-auto py-3 px-6 lg:px-8">
        <!-- Start featured -->
        <div class="grid grid-custom gap-4">
            @php $i=0 @endphp
            @foreach ($post as $item)
                @php $i++ @endphp
                @if ($i > 1)
                    <div class="relative h-[400px] md:h-[600px]">
                        <a href="{{ route('category', $item->id) }}">
                            <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}" alt="img"
                                class="h-full rounded-xl saturate-100 hover:saturate-150 duration-300">
                        </a>
                        <div class="w-full px-7 absolute bottom-16 left-2/4 -translate-x-2/4  text-center">
                            <a href="{{ route('category', $item->sub_category_id) }}"
                                class="text-white py-1 px-3 bg-violet-700 rounded-[4px]">{{ $item->rSubCategory->sub_category_name }}</a>
                            <h2 class="text-white text-3xl leading-8 font-bold my-3">
                                <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                            </h2>
                            <div class="text-white">
                                @php
                                    $ts = strtotime($item->updated_at);
                                    $update_date = date('d F, Y');
                                @endphp
                                {{ $update_date }}
                            </div>
                        </div>
                    </div>
                @break
            @endif
        @endforeach

        @php $i=0 @endphp
        @foreach ($post as $item)
            @php $i++ @endphp
            @if ($i > 0)
                <div class="relative h-[400px] md:h-[600px]">
                    <a href="{{ route('post', $item->id) }}">
                        <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}" alt="img"
                            class="h-full rounded-xl saturate-100 hover:saturate-150 duration-300">
                    </a>
                    <div class="w-full px-7 absolute bottom-16 left-2/4 -translate-x-2/4  text-center">
                        <a href="{{ route('category', $item->sub_category_id) }}"
                            class="text-white py-1 px-3 bg-violet-700 rounded-[4px]">{{ $item->rSubCategory->sub_category_name }}</a>
                        <h2 class="text-white text-3xl leading-8 font-bold my-3">
                            <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                        </h2>
                        <div class="text-white">
                            @php
                                $ts = strtotime($item->updated_at);
                                $update_date = date('d F, Y');
                            @endphp
                            {{ $update_date }}
                        </div>
                    </div>
                </div>
            @break
        @endif
    @endforeach

    @php $i=0 @endphp
    @foreach ($post as $item)
        @php $i++ @endphp
        @if ($i > 2)
            <div class="relative h-[400px] md:h-[600px]">
                <a href="{{ route('post', $item->id) }}">
                    <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}" alt="img"
                        class="h-full  bg-cover	 rounded-xl saturate-100 hover:saturate-150 duration-300">
                </a>
                <div class="w-full px-7 absolute bottom-16 left-2/4 -translate-x-2/4  text-center">
                    <a href="{{ route('category', $item->sub_category_id) }}"
                        class="text-white py-1 px-3 bg-violet-700 rounded-[4px]">{{ $item->rSubCategory->sub_category_name }}</a>
                    <h2 class="text-white text-3xl leading-8 font-bold my-3">
                        <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                    </h2>
                    <div class="text-white">
                        @php
                            $ts = strtotime($item->updated_at);
                            $update_date = date('d F, Y');
                        @endphp
                        {{ $update_date }}
                    </div>
                </div>
            </div>
        @break
    @endif
@endforeach
</div>
<!-- End featured -->
<!-- Start categories -->
<div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
<div>
    <div>
        <h2 class="text-white text-3xl md:text-5xl text-center font-extrabold md:leading-[60px] mx-auto md:w-4/6">
            {{ $global_setting_data->title_categories }}
        </h2>
        <p class="text-neutral-300 text-center my-5 text-lg">
            {{ $global_setting_data->description_categories }}
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-3 justify-center w-10/12 mt-16 mx-auto">
            @foreach ($sub_category_data as $item)
                <a href="{{ route('category', $item->id) }}">
                    <div class="flex items-center bg-neutral-900 hover:bg-black p-3 rounded-[4px] duration-300">
                        <div class="w-10 mr-3 rtl:ml-3 bg-black p-2 rounded-[4px]">
                            <img src="{{ asset('uploads/icons' . '/' . $item->sub_category_icon) }}"
                                alt="icon">
                        </div>
                        <h6 class="text-white">{{ $item->sub_category_name }}</h6>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
</div>
<!-- End categories -->
<!-- Start Popular posts -->
<div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
<h2 class="text-white text-3xl md:text-5xl text-center font-extrabold md:leading-[60px] mx-auto md:w-4/6">
    {{ trans('main_trans.popular_posts') }}
</h2>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-16">
    @foreach ($post as $item)
        <div
            class="flex flex-col sm:flex-row items-center bg-neutral-900 hover:bg-black  p-5 rounded-[4px] duration-300">
            <a href="{{ route('post', $item->id) }}">
                <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}" alt="img"
                    class="w-[300px] md:max-w-[200px] h-44 rounded-[4px]">
            </a>
            <div class="p-2 sm:ml-8 sm:rtl:mr-8 overflow-hidden">
                <a href="{{ route('category', $item->rSubCategory->id) }}"
                    class="text-white py-1 px-3 bg-violet-700 rounded-[4px]">{{ $item->rSubCategory->sub_category_name }}</a>
                <h3 class="text-white hover:text-violet-700 text-xl my-4 leading-8 font-bold break-all">
                    <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                </h3>
                <p class="text-neutral-300 text-sm md:truncate">{{ $item->excerpt }}</p>
            </div>
        </div>
    @endforeach
</div>
<a href="{{ route('blog') }}">
    <div class="mt-8 p-5 bg-neutral-900 hover:bg-violet-700 text-white text-center rounded-xl duration-300">
        {{ trans('main_trans.view_all_posts') }}
    </div>
</a>
</div>
<!-- End Popular posts -->
<!-- Start Newsletter -->
<div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
<div class="flex flex-col-reverse lg:flex-row bg-neutral-900 p-8 rounded-xl">
    <div>
        <h2 class="text-white text-4xl text-center md:text-left md:rtl:text-right">{{ $global_setting_data->title_newsletter }}</h2>
        <p class="text-neutral-300 text-xl text-center md:text-left md:rtl:text-right my-6">
            {{ $global_setting_data->description_newsletter }}
        </p>
        <div class="mb-6">
            <form action="{{ route('subscribe') }}" method="POST"
                class="flex flex-col sm:flex-row justify-around lg:justify-start">
                @csrf
                <input type="email" name="email" placeholder="{{ trans('main_trans.enter_your_email') }}" required
                    class="bg-black text-white p-3 outline-none rounded-[4px]">
                <input type="submit" value="{{ trans('main_trans.subscribe') }}"
                    class="bg-white hover:bg-violet-700 text-black hover:text-white mt-6 sm:mt-0 mx-2 py-3 px-16 cursor-pointer rounded-[4px] duration-300">
            </form>
            @if (Session::has('message_sent'))
                <div class="text-white bg-green-700 p-3 mt-6 mx-5 text-base font-bold rounded-[4px]">
                    {{ Session::get('message_sent') }}</div>
            @endif
        </div>
        <span class="text-neutral-400 text-sm">
            {{ $global_setting_data->text_bottom_newsletter }}
        </span>
    </div>
    <img src="{{ asset('uploads/' . $global_setting_data->photo_newsletter) }}" alt="newsletter" class="max-h-64 rounded-[4px] mb-6 lg:ml-6 rtl:mr-6 ">
</div>
</div>
<!-- End Newsletter -->
</div>
@endsection
