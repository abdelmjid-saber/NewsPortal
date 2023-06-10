@extends('front.layout.app')
@section('title')
    {{ $page_data->faq_title }}
@endsection
@section('excerpt')
    {{ $page_data->faq_excerpt }}
@endsection
@section('main_content')
    <!-- Start Head Post -->
    <div class="bg-neutral-900">
        <div class="container max-w-7xl mx-auto py-6 px-6 lg:px-8">
            <h1
                class="text-neutral-900 font-semibold text-3xl md:text-4xl md:leading-[120%] lg:text-5xl dark:text-neutral-100 my-6 ">
                {{ $page_data->faq_title }}
            </h1>
        </div>
    </div>
    </div>
    <!-- End Head Post -->
    <!-- Start content -->
    <div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
        <div class="p-8 bg-neutral-900 text-neutral-300 rounded-xl">
            {!! $page_data->faq_detail !!}
        </div>
    </div>
    </div>
    <!-- End content -->
@endsection
