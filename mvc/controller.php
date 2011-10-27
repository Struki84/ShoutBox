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
	
	public function insertOutput($name = null){
		$data = $this->sb->getAllData();
		echo Render::output($data);
	}
	
	public function insertInput($name = null){
		echo Render::input($name);
		echo self::insertPost();	
	}
	
	public function allDataOverview(){
		$data = $this->sb->getAllData();
		print_r($data);
	}
	
	public function dataOverview($type_id){
		$data = $this->sb->getData($type_id);
		print_r($data);
	}
	
	/*
		
		#This one goes out if there is no delete link
		if ($action == 'delete') {
			ShoutBox::deleteOne($id);
			header('Location:index.php');
	
		}*/
}	
?>