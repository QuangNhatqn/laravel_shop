<?php
return[
    'access' => [
        'product-list' => 'list_product',
        'product-add' => 'add_product',
        'product-update' => 'update_product',
        'product-delete' => 'delete_product',

        'product-category-list' => 'list_product_category',
        'product-category-add' => 'add_product_category',
        'product-category-update' => 'update_product_category',
        'product-category-delete' => 'delete_product_category',

        'post-list' => 'list_post',
        'post-add' => 'add_post',
        'post-update' => 'update_post',
        'post-delete' => 'delete_post',

        'post-category-list' => 'list_post_category',
        'post-category-add' => 'add_post_category',
        'post-category-update' => 'update_post_category',
        'post-category-delete' => 'delete_post_category',

        'menu-list' => 'list_menu',
        'menu-add' => 'add_menu',
        'menu-update' => 'update_menu',
        'menu-delete' => 'delete_menu',

        'slider-list' => 'list_slider',
        'slider-add' => 'add_slider',
        'slider-update' => 'update_slider',
        'slider-delete' => 'delete_slider',

        'setting-list' => 'list_setting',
        'setting-add' => 'add_setting',
        'setting-update' => 'update_setting',
        'setting-delete' => 'delete_setting',

        'user-list' => 'list_user',
        'user-add' => 'add_user',
        'user-update' => 'update_user',
        'user-delete' => 'delete_user',

        'role-list' => 'list_role',
        'role-add' => 'add_role',
        'role-update' => 'update_role',
        'role-delete' => 'delete_role',

        'permission-list' => 'list_permission',
        'permission-add' => 'add_permission',
        'permission-update' => 'update_permission',
        'permission-delete' => 'delete_permission',
    ],
    'table_module' => [
        'product',
        'product category',
        'post',
        'post category',
        'menu',
        'slider',
        'setting',
        'user',
        'role',
        'permission'
    ],
    'child_permission' => [
        'list',
        'add',
        'update',
        'delete'
    ]
];
