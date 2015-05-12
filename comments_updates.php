<?php
/********************************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
*********************************************************************************/

include "config.php"; //Include your database connection setting file

$username_or_identity = strip_tags($_SERVER['REMOTE_ADDR']);

if(isset($_POST["action"]) && !empty($_POST["action"])) //Perform Page validation Process
{
	// This is where the comments like or unlike page starts
	if($_POST["action"] == "like_or_unlike_comments") 
	{
		$check_likes = mysql_query("select * from `vpb_facebook_style_likes_unlikes` where `comment_id` = '".mysql_real_escape_string(strip_tags($_POST["comment_id"]))."' and `ip_address` = '".mysql_real_escape_string($username_or_identity)."'");
		
		if(mysql_num_rows($check_likes) < 1) 
		{
			//Perform Like Comment
			mysql_query("insert into `vpb_facebook_style_likes_unlikes` values('', '".mysql_real_escape_string(strip_tags($_POST["comment_id"]))."', '".mysql_real_escape_string($username_or_identity)."', '".mysql_real_escape_string(date("d-m-Y"))."')");
		}
		else
		{
			//Perform Unlike Comment
			mysql_query("delete from `vpb_facebook_style_likes_unlikes` where `comment_id` = '".mysql_real_escape_string(strip_tags($_POST["comment_id"]))."' and `ip_address` = '".mysql_real_escape_string($username_or_identity)."'");
		}
	}
	// This is where the comments like or unlike page ends
	
	
	// This is where the comments deletion page starts
	elseif($_POST["action"] == "delete_this_comment")
	{
		//Perform comments deletion
		mysql_query("delete from `vpb_facebook_style_like_and_unlike` where `id` = '".mysql_real_escape_string(strip_tags($_POST["comment_id"]))."'");
	}
	// This is where the comments deletion page starts
	
	
	else
	{
		//Do nothing since the action is unknown
	}
}
?>