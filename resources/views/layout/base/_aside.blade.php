{{-- Aside --}}

@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-light.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo ml-5">
            <a href="{{ url('/') }}">
                <img alt="The Juice Bar" src="/media/tjb/logo-small.png"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="/media/got/logo_small.png"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
            <?php
                $purchases =  [
                    'title' => 'Purchases',
                    'icon' => 'media/svg/icons/Shopping/Bag1.svg',
                    'root' => true,
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'My Purchases',
                            'page' => '/users'
                        ],
                        [
                            'title' => 'Add a Purchase',
                            'page' => '/users'
                        ],
                        [
                            'title' => 'Purchase Report',
                            'page' => '/register',
                        ],
                    ],
                ];

                $sales =  [
                    'title' => 'Sales',
                    'icon' => 'media/svg/icons/Shopping/Dollar.svg',
                    'root' => true,
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'My Sales',
                            'page' => '/users'
                        ],
                        [
                            'title' => 'Add a Sale',
                            'page' => '/users'
                        ],
                        [
                            'title' => 'Sales Report',
                            'page' => '/register',
                        ],
                    ],
                ];

                $products =  [
                    'title' => 'Products',
                    'icon' => 'media/svg/icons/Shopping/Barcode.svg',
                    'root' => true,
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Product Category',
                            'page' => '/productcategories'
                        ],
                        [
                            'title' => 'Products',
                            'page' => '/users'
                        ],
                    ],
                ];

                $menus =  [
                    'title' => 'Menu',
                    'icon' => 'media/svg/icons/Cooking/Dinner.svg',
                    'root' => true,
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Menu Category',
                            'page' => '/users'
                        ],
                        [
                            'title' => 'Menu',
                            'page' => '/users'
                        ],
                    ],
                ];
                $dashboard =  [
                    'title' => 'Dashboard',
                    'root' => true,
                    'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
                    'page' => '/',
                    'new-tab' => false,
                ];
              
                $menu = [
                    'items' => [$dashboard,$purchases,$sales,$products,$menus]
                ];
                // array_push($menu['items'],$purchases);
                // array_push($menu['items'],$sales);
                // array_push($menu['items'],$products);
                // array_push($menu['items'],$menus);
                Menu::renderVerMenu($menu['items']);
                ?>
            </ul>
        </div>
    </div>

</div>
