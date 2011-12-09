<?

class ShoutBox{
	
	static protected $db;
	protected $dbhost;
	protected $dbuser;
        protected $dbpass;
	protected $dbname;
	protected $port;
		
	function __construct($dbhost, $dbuser, $dbpass, $dbname, $port) {
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
		$this->port = $port;
	}
	
	public function connect(){
		$dsn = "mysql:host=$this->dbhost; port=$this->port;dbname=$this->dbname";
		self::$db = new PDO($dsn, $this->dbuser, $this->dbpass); 
	}
	
	public function getAllData(){
		$select = self::$db->prepare("SELECT * FROM shout_box");
		
		if($select->execute()){
			while ($r = $select->fetchObject())
				$data[] = $r;
		return $data;
		}
		else {
			return $select->errorInfo();
		}
		
	}
	
	public function getData($type_id){
		$select = self::$db->prepare("SELECT * FROM shout_box WHERE type_id=? LIMIT 20 ");
		
		if($select->execute(array($type_id))){
			while ($r = $select->fetchObject())
				$data[] = $r;
		return $data;
		}
		else {
			return $select->errorInfo();
		}
		
	}
	
	public function getDataDesc($type_id){
		$select = self::$db->prepare("SELECT * FROM shout_box WHERE type_id=? ORDER BY date DESC LIMIT 20 ");
		
		if($select->execute(array($type_id))){
			while ($r = $select->fetchObject())
				$data[] = $r;
		return $data;
		}
		else {
			return $select->errorInfo();
		}
		
	}
	
	public function get($type_id, $order){
		if ($order != null && $order == 'desc' ){ 
			return $this->getDataDesc($type_id);
		}
		else{ 			
			return $this->getData($type_id);
		}
	}
		
	public function insertData($data){
		$insert = self::$db->prepare("INSERT INTO shout_box SET type_id=?, name=?, text=?, date=NOW()");
		
		if($insert->execute($data))
			return true;
		else
			return $insert->errorInfo();
	}
	
}
	
	
?>