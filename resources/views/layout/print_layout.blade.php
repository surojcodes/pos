<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
    {{ Metronic::getGoogleFontsInclude() }}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach
    <style>
        *{
            font-family:"Arial"
        }
        label{
            font-weight:bold !important;
        }
        input,select{
            font-size:110% !important;
            border: 1px solid rgb(134, 133, 133) !important;
        }
    </style>
</head>

<body class="bg-white">
@if (config('layout.page-loader.type') != '')
    @include('layout.partials._page-loader')
@endif
<div class="p-5">
    @yield('content')
</div>
<script>var HOST_URL = "{{ route('quick-search') }}";</script>
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>
@foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach
@yield('scripts')
</body>
</html>

