<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('excerpt')">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('uploads/' . $global_setting_data->favicon) }}" type="image/x-icon">
    @include('front.layout.styles')
    @include('front.layout.scripts')
</head>

<body dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" class="bg-black">
    @include('front.layout.nav')
    @yield('main_content')
    @include('front.layout.footer')
    @include('front.layout.scripts_footer')
</body>

</html>
