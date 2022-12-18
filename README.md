1. Скопировать .env.example в .env
2. docker-compose up -d --build
3. docker-compose exec php-fpm composer install
4. docker-compose up -d --build --force-recreate
5. docker-compose exec php-fpm php artisan migrate
6. docker-compose exec php-fpm php artisan db:seed
7. docker-compose exec php-fpm php artisan queue:work
8. консоль №2 docker-compose exec php-fpm php artisan queue:work
9. консоль №3 docker-compose exec php-fpm php artisan websockets:serve

Проверка websockets на http://127.0.0.1/laravel-websockets

При тестировании api убедиться что выставлен заголовок Accept: application/json

По умолчанию уже создан администратор admin@admin.com пароль admin

Роуты:

- регистрация api/register
передать form-data
[
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required|min:6',
    'c_password' => 'required|same:password',
]

- логин api/login
передать form-data
[
    email
    password
]

- создать отзыв api/review
передать Bearer token и form-data
[
    'subject' => 'required|min:5',
    'content' => 'required|min:5',
]

- ответ на отзыв api/comment
передать Bearer token и form-data
[
     'review_id' => 'required|integer',
     'content' => 'required|min:5',
]

- получить отзывы (передать Bearer token) api/reviews?page=3 и необязательный параметр limit
