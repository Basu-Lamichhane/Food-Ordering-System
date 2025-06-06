<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'Food Ordering System',
    'title_prefix' => 'FOS',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => 'Food Ordering System',
    'logo_img' => 'img/fos.png',
    'logo_img_class' => 'brand-image img-circle elevation -1',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => '',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => '',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-info',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'layout-fixed layout-navbar-fixed',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-orange elevation-2',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-orange navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        // [
        //     'text' => 'search',
        //     'search' => true,
        //     'topnav' => true,
        // ],

        [
            'text' => 'Admin Dashboard',
            'url' => '/admin',
            'can' => ['admin'],
            'icon' => 'nav-icon fas fa-fw fa-home'
        ],
        [
            'text' => 'Chat ',
            'url' => 'dashboard/chat',
            'can' => ['admin', 'delivery', 'kitchen'],
            'icon' => 'nav-icon fas fa-fw fa-comment',

        ],

        [
            'text' => 'Users',
            'can' => 'admin',
            'url' => '/admin/users',
            'icon' => 'nav-icon fas fa-fw fa-users',
            'submenu' => [
                [
                    'text' => 'View All Users',
                    'url' => '/admin/users',
                    'icon' => 'nav-icon fas fa-fw fa-users'
                ],
                [
                    'text' => 'Add New User',
                    'url' => '/admin/users/create',
                    'icon' => 'nav-icon fas fa-fw fa-user-plus'
                ],
            ]
        ],
        [
            'text' => 'Product',
            'can' => 'admin',
            'url' => '/admin/products',
            'icon' => 'nav-icon fas fa-fw fa-box',
            'submenu' => [
                [
                    'text' => 'View All Products',
                    'url' => '/admin/products',
                    'icon' => 'nav-icon fas fa-fw fa-eye'
                ],
                [
                    'text' => 'Add New Product',
                    'url' => '/admin/products/create',
                    'icon' => 'nav-icon fas fa-fw fa-plus'
                ],
            ]
        ],
        [
            'text' => 'Categories',
            'can' => 'admin',
            'url' => '/admin/categories',
            'icon' => 'nav-icon fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'View All Categories',
                    'url' => '/admin/categories',
                    'icon' => 'nav-icon fas fa-fw fa-eye'
                ],
                [
                    'text' => 'Add New Category',
                    'url' => '/admin/categories/create',
                    'icon' => 'nav-icon fas fa-fw fa-list-alt'
                ],
            ]
        ],
        [
            'text' => 'Orders',
            'url' => '/admin/orders',
            'can' => 'admin',
            'icon' => 'nav-icon fas fa-fw fa-shopping-cart',
            'submenu' => [
                [
                    'text' => 'View All Orders',
                    'url' => '/admin/orders',
                    'icon' => 'nav-icon fas fa-fw fa-eye'
                ],

            ]
        ],
        [
            'text' => 'Coupons',
            'url' => '/admin/coupons',
            'can' => 'admin',
            'icon' => 'nav-icon fas fa-fw fa-tag'
        ],
        [
            'text' => 'Kitchen Dashboard',
            'url' => '/kitchen',
            'can' => ['kitchen'],
            'icon' => 'nav-icon fas fa-fw fa-drum-steelpan'
        ],
        [
            'text' => 'Kitchen Orders',
            'url' => '/kitchen/orders',
            'can' => ['admin', 'kitchen'],
            'icon' => 'nav-icon fas fa-fw fa-faucet',
            'submenu' => [
                [
                    'text' => 'View Orders',
                    'url' => '/kitchen/orders',
                    'icon' => 'nav-icon fas fa-fw fa-eye'
                ],

            ]
        ],
        [
            'text' => 'Section ',
            'url' => 'admin/sections',
            'can' => ['admin'],
            'icon' => 'nav-icon fas fa-fw fa-th',

        ],
        [
            'text' => 'Delivery Region',
            'url' => '/admin/regions',
            'can' => 'admin',
            'icon' => 'nav-icon fas fa-fw fa-map-marker-alt',
            'submenu' => [
                [
                    'text' => 'Regions',
                    'url' => '/admin/regions',
                    'icon' => 'nav-icon fas fa-fw fa-map-marker'
                ],
                [
                    'text' => 'Assign Region',
                    'url' => '/admin/regions/assign',
                    'icon' => 'nav-icon fas fa-fw fa-gavel'
                ],
                [
                    'text' => 'List Assigned',
                    'url' => '/admin/assigned/list',
                    'icon' => 'nav-icon fas fa-fw fa-list'
                ],

            ]
        ],

        [
            'text' => 'Delivery Dashboard',
            'url' => '/delivery',
            'can' => ['delivery'],
            'icon' => 'nav-icon fas fa-fw fa-truck',
            'submenu' => [
                [
                    'text' => 'View Orders',
                    'url' => '/delivery/orders',
                    'icon' => 'nav-icon fas fa-fw fa-eye'
                ],

            ]
        ],
        [
            'text' => 'Sliders',
            'url' => 'admin/sliders',
            'can' => ['admin'],
            'icon' => 'nav-icon fas fa-fw fa-image',
            'submenu' => [
                [
                    'text' => 'View All Sliders',
                    'url' => 'admin/sliders/',
                    'icon' => 'nav-icon fas fa-fw fa-eye'
                ],
                [
                    'text' => 'Toggle Sliders',
                    'url' => 'admin/sliders/toggle',
                    'icon' => 'nav-icon fas fa-fw fa-tools'
                ],

            ]
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
