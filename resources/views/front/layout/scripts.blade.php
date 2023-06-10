{{-- Google Analytics --}}
@if ($global_setting_data->analytic_status == 'Show')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Data());
        gtag('config', '{{ $global_setting_data->analytic_id }}');
    </script>
@endif
