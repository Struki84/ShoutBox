<?  ShoutBox::setConnection($db); 

	if($_POST['submit_text']) {
		$data = array( 'name' => $_POST['nick'],
		               'text' => $_POST['comment_text'],
		               'date' => date("d.m.Y, H:i ") );
		ShoutBox::insertPost($data);
	}
	
	#This one goes out if there is no delete link
	if ($action == 'delete') {
		ShoutBox::deleteOne($id);
		header('Location:index.php');

	}
?>
<div id="shout_box">
	<h2>Comments</h2>
	<div id="shout_box_content">
		<div id="output">
		<? foreach(ShoutBox::getSorted() as $comment): ?>
			<ul>
				<li>
					<em>On <?=$comment->date()?>, <?=$comment->name()?> wrote:</em>
					<p><?=$comment->text()?></p>
					<!--Comment this link out for the frontend if you wish-->
					<a href="index.php?action=delete&id=<?=$comment->id()?>"> delete comment</a>
				</li>
			</ul>	
		<? endforeach ?>
		</div>
		<div id="input">
		   <form action="" method="post">
		        <input type="hidden" name="submit_comment" value="1"/>
		        <input type="text" size="20" id="shout_box_nick" name="nick" value="input name" onclick="this.value=''" /><br />
		        <textarea id="shout_box_text" name="comment_text" value="input comment"></textarea><br />
		        <input type="submit" id="shout_box_submit" name="submit_text" value="Submit"/>
		   </form>
		</div>
	</div>
</div>