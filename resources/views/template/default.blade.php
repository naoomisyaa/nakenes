{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}



    <div class="py-12">
        <!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
            <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
            <title>Nakene's</title>
          <!-- CSS files -->
          <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css')}}" rel="stylesheet">
            <link href="{{  asset('./dist/css/tabler.min.css?1684106062')}}" rel="stylesheet"/>
            <link href="{{  asset('./dist/css/tabler-flags.min.css?1684106062')}}" rel="stylesheet"/>
            <link href="{{  asset('./dist/css/tabler-payments.min.css?1684106062')}}" rel="stylesheet"/>
            <link href="{{  asset('./dist/css/tabler-vendors.min.css?1684106062')}}" rel="stylesheet"/>
            <link href="{{  asset('./dist/css/demo.min.css?1684106062')}}" rel="stylesheet"/>

            <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
            <style>
              @import url('https://rsms.me/inter/inter.css');
              :root {
                  --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
              }
              body {
                  font-feature-settings: "cv03", "cv04", "cv11";
              }
            </style>
          </head>
          <body class="bg-light-subtle">
            <script src="./dist/js/demo-theme.min.js?1684106062"></script>
            <div class="page">
              <!-- Sidebar -->
              @include('template.sidebar')
              <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                  <div class="container-xl">
                    <div class="row g-2 align-items-center">
                      <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                          {{ $preTitle ?? "NAKENE PHOTOCOPY" }}
                        </div>
                        <h2 class="page-title">
                          {{ $title ?? "Dashboard" }}
                        </h2>
                      </div>
                      <!-- Page title actions -->
                      <div class="col-auto ms-auto d-print-none">
                        @stack('page-action')
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                  <div class="container-xl">
                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('info'))
                      <div class="alert alert-info">{{ session('info') }}</div>
                    @endif
                    @if (session('danger'))
                      <div class="alert alert-danger">{{ session('danger') }}</div>
                    @endif
                   @yield('konten')
                  </div>
                </div>
              
              </div>
            </div>
            
            <!-- Libs JS -->
            <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
            <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
            <script src="./dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
            <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
            <!-- Tabler Core -->
            <script src="./dist/js/tabler.min.js?1684106062" defer></script>
            <script src="./dist/js/demo.min.js?1684106062" defer></script>
            
          </body>
        </html>
    </div>
{{-- </x-app-layout> --}}
