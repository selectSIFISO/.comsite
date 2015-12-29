<?php

	add_action( 'add_meta_boxes', 'effectoBox' );  

	function effectoBox() {
		if (isset($mye_plugin_visib) && $mye_plugin_visib) {
			$mye_plugin_visib = json_decode($mye_plugin_visib, true);

			if($mye_plugin_visib['isOnPost']){
				add_meta_box('effecto_meta_box', 'MyEffecto Configuration', 'showEffectoBox', 'post', 'normal', 'core' );
			} else {
				$isOnPost="";
				return;
			}
			if($mye_plugin_visib['isOnPage']){
				add_meta_box( 'effecto_meta_box', 'MyEffecto Configuration', 'showEffectoBox', 'page', 'normal', 'core' ); 
			}
		} else {
			add_meta_box( 'effecto_meta_box', 'MyEffecto Configuration', 'showEffectoBox', 'post', 'normal', 'core' );
		}
	}
	

	$p_shortname = null;
	function showEffectoBox() {
		global $hostString, $eff_settings_page;
		echo "<script>
				jQuery(function($){
					$('#effecto_meta_box').addClass('closed');
				});
			</script>";

		$pluginStatus = $_GET["plugin"];
		if ($pluginStatus == 'success') {
			addAlert($pluginStatus);
		}

		$getPostID = get_the_ID();
		if (!isset($getPostID) || empty($getPostID)) {
			$getPostID = $_GET['post_id'];
		}

		$getPostTitle = get_the_title();
		$wpSite = get_site_url();
		$effDate_published = get_the_date("l,F d,Y");
		//$getPostTitle = substr($getPostTitle, 0, 10);

		$postUrl=$_SERVER['REQUEST_URI'];
		$postUrl = str_replace('post-new.php','post.php', $postUrl);
		$p_shortname =null;
		$eff_details = getMyEffectoPluginDetails($getPostID);
		
		if($eff_details!=null){
			foreach($eff_details as $detail) {
				$p_shortname = $detail -> shortname;
			}
		}
		

		/* Check if there is plugin for current post. */
		if (!isset($p_shortname) || empty($p_shortname)) {
			/* If not found, check for AllPost code. */
			//$allPostCode = getMyeffectoEmbedCodeByPostID(0);
			$p_shortname =null;
			$eff_details = getMyEffectoPluginDetails("0");
			
			if($eff_details!=null){
				foreach($eff_details as $detail) {
					$p_shortname = $detail -> shortname;
				}
			}

			
			if (isset($p_shortname) && !empty($p_shortname)) {
				echo '<h3><center>This Post Show Default Emotion-set (Check on Post Preview)</center> </h3>
					<div >Note : In post-preview most of the plugin functionality are disabled  <br>(click limit, share, recommendation)</div><br>'.$eff_json;
			
			} else {
				echo '<h2>
						<center>
							Please configure Myeffecto to view emotion-set below your post
						</center>
					</h2>
					<a class="button" href="'.get_site_url().'/wp-admin/admin.php?page='.$eff_settings_page.'&postName='.$wpSite.'&pluginType=defaultAdd&postURL='.$_SERVER['REQUEST_URI'].'?post_id='.$getPostID.'">Add a default emotion set </a><br><br>
					';
			}
		
		} else {	
			echo '<h2><center>Emotion-Set Configured only for this post</center></h2>'.$eff_json;
		
		}
		echo '<a class="effectoConfig button" href="'.get_site_url().'/wp-admin/admin.php?page='.$eff_settings_page.'&postID='.$getPostID.'&postName='.$wpSite.'&shortname='.$p_shortname.'&pluginType=postAdd&postURL='.urlencode($postUrl).'?post='.$getPostID.'">Confiure New Plugin For this Post</a>';
			/*echo '<a id="mye_disable"class="button">Disable myeffecto for this post</a> <span style="line-height: 28px;padding: 0px 8px;">or</span>
				<a class="effectoConfig button" href="'.get_site_url().'/wp-admin/admin.php?page='.$eff_settings_page.'&postID='.$getPostID.'&postName='.$wpSite.'&shortname='.$p_shortname.'&pluginType=postAdd&postURL='.urlencode($postUrl).'?post='.$getPostID.'">Confiure New Plugin For this Post</a>
				';*/
		/*	echo "<script>
				jQuery('#mye_disable').click(function(){
					alert('clicked');
					var data = {'action': 'mye_post_disable','post_id':'".$getPostID."'};
					jQuery.post(ajaxurl, data);
				});
				</script>";*/
		
	}

	/*function mye_post_disable_action() {
		error_log("Post Disabled yo");
		$postId = $_POST['post_id'];
		if(isset($postId)){
			$eff_details = getMyEffectoPluginDetails($postId);
			foreach($eff_details as $detail) {
				$post_shortname = $detail -> shortname;
			}
			if(isset($post_shortname) && !empty($post_shortname)){
				error_log("update shortname id : "+$postID);
				updateMyeffectoEmbedCode(null, $postID, "no");
			}
			else{
				error_log("insert shortname");
				insertInMyEffectoDb("1", null, null, $postID, "no");
			}
		}
		wp_die(); 
	}
	add_action( 'wp_ajax_mye_post_disable', 'mye_post_disable_action' );
*/
	function effecto_get_category($postId) {
		$categories = get_the_category($postId);
		$eff_category = "";
		if($categories){
			foreach($categories as $category) {
				$eff_category .= $category->name . ",";
			}
		}
		
		return $eff_category;
	}
	
	function effecto_get_tags($postId) {
		$effectoposttags = wp_get_post_tags($postId);
		$eff_tags = "";
		if($effectoposttags){
			foreach($effectoposttags as $effposttag) {
				$eff_tags .= $effposttag->name . ",";
			}
		}
		
		return $eff_tags;
	}
	
	function effecto_get_author() {
		$user_id = get_current_user_id();
		return get_the_author_meta('user_email', $user_id );
	}

	function showEffModal() {
		echo '<div id="effecto-confirm" title="Change emotion Set?" style="display : none;">
				<p><span class="" style="float: left; margin: 0 7px 20px 0;">Changing your set will erase your current emotion set data. <br/><br/> Do you want to continue?</span></p>
			</div>

			<script type="text/javascript">
				window.onload=function() {
					jQuery(".effectoConfig").click(function(e) {
						e.preventDefault();
						var targetUrl = jQuery(this).attr("effectohref");
						jQuery( "#effecto-confirm" ).dialog({
							resizable: false,
							height:220,
							modal: false,
							buttons: {
								Ok: function() {
								   window.location.href = targetUrl;
								  //return true;
								},
								Cancel: function() {
								  jQuery( this ).dialog( "close" );
								}
							}
						});
						return false;
					});
				};
			</script>';
	}

	function updateEff_title() {
		global $hostString;
		$eff_id = get_the_ID();
		$wpress_post = get_post($eff_id);
		$wpress_title = $wpress_post->post_title;
		/* $shortname = getShortnameByPostID($eff_id);
		if (!isset($shortname)) {
			$shortname = getShortnameByPostID(0);
		} */
		if (isset($eff_id) && !empty($eff_id)) {
			$args = array(
				'body' => array('action' => 'updateContentTitle', 'title' => $wpress_title, 'post_id' => $eff_id),
			);
			wp_remote_post($hostString.'/contentdetails', $args);
		}
	}

	function createDefaultPlugin($check){
		if($check){
			$apiPluginDetailsArray = getMyEffectoPluginDetails("0");
			$p_shortname="";

			if($apiPluginDetailsArray!=null){
				foreach($apiPluginDetailsArray as $detail) {
					$p_shortname = $detail -> shortname;
				}
			}
			
		}
		

		if($p_shortname==null || !isset($p_shortname) || !$check){

			global $hostString;
			$args = array(
				'timeout' => 120,
				'body' => array('action' => 'defaultContent', 'email' => get_option( 'admin_email' ), 'site' => get_site_url()),
			);
			$resp = wp_remote_post($hostString.'/contentdetails', $args);
			if ( is_wp_error( $resp ) ) {
				//echo print_r($resp);
			}
			else{
				$eff_shortname= $resp["body"];
				if(isset($eff_shortname) && !empty($eff_shortname)){
					$eff_shortname=trim($eff_shortname);
					insertInMyEffectoDb('1', null, "<div>", null, $eff_shortname);		
				}		
				return $eff_shortname;
			}

			return null;
		}
	}

	function getRandomLink(){
		$post_enabled = true;
		$page_enabled = true;
		$mye_plugin_visib = get_option('mye_plugin_visib');
		if (isset($mye_plugin_visib) && !empty($mye_plugin_visib)){
			$mye_plugin_visib = json_decode($mye_plugin_visib, true);
			if(array_key_exists('isOnPost',$mye_plugin_visib)){
				$post_enabled = $mye_plugin_visib['isOnPost']=='true' ? true : false;
			}
			if(array_key_exists('isOnPage',$mye_plugin_visib)){
				$page_enabled = $mye_plugin_visib['isOnPage']=='true' ? true : false;
			}
		}

		if($post_enabled || $page_enabled){
			if($post_enabled){
				$args=array('post_type'=>'post','post_status'=>'publish','posts_per_page'=>1,'orderby' => 'rand');		
				$my_posts = get_posts($args);
			}
			
			if($page_enabled){
				if(empty($my_posts)){
					$args=array('post_type'=>'page','post_status'=>'publish','posts_per_page'=>1,'orderby' => 'rand');	
					$my_posts = get_pages( $args );
				}
			}

			foreach ( $my_posts as $post ){
				return $post->guid;
			}
		}
	}

	function allSetCode($allPostCode, $getPostTitle) {	
		global $hostString, $eff_settings_page;

		$shortname = "";
		$eff_details = getMyEffectoPluginDetails("0");

		if($eff_details!=null){
			foreach($eff_details as $detail) {
				$shortname=$detail -> shortname;
			}
		}

		$ad_email=urlencode (get_option('admin_email'));
		$b_url=urlencode (get_option('siteurl'));

		$prev_ifrm_url=$hostString."/ep?ty=preview&wadm=1&email=".$ad_email."&l=".$b_url."&s=";
		if($shortname==null || !isset($shortname)){
			$shortname = createDefaultPlugin(false);
	    }
		
	
			echo "<script type='text/javascript'>
			var eMeth=window.addEventListener ? 'addEventListener':'attachEvent';
			var msgEv = eMeth == 'attachEvent' ? 'onmessage' : 'message';var detect = window[eMeth];
			 detect(msgEv,mye_logHandle,false);
			 function mye_logHandle(e){
			 	 var m = e.data;
			 	 if(e.origin=='".$hostString."'){
			 	 	if(m.indexOf('mye_log')>-1){
				 	 	m=m.split('#');
				 	 	jQuery('#load').css('display','');
				 	 	var h=jQuery('#mye_editEmo').attr('href'); 
				 	 	h=h+m[1]; jQuery('#mye_editEmo').attr('href',h);
				 	 	var report=jQuery('#mye_rpt_a').attr('href'); 
				 	 	report=report+m[1]; jQuery('#mye_rpt_a').attr('href',report);
				 	 	var data = {'action': 'mye_sname_store','s':m[1]};
				 	 	jQuery.post(ajaxurl, data).always(function(){
				 	 		jQuery('#load').css('display','none');
				 	 	});
			 	 	}
			 	 	else if(m.indexOf('setHt')>-1){
			 	 		m=m.split('#');
			 	 		jQuery('#effecto_bar').css('height',m[1]);
			 	 		jQuery('#mye_prev_frame').css('height',m[1]);
			 	 	}
			 	 }
			 }
			</script>";
		
		$frame_src = $prev_ifrm_url.$shortname;
		$eff_json ="<div id='effecto_bar'style='text-align:center;min-height:175px;position:;'>";
		
		$eff_json = $eff_json."<div id='wp_mye_preview' style='background-color: white;margin: 0 auto;margin-top: 7px;border: 1px solid #DDDD;'><div id='load'></div><script>function delLoad(){jQuery('#load').css('display','none');}</script>

				<iframe id='mye_prev_frame' onload='delLoad();' src='".$frame_src."' width='100%' frameborder='0' scrolling='no' style='min-height:185px;width: 100%; border: 0px; overflow: hidden; clear: both; margin: 0px; background: transparent;'></iframe></div>";	

		$eff_json = $eff_json."</div>";
		
		/*<span style="font-size:15px;padding:0px 10px;"> | </span>
			
		*/
			
		echo '<div class="updated" style="margin-top: 11px;margin-bottom: 1px;">';
		echo '<p style="position:relative;font-size:16px;font-weight:700 !important">
		Emotion-Set below has been added to all your blog post <span style="position:relative;"><img style="position:absolute;width:15px;top: 5px;left: 6px;" src="'.plugins_url( '/img/down.png' , __FILE__ ).'"></span>';
  		echo '<span style="position:absolute;right: 12px;">';
		$prev_link = getRandomLink();
		if(isset($prev_link)){
			echo '<span style="border-right: 1px solid #E3E3E3;margin-right: 10px;padding-right: 10px;">';
			echo '<a style="font-size:18px;font-weight: 500;" class="effectoConfig button-primary mye_btn" href="'.$prev_link.'#effecto_bar" target="_blank" title="Preview plugin on your blog">Preview</a>';
	  		echo '</span>';
		}
  		echo '<a style="font-size:18px;font-weight: 500;" class="effectoConfig button-primary mye_btn" href="'.get_site_url().'/wp-admin/admin.php?page='.$eff_settings_page.'&postName='.$getPostTitle.'&pluginType=defaultEdit&postURL='.$_SERVER['REQUEST_URI'].'&shortname='.$shortname.'" title="Configure New Plugin for your blog">Create New</a>';
  		echo '<span style="font-size:15px;padding: 0px 5px;margin: auto 5px;">OR</span> ';
  		echo '<a style="font-size:18px;font-weight: 500;" id="mye_editEmo" class="effectoConfig button mye_edit_btn" href="'.get_site_url().'/wp-admin/admin.php?page='.$eff_settings_page.'&pluginType=editExist&sname='.$shortname.'" title="Edit/Update existing default Emotion-Set">Edit</a>';
  		echo '</span>';
  		echo '</p>
<p>Goto <a href="'.admin_url( 'options-general.php?page=eff_conf_nav&pluginType=advSetting').'">Advance settings</a> to configure where to show the plugin</p>
</div>'.$eff_json;
		//predfined_emo($frame_src);
		echo '<h2><style>.mye_btn{font-weight:bold;padding-top: 5px !important;padding-bottom: 31px !important;}
		.mye_edit_btn{font-weight:bold;padding-top: 5px !important;padding-bottom: 31px !important;}
		@media all and (max-width: 782px){
			.mye_edit_btn{font-weight:bold;padding-top: 5px !important;padding-bottom: 5px !important;}
		}
		</style></h2>
			
		
<style>#mye_report{position:fixed;top:52%;z-index:99999999999;transform:rotate(-90deg);-webkit-transform:rotate(-90deg);-moz-transform:rotate(-90deg);-o-transform:rotate(-90deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);right:0;height:0;width:75px}#mye_report a{padding-left: 10px;padding-right: 25px !important;display:block;background:rgba(195, 90, 79, 0.86);width:60px;padding:10px 16px 8px;color:#fff;font-family:Arial,sans-serif;font-size:17px;font-weight:700;text-decoration:none;letter-spacing:.06em}#mye_report a:hover{background:#06c}</style>
<div id="mye_report"><a id="mye_rpt_a" target="_blank" href="'.$hostString.'/support_mail?site='.urlencode(get_site_url()).'&sname='.$shortname.'">Support</a></div>';
		?>
			<script type="text/javascript" >
			var onload_eff_isHome = jQuery("#home").is(":checked");
			jQuery("#eff_visib").click(function() {
					var eff_isPost = jQuery("#posts").is(":checked");
					var eff_isPage = jQuery("#pages").is(":checked");
					var eff_isHome = jQuery("#home").is(":checked");
					var eff_isCustom = jQuery("#custom").is(":checked");
					var lod_on=jQuery(".m_lod:checked").val();
					var eff_custom_list = {};
					if (eff_isCustom) {
						jQuery("input[class=eff_customPostList]:checked").each(function() {
							eff_custom_list[jQuery(this).attr('c-name')] = true;
						});
						jQuery("input[class=eff_customPostList]:not(:checked)").each(function() {
							eff_custom_list[jQuery(this).attr('c-name')] = false;
						});
					}
					//alert(JSON.stringify(eff_custom_list));
					
					eff_custom_list = JSON.stringify(eff_custom_list);
					
					var eff_msg_ele = jQuery("#eff_msg");
					// console.log(eff_isPost + ", " + eff_isPage);
				
					eff_msg_ele.show();
					
					eff_msg_ele.html("Saving......");
					var data = {'action': 'mye_update_view',
						'isPost': eff_isPost,
						'isPage': eff_isPage,
						'isHome': eff_isHome,
						'isCustom': eff_isCustom,
						'eff_custom_list': eff_custom_list,
						'mye_load_on':lod_on,
					};
					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					jQuery.post(ajaxurl, data, function(response) {
						eff_msg_ele.html("Settings Saved");
						if (eff_isHome) {	if(!onload_eff_isHome){jQuery("#eff_shCode").show();}} else {jQuery("#eff_shCode").hide();}
						onload_eff_isHome=eff_isHome;
					});

				});
				
				jQuery("#custom").click(function() {
					if (jQuery(this).is(":checked")) {
						jQuery("#eff_customPostList").show();
					} else {
						jQuery("#eff_customPostList").hide();
					}
				});
			</script>
		<?php
	}

	add_action( 'wp_ajax_mye_load_plugs', 'mye_load_plugs' );
	function mye_load_plugs() {
		$default_sname = $_POST['snam'];
		global $hostString;
		$args = array('timeout' => 60,'body' => array('action' => 'load_set','sname'=>$default_sname,'host'=>get_site_url()));
		$resp = wp_remote_post($hostString.'/contentdetails', $args);
		if(!is_wp_error($resp)){ echo $resp["body"]; }
		wp_die();
	}

