<?php
global $cm, $dinamic_data, $page;
$place = 1; //news

$action = Get('action');
$per_page = 50;
$from = $per_page * ($page - 1);

	if( $action != '' ) {
		$oper_id = abs(intval(Get('comm_id')));
		$oper_comm = new CommentModel($oper_id);
		if($action == 'delete') {
			$oper_comm->DeleteComment();
		} elseif($action == 'spam') {
			$user_spam = new AccountModel($oper_comm->user_id);
			$user_spam->spam = 1;
			$user_spam->Flush();
			$oper_comm->DeleteComment();
		}
		header("Location: " . SiteRoot($g_config['admin_sector']['page'].'/news/comments'));
	}
$comments_list = '';
	
	$comments_count = $cm->filter->FilterTotal(array());
	$comments = $cm->filter->Filter(array(), $from, $per_page, "time", true);

	foreach ($comments as $n=>$cid) {
		$comm = new CommentModel($cid);
		$comments_list .= $comm->ConstructComment(true);
	}
?>