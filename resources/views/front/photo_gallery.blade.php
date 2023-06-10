@extends('front.layout.app')
@section('title', 'Photo Gallery - Devs Mix')
@section('excerpt')
    Photo Gallery
@endsection
@section('main_content')
    <!-- Start Head Post -->
    <div class="bg-neutral-900">
        <div class="container max-w-7xl mx-auto py-6 px-2 sm:px-6 lg:px-8">
                <h1 class="text-white font-semibold text-3xl md:text-4xl md:leading-[120%] lg:text-5xl text-center my-6 ">
                    {{ trans('main_trans.photo_gallery') }}
                </h1>
            </div>
        </div>
    </div>
    <!-- End Head Post -->
    <!-- Start content -->
    <div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($photos as $item)
            <div class="flex flex-col items-center bg-neutral-900 hover:bg-black rounded-[4px] duration-300">
                <a  href="{{ asset('uploads/gallery' . '/' . $item->photo) }}" class="view" >
                    <img src="{{ asset('uploads/gallery' . '/' . $item->photo) }}" alt="{{ $item->caption }}" class="mb-3 rounded-[4px]">
                </a>
                <div>
                    <h3 class="text-white text-xl my-3 leading-8 font-bold break-all">
                        {{ $item->caption }}
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8 p-5 bg-neutral-900 text-white text-center rounded-xl duration-300">
            {{ $photos->links() }}
        </div>
    </div>

    <!-- End content -->
@endsection
