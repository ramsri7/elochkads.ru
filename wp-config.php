<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'elochkads');

/** Имя пользователя MySQL */
define('DB_USER', 'elochkads_user');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '8aM8mkPmUR');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ks]WHx+Ppq}8-<;NNPMLEDB 7*4&<s=~()/v6A,Q+.5$OM[r2,b?f3BBYSRA*L-8');
define('SECURE_AUTH_KEY',  'NZ|>}bapKZGJx5U!pwe.<sjNf)},sA|Y5|-h9LFh S!*u>!_V/OMSdEcGMm.r_a]');
define('LOGGED_IN_KEY',    '4#7K+#+v|b%jEW>jwO}+|22J9Y)C(VLs o)hM-z&~~~aS&{9n->Q%Ex;xkGPH_BD');
define('NONCE_KEY',        '.2(No:LR}/NjrqY,j8~v=4v!IYl;2q:yaKqR-f8bA|*E%|pS.ocHU9OVA/ErEAGW');
define('AUTH_SALT',        '{*zR+@0a13|@j hEuCEPbMubJPd$<wj:XDGdV6lpKi<xBor*~!`:VvxtgstE@G_v');
define('SECURE_AUTH_SALT', 'gb~C~I!p{DWr8/B?/*u+CM-6Mr3Og7IY|p#yy7Gb;wFXwx>+Er8^0hw.tra|>Lz]');
define('LOGGED_IN_SALT',   '%phYGp6Oy`sI%l_Fb:qua)4 mCeb]60E9`(!x}3-.[;p9eLb-JtTuJk[|;+=>3B3');
define('NONCE_SALT',       'U69Zb}Fq>z.rbK0AaG1S<y.}eP_aaEC%)RJAK#aFQxoi+K,YD3-Jm]d~@f^f%oMB');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
