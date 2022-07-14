# Задание 16

Начат курсовой проект. Созданы таблицы для простых постоянных данных: тип квартиры, состояние и материал стен. Созданы ресурсные конторллеры для них, а также api-роуты, отдающие и обновляющие эти данные.

В реализации роутов использованы два подхода. Один - стандартный для Laravel (роуты для wallmaterial) с внедрением модели в параметры запроса. Второй - с передачей параметров через Request (роуты для types и condition; подход слизан с REST API Битрикс24). Прошу дать комментарий по второму подходу.

## Обернуть запросы в базу данных в кэш, используя обычный и тегированный кэши.
Работа с обычным кэшем через драйвер 'file' реализована в контроллере ConditionController. Метод index проверяет наличие в кэше массива данных с тегом 'condition' и в случае нахождения возвращает этот массив. Если данные в кэше отсутствуют, то в него записывается вся коллекция, полученная из модели. Время жизни кэша не ограничено, поскольку эти данные в базе почти никогда не изменяются.

По аналогичному алгоритму реализован метод show, возвращающий одну запись по её id (id передаётся в запросе).
Метод update обновляет значение в модели, id которой передан в запросе, после чего очищает кэш, чтобы при следующем запросе list или get данные брались из базы.

В контроллере TypeController методы реализованы по таким же алгоритмам, только кэш работает через драйвер memcached (отдельной установки для него не потребовалсь, поскольку он входит в поставку OpenServer. Нужно было только раскомментировать строку 'extension = memcached' в конфигурации PHP). Для демонстрации использовался тегированный кэш, хотя практического смысла в данном случае в этом нет. В будущем планируется сделать разнести по тегам кэш для постоянных данных (уже реализованные параметры объектов) и для просмотренных/выбранных квартир.

Для тестов был создан метод cacheClear (и роут под него) для очистки кэша. После создания artisan-команды метод был удалён.

## Написать Artisan-команду, которая периодически очищает кэш.
Реализована команда cache:clear для очистки кэша по ключам (файл ClearCache). В качестве параметров передаётся ключ и драйвер, которые подставляются в команду очистки. Также проверяется наличие переданного ключа в кэше и выводится ошибка, если ключ не найден.

По-хорошему здесь нужно сделать параметр 'driver' необязательным и работать с кэшем по умолчанию в случае его отсутствия. Параметр 'key' тоже можно сделать необязательным и при его отсутствии очищать весь кэш. Также нужно добавить работу с тегированным кэшем (сейчас команда с ним не работает). 