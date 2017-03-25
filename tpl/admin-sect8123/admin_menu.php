            <!-- Содержит ссылки и прочий контент который можно будет показать/скрывать на мобильных устройствах -->
                <ul class="nav nav-tabs pull-right">
                    <?php foreach ($menu as $v):?>
                        <li class="<?= (isset($v['list']) && count($v['list'])) ? "dropdown" : ''?><?= isset($v['css']) ? " {$v['css']}" : ''?>">
                            <a href="<?= $v['link']?>" title="<?= $v['label']?>"<?= (isset($v['list']) && count($v['list'])) ?' class="dropdown-toggle" data-toggle="dropdown"' : ''?>><?= $v['name']?> <?= (isset($v['list']) && count($v['list'])) ? '<span class="caret"></span>' : ''?></a>
                            <?php if (isset($v['list']) && count($v['list'])):?>
                                <ul class="dropdown-menu">
                                    <?php
                                        foreach ($v['list'] as $v)
                                        {
                                            if ($v === 'divider')
                                            {
                                                ?><li class="divider"></li><?php
                                            }
                                            elseif (isset($v['divider_name']))
                                            {
                                                ?><li class="dropdown-header"><?= $v['divider_name']?></li><?php
                                            }
                                            else
                                            {
                                                ?><li><a href="<?= $v['link']?>" title="<?= $v['label']?>"><?= $v['name']?></a></li><?php
                                            }
                                        }
                                    ?>
                                </ul>
                            <?php endif?>
                        </li>
                    <?php endforeach?>
                </ul>
