<?php
/*
Plugin Name: Share4bucks - Sharing & monetization tool (facebook, twitter, Google Plus, Linkedin etc.)
Plugin URI: http://www.Share4bucks.com
Description: Share4bucks
Version: 1.0.10
Author: Share4bucks
Author URI: http://www.Share4bucks.com
License: GPL License
*/

// don't load directly
if (!function_exists('is_admin')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}
add_action('admin_menu', 'DM_PostManager_plugin_menu');
// Input Text Processing
if(!function_exists('PostManagerprocesstext')){
	function PostManagerprocesstext($text)
	{
		return htmlentities(stripslashes($text));
	}
}
function DM_PostManager_plugin_menu() {
	add_menu_page( 'Share4bucks', 'Share4bucks', 'manage_options', 'Post-Manager', 'DM_admin_managewebsite', '' );
	//The first sub-menu entry automatically gets added by the WordPress system. If we want to customize the name of our first sub-menu, we must specify our own replacement sub-menu.
	add_submenu_page( 'Post-Manager', "Manage Links", "Manage Links", 'manage_options', "Post-Manager", "DM_admin_managewebsite");
	//add another new sub menu 
	//add_submenu_page( 'Site-Manager', "Add Website", "Add Website", 'manage_options', "Add-Website", "tc_admin_addwebsite");
	
}
global $wpdb;
function DM_pluginactivate()
{
	global $wpdb;
	if(!mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$wpdb -> prefix ."DMPostManager'"))==1) 
	{
		$createtable="CREATE TABLE IF NOT EXISTS ".$wpdb -> prefix ."DMPostManager (
		  `urlid` int(11) NOT NULL AUTO_INCREMENT,
		  `link1url` varchar(255),
		  `link1active` int(1) DEFAULT 1,
		  `link2url` varchar(255),
		  `link2active` int(1) DEFAULT 1,
		  `link3url` varchar(255),
		  `link3active` int(1) DEFAULT 1,
		  `link4url` varchar(255),
		  `link4active` int(1) DEFAULT 1,
		  `link5url` varchar(255),
		  `link5active` int(1) DEFAULT 1,
		  `link6url` varchar(255),
		  `link6active` int(1) DEFAULT 1,
		  `settheme` int(1) DEFAULT 1,
		  `myid` int(5),
		  `savedtext` varchar(5000),
		  PRIMARY KEY (`urlid`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
		$results = $wpdb -> query($createtable) or die("Plugin Install Error.");
	}
	DM_defaultsettings();
}
function DM_plugindeactivate()
{
	DM_plugin_db_uninstall();
}
register_activation_hook( __FILE__, "DM_pluginactivate" );
register_deactivation_hook( __FILE__, "DM_plugindeactivate" );
register_uninstall_hook( __FILE__, 'DM_plugin_db_uninstall');
add_filter('the_content','DM_addmycontent');

function DM_addmycontent($content)
{
	global $wpdb;
	$getresult=mysql_query("select * from  ".$wpdb -> prefix ."DMPostManager order by urlid asc");
	if($getresult && mysql_num_rows($getresult))
	{
		$getresultrow=mysql_fetch_array($getresult);		
		$content.=str_replace('{curpageurl}', get_permalink(), $getresultrow['savedtext']);
	}
	return $content;
}

function DM_plugin_db_uninstall()
{
	global $wpdb;
	if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$wpdb -> prefix ."DMPostManager'"))==1) 
	{
		$createtable="Drop TABLE IF EXISTS ".$wpdb -> prefix ."DMPostManager";
		$results = $wpdb -> query($createtable) or die("Plugin Uninstall Error.");
	}
}

