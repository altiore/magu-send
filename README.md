<p align="center">Всем привет</p>

## Обычный почтовый сервис.

<p>Получает сообщения по api, валидирует, сохраняет в базу как задачу Task.
На событие сохрание Task висит слушатель, который вызывается и формирует и отправляет письмо. Вот и все.</p>

## Отправка данных. JSON

==========from==================

<p>Вариант 1) "from": {"email": "user@email.com", "name": "user_name"}, //json</p>
Вариант 2) "from": "email:test@test.com, name:user_name_from" , //string</p>

==========to====================
<p>Вариант 1)   "to": {"email": "max3bf@gmail.com", "name": "Адресат"}, //json<p>
<p>Вариант 2) "to":"email:test@test.com, name: name_user_to", //string</p>

=============html================
<p>"html": "Hello world",</p>

==============subject==================
<p>"subject": "заголовок  письма" </p>


<p>Все просто</p>

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
"# magu-send" 
