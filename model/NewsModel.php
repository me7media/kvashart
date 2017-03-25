<?php
class NewsModel extends Model
{	
	const IMGPATH = 'upl/images/';
	public $filter;
	public $news_types = array(1 => array('name'=>'Новость', 'color'=> 'info'), 2 => array('name'=>'Предложение', 'color'=> 'primary'), 3=>array('name'=>'Возможность', 'color'=> 'success'), 4=>array('name'=>'Потребность', 'color'=> 'danger')); //5=>array('name'=>'Прайслист', 'color' => 'default')
 
    public function __construct($id = NULL, $onlyShow = false)
    {
        global $g_databases;
        parent::__construct($g_databases->db, "news", "news_id", $id, $onlyShow);
		
	$this->filter = new ModelFilter($g_databases->db, $this->table);
    }

    public function CreateTable()
    {
        static $arrCreates = array();

        if (!isset($arrCreates[$this->table]))
        {
            $this->db->query("CREATE TABLE IF NOT EXISTS ?# 
				(
				  `news_id` int(11) NOT NULL AUTO_INCREMENT,
				  `item_id` int(11) NOT NULL,
				  `user_id` int(11) NOT NULL,
				  `title` varchar(255) NOT NULL,
				  `altname` varchar(255) NOT NULL,
				  `description` text NOT NULL,
				  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
				  `reads` int(11) NOT NULL,
				  `type` tinyint(1) NOT NULL,
				  `image_name` varchar(255) NOT NULL,
				  `status` tinyint(2) NOT NULL,
				  PRIMARY KEY (`news_id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8",	
					$this->table);
        }
    }
    public function __get($key)
    {
		
        switch ($key)
        {
			case 'dateformat':
				$ret = date('d-m-Y', strtotime($this->{'date'}));
				break;
			case 'comments':
				$ret = $this->db->selectCell("SELECT COUNT(*) FROM ?# WHERE place_type = 3 AND place_id = ?d", 'comments', $this->news_id);
				break;
			case 'news_type':
				$ret = isset($this->news_types[$this->type]) ? $this->news_types[$this->type]['name'] : 'Пост';
                break;
			case 'news_type_color':
				$ret = isset($this->news_types[$this->type]) ? $this->news_types[$this->type]['color'] : 'default';
                break;
			case 'image_url':
				$ret = Root(self::IMGPATH . $this->image_name);
                break;
			case 'image_thumb_url':
				$ret = Root(self::IMGPATH . 'thumbs/'. $this->image_name);
                break;
			case 'url':
				$ret = SiteRoot('n'.$this->news_id.'-'.$this->altname.'.html');
                break;
			case 'images':
				$ret = $this->GetImages($this->item_id, $this->news_id, null);
                break;
			case 'files':
				$ret = $this->GetFiles($this->item_id, $this->news_id, null);
                break;
            default:
                $ret = parent::__get($key);
        };
        return $ret;
    }
	public function GetList($type = null, $category_id = null, $manager = null, $start = 0, $limit = 20, $orderby='date', $sort='DESC'){
		$add_query = '';
		
		$type = $type ? " AND type = '$type'" : '';
		$add_query .= $category_id ? " AND category_id = '$category_id'" : '';
		$add_query .= $manager ? " AND manager = '$manager'" : '';
		
		
		return $this->db->select("SELECT * FROM ?# WHERE item_id IN (select id from company where status = '1' $add_query) $type ORDER BY " . $orderby . " ".$sort." LIMIT " . $start . "," . $limit, $this->table);
	}
    public function GetImages($item_id, $news_id, $limit = 6)
    {
		$limited = $limit ? 'LIMIT '.$limit : '';
       return $this->db->selectCol("SELECT value FROM ?# WHERE item_id = ?d AND type = ? $limited", 'mediafiles', $item_id, 'photo_news_'.$news_id);
    }
    public function GetFiles($item_id, $news_id, $limit = 6)
    {
		$limited = $limit ? 'LIMIT '.$limit : '';
       return $this->db->selectCol("SELECT id FROM ?# WHERE item_id = ?d AND type = ? $limited", 'mediafiles', $item_id, 'file_news_'.$news_id);
    }
    public function ReadComments($user_id, $ticket_id)
    {
       return $this->db->query("UPDATE ?# SET readed = 1 WHERE user_id = ?d AND ticket_id = ?d", 'tickets_message', $user_id, $ticket_id);	
    }
    public function CreateTypesList($select_id = null)
    {
		$dropdown = '';
		foreach( $this->news_types as $type_id=>$data )
		{
			/*** assign a selected value ***/
			$select = $select_id==$type_id ? ' selected' : null;

			/*** add each option to the dropdown ***/
			$dropdown .= "<option data-content=\"<span class='label label-{$data['color']}'>{$data['name']}</span>\" value=\"$type_id\" $select>{$data['name']}</option>\n";
			//$dropdown .= '<option data-color="$colorname" value="'.$type_id.'"'.$select.'>'.$data['name'].'</option>'."\n";
		}
		return $dropdown;
	}
	public function InitSEO()
        {
            global $g_lang;
            if (strlen($this->title))
            {
                $g_lang['m_title'] = $this->title;
            }
			
            if (strlen($this->description))
            {
                $g_lang['m_description'] = char_substr(strip_tags(bbcode($this->description)), 0, 180);
            }
        }
}
?>