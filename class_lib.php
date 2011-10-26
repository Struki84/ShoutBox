<? 
class Database {
	
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
	private $con;
	
	function __construct($dbhost, $dbuser, $dbpass, $dbname) {
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
	}
	
	public function connect() {
 		if($this->con) return true;
 			$my_connection = @mysql_connect($this->dbhost,$this->dbuser,$this->dbpass);
		if(!$my_connection) return false;
 			$selectdb = @mysql_select_db($this->dbname,$my_connection);
		if(!$selectdb) return false;
			$this->con = true;
		return true;
	}
	
	public function disconnect() {
    	if ($this->con){
    		if (mysql_close()){
    			$this->con = false;
    			return true;
    		}	
    		else 
    			return false;
    	}
    }
      
	public function selectData($table, $columns = '*', $where = null, $order = null, $how = null, $limit = null) {
   		$q = 'SELECT'.$columns.' FROM '.$table;  
        if($where != null) $q .= ' WHERE '.$where;
        if($order != null) $q .= ' ORDER BY '.$order;
        if($how != null)   $q .= ' '.$how;
        if($limit != null) $q .= ' LIMIT '.$limit;
        
        
        $query = mysql_query($q);
        if ($query) {
        	while ($r = mysql_fetch_assoc($query)) {  
				$data[] = $r;
			} 
			return $data;
		}
	}
	
	public function selectOne($table, $id){
    	$rows = $this->selectData($table, '*', 'id='.$id);
    	return $rows[0];
    	   
    } 
     
    public function insertData($table, $data){  
		$last_field = end(array_keys($data));
		$i = "INSERT INTO ".$table." SET ";
			foreach($data as $field_name => $field_value ) {
			$i .= $field_name." = '".$field_value."'";
			if ($field_name !== $last_field) 
				$i .=", "; 
		}   
                  
        $insert = mysql_query($i);
        if($insert)
           	return true;   
        else 
        	return false;
    }  
    
    public function deleteData($table, $where = null){
    	if ($where != null){
    		$d = "DELETE FROM ".$table." WHERE ".$where;  
    	}
    	else{ 
    		$d = 'DELETE '.$table;    		
    	}
    	
    	$delete = mysql_query($d);
    	if($delete) { return true; }
    	else { return false; }
    }   
    
   
}

class ShoutBox {

	private $row;
	static protected $db;
	
	function __construct($row){
		$this->row = $row;
	}
	
	static function setConnection($db){
		self::$db = $db;
	}
	
	static function insertPost($data) {
  		self::$db->insertData('shout_box', $data);
  	}
	
	static function getAll(){
	    $data = self::$db->selectData('shout_box');
	    foreach ($data as $row)
	      $results[] = new ShoutBox($row);
	    return $results;
    }
    
    static function getSorted($order = 'date', $how = 'desc') {
    	$data = self::$db->selectData('shout_box', '*', null, $order, $how);
	    foreach ($data as $row)
	      $results[] = new ShoutBox($row);
	    return $results;
    }
    
    static function getLatest() {
    	$row = self::$db->selectData('shout_box', '*', null, 'date', 'asc', 1);
    	return new ShoutBox($row[0]);	
    }    	
    
    static function get($id){
    	$row = self::$db->selectOne('shout_box', $id);
    	return new ShoutBox($row);
  	}
  	
  	static function deleteOne($id) {
  		self::$db->deleteData('shout_box', 'id='.$id);
  	}
  	
  	public function id(){
		return $this->row['id'];
	}
	
	public function name(){
		return $this->row['name'];
	}
	
	public function text(){
		return ucfirst($this->row['text']);
	}
	
	public function date(){
		return $this->row['date'];
	}

}

class Render extends ShoutBox {

	static function input($name = null, $action = null){
	/* Prebaci if petlju na SubmitComment a ne submit_text */
		echo'
			<div id="input">
				<form action="'.$action.'" method="post">
					<input type="hidden" name="submit_comment"/>
			        <input type="text" size="20" id="'.$name.'ShoutboxNick" name="'.$name.'Nick" value="input name" onclick="this.value=\'\'"/><br />
			         <textarea id="'.$name.'ShoutboxText" name="'.$name.'CommentText"></textarea><br />
		        	<input type="submit" id="'.$name.'ShoutboxSubmit" name="'.$name.'SubmitComment" value="Submit"/>
				</form>	
			</div>';
	} 

	static function output () {
		$output = '<div id="output">'; 
		foreach(parent::getSorted() as $comment){
			$output .= ' <ul>
							<li>
							<em>On '.$comment->date().', '.$comment->name().' wrote:</em>
							<p>'.$comment->text().'</p>
							</li>
						</ul>';
		}
		$output .= '</div>';
					
		echo $output;		
	}
}

?>