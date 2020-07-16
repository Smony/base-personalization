<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Personalization Models
    |--------------------------------------------------------------------------
    |
    | Если нужно можно переопределить модель
    |
    */
    'model' => [
        'interests' => Smony\Personalization\Models\Interest::class,
        'users_cookies' => Smony\Personalization\Models\UserCookies::class,
        'user_histories' => Smony\Personalization\Models\UserHistory::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | User Cookies
    |--------------------------------------------------------------------------
    |
    */
    'cookie_life_time' => 100000000,
];

