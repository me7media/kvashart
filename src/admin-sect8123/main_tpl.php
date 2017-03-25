<?php
$g_lang['m_title'] = 'Административный раздел';
	$current['name'] = 'Административный раздел';
	
		$g_config['admin_menu'][] = array
				  (
					  'link'  => SiteRoot($g_config['admin_sector']['page'].'/home'),
					  'name'  => 'Главная',
					  'label' => 'Первая страница админки',
					  'css'   => '',
					  'list'  => array()
				  );
$g_config['admin_menu'][] = array
				  (
					  'link'  => '[removed]void(0)',
					  'name'  => 'Продукция',
					  'label' => 'Все работы',
					  'css'   => '',
					  'list'  => array(array('link' => SiteRoot($g_config['admin_sector']['page'].'/news/add?i=list'), 'name' => 'Добавить', 'label' => 'Добавить Информацию'),
                                  array('link' => SiteRoot($g_config['admin_sector']['page'].'/news/list?i=list'), 'name' => 'Список', 'label' => 'Все элементы'))
				  );		

$g_config['admin_menu'][]   = array
                        (
                            'link'  => '[removed]void(0)',
                            'name'  => 'Новости',
                            'label' => 'Новости сервиса',
                            'css'   => '',
							  'list'  => array
							  (
								  array('link' => SiteRoot($g_config['admin_sector']['page'].'/news/add?i=news'), 'name' => 'Добавить', 'label' => 'Добавить Новость'),
                                  array('link' => SiteRoot($g_config['admin_sector']['page'].'/news/list?i=news'), 'name' => 'Список', 'label' => 'Все Новости'),
							  )
                        );
$g_config['admin_menu'][] = array
				  (
					  'link'  => SiteRoot($g_config['admin_sector']['page'].'/news/pages'),
					  'name'  => 'Страницы',
					  'label' => 'Контакты, биография',
					  'css'   => '',
					  'list'  => array()
				  );
$g_config['admin_menu'][] = array
				  (
					  'link'  => SiteRoot($g_config['admin_sector']['page'].'/zakaz'),
					  'name'  => 'Заказы',
					  'label' => 'Просмотр заказов',
					  'css'   => '',
					  'list'  => array()
				  );
    $g_config['admin_menu'][]   = array
                        (
                            'link'  => SiteRoot($g_config['admin_sector']['page'] . '/logout'),
                            'name'  => '<span class="glyphicon glyphicon-log-out"></span>',
                            'label' => 'Выйти',
                            'css'   => '',
                            'list'  => array()
                        );
						
    if (!IS_ADMIN_AUTH)
    {
        $g_config['admin_menu']   = array();
        $g_config['admin_menu'][] = array
                            (
                                'link'  => SiteRoot($g_config['admin_sector']['page'] . '/login'),
                                'name'  => 'Вход',
                                'label' => 'Войти в административный раздел',
                                'css'   => '',
                                'list'  => array()
                            );
    }
    // Выделяем нужный элемент в меню:
    foreach ($g_config['admin_menu'] as $k => $v)
    {
        // Выделять если это текущая страница или страница в ее выподающем списке
        $links = array($v['link']);
        foreach ($v['list'] as $subLink)
        {
            if (is_array($subLink))
            {
                $links[] = $subLink['link'];
            }
        }

        if (in_array(GetCurUrl(), $links))
        {
            $v['css'] = empty($v['css']) ? 'active' : "{$v['css']} active";
            $g_config['admin_menu'][$k] = $v;
			if(is_array($v['list']) && count($v['list']) ) {
				foreach ($v['list'] as $data) {	if($data['link'] == GetCurUrl()) $current = $data; }
			} else $current = $v;
        }
    }

	$title = $current['name'];
	
    $menu = $g_config['admin_menu'];
?>