<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>vasPLUS Programming Blog</title>


<style>
.ccc A:link {text-decoration: none}
.ccc A:visited {text-decoration: none}
.ccc A:active {text-decoration: none}
.ccc A:hover {text-decoration:underline; font: Arial, Helvetica, sans-serif;color: blue;} 
</style>


<script src="jquery_1.5.2.js" type="text/javascript"></script>
<script type="text/javascript">

//Like and Unlike Comments Function
function Like_or_Unlike_Comments(comment_id, action)
{
	var dataString = "comment_id=" + comment_id + "&action=like_or_unlike_comments";
	$.ajax({  
		type: "POST",  
		url: "comments_updates.php",  
		data: dataString,
		beforeSend: function() 
		{
			if ( action == "vpb_like" )
			{
				$("#vpb_like"+comment_id).hide();
				$("#loading_like_or_unlike"+comment_id).html('<img src="loader.gif" align="absmiddle" alt="Loading...">');
			}
			else if ( action == "vpb_unlike" )
			{
				$("#vpb_unlike"+comment_id).hide();
				$("#loading_like_or_unlike"+comment_id).html('<img src="loader.gif" align="absmiddle" alt="Loading...">');
			}
			else {}
			
		},  
		success: function(response)
		{
			if ( action == "vpb_like" )
			{
				$("#loading_like_or_unlike"+comment_id).html('');
				$("#vpb_unlike"+comment_id).show();
			}
			else if ( action == "vpb_unlike" )
			{
				$("#loading_like_or_unlike"+comment_id).html('');
				$("#vpb_like"+comment_id).show();
			}
			else {}
		}
	});
}

//Delete Comments Function
function Delete_this_comment(comment_id)
{
	if(confirm("Are you sure that you really want to delete this comment? Press OK if yes and Cancel if no."))
	{
		var dataString = "comment_id=" + comment_id + "&action=delete_this_comment";
		$.ajax({  
			type: "POST",  
			url: "comments_updates.php",  
			data: dataString,
			beforeSend: function() 
			{
				$("#deleting_this_comment"+comment_id).html('<img src="loading.gif" align="absmiddle" alt="Loading..."> deleting...');
			},  
			success: function(response)
			{
				$("#commentHolder"+comment_id).fadeOut();
			}
		});
	}
	return false;
}



</script>

</head>
<body>
<center>
<div id="all_centered">
<center>
<div id="centered">
<br clear="all">

<center>
<div id="vasp" style=" font-family:Verdana, Geneva, sans-serif; font-size:18px;width:900px;">Facebook style Like / Unlike or Delete posts using Ajax, Jquery and PHP</div><br clear="all" /><br clear="all">


<?php
include "config.php";

$check_comments = mysql_query("select * from `vpb_facebook_style_like_and_unlike` order by `id` asc");
if(mysql_num_rows($check_comments) < 1) { }
else
{
	while($get_comments = mysql_fetch_array($check_comments))
	{
?>
<div id="commentHolder<?php echo strip_tags($get_comments["id"]); ?>" style="width:400px; padding:10px; font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:3px solid #F1F1F1; margin-bottom:16px;">
<div style="width:40px; float:left;" align="left"><img src="avatar.jpg" width="30" height="30" border="0"></div>
<div style="width:340px; float:left;" align="left">
<div style="width:260px; float:left;margin-bottom:5px;" align="left"><b><?php echo strip_tags($get_comments["fullname"]); ?></b></div>
<div style="width:80px; float:left; margin-bottom:5px; color:blue; font-size:11px;" align="right"><span class="ccc"><a href="javascript:void(0);" onClick="Delete_this_comment('<?php echo strip_tags($get_comments["id"]); ?>');">Delete</a></span></div><br clear="all">
<div style="width:340px;" align="center" id="deleting_this_comment<?php echo strip_tags($get_comments["id"]); ?>"></div>
<div style="width:340px; float:left;margin-bottom:16px; font-size:11px;line-height:15px;" align="left"><?php echo strip_tags($get_comments["comments"]); ?></div><br clear="all">
<div style="width:150px; min-height:20px;float:left;margin-bottom:10px; color:blue" align="left">

<?php
//Check to see if the current user has liked a comment or not
$check_comment_liked = mysql_query("select * from `vpb_facebook_style_likes_unlikes` where `comment_id` = '".mysql_real_escape_string(strip_tags($get_comments["id"]))."' and `ip_address` = '".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'");

if(mysql_num_rows($check_comment_liked) < 1) 
{
	?>
    <span id="loading_like_or_unlike<?php echo strip_tags($get_comments["id"]); ?>"></span>
    <span class="ccc">
    <a href="javascript:void(0);" id="vpb_like<?php echo strip_tags($get_comments["id"]); ?>" onClick="Like_or_Unlike_Comments('<?php echo strip_tags($get_comments["id"]); ?>','vpb_like');">Like</a>
    <a style="display:none;" href="javascript:void(0);" id="vpb_unlike<?php echo strip_tags($get_comments["id"]); ?>" onClick="Like_or_Unlike_Comments('<?php echo strip_tags($get_comments["id"]); ?>','vpb_unlike');">Unlike</a>
    </span>
    <?php
}
else
{
	?>
    <span id="loading_like_or_unlike<?php echo strip_tags($get_comments["id"]); ?>"></span>
    <span class="ccc">
    <a href="javascript:void(0);" id="vpb_unlike<?php echo strip_tags($get_comments["id"]); ?>" onClick="Like_or_Unlike_Comments('<?php echo strip_tags($get_comments["id"]); ?>','vpb_unlike');">Unlike</a>
    <a style="display:none;" href="javascript:void(0);" id="vpb_like<?php echo strip_tags($get_comments["id"]); ?>" onClick="Like_or_Unlike_Comments('<?php echo strip_tags($get_comments["id"]); ?>','vpb_like');">Like</a>
    </span>
    <?php
}

?>

</div>
<div style="width:190px; float:left;margin-bottom:16px;font-size:10px; color:#999;" align="right"><?php echo strip_tags($get_comments["date"]); ?></div><br clear="all">

</div><br clear="all">
</div>

<?php
	}
}
?>
</center>



<p style="padding-bottom:300px;">&nbsp;</p>

</div>
</center>
</div>
</center>


</body>
</html>