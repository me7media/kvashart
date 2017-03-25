<?php
class MediaModel extends Model
{
    public $filter;

    public function __construct($id = NULL, $onlyShow = false)
    {
        global $g_databases;
        parent::__construct($g_databases->db, 'obj', 'id', $id, $onlyShow);
		
        $this->filter = new ModelFilter($g_databases->db, $this->table);
    }

    public function CreateTable()
    {
        static $arrCreates = array();

        if (!isset($arrCreates[$this->table]))
        {
            $this->db->query("CREATE TABLE IF NOT EXISTS ?# 
			(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `obj_id` int(11) NOT NULL,
			  `value` varchar(255) NOT NULL,
			  `date` datetime NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM",	
					$this->table);
        }
    }

   /* public function FindFieldByType($obj_id)
    {
		$ids = $this->filter->Filter(array('obj_id'=>$obj_id));
		return $ids;
    } 
	public function ChangeObj($new_obj)
    {
		return $this->db->query("UPDATE ?# SET obj_id = ?d WHERE obj_id = 0", $this->table, $new_obj);	
    }*/
	
}
?>