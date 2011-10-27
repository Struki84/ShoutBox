<? 


require_once "model.php";

class Render {

	static function input($name){
		$input = 
			'<div id="input">
				<form action="" method="post">
					<input type="hidden" name="submit_comment"/>
			        <input type="text" size="20" id="nick" name="nick" value="input name" onclick="this.value=\'\'"/><br />
			        <textarea id="comment_text" name="comment_text"></textarea><br />
		        	<input type="submit" id="shoutbox_submit" name="'.$name.'SubmitComment" value="Submit"/>
				</form>	
			</div>';
		return $input;
	} 

	static function output($data) {
		$output = '<div id="output">';
		if(count($data)>0){
			foreach($data as $comment){
				$output .= '<ul>
								<li>
								<em>On '.$comment->date.', '.$comment->name.' wrote:</em>
								<p>'.$comment->text.'</p>
								</li>
						    </ul>';
			}
		}
		$output.= '</div>';			
		return $output;					
	}
	
	static function shoutBox($data, $name, $order){
		$shoutbox = '<div id="'.$name.'Shoutbox">';
		if ($order != null && $order = 'desc')
			$shoutbox.= self::input($name).self::output($data);
		else
			$shoutbox.= self::output($data).self::input($name);
		
		$shoutbox.= '</div>';
		echo $shoutbox;
	}
	
	
}



?>

