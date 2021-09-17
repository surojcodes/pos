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
        <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        @yield('styles')
    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>
        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif
        @include('layout.base._layout')
        @if(session('success'))
            <div class="alert alert-custom alert-success fade show" role="alert" style='position:absolute;top:6em;right:1em;z-index:100'>
                <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                <div class="alert-text">{{session('success')}}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-custom alert-danger fade show" role="alert" style='position:absolute;top:6em;right:1em;z-index:100'>
                <div class="alert-icon"><i class="flaticon2-cancel"></i></div>
                <div class="alert-text">{{session('error')}}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
            @endif

            {{$errors}}
        <script>var HOST_URL = "{{ route('quick-search') }}";</script>
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>


        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
        <script src="{{asset('js/datatables.min.js')}}"></script>
        <script>
           $('#dataTable').DataTable({
                "order": [],
                "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50,100,"All"] ]
            });
        </script>
        <script>
          const alert = document.querySelector('.alert');
          if(alert){
            setTimeout(() => {
              alert.style.display='none';
            }, 2000);
          }
        </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        @yield('scripts')
    </body>
</html>

