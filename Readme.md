Yii 1 подготовленный докер для отладки
- php 5.6
- mysql 5.6
- [yii-debug-toolbar](https://github.com/malyshev/yii-debug-toolbar)

Качаем [Фреймворк](https://github.com/yiisoft/yii/releases/download/1.1.21/yii-1.1.21.733ac5.zip)

Распаковываем папку framework в папку src. В настройках базы данных yii меняем или удаляем префикс таблиц и имя базы данных.

docker/mysql/init.sql создаёт базу данных. Туда же пишем все остальные команды инициализации допустим:

```sql
use rms;

CREATE TABLE table_name (
    column1 datatype,
    column2 datatype,
    column3 datatype
);

CREATE TABLE table_name2 (
    column1 datatype,
    column2 datatype,
    column3 datatype
);

/* etc */
```

Или можете использовать миграции yii.

Перед этим надо запустить композер:

```bash
docker-compose up
```
Для подключения к контейнеру используем команду:

```bash
docker exec -it rms_php_1 /bin/bash
```

Где rms_php_1 имя контейнера. Если незнаем имя можно посмотреть лог композера или использовать команду:

```bash
# Вывод имён контейнеров
docker ps
```

после чего идём в папку /src/htdocs/protected и выполняем миграцию пример:

```bash
# Изначально должны быть в папке src
cd htdocs/protected
./yiic migrate
```

Если хотим создать миграцию то:
```bash
./yiic migrate create create_news_table
```

Подробнее про миграции читаем [тут](https://www.yiiframework.com/doc/guide/1.1/ru/database.migration).

Также если поменялся владелец папок то меняем на своего допустим:

```bash
sudo chown -R ruande:ruande rms
```
Где rms корневой каталог репозитория.