/*	function predfined_emo($src){
	
		echo '<style>#set_save{display: none;padding-left:2px;margin-left:2px;border-left:1px solid #DEDBDB} .preSetBtn{margin:auto 5px !important;font-weight:500  !important;font-size:18px  !important;} #b_plug > div{display:inline-flex;} #b_plug{padding-top:15px;padding-left:12px;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    	box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);width:100%;height:56px;background-color:#fff;margin-top: 15px;}</style>';
		echo '<div id="b_plug" style="display:none;"><div style="font-weight:500;font-size:16px;">Try Another Emo-Set :</div><div>';
		echo '<a id="mye_rand" class="mye_btn button-primary preSetBtn" >Random</a>';
		echo '<span id="set_save"><a id="sav_set" class="mye_btn button-primary preSetBtn" >Save</a>';
		echo '<a id="cncl_set" class="mye_btn button preSetBtn">Cancel</a></span>';
		echo '</div></div>';
			echo "<script>
			var sr,sr_len=0,df_sname,ifrm_link;
			function loadsn(){
				ifrm_link='".$src."',ind=ifrm_link.indexOf('&s=');
				if(ind>-1){
					df_sname=ifrm_link.substring((ind+3),ifrm_link.length);
					ifrm_link=ifrm_link.substring(0,(ind+3));
				}
			}
			loadsn();
			jQuery.post(ajaxurl, {'action': 'mye_load_plugs','snam':df_sname}, function(res){
				if(res && res!=''){
					jQuery('#b_plug').css('display','block');
					res=JSON.parse(res);
					sr=res.rand;
					sr.push(df_sname);
					sr_len = sr.length;
				}
			});
			var cur_i=0,cur_sel;
			function chgIfrmLink(s){
				if(s==df_sname){
						jQuery('#set_save').hide();
					}else{
						jQuery('#set_save').show();
					}
				jQuery('#mye_prev_frame').attr('src',ifrm_link+s);	
				jQuery('#load').show();
			}
			jQuery('#cncl_set').click(function(){chgIfrmLink(df_sname); cur_i=0;});
			jQuery('#sav_set').click(function(){
				var c=confirm('You are about to replace previous emo-set, Are you sure?');
				if(c){
					if(cur_sel){
						jQuery.post(ajaxurl, {'action': 'mye_save_sname','sname':cur_sel}, function(res){
							jQuery('#set_save').hide();
							alert('Done');
						});
					}
					else{
						alert('Please click on random buttom');
					}
				}
				else{
					jQuery('#cncl_set').click();
				}
			});

			jQuery('#mye_rand').click(function(){
				if(sr_len>0){
					cur_sel=sr[cur_i];
					chgIfrmLink(sr[cur_i]);
					if(cur_i< (sr_len-1)){
						cur_i++;
					}
					else{
						cur_i=0;
					}
				}
			});
		</script>";
	}*/

	add_action( 'wp_ajax_mye_sname_store', 'mye_sname_store' );
	function mye_sname_store() {
		$eff_shortname = $_POST['s'];
		if(isset($eff_shortname) && !empty($eff_shortname)){
			$eff_shortname=trim($eff_shortname);
			insertInMyEffectoDb('1', null, "<div>", null, $eff_shortname);		
		}
		wp_die(); // this is required to terminate immediately and return a proper response
	}


	// add_action( 'save_post', 'updateEff_title' );	
	add_action( 'wp_ajax_mye_update_view', 'mye_visibUpdt_callback' );
	function mye_visibUpdt_callback() {
		$eff_isOnPost = $_POST['isPost'];
		$eff_isOnPage = $_POST['isPage'];
		$eff_isOnHome = $_POST['isHome'];
		$eff_isCustom = $_POST['isCustom'];
		$eff_custom_list = $_POST['eff_custom_list'];
		$mye_load_on=$_POST['mye_load_on'];
		
		$escapers = array("\\");
		$replacements = array("");
		$eff_custom_list = str_replace($escapers, $replacements, $eff_custom_list);
		update_option('mye_plugin_visib', '{"mye_load_on":"'.$mye_load_on.'","isOnPost":'.$eff_isOnPost.', "isOnPage":'.$eff_isOnPage.', "isOnHome":'.$eff_isOnHome.', "isOnCustom":'.$eff_isCustom.', "isOnCustomList":'.$eff_custom_list.'}');

		wp_die(); // this is required to terminate immediately and return a proper response
	}

	add_action('wp_ajax_mye_save_sname', 'mye_save_sname' );
	function mye_save_sname() {
		global $hostString;
		$sname=$_POST['sname'];
		$args = array('timeout' => 60,'body' => array('action' => 'copySname','sname' => $sname,'host'=>get_site_url()));
		$resp = wp_remote_post($hostString.'/contentdetails', $args);
		if(!is_wp_error($resp)){ 
			$eff_shortname=$resp['body'];
			if(isset($eff_shortname) && $eff_shortname!='null'){
				$eff_shortname=trim($eff_shortname);
				updateMyeffectoEmbedCode('', 0, $eff_shortname);
			}
		}
		wp_die();
	}
?>