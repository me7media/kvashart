<?php

    $g_config['admin_sector']                      = array();
    
    $g_config['admin_sector']['salt']              = "JSnn2991!-3981"; // Соль для хранения паролей в базе. По сути любой набор символов
	$g_config['admin_sector']['page']  = 'admin-sect8123'; // Страница административного раздела, на которую мы попадём после авторизации
    $g_config['admin_sector']['after_login_page']  = 'admin-sect8123/home'; // Страница административного раздела, на которую мы попадём после авторизации
    $g_config['admin_sector']['after_logout_page'] = 'admin-sect8123/login'; // Страница на которую мы попадем после выхода из админки 
    
    $g_config['admin_sector']['def_login']         = 'pur'; // Логин для входа в административный раздел
    $g_config['admin_sector']['def_pwd']           = 'Nj82'; // Пароль для входа в административный раздел
	$g_config['admin_sector']['admin_steam_user']  = 1; //пользователь из фронтенд системы, под которым будем работать в админке
?>