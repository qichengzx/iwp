<?php
include("theme_options.php");

//友情链接
add_filter('pre_option_link_manager_enabled', '__return_true' ); 

add_theme_support( 'post-thumbnails' ); //激活文章和页面的缩略图功能。
add_image_size('thumb', 400, 150, true);
add_image_size('sticky', 830, 250, true);
register_nav_menus(
	array(
         'header-menu' => __( '导航自定义菜单' ),
         'footer-menu' => __( '页角自定义菜单' )
    )
);

if ( ! function_exists( 'entry_cate' ) ) :
/**
 * 获取分类名
 * @since  1.0
 *
 * @return void
 */
function entry_cate() {
	/*$args = array()
	$defaults = array('tag' => 'span', 'class' => 'entry_cate');*/
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ') );
	if ( $categories_list ) {
		echo $categories_list;
	}

}
endif;

if ( ! function_exists( 'entry_date' ) ) :
/**
 * 获取文章发布时间
 * @since  1.0
 *
 * @return void
 */
function entry_date($echo = true) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', '' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;
if ( ! function_exists( 'entry_author' ) ) :
/**
 * 获取文章作者
 * @since  1.0
 *
 * @return void
 */
function entry_author() {
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', '' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;


if ( ! function_exists( 'entry_tags' ) ) :
/**
 * 获取文章标签
 * @since  1.0
 *
 * @return void
 */
function entry_tags(){
	$tag_list = get_the_tag_list( '', __( ', ', '' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}
}

endif;
if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'seobreadcrumbs' ) ) : 
/*
*	@since 面包屑导航
*	@return string
*
*/
function seobreadcrumbs() { 
	$separator = '&rsaquo;'; 
	$home = 'Home'; 
	echo '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb clearfix nobdr">'; 
	global $post; 
	echo ' <span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="我的博客首页">首页</a> </span> '; 
	$category = get_the_category(); 
	if ($category) { 
		foreach($category as $category) { 
			echo $separator . "<span typeof=\"v:Breadcrumb\"> <a rel=\"v:url\" property=\"v:title\" href=\"".get_category_link($category->term_id)."\" >$category->name</a> </span>"; 
		} 
	} 
	echo '</div>'; 
} 

endif;


