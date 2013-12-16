<?php

//注册工具栏
if (function_exists('register_sidebar')){
    register_sidebar(array(
		'name' => '侧边栏',
		'id'   => 'side',
		'before_widget' => '<div class="side-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="t-h2"><em>',
		'after_title'   => '</em></h3>'
	));
	}
	
//自定义域
$new_meta_boxes =
array(
	"fmimg" => array(
        "name" => "fmimg",
        "std" => "",
        "title" => "封面图片(220x146):"),
    "tuijian" => array(
    	"name" => "tuijian",
    	"std" => "",
    	"title" => "是否头条:"),
);

function new_meta_boxes() {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

        if($meta_box_value == "")
            $meta_box_value = $meta_box['std'];

        echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

        // 自定义字段标题
        echo'<h4>'.$meta_box['title'].'</h4>';

        // 自定义字段输入框
        if($meta_box['name']=='tuijian') { ?>
        	<select name="<?php echo $meta_box['name']; ?>_value">
	        	<option value="0" <?php if($meta_box_value==0) { ?>selected="selected"<?php } ?>>不头条</option>
	        	<option value="1" <?php if($meta_box_value==1) { ?>selected="selected"<?php } ?>>头条</option>
	        </select><br />
        <?php } else {
	        echo '<textarea cols="60" rows="1" name="'.$meta_box['name'].'_value">'.$meta_box_value.'</textarea><br />';
        };
    }
}

function create_meta_box() {
    global $theme_name;

    if ( function_exists('add_meta_box') ) {
        add_meta_box( 'new-meta-boxes', '自定义模块', 'new_meta_boxes', 'post', 'normal', 'high' );
    }
}

function save_postdata( $post_id ) {
    global $post, $new_meta_boxes;

    foreach($new_meta_boxes as $meta_box) {
        if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))  {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ))
                return $post_id;
        } 
        else {
            if ( !current_user_can( 'edit_post', $post_id ))
                return $post_id;
        }

        $data = $_POST[$meta_box['name'].'_value'];

        if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
            add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
        elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
            update_post_meta($post_id, $meta_box['name'].'_value', $data);
        elseif($data == "")
            delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
    }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

//缩略图调用
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$popimg=get_option( 'mao10_popimg');
$first_img = "$popimg";
}
return $first_img;
}

//自定义导航
register_nav_menus(
array(
'nav-menu' => __( '主导航' ),
'nav2-menu' => __( '列表上方' ),
'nav3-menu' => __( '底部' ),
'nav4-menu' => __( '友情链接' ),
)
);

function new_excerpt_more( $more ) {
	/* return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">全文 ></a> '*/;
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//注册控制面板
//require_once(TEMPLATEPATH . '/control.php');
	
//分页工具
function par_pagenavi($range = 9){
  // $paged - number of the current page
  global $paged, $wp_query;
  // How much pages do we have?
  if ( !$max_page ) {
  $max_page = $wp_query->max_num_pages;
  }
  // We need the pagination only if there are more than 1 page
  if($max_page > 1){
  if(!$paged){
  $paged = 1;
  }
  echo '';
  // On the first page, don't put the First page link
  if($paged != 1){
  echo "<span class='first'><a href='" . get_pagenum_link(1) . "' class='extend' title='最前一页'>首页</a></span>";
  }
  // To the previous page
  previous_posts_link('<');
  // We need the sliding effect only if there are more pages than is the sliding range
  if($max_page > $range){
  // When closer to the beginning
  if($paged < $range){
  for($i = 1; $i <= ($range + 1); $i++){
  if($i==$paged) echo "<b>$i</b>";
else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
  }
  }
  // When closer to the end
  elseif($paged >= ($max_page - ceil(($range/2)))){
  for($i = $max_page - $range; $i <= $max_page; $i++){
  if($i==$paged) echo "<b>$i</b>";
else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
  }
  }
  // Somewhere in the middle
  elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
  for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
  if($i==$paged) echo "<b>$i</b>";
else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
  }
  }
  }
  // Less pages than the range, no sliding effect needed
  else{
  for($i = 1; $i <= $max_page; $i++){
  if($i==$paged) echo "<b>$i</b>";
else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
  }
  }
  // Next page
  next_posts_link('>');
  // On the last page, don't put the Last page link
  if($paged != $max_page){
  echo "<span class='end'><a href='" . get_pagenum_link($max_page) . "' class='extend' title='最后一页'>末页</a></span>";
  }
  }
  }

//浏览量
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
 
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//评论
function cleanr_theme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    
     <div id="comment-<?php comment_ID(); ?>">
     <div class="commenthead">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='36',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
      </div>
      

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?>
     
     <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('...等待审核') ?></em>
         <br />
      <?php endif; ?>
      </div>
      <div class="clear"></div>
     
     </div>
     

	<div class="commentbody">
      <?php comment_text() ?>

      <div class="reply2">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
     </div>

<?php } ?>