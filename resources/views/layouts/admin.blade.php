<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
         {{-- 後の章で解説 --}}
         <meta name="crsf-token" content="{{ csrf_token() }}">
         
        {{-- 各ページ毎に1titleタグを入れる為、@yieldで空けておく--}}
        <title>@yield('title')</title>
        
        <!-- scripts -->
        {{-- Laravel標準で用意されているjavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <LINK rel="dns-prefetch" herf="http://fonts.gstatic.com">
        <link href="https:fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        
        {{-- 後半で作成するCSSを読み込む --}}
        <link herf="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ confing('app.name', 'Laravel') }}
                        </a>
                        <button class="navbar-toggler" type="button" date-toggle="collapse" date-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navber-collapse" id="navbarSupportedContent">
                        
                            <!-- left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                            
                            </ul>
                        
                            <!-- RIght Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                            </ul>
                        </div>
                </div>
            </nav>
            {{--  ここまでナビゲーションバー --}}
            
            <main class="py-4">
                {{-- コンテンツをここに入れる為、@yieldで空けておく --}}
                
                @yield('content')
            </main>
        <div>
    </body>
</html>

                        