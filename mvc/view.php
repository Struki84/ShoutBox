<? 


require_once "model.php";

class Render {

	static function input($name, $sb_switch = null){
		if ($sb_switch == 'on')
			$input = '<div id="Input">';
		else
			$input = '<div id="'.$name.'Input">';
		$input .='<form action="" method="post">
					<input type="hidden" name="submit_comment"/>
			        <input type="text" size="20" id="nick" name="nick" value="input name" onclick="this.value=\'\'"/><br />
			        <textarea id="comment_text" name="comment_text"></textarea><br />
		        	<input type="submit" id="shoutbox_submit" name="'.$name.'SubmitComment" value="Submit"/>
				  </form>	
			</div>';
		return $input;
	} 

	static function output($name, $data, $sb_switch = null) {
		if ($sb_switch == 'on')
			$output = '<div id="Output"><ul>';
		else
			$output = '<div id="'.$name.'Output"> <ul>';
		
		if(count($data)>0){
			foreach($data as $comment){
				$datetime = strtotime($comment->date);
				$date = date("d.m.Y,  H:i", $datetime);
				$output .= '<li id="info">On '.$date.', '.$comment->name.' wrote:</li>
						    <li id="comment_text"><p>'.$comment->text.'</p></li>';
			}
		}
		$output.= 		'</ul>
				  </div>';			
		return $output;					
	}
	
	static function shoutBox($data, $name, $order){
		$sb_switch = 'on';
		$shoutbox = '<div id="'.$name.'Shoutbox">';
		if ($order != null && $order = 'desc')
			$shoutbox.= self::input($name, $sb_switch).self::output($name, $data, $sb_switch);
		else
			$shoutbox.= self::output($name, $data, $sb_switch).self::input($name, $sb_switch);
		
		$shoutbox.= '</div>';
		echo $shoutbox;
	}
}



?>

