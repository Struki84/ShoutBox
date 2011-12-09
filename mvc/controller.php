<?

include("view.php");

class Controller{
	
	protected $sb;
	protected $type_id;
	protected $status;
		
	public function __construct($dbhost, $dbuser, $dbpass, $dbname, $port = 3306){
		$this->sb = new Shoutbox($dbhost, $dbuser, $dbpass, $dbname, $port );
		$this->sb->connect();
	}
	
	protected function insertPost($type_id) {
		if($_POST[$type_id.'SubmitComment']) {
			$data = array($type_id, htmlentities($_POST['nick']), htmlentities($_POST['comment_text']) );
			$this->sb->insertData($data);
		}
	}
	
	public function insertShoutBox($name, $type_id, $order = null ){
		self::insertPost($type_id);
		$data = $this->sb->get($type_id, $order);
		Render::shoutBox($data, $name, $order);
	}
		
	public function insertOutput($name, $type_id, $order = null){
		if ($this->status != $type_id.'_input_on'){
			$this->status = $type_id.'_output_on';
			self::insertPost($type_id);
		}
		$data = $this->sb->get($type_id, $order);
		echo Render::output($name, $data);
	}
	
	public function insertInput($name, $type_id){
		if ($this->status != $type_id.'_output_on'){
			$this->status = $type_id.'_input_on';
			echo self::insertPost($type_id);
		}
		echo Render::input($name);
	}
	
}	
?>