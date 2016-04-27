<?php

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');

Admin::menu()->label('Пользователи')->icon('fa-users')->items(function () {
    Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');
    Admin::menu(App\User::class)->label('Юзеры')->icon('fa-user');
});

Admin::menu(krproxy\excurso\Models\ExCategory::class)->label('Категории')->icon('fa-cubes');
Admin::menu(krproxy\excurso\Models\ExExcursion::class)->label('Екскурсии')->icon('fa-cubes');
Admin::menu(krproxy\excurso\Models\ExOrder::class)->label('Заказы')->icon('fa-shopping-cart');