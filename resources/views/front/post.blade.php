@extends('front.layout.app')
@section('title')
    {{ $post->post_title }}
@endsection
@section('excerpt')
    {{ $post->excerpt }}
@endsection
@section('main_content')
    <!-- Start Head Post -->
    <div class="bg-neutral-900">
        <div class="container max-w-7xl mx-auto py-6 px-2 sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('category', $post->sub_category_id) }}"
                    class="text-white py-1 px-3 bg-violet-700 rounded-[4px]">{{ $post->rSubCategory->sub_category_name }}</a>
                <h1 class="text-neutral-100 font-semibold text-3xl md:text-5xl my-6 md:w-11/12">
                    {{ $post->post_title }}
                </h1>
            </div>
            <div class="my-6">
                <img src="{{ asset('uploads/posts' . '/' . $post->post_photo) }}" alt="{{ $post->post_title }}"
                    class="w-10/12 m-auto rounded-xl lg:rounded">
            </div>
            <div class="w-full border-b border-neutral-800"></div>
            <div class="flex justify-between pt-6 space-x-6">
                <div class="text-white">
                    <i class="fa-solid fa-calendar-day mr-1 rtl:ml-1"></i>
                    @php
                        $ts = strtotime($post->updated_at);
                        $update_date = date('d F, Y', $ts);
                    @endphp
                    {{ $update_date }}
                </div>
                <div class="text-white text-sm flex space-x-6">
                    <div class="bg-black p-2 rounded-[4px] rtl:ml-6">
                        <i class="fa-solid fa-eye  mr-1 rtl:ml-1"></i>
                        {{ $post->visitors }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Head Post -->
    <!-- Start content -->
    <div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="basis-10/12">
                <div class="post-detail bg-neutral-900 p-8 text-neutral-300 rounded-xl">
                    {!! $post->post_detail !!}
                    <div class="mt-6">
                        @foreach ($tag_data as $item)
                            <a href="{{ route('tag_posts_show', $item->tag_name) }}"
                                class="text-white text-sm text-center bg-black hover:bg-violet-700 w-fit mr-2 rtl:ml-2 p-2 rounded-[4px] duration-300">{{ $item->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="my-8 bg-neutral-900 p-8 rounded-xl">
                    <div>
                        <div>
                            <h5 class="text-white text-2xl font-bold mb-7">{{ trans('main_trans.related_posts') }}</h5>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-col-2 md:grid-cols-3">
                            @foreach ($related_post_array as $item)
                                @if ($item->id == $post->id)
                                    @continue
                                @endif
                                <div
                                    class="flex flex-col items-center bg-neutral-900 hover:bg-black  p-5 rounded-[4px] duration-300">
                                    <a href="{{ route('post', $item->id) }}">
                                        <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}" alt="img"
                                            class="sm:w-52 h-32 mb-3 rounded-[4px]">
                                    </a>
                                    <div class="px-6">
                                        <h3 class="text-white hover:text-violet-700 text-normal font-bold text-center">
                                            <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @if ($post->is_comment == 1)
                    {!! $global_setting_data->disqus_code !!}
                @endif
            </div>
            <!-- Aside -->
            @include('front.layout.sidebar')
        </div>
    </div>
    <!-- End content -->
@endsection
