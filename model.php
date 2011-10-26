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
		$dsn = "mysql:host=$this->dbhost; port=self::$this->port;dbname=$this->dbname";
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
			return $select->errorCode();
		}
		
	}
	
	public function getData($type_id){
		$select = self::$db->prepare("SELECT * FROM shout_box WHERE type_id=? ");
		
		if($select->execute(array($type_id))){
			while ($r = $select->fetchObject())
				$data[] = $r;
		return $data;
		}
		else {
			return $select->errorCode();
		}
		
	}
	
	public function getDataAsc($type_id){
		$select = self::$db->prepare("SELECT * FROM shout_box WHERE type_id=? ORDER BY date DESC ");
		
		if($select->execute(array($type_id))){
			while ($r = $select->fetchObject())
				$data[] = $r;
		return $data;
		}
		else {
			return $select->errorCode();
		}
		
	}
		
	public function insertData($data){
		$insert = self::$db->prepare("INSERT INTO shout_box SET type_id=?, name=?, date=?, text=?");
		
		if($insert->execute($data))
			return true;
		else
			return $insert->errorCode();
	}
		
}
	
	
?>