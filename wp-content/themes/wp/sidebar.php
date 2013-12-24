<aside id="aside">
	<?php include (TEMPLATEPATH . '/widget/tab.php'); ?>
	<?php if(get_option("z_hotreader")=="显示"){?>
	<!--活跃读者-->

	<div class="widget readers">
		<h4><span>活跃读者</span></h4>
		<dl class="clearfix">
			<?php
				$query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 12 MONTH ) AND user_id='0' AND comment_author_email != '' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 10";
				$wall = $wpdb->get_results($query);
				foreach ($wall as $comment)
				{
					if( $comment->comment_author_url )
					$url = $comment->comment_author_url;
					else $url="#";
					$r="rel='external nofollow'";
					$imgsize="32";
					$tmp = "<dd><a target='_blank' href='".$url."' title='".$comment->comment_author." (留下".$comment->cnt."个脚印)'><img width='".$imgsize ."' height='".$imgsize ."' src='http://www.gravatar.com/avatar.php?gravatar_id=".md5( strtolower($comment->comment_author_email) )."&size=".$imgsize ."&d=identicon&r=G' alt='".$comment->comment_author."(留下".$comment->cnt."个脚印)' /></a></dd>";
					$output .= $tmp;
				}
				echo $output ;
			?>
		</dl>
	</div>
	<?php }?>
	
	<!--标签云-->
	<div class="widget tags">
		<h4><span>标签云</span></h4>
		<div>
			<?php wp_tag_cloud('smallest=13&largest=13&unit=px&number=50&format=flat&orderby=count'); ?>
		</div>
	</div>
	<!--年度排行-->
	<?php if(get_option("z_hotlist")=="显示"){?>
	<div class="widget entry-list">
		<h4><span>年度排行</span></h4>
		<dl>
			<?php simple_get_most_vieweds();?>
		</dl>
	</div>
	<?php }?>
	<?php 
	if(get_option("z_comments")=="显示"){?>
	<!--最新评论-->
	<div class="widget comments">
		<h4><span>最新评论</span></h4>
		
		<dl>
			<?php
			// Recent comments
			$max = 10; // item to get
			global $wpdb;
			$sql = "SELECT c.*, p.post_title FROM $wpdb->comments c INNER JOIN $wpdb->posts p ON (c.comment_post_id=p.ID) WHERE comment_approved = '1' AND comment_type not in ('trackback','pingback')";
			$sql .= " ORDER BY comment_date DESC LIMIT $max";
			$results = $wpdb->get_results($sql);
			$template = '<div class="who">%g <a href="%pu#div-comment-%cid" target="_blank">%an&nbsp;%cd</a></div>';
			$echoed=0;
			foreach ($results as $row) {
				/*
				*	comment_title									=> 评论标题
				*	comment_date 									=> 时间
				*	get_avatar($row->comment_author_email,'32')  	=> 根据评论者填写的邮箱获取avatar上的头像（32px）
				*	post_title 										=> 标题
				*	get_permalink($row->comment_post_ID) 			=> 文章链接
				*	comment_author_url								=> 评论者填写的作者主页
				*	comment_author 									=> 作者昵称
				*	comment_ID 										=> 评论ID
				*/
				$tags = array('%ct','%cd','%g','%pt','%pu','%au','%an','%cid');
				$replacements = 
					array(
						$row->comment_title,
						$row->comment_date,
						get_avatar($row->comment_author_email,'32'),
						$row->post_title,
						get_permalink($row->comment_post_ID),
						$row->comment_author_url,
						$row->comment_author,
						$row->comment_ID
					);
				echo '<dd>' . str_replace($tags,$replacements,$template) . '<div class="comment">'. $row->comment_content . '</div></dd>';
				$echoed=1;
			}
			if ($echoed==0)
				echo '<dd>找不到.</dd>';
			?>
			

		</dl>
		
	</div>
	<?php }?>

	<!--微信-->
	<?php if(get_option('z_qrcode')){?>
	<div class="widget qrcode">
		<h4><span>微信</span></h4>
		<dl>
			<dd><img src="<?php bloginfo('stylesheet_directory'); ?>/<?php echo get_option('z_qrcode');?>"></dd>
		</dl>
	</div>
	<?php }?>
</aside>
		