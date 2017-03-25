<?php

    $g_config['watermark'] = array();

    $g_config['watermark']['default_config'] = array(
                                                  // Если нужно отключить
                                                  'disabled'        => false,

                                                  // Начиная с какой ширины высоты (пикселей) начинать наложение watermark
                                                  'start_width'     => 300, 
                                                  'start_height'    => 200,

                                                  // Если накладываем надпись
                                                  'sign_text'       => isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'Default Watermark',
                                                  'sign_font'       => BASEPATH . 'i/font/arial.ttf',
                                                  'sign_size'       => 'big', // small, middle, либо INT означающий кол-во пикселей (big, small, middle лучше потому что масштабируются по размеру картинки)
                                                  'sign_color'      => array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 100), // цвет надписи
                                                  // тень надписи
                                                  'sign_shadow'     => array('x' => 1, // смещение тени по X
                                                                             'y' => 1, // смещение тени по Y
                                                                             'color' => array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 100) // цвет тени с альфа каналом
                                                                            ), // sign_shadow должен быть NULL если надпись без тени

// Если вместо надписи накладываем картинку (если не NULL, то все sign_* игнорируются
                                                  'image'           => NULL, // BASEPATH . 'i/image/watermark.png', // Путь к картинке
                                                  'image_max_scale_x' => 0.35, // Ширина картинки вотермарка не может быть больше ширины всего изображения умноженного на этот коэфициент
                                                  'image_max_scale_y' => 0.35, // Высота картинки вотермарка не может быть больше ширины всего изображения умноженного на этот коэфициент

                                                  'margin_x'        => 10, // Отступ от левого и правого края в пикселях 
                                                  'margin_y'        => 10, // Отступ от верхнего и нижнего края в пикселях
                                                  'position_x'      => 'right', // 'center', 'right'
                                                  'position_y'      => 'bottom', // 'center', 'bottom'
                                                  'angle'           => 0, // Поворот watermark в градусах (например -30)

                                                  'resize_width'    => 1600, // до какого числа уменьшить итоговую картинку по оси X
                                                  'resize_height'   => 1200, // до какого числа уменьшить итоговую картинку по оси Y
                                              );

?>
