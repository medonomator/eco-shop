<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <title>Greenway Shop</title>
        <meta name="description" content="Greenway Shop" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta property="og:image" content="{{ asset('img/setevoi_og_img.png') }}" />
        <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon" />

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/icons/apple-icon-57x57.png') }} " />
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/icons/apple-icon-60x60.png') }}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icons/apple-icon-72x72.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icons/apple-icon-76x76.png') }}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icons/apple-icon-114x114.png') }}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icons/apple-icon-120x120.png') }}" />
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/icons/apple-icon-144x144.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/apple-icon-152x152.png') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-icon-180x180.png') }}" />
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/icons/android-icon-192x192.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/icons/favicon-96x96.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png') }}" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta name="msapplication-TileImage" content="{{ asset('img/icons/ms-icon-144x144.png') }}" />
        <meta name="theme-color" content="#ffffff" />
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}">  --}}
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#000" />
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#000" />
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#000" />
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        {{-- <link rel="stylesheet" href="{{ mix('css/categories.css') }}" /> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        @stack('styles')
        <script src={{ asset('libs/jquery/jquery.min.js') }}></script>
    </head>

    <body>
        <div class="wrapper main-wrapper">
            <div class="top-panel">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/greenway-logo.png') }}" alt="logo" />
                    </a>
                </div>

                <div class="main-menu">
                    <ul>
                        <li><a href="/stocks">Акции</a></li>
                        <li><a href="/brands">Бренды</a></li>
                        <li><a href="/blog">Блог</a></li>
                        <li><a href="{{ route('contacts') }}">Контакты</a></li>
                    </ul>
                </div>

                <div class="call-us">
                    <div class="icon">
                        <img src="{{ asset('img/call_us.png') }}" alt="alt" />
                    </div>
                    <div class="call-us__right">
                        <p class="call-us__text">Позвоните нам</p>
                        <p class="call-us__phone">+7(999)-121-09-81</p>
                    </div>
                </div>

                <a href="{{ route('shopping-cart') }}" class="shopping-cart">
                    <img src="{{ asset('img/shopping-cart.png') }}" alt="alt"> 
                    @auth('web')
                        <div class="quantity">{{ $shopCartsCount ?? '0' }}</div>
                    @endauth
                </a>

                @auth('web')
                    @php
                        $avatarUrl = Storage::url(Auth::user()->avatarUrl);
                        $defaultAvatar = Storage::url('default-avatar.jpeg');
                        $isAvatar = Auth::user()->avatarUrl;
                    @endphp
                    <div class="entered">
                        <div style="width: {{ $isAvatar ? '60px' : '30px' }}" class="default-photo">
                            <img src="{{ $isAvatar ?  $avatarUrl : $defaultAvatar }}" alt="alt">
                        </div>
                        <p>{{ Auth::user()->name }}</p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                        
                        <div class="hidden-block">
                            <a href="{{ route('logout') }}">Выйти</a>
                            <a href="{{ route('personal') }}">Личный кабинет</a>
                        </div>
                    </div>
                @endauth
                @guest('web')
                <div class="sign-in">
                    <a href="{{ route('login') }}">Войти</a>
                    <a href="{{ route('register') }}">Регистрация</a>
                    <a class="forgot-password" href="{{ route('forgot-password') }}">Забыли пароль ?</a>
                </div>
                @endguest

                @hasSection('product')
                    <div class="pull-right">
                        @yield('product')
                    </div>

                    <div class="clearfix"></div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="hamburger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>

        <div class="categories">
            <div class="wrapper">
                @if(count($categories)) 
                    @include('partial.categories', ['categories' => $categories])
                @endif
            </div>
        </div>

        <div class="wrapper main-content">
            @yield('content')
        </div>

        <footer class="footer">
            <div class="wrapper">
                Footer
            </div>
        </footer>
        
        {{-- <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> --}}
        <script src="{{ asset('js/common.js') }}"></script>
        <script>
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }

            const MAIN_URL = "{{env('APP_URL')}}"
        
            $('.fa-caret-down').click(event => {
                $('.hidden-block').toggle()
            })

            document.addEventListener('click', event => {
                if(!event.target.closest('.fa-caret-down') || 
                   event.target.closest('.hidden-block')) {
                    $('.hidden-block').hide();
                }
            })

            $('.to-cart').click(e => {
                const goodId = e.target.getAttribute('data');

                (async() => {
                    const res = await fetch(`${MAIN_URL}/add-shopping-cart/${goodId}/1`)

                    if(/login/.test(res.url)) {
                        var url= `${MAIN_URL}/login`;
                        window.location = url; 
                    } else {
                        const currentQuantiy = $('.quantity').text();
                        $('.quantity').text(Number(currentQuantiy) + 1);
                    }
                })();
             }) 

            //  $('.fa-trash-o').click(e => {
            //     const goodId = e.target.getAttribute('data');
                

            //     (async() => {
            //         try {
            //             await fetch(`${MAIN_URL}/delete-item-shopping-cart/${goodId}`)

            //         } catch (error) {
            //             console.log(error);   
            //         }
            //     })();
            //  })
        </script>
    </body>
</html>
