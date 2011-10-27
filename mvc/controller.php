<?

require "model.php";
require "view.php";

class Controller{
	
	protected $sb;
	protected $type_id;
	
	
	public function __construct($dbhost, $dbuser, $dbpass, $dbname, $port = 3306){
		$this->sb = new Shoutbox($dbhost, $dbuser, $dbpass, $dbname, $port );
		$this->sb->connect();
	}
	
	public function invoke() {
		if($_POST['SubmitComment']) {
			$data = array($_POST['nick'], date("d.m.Y, H:i "), $_POST['comment_text'] );
			$this->sb->insertData($data);
		}
	}
	
	public function setTypeId($name){
		if ($name !=null)
			$type_id = $name;
		else 
			$type_id = 'single';
		
		return $type_id;
	}
	
	public function insertPost($type_id) {
		if($_POST[$type_id.'SubmitComment']) {
			$data = array($type_id, $_POST['nick'], date("d.m.Y, H:i "), $_POST['comment_text'] );
			$this->sb->insertData($data);
		}
	}
	
	public function insertShoutBox($name = null, $order = null){
		$type_id = self::setTypeId($name);
		self::insertPost($type_id);
		if ($order != null && $order = 'desc')
			$data = $this->sb->getDataAsc($type_id);
		else
			$data = $this->sb->getData($type_id);
		
		Render::shoutBox($data, $type_id, $order);
	}
	
	public function insertOutput($name = null, $order = null){
		$type_id = self::setTypeId($name);
		if (!isset($this->status)){
			$this->status = 1;
			self::insertPost($type_id);
		}
		if ($order != null && $order = 'desc')
			$data = $this->sb->getDataAsc($type_id);
		else
			$data = $this->sb->getData($type_id);
			
		echo Render::output($data, $order);
		
	}
	
	public function insertInput($name = null){
		$type_id = self::setTypeId($name);
		if (!isset($this->status)){
			$this->status = 1;
			self::insertPost($type_id);
		}
		echo Render::input($type_id);

	}
}	
?>