function DM_admin_managewebsite()
{
	$geturl=plugin_dir_url(__FILE__);
	$geturl=plugin_dir_url(__FILE__);
	$linkstructure1="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=5&uid=";
	$linkstructure2="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=2&uid=";
	$linkstructure3="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=3&uid=";
	$linkstructure4="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=6&uid=";
	$linkstructure5="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=7&uid=";
	$linkstructure6="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=1&uid=";
	
	global $wpdb;
	if(isset($_POST['myuid']))
	{
		$myuid=mysql_real_escape_string($_POST['myuid']);
		if(isset($_POST['themeopt'])) $themeopt=mysql_real_escape_string($_POST['themeopt']); else $themeopt=1;
		
		$savedtext='<div style="position: relative;height: 103px;">
		<div style="width: 157px;float: left;"><img src="'.$geturl.'images/SpradTheWord.png" /></div>
		<div style="position:absolute;top: 40px;left: 50px;"><img src="'.$geturl.'images/Arrow.png" /></div>
		<div style="position : absolute;top: 43px;left: 123px;">
		<style type="text/css">.plugimgleft{float:left;width:50px;margin-right:10px;}</style>';
		if(isset($_POST['link1active'])){ $link1active=1;
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure1}{$myuid}' ><img src='{$geturl}images/{$themeopt}/5.png' /></a></span>";
		} else $link1active=0;
		if(isset($_POST['link2active'])){ $link2active=1; 
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure2}{$myuid}' ><img src='{$geturl}images/{$themeopt}/2.png' /></a></span>";
		}else $link2active=0;
		if(isset($_POST['link3active'])){ $link3active=1; 
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure3}{$myuid}' ><img src='{$geturl}images/{$themeopt}/3.png' /></a></span>";
		}else $link3active=0;
		if(isset($_POST['link4active'])){ $link4active=1;
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure4}{$myuid}' ><img src='{$geturl}images/{$themeopt}/6.png' /></a></span>";	
		} else $link4active=0;
		if(isset($_POST['link5active'])){ $link5active=1;
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure5}{$myuid}' ><img src='{$geturl}images/{$themeopt}/7.png' /></a></span>";	
		} else $link5active=0;
		if(isset($_POST['link6active'])){ $link6active=1; 
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure6}{$myuid}' ><img src='{$geturl}images/{$themeopt}/1.png' /></a></span>";
		}else $link6active=0;
		
		$savedtext.='</div></div>';
		
		$savedtext=mysql_real_escape_string($savedtext);
		
		$update=mysql_query("update ".$wpdb -> prefix ."DMPostManager set link1active=$link1active,link2active=$link2active,
		link3active=$link3active,link4active=$link4active,link5active=$link5active,link6active=$link6active,settheme=$themeopt,myid=$myuid,savedtext='$savedtext'");
		if($update)
		$message="Settings Saved Successfully";
		else
		$message="Sorry, an error occured please try again";
	}
	$getresult=mysql_query("select * from  ".$wpdb -> prefix ."DMPostManager order by urlid asc");
	if(!$getresult || mysql_num_rows($getresult)==0)
	{	
		$ins=mysql_query("insert into ".$wpdb -> prefix ."DMPostManager 
		(link1url,link1active,link2url,link2active,link3url,link3active,link4url,link4active,
		link5url,link5active,link6url,link6active,settheme,myid,savedtext) values 
		('$linkstructure1',1,'$linkstructure2',1,'$linkstructure3',1,'$linkstructure4',1,'$linkstructure5',1,'$linkstructure6',1,0,00,'')");
		if($ins && mysql_affected_rows()>0)
		{
			echo '<script type="text/javascript">window.location.href="' . get_bloginfo("url") . '/wp-admin/admin.php?page=Post-Manager"</script>';die;			
		}else {
			echo 'Unable to configure the plugin settings';
			return; die;
		}
	}
	$getresultrow=mysql_fetch_array($getresult);
	 ?>
	 <style type="text/css">
	 	.heading{font-size:17px;margin:0 10px;font-weight:bold;}
	 	.heading2{font-size:14px;margin:0 10px;font-weight:bold;}
	 	.mytextbox{border:1px solid #000;padding: 10px;}
	 	.myimg{width: 50px; height:50px; }
	 </style>
	 <br/><br/>
	 <?php if(isset($message)) echo $message.'<br><br>'; ?>
	 <form method="post" >
	<table class="widefat page" cellspacing="0" style="width: 800px;">
		<thead>
			<tr><td colspan="2" align="center"><h3 style="margin: 10px 0;">Settings</h3></td></tr>			
		</thead>
		<tbody>
			<tr><td colspan="2"><span class="heading">User ID: </span><input size="50" type="text" name="myuid" value="<?php echo $getresultrow['myid'] ?>" class="mytextbox" /><br />In order to get your account ID Sign in to <a href="http://www.share4bucks.com">share4bucks</a> and go to “Account” tab</td></tr>
			<tr><td style="padding-top: 35px;height: 50px;width: 200px"><input type="radio" name="themeopt" value="1" id="themeopt1" <?php if($getresultrow['settheme']==1) echo 'checked="checked"'; ?> /><label for="themeopt1" class="heading">Rounded icons set</label>
				</td><td style="padding-top: 21px;height: 68px;"><span>
					<img src="<?php echo $geturl ?>images/1/5.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/1/2.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/1/3.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/1/6.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/1/7.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/1/1.png" class="myimg" />
				</span>
			</td></tr>
			<tr><td style="padding-top: 35px;height: 50px;width: 200px"><input type="radio" name="themeopt" value="2" id="themeopt2" <?php if($getresultrow['settheme']==2) echo 'checked="checked"'; ?> /><label for="themeopt2" class="heading">Square icons set</label>
				</td><td style="padding-top: 21px;height: 68px;"><span>
					<img src="<?php echo $geturl ?>images/2/5.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/2/2.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/2/3.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/2/6.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/2/7.png" class="myimg" />
					<img src="<?php echo $geturl ?>images/2/1.png" class="myimg" />
				</span>
			</td></tr>
			<tr><td>
				<span class="heading">Enable sharing via:</span>
				<br><br>
				<div style="margin-left: 70px; ">
					<input type="checkbox" name="link1active" id="link1active" <?php if($getresultrow['link1active']==1) echo 'checked="checked"'; ?> /><label for="link1active" class="heading2">Facebook</label><br><br>
					<input type="checkbox" name="link2active" id="link2active" <?php if($getresultrow['link2active']==1) echo 'checked="checked"'; ?> /><label for="link2active" class="heading2">Twitter</label><br><br>
					<input type="checkbox" name="link3active" id="link3active" <?php if($getresultrow['link3active']==1) echo 'checked="checked"'; ?> /><label for="link3active" class="heading2">Google Plus</label><br><br>
					<input type="checkbox" name="link4active" id="link4active" <?php if($getresultrow['link4active']==1) echo 'checked="checked"'; ?> /><label for="link4active" class="heading2">Linkedin</label><br><br>
					<input type="checkbox" name="link5active" id="link5active" <?php if($getresultrow['link5active']==1) echo 'checked="checked"'; ?> /><label for="link5active" class="heading2">Tumblr</label><br><br>
					<input type="checkbox" name="link6active" id="link6active" <?php if($getresultrow['link6active']==1) echo 'checked="checked"'; ?> /><label for="link6active" class="heading2">Gmail</label><br>
				</div>
			</td></tr>
			<tr><td colspan="2"><input class="heading" type="submit" name="savesetting" value="Save" size="30" /></td></tr>
		</tbody>
	</table>
	</form>
<?php }

function DM_defaultsettings()
{
	global $wpdb;
	$getresult=mysql_query("select * from  ".$wpdb -> prefix ."DMPostManager order by urlid asc");
	if(!$getresult || mysql_num_rows($getresult)==0)
	{	
		$ins=mysql_query("insert into ".$wpdb -> prefix ."DMPostManager 
		(link1url,link1active,link2url,link2active,link3url,link3active,link4url,link4active,
		link5url,link5active,link6url,link6active,settheme,myid,savedtext) values 
		('$linkstructure1',1,'$linkstructure2',1,'$linkstructure3',1,'$linkstructure4',1,'$linkstructure5',1,'$linkstructure6',1,1,00,'')");
		if($ins && mysql_affected_rows()>0)
		{
			
		$myuid=0;
		$themeopt=1;
		$geturl=plugin_dir_url(__FILE__);
		$linkstructure1="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=5&uid=";
		$linkstructure2="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=2&uid=";
		$linkstructure3="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=3&uid=";
		$linkstructure4="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=6&uid=";
		$linkstructure5="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=7&uid=";
		$linkstructure6="http://www.share4bucks.com/ext2.aspx?source=wp&durl={curpageurl}&s=1&uid=";
		$savedtext='<div style="position: relative;height: 103px;">
		<div style="width: 157px;float: left;"><img src="'.$geturl.'images/SpradTheWord.png" /></div>
		<div style="position:absolute;top: 40px;left: 50px;"><img src="'.$geturl.'images/Arrow.png" /></div>
		<div style="position : absolute;top: 43px;left: 123px;">
		<style type="text/css">.plugimgleft{float:left;width:50px;margin-right:10px;}</style>';
		$link1active=1;
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure1}{$myuid}' ><img src='{$geturl}images/{$themeopt}/5.png' /></a></span>";
		 $link2active=1; 
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure2}{$myuid}' ><img src='{$geturl}images/{$themeopt}/2.png' /></a></span>";
		$link3active=1; 
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure3}{$myuid}' ><img src='{$geturl}images/{$themeopt}/3.png' /></a></span>";
		$link4active=1;
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure4}{$myuid}' ><img src='{$geturl}images/{$themeopt}/6.png' /></a></span>";	
		$link5active=1;
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure5}{$myuid}' ><img src='{$geturl}images/{$themeopt}/7.png' /></a></span>";	
		$link6active=1; 
			$savedtext.="<span class='plugimgleft'><a target='_blank' href='{$linkstructure6}{$myuid}' ><img src='{$geturl}images/{$themeopt}/1.png' /></a></span>";
		
		
		$savedtext.='</div></div>';
		
		$savedtext=mysql_real_escape_string($savedtext);
		
		$update=mysql_query("update ".$wpdb -> prefix ."DMPostManager set link1active=$link1active,link2active=$link2active,
		link3active=$link3active,link4active=$link4active,link5active=$link5active,link6active=$link6active,settheme=$themeopt,myid=$myuid,savedtext='$savedtext'");
		if($update)
		$message="Settings Saved Successfully";
		else
		$message="Sorry, an error occured please try again";
	}else {
			die('Unable to configure the plugin settings');
			return;
		}
	}
} ?>