@extends('front.layout.app')
@section('title', 'Tag')
@section('excerpt')
    Desription Website
@endsection
@section('main_content')
    <!-- Start Page Head -->
    <div class="bg-neutral-900">
        <div class="container max-w-7xl mx-auto py-6 px-6 lg:px-8 md:w-3/4 h-72 flex flex-col justify-center items-center">
            <h1 class="text-white text-3xl md:text-5xl text-center font-extrabold md:leading-[60px] my-6 mx-auto">
                {{ trans('main_trans.all_post_of_tag:') }} {{ $tag_name }}
            </h1>
        </div>
    </div>
    <!-- End Page Head -->
    <!-- Start content -->
    <div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="basis-10/12">
                <div class="flex flex-col grid-cols-1  gap-5">
                    @if (count($all_posts))
                        @foreach ($all_posts as $item)
                            @if (!in_array($item->id, $all_post_ids))
                                @continue
                            @endif
                            <div
                                class="flex flex-col sm:flex-row items-center bg-neutral-900 hover:bg-black  p-5 rounded-xl  duration-300">
                                <a href="{{ route('post', $item->id) }}">
                                    <img src="{{ asset('uploads/posts' . '/' . $item->post_photo) }}"
                                        alt="{{ $item->post_title }}"
                                        class="w-[300px] lg:max-w-[250px] h-44 mb-3 rounded-[4px]">
                                </a>
                                <div class="p-2 sm:ml-8 sm:rtl:mr-8">
                                    <a href="{{ route('category', $item->sub_category_id) }}"
                                        class="text-white  py-1 px-3 bg-violet-700 rounded-[4px]">{{ $item->rSubCategory->sub_category_name }}</a>
                                    <h3 class="text-white hover:text-violet-700 text-xl my-4 leading-8 font-bold">
                                        <a href="{{ route('post', $item->id) }}">{{ $item->post_title }}</a>
                                    </h3>
                                    <p class="text-neutral-300 text-sm">{{ $item->excerpt }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="mt-8 p-5 bg-neutral-900 text-white text-center rounded-xl duration-300">
                    {{ $all_posts->links() }}
                </div>
            </div>
            @include('front.layout.sidebar')
        </div>
    </div>
    <!-- End content -->
@endsection
