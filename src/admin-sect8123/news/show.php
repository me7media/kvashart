<?php
$pid = intval(Get('pid', null));

$news = new NewsModel($pid);
$company = new ItemModel($news->item_id);
$author = new AuthModel($news->user_id);

$news_type = $news->news_types[$news->type];
$photos_ids = $company->media->FindFieldByType($company->id, 'photo_news_'.$pid);