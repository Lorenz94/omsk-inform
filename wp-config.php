<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'omskinform');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9,^1^0e%z~h@724 Gi[c;+Eb rKsNK>-VE~/3KSPMptS#a*z#RUY!1XBz^?=rqWv');
define('SECURE_AUTH_KEY',  '&toOkyfP(<YWN{(RtQ6-RoZZ:p@HRi b)Bzr4e(x%T1H}S4[r[5(?3MvLC[.vW%[');
define('LOGGED_IN_KEY',    '^PTo4 nIo3-h;_tz4g h. 0VjZS5bIoF~w&k9CCzM>P@jd* u9.*yaMf<5>~{K0r');
define('NONCE_KEY',        '_uP-vsgfO]>~5Lq[eWZdB%/mu/dbMMdBuL2Aky3+|=?{-AbjTVajNi*(MCsx!tk[');
define('AUTH_SALT',        'RirrA@uO{JT/.({YgN3^MG9TH3ItNyXsZj4bn r[/Z*[{t/1#_Q4V7/!hqib&i9m');
define('SECURE_AUTH_SALT', '20JR5c]:_,TAY qHdjZZ[7X?Ro/;OhO_aN@KVwd>#q< GVR86,W#&?Xz?`^iJ_H;');
define('LOGGED_IN_SALT',   'M1E{9zSpZk~D_({h5 ;vL,~-T5AM4`MXL@!eyie/VX7m@pX*|k`m] R~}:q@%`j}');
define('NONCE_SALT',       '@[OCsP#~vMogEr=E^r/hxu4N/M{5*hD$d`p4GnKt{r:WU33S.@~CaBEb_0j]`XRk');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
