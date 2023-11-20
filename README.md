# Todo-List

Версия PHP: 8.1.9 <br>
Версия Laravel: 8.83.27

todo-list - это веб-приложение, разработанное с использованием Laravel, которое позволяет управлять заметками пользователей с помощью API.

## Сборка и запуск проекта

1. Клонируйте репозиторий: git clone https://github.com/Ceebot/todo-list

2. Перейдите в директорию проекта: cd todo-list

3. Установите зависимости проекта с помощью Composer: composer install

4. Установите значения для переменных среды, создав файл .env (скопировать файл [.env.example](.env.example)) и добавив необходимую информацию.

5. Генерируйте ключ приложения: php artisan key:generate

6. Запустите миграции базы данных: php artisan migrate --seed

7. Запустите локальный сервер разработки: php artisan serve

Когда сервер запущен, вы можете получить доступ к приложению, посетив http://localhost:8000 в вашем веб-браузере.