/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function z_widgets_init() {
	register_sidebar( array(
		'name'          => __( '首页侧边栏', '' ),
		'id'            => 'sidebar-index',
		'description'   => __( '', '' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'z_widgets_init' );


?>
<?php
//投稿
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send')
{
if ( isset($_COOKIE["tougao"]) && ( time() - $_COOKIE["tougao"] ) < 120 )
{
wp_die('您投稿也太勤快了吧，先歇会儿,2分钟后再来投稿吧！');
}
// 表单变量初始化
$name = trim($_POST['tougao_authorname']);
$email = trim($_POST['tougao_authoremail']);
$site = trim($_POST['tougao_site']);
$title = strip_tags(trim($_POST['tougao_title']));
$category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
$content =  $_POST['tougao_content'];
$tags =    strip_tags(trim($_POST['tougao_tags']));
if(!empty($site)){
if(substr($site, 0, 7) != 'http://') $site= 'http://'.$site;
$author='<a href="'.$site.'" title="'.$name.'" target="_blank" rel="nofollow">'.$site.'</a>';
}else{
$author=$site;
}
$info='感谢: '.$name.'&nbsp;&nbsp;'.'投稿'.'&nbsp;&nbsp;';
$post_link='文章来源: '.$author."\n\n";
 
global $wpdb;
$db="SELECT post_title FROM $wpdb->posts WHERE post_title = '$title' LIMIT 1";
if ($wpdb->get_var($db)){
wp_die('发现重复文章.你已经发表过了.或者存在该文章');
}
// 表单项数据验证
if ($name == '')
{
wp_die('昵称必须填写，且长度不得超过20个字');
}
elseif(mb_strlen($name,'UTF-8') > 20 )
{
wp_die('你的名字怎么这么长啊，起个简单易记的吧，长度不要超过20个字哟!');
}
elseif($title == '')
{
wp_die('文章标题必须填写，长度6到50个字之间');
}
elseif(mb_strlen($title,'UTF-8') > 50 )
{
wp_die('文章标题太长了，长度不得超过50个字');
}
elseif(mb_strlen($title,'UTF-8') < 6 )
{
wp_die('文章标题太短了，长度不得少于过6个字');
}
elseif ($email ==''|| !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
{
wp_die('Email必须填写，必须符合Email格式');
}
elseif ($content == '')
{
wp_die('内容必须填写，不要太长也不要太短,300到10000个字之间');
}
elseif (mb_strlen($content,'UTF-8') >10000)
{
wp_die('你也太能写了吧，写这么多，别人看着也累呀，300到10000个字之间');
}
elseif (mb_strlen($content,'UTF-8') < 300)
{
wp_die('太简单了吧，才写这么点，再加点内容吧，300到10000个字之间');
}
elseif ($tags == '')
{
wp_die('不要这么懒吗，加个标签好人别人搜到你的文章，长度在2到20个字！');
}
elseif (mb_strlen($tags,'UTF-8') < 2)
{
wp_die('不要这么懒吗，加个标签好人别人搜到你的文章，长度在2到20个字！');
}
elseif (mb_strlen($tags,'UTF-8') > 40)
{
wp_die('标签不用太长，长度在2到40个字就可以了！');
}
elseif ($site == '')
{
wp_die('请留下贵站名称，要不怎么宣传呀，这点很重要哦！');
}
elseif ($site == '')
{
wp_die('请填写原文链接，好让其他人浏览你的网站，这是最重要的宣传方式哦！');
}
else{
$post_content = $info.$post_link.'<br />'.$content;
 
$tougao = array(
'post_title' => $title,
'post_content' => $post_content,
'tags_input'    =>$tags,
'post_status' => 'pending', //publish
'post_category' => array($category)
);
// 将文章插入数据库
$status = wp_insert_post( $tougao );
if ($status != 0)
{
setcookie("tougao", time(), time()+1);
echo ('<div style="text-align:center;">'.'<title>'.'WordPress UED'.'</title>'.'</div>');
echo ('<div style="text-align:center;">'.'<meta http-equiv="refresh" content="5;URL=http://wpued.com">'.'</div>');
echo ('<div style="position:relative;font-size:14px;margin-top:100px;text-align:center;">'.'投稿成功，感谢投稿，5秒钟后将返回WPUED首页！'.'</div>');
echo ('<div style="position:relative;font-size:20px;margin-top:30px;text-align:center;">'.'<a href="/" >'.'立即返回WPUED首页'.'</a>'.'</div>');
die();
}
else
{
wp_die('投稿失败！');
}
}
}

//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}


// 年度排行
function simple_get_most_vieweds($posts_num=8, $days=360){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
           FROM $wpdb->posts
           WHERE post_type = 'post' AND post_status = 'publish' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<dd><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >".cut_str($post->post_title,33)."</a></dd>";
    }
    echo $output;
}

function catch_that_image(){
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] ;
	if(empty($first_img)){ //Defines a default image
		$first_img ="0";
	}
	return $first_img;
};

//文章归档
function archives_list_SHe() {
     global $wpdb,$month;
     $lastpost = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC LIMIT 1");
     $output = get_option('SHe_archives_'.$lastpost);
     if(empty($output)){
         $output = '';
         $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'SHe_archives_%'");
         $q = "SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM $wpdb->posts p WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
         $monthresults = $wpdb->get_results($q);
         if ($monthresults) {
             foreach ($monthresults as $monthresult) {
             $thismonth    = zeroise($monthresult->month, 2);
             $thisyear    = $monthresult->year;
             $q = "SELECT ID, post_date, post_title, comment_count FROM $wpdb->posts p WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_date AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC";
             $postresults = $wpdb->get_results($q);
             if ($postresults) {
                 $text = sprintf('%s %d', $month[zeroise($monthresult->month,2)], $monthresult->year);
                 $postcount = count($postresults);
                 $output .= '<dl class="archives-list"><dt>' . $text . ' &nbsp;(' . count($postresults) . '&nbsp;' . __('篇文章','freephp') . ')</dt>' . "\n";
             foreach ($postresults as $postresult) {
                 if ($postresult->post_date != '0000-00-00 00:00:00') {
                 $url = get_permalink($postresult->ID);
                 $arc_title    = $postresult->post_title;
                 if ($arc_title)
                     $text = wptexturize(strip_tags($arc_title));
                 else
                     $text = $postresult->ID;
                     $title_text = __('View this post','freephp') . ', &quot;' . wp_specialchars($text, 1) . '&quot;';
                     $output .= '<dd>' . mysql2date('d日', $postresult->post_date) . ':&nbsp;' . "<a href='$url' title='$title_text'>$text</a>";
                     $output .= '&nbsp;(' . $postresult->comment_count . ')';
                     $output .= '</dd>' . "\n";
                 }
                 }
             }
             $output .= '</dl>' . "\n";
             }
         update_option('SHe_archives_'.$lastpost,$output);
         }else{
             $output = '<div class="errorbox">'. __('Sorry, no posts matched your criteria.','freephp') .'</div>' . "\n";
         }
     }
     echo $output;
 }

//分页
function kriesi_pagination($query_string){
    global $posts_per_page, $paged;
    $my_query = new WP_Query($query_string ."&posts_per_page=-1");
    $total_posts = $my_query->post_count;
    if(empty($paged))$paged = 1;
    $prev = $paged - 1;
    $next = $paged + 1;
    $range = 10; // only edit this if you want to show more page-links
    $showitems = ($range * 2)+1;
    $pages = ceil($total_posts/$posts_per_page);
    if(1 != $pages){
        echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";
        echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";
       
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";
        echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";
    }
}


//自动生成版权时间
function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
    }
?>