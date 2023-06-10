@extends('front.layout.app')
@section('title')
    {{ $page_data->contact_title }}
@endsection
@section('excerpt')
    {{ $page_data->contact_excerpt }}
@endsection
@section('main_content')
    <!-- Start Head Post -->
    <div>
        <div class="bg-neutral-900">
            <div class="container max-w-7xl mx-auto py-6 px-6 lg:px-8">
                <h1
                    class="text-neutral-900 font-semibold text-3xl md:text-4xl md:leading-[120%] lg:text-5xl dark:text-neutral-100 my-6 ">
                    {{ $page_data->contact_title }}
                </h1>
            </div>
        </div>
        <!-- End Head Post -->
        <!-- Start content -->
        <div class="container max-w-7xl mx-auto py-28 px-2 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between my-6">
                <div class="bg-neutral-900  py-11 px-6 rounded-xl w-[550px]">
                    <form action="{{ route('contact_form_submit') }}" method="POST" class="form_contact_ajax">
                        @csrf
                        <div class="flex justify-around mb-8">
                            <div class="flex flex-col">
                                <label for="name" class="text-white mb-2">Name:</label>
                                <input type="text" id="name" name="name" placeholder="Enter your name"
                                    class="bg-black text-white p-3 outline-none rounded-[4px]">
                                <span class="text-red-500 error-text message-error"></span>
                            </div>
                            <div class="flex flex-col">
                                <label for="email" class="text-white mb-2">Email:</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email"
                                    class="bg-black text-white p-3 outline-none rounded-[4px]">
                            </div>
                        </div>
                        <div class="m-auto w-11/12">
                            <textarea name="message" class="bg-black text-white w-full p-3 outline-none rounded-[4px] h-56" maxlength="5000"
                                placeholder="Describe your project..."></textarea>
                        </div>
                        <input type="submit" value="Sent Message"
                            class="bg-violet-700 hover:bg-white  text-white hover:text-black mx-5 mt-8 py-3 px-16 cursor-pointer rounded-[4px] duration-300">
                    </form>
                    @if (Session::has('message_sent'))
                        <div class="text-white bg-green-700 p-3 mt-6 mx-5 text-base font-bold rounded-[4px]">{{ Session::get('message_sent') }}</div>
                    @endif
                </div>
                <div class="map">
                    {!! $page_data->contact_map !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
@endsection
