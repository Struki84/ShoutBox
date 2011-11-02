<?

require "model.php";
require "view.php";

class Controller{
	
	protected $sb;
	protected $type_id;
	protected $status;
		
	public function __construct($dbhost, $dbuser, $dbpass, $dbname, $port = 3306){
		$this->sb = new Shoutbox($dbhost, $dbuser, $dbpass, $dbname, $port );
		$this->sb->connect();
	}
	
	protected function setTypeId($name){
		if ($name !=null)
			if ($name == 'desc')
				$type_id = 'single';
			else 
				$type_id = $name;
		else 
			$type_id = 'single';
		
		return $type_id;
	}
		
	protected function insertPost($type_id) {
		if($_POST[$type_id.'SubmitComment']) {
			$data = array($type_id, $_POST['nick'], $_POST['comment_text'] );
			$this->sb->insertData($data);
		}
	}
	
	protected function setOrder($name, $order){
		if ($name == 'desc' ){
				$order = $name;
				return $order;
		}
		else if ($name = null && $order !=null)
			return $order;
		else 
			return $order;
	}
	
	protected function setDataOrder($type_id, $order){
		if ($order == 'desc' )
			return $this->sb->getDataDesc($type_id);
		else 			
			return $this->sb->getData($type_id);
		}
	
	public function insertShoutBox($name = null, $order = null){
		$type_id = self::setTypeId($name);
		self::insertPost($type_id);
		$order = self::setOrder($name, $order);
		$data = self::setDataOrder($type_id, $order);
		Render::shoutBox($data, $type_id, $order);
	}
		
	public function insertOutput($name = null, $order = null){
		$type_id = self::setTypeId($name);
		if ($this->status != $type_id.'_input_on'){
			$this->status = $type_id.'_output_on';
			self::insertPost($type_id);
		}
		$order = self::setOrder($name, $order);
		$data = self::setDataOrder($type_id, $order);
		echo Render::output($name, $data);
	}
	
	public function insertInput($name = null){
		$type_id = self::setTypeId($name);
		if ($this->status != $type_id.'_output_on'){
			$this->status = $type_id.'_input_on';
			echo self::insertPost($type_id);
		}
		echo Render::input($type_id);
	}
	
}	
?>