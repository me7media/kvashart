<?php

    /**
     * Базовая конфигурация системы
     *
     * @author Zmi
     */


    define('SITE_ROOT',     '/'); // Путь к корню сайта
    define('SITE_IN_DIR',   '');  // Если сайт работает в каталоге напишите здесь каталог пример "cabinet" или "book/php"
    define('DOMAIN_COOKIE', '');

    // Массив языков сайта
    define('DEF_LANG', 'ru');
    $g_arrLangs = array(
                          'en' => array('name' => 'English'),
                          'ru' => array('name' => 'Русский')
                       );

    $g_config                     = array();
    $g_config['mainTpl']          = 'main';
    $g_config['charset']          = 'utf-8';
    $g_config['defaultComponent'] = 'content';

    if (!defined("E_DEPRECATED"))
    {
        define("E_DEPRECATED", 8192);
    }
    $g_config['phpIni']  = array
                            (
                                'error_reporting'    => E_ALL ^ E_DEPRECATED,  // Выдавать все ошибки за исключением нотайсов об устаревшом коде
                                'display_errors'     => DEBUG_MODE,            // Выводить ли ошибки в браузер
'memory_limit'       => '128M',                 // Максимальное коливество памяти на выполнение скрипта
'max_execution_time' => '30',                  // Максимальное время выполнения скрипта
'max_input_time'     => '30',                  // Время в течении которого скрипту разрешено получать данные
                                // "upload_max_filesize" и "post_max_size" - Для изменения размера загружаемыз данных (файлов или POST) но задавать нужно через "php.ini | .htaccess | httpd.conf"
                            );

    $g_config['logPath']           = BASEPATH . 'tmp/log.txt'; // Стандартный лог движка (ф-я ToLog())
    $g_config['useDebugErrorHook'] = true; // Использовать ли DebugErrorHook для перехвата ошибок
    $g_config['logErrors']         = array
                                     (
                                        'repeatTmp'       => BASEPATH . 'tmp/log/unRepeatErrTmp',
                                        'logFile'         => BASEPATH . 'tmp/log/log.txt',
                                        'emailTimeRepeat' => 3 * 60, // Письмо каждые 3 минуты
                                        'email'           => 'example@example.com', // На этот адрес будут присылаться сообщения об ошибках
                                     );

    $g_config['extrapacker']                           = array();
    $g_config['extrapacker']['dir']                    = 'auto_merge_css_js';
    $g_config['extrapacker']['packHtml']               = false;
    $g_config['extrapacker']['packCss']                = true;
    $g_config['extrapacker']['packJs']                 = true;
    $g_config['extrapacker']['arrExeptions_js']        = array();
    $g_config['extrapacker']['arrExeptionsNotAdd_js']  = array();
    $g_config['extrapacker']['arrExeptions_css']       = array();
    $g_config['extrapacker']['arrExeptionsNotAdd_css'] = array();
    $g_config['extrapacker']['buffering']              = false; // Включен ли GZIP для склеиных css/js

    // Загружать запущенный компонент в main_template-е ?
    $g_config['isLoadInMainTpl']  = true;

    $g_config['useModRewrite']    = is_readable(BASEPATH . '.htaccess');

    $g_config['startExecTime']    = microtime(true);

    // Получать ли тайтл автоматически из h1 если не было установлено до этого
    $g_config['autoGetTitle']     = true;

    // Список ф-ий обрабатывающих вывод контент перед выводом в браузер
    $g_config['prepareFunctions'] = array
                                    (
                                        '_PrepareContent' // Стандартная ф-я редактирования вывода (объединяет head-ы в один и склеивает css с js)
                                    );
?>
