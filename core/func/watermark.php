<?php

    function _OffsetX($image, $config, $add = 0)
    {
        $x = 'center';
        if ($config['position_x'] == 'left')
        {
            $t = intval($config['margin_x']) + intval($add);
            $x = 'left' . ($t < 0 ? ' - ' : ' + ') . abs($t);
        }
        else if ($config['position_x'] == 'center')
        {
            $x = 'center' . ($add < 0 ? ' - ' : ' + ') . abs($add);
        }
        else if ($config['position_x'] == 'right')
        {
            $t = -intval($config['margin_x']) + intval($add);
            $x = 'right' . ($t < 0 ? ' - ' : ' + ') . abs($t);
        }
        else
        {
            $x = intval($config['position_x']) + intval($add);
        }
        return $x;
    }

    function _OffsetY($image, $config, $add = 0)
    {
        $y = 'center';
        if ($config['position_y'] == 'top')
        {
            $t = intval($config['margin_y']) + intval($add);
            $y = 'top' . ($t < 0 ? ' - ' : ' + ') . abs($t);
        }
        else if ($config['position_y'] == 'center')
        {
            $y = 'center' . ($add < 0 ? ' - ' : ' + ') . abs($add);
        }
        else if ($config['position_y'] == 'bottom')
        {
            $t = -intval($config['margin_y']) + intval($add);
            $y = 'bottom' . ($t < 0 ? ' - ' : ' + ') . abs($t);
        }
        else
        {
            $y = intval($config['position_y']) + intval($add);
        }
        return $y;
    }

    function Watermark($fileNameSrc, $fileNameDst, $config = array())
    {
        global $g_config;

        $finalConfig = $g_config['watermark']['default_config'];

        foreach($config as $k => $v)
        {
            $finalConfig[$k] = $v;
        }

        if ($finalConfig['disabled']) return;

        $data = @file_get_contents($fileNameSrc);
        if ($data == NULL)
        {
            trigger_error("Can't load file", E_USER_ERROR);
        }
        $image = WideImage::loadFromString($data);

        $image = $image->resizeDown($finalConfig['resize_width'], $finalConfig['resize_height']);

        if ($image->getWidth()  < $finalConfig['start_width'] ||
            $image->getHeight() < $finalConfig['start_height'])
        {
            // do nothing
        }
        else if ($finalConfig['image'])
        {
            $colorBack = $image->allocateColorAlpha(255, 255, 255, 127);

            $data = @file_get_contents($finalConfig['image']);
            if ($data == NULL)
            {
                trigger_error("Can't load file " . $finalConfig['image'], E_USER_ERROR);
            }
            $imageMerge = WideImage::loadFromString($data);

            // Чтобы вотермарк не выходил за пределы границ картинки:
            $kMerge1 = 1.0;
            $kMerge2 = 1.0;
            $totalW = $image->getWidth()  * $finalConfig['image_max_scale_x'];
            $totalH = $image->getHeight() * $finalConfig['image_max_scale_y'];
            if ($imageMerge->getWidth()  > $totalW) $kMerge1 = $totalW / $imageMerge->getWidth();
            if ($imageMerge->getHeight() > $totalH) $kMerge2 = $totalH / $imageMerge->getHeight();
            $kMerge = min($kMerge1, $kMerge2);
            $imageMerge = $imageMerge->resizeDown($kMerge * $imageMerge->getWidth(), $kMerge * $imageMerge->getHeight());

            if ($finalConfig['angle'])
            {
                $imageMerge = $imageMerge->rotate($finalConfig['angle'], $colorBack, false);
            }

            $x = _OffsetX($image, $finalConfig);
            $y = _OffsetY($image, $finalConfig);

            $image = $image->merge($imageMerge, $x, $y);
        }
        else
        {
            $sizeWH = min($image->getWidth(), $image->getHeight()) / mb_strlen($finalConfig['sign_text']) * 7 / 5;

            if ($finalConfig['sign_size'] == 'big')
            {
                // do nothing
            }
            else if ($finalConfig['sign_size'] == 'middle')
            {
                $sizeWH = $sizeWH * 4 / 7;
            }
            else if ($finalConfig['sign_size'] == 'small')
            {
                $sizeWH = $sizeWH * 2 / 8;
            }
            else
            {
                $sizeWH = intval($finalConfig['sign_size']);
            }

            $c = $finalConfig['sign_color'];

            $canvas = $image->getCanvas();

            if ($finalConfig['sign_shadow'] != NULL)
            {
                $x = _OffsetX($image, $finalConfig, $finalConfig['sign_shadow']['x']);
                $y = _OffsetY($image, $finalConfig, $finalConfig['sign_shadow']['y']);

                $sc = $finalConfig['sign_shadow']['color'];
               
                $canvas->useFont($finalConfig['sign_font'], $sizeWH, $image->allocateColorAlpha($sc['r'], $sc['g'], $sc['b'], (255 - $sc['a']) / 2));
                $canvas->writeText($x, $y, $finalConfig['sign_text'], $finalConfig['angle']);
            }
            $x = _OffsetX($image, $finalConfig);
            $y = _OffsetY($image, $finalConfig);

            $canvas->useFont($finalConfig['sign_font'], $sizeWH, $image->allocateColorAlpha($c['r'], $c['g'], $c['b'], (255 - $c['a']) / 2));
            $canvas->writeText($x, $y, $finalConfig['sign_text'], $finalConfig['angle']);
        }

        FileSys::MakeDir(dirname($fileNameDst));
        $image->saveToFile($fileNameDst);
    }
?>
