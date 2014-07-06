<?php
$themename = "qichengzx";
$shortname = "z";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$options = array ( 
array( "name" => $themename." Options",
       "type" => "title"),


//首页布局设置开始

    array( "type" => "close"),
    array( "name" => "Logo",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "是否显示logo",
            "desc" => "在导航栏显示logo,不填为显示网站标题，上传至本主题目录即可",
            "id" => $shortname."_logo",
            "type" => "text",
            "std" => ""),

    array( "type" => "close"),
    array( "name" => "是否显示微信",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "是否显示微信",
            "desc" => "上传至本主题目录即可",
            "id" => $shortname."_qrcode",
            "type" => "text",
            "std" => "qrcode.jpg"),

    array( "type" => "close"),
    array( "name" => "最新评论",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "是否显示最新评论",
            "desc" => "",
            "id" => $shortname."_comments",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),



    array( "type" => "close"),
    array( "name" => "年度排行",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "是否显示年度排行",
            "desc" => "",
            "id" => $shortname."_hotlist",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),

    array( "type" => "close"),
    array( "name" => "活跃读者",
           "type" => "section"),
    array(  "name" => "是否显示活跃读者",
            "desc" => "",
            "id" => $shortname."_hotreader",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),

    array( "type" => "close"),
    array( "name" => "网站统计",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "是否显示网站统计，文章，分类，标签等数量统计",
            "desc" => "",
            "id" => $shortname."_tj",
            "type" => "select",
            "std" => "显示",
            "options" => array("显示", "关闭")),

    array( "type" => "close"),
    array( "name" => "网站安装日期",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "网站安装日期",
            "desc" => "用于底部显示网站运行时间，格式（2013-05-06），当前日期为".date("Y-m-d",time()),
            "id" => $shortname."_time",
            "type" => "text",
            "std" => ""),
  /*  

//顶部热点文章设置开始

    

//侧边推荐栏目设置开始

    array( "type" => "close"),
    array( "name" => "侧边推荐栏目设置",
           "type" => "section"),
    array( "type" => "open"),
        
    array(  "name" => "输入推荐栏目分类ID",
            "desc" => "输入分类ID，显示更多的分类请用英文逗号＂,＂把ID号隔开",
            "id" => $shortname."_cat_h",
            "type" => "text",
            "std" => "1,2,3,4"),

//侧边推荐文章设置

    array( "type" => "close"),
    array( "name" => "侧边推荐文章设置",
           "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "输入显示的分类ID",
            "desc" => "多个ID用英文逗号＂,＂隔开",
            "id" => $shortname."_s_cat",
            "type" => "text",
            "std" => "1,2,3"),

    array(  "name" => "输入显示的篇数",
            "desc" => "默认20篇",
            "id" => $shortname."_s_cat_n",
            "type" => "text",
            "std" => "20"),


*/ 

//SEO设置

    array( "type" => "close"),
    array( "name" => "网站SEO设置及流量统计",
            "type" => "section"),
    array( "type" => "open"),

    array(  "name" => "首页描述（Description）",
            "desc" => "",
            "id" => $shortname."_description",
            "type" => "textarea",
            "std" => "输入你的网站描述，一般不超过200个字符"),
    array(  "name" => "首页关键词（Keywords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "输入你的网站关键词"),



);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
            }

            foreach ($options as $value) {
                if( isset( $_REQUEST[ $value['id'] ] ) ) { 
                    update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
                } else { 
                    delete_option( $value['id'] ); 
                } 
            }
            header("Location: admin.php?page=theme_options.php&saved=true");
            die;

        }else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); 
            }
            header("Location: admin.php?page=theme_options.php&reset=true");
            die;

        }
    }
    add_theme_page($themename." Options", "主题设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
    $file_dir=get_bloginfo('template_directory');
    wp_enqueue_style("functions", $file_dir."/includes/options/options.css", false, "1.0", "all");
    //wp_enqueue_script("rm_script", $file_dir."/includes/options/rm_script.js", false, "1.0");
}
function mytheme_admin() {
    global $themename, $shortname, $options;
    $i=0;
    if ( $_REQUEST['saved'] ) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';}
    if ( $_REQUEST['reset'] ) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';} 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> 主题设置</h2>
<p>当前使用主题: 启程 | 设计者:<a href="http://www.qicheng.me" target="_blank">启程</a> <font style="font-size:20px;"color=#ff0000><strong> &hearts; </strong></font> <font color="#000">捐助我，支付宝：<font color=#21759b><strong>qichengzx@hotmail.com</strong></font></font></p>
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
    switch ( $value['type'] ) {
        case "open":
        break;
        case "close":
?>
</div>
</div>
<?php break;
    case "title":
?>
<?php break;
    case 'text':
?>
<div class="rm_input rm_text clearfix">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
    <small><?php echo $value['desc']; ?></small>
</div>
<?php
    break;
    case 'textarea':
?>

    <div class="rm_input rm_textarea clearfix">
        <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
        <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
        <small><?php echo $value['desc']; ?></small>
    </div>
  
<?php
    break;
    case 'select':
?>

<div class="rm_input rm_select clearfix">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
    <?php foreach ($value['options'] as $option) { ?>
        <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
    <?php } ?>
    </select>
    <small><?php echo $value['desc']; ?></small>
</div>
<?php
    break;
    case "checkbox":
?>

<div class="rm_input rm_checkbox clearfix">
    <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
    <small><?php echo $value['desc']; ?></small>
 </div>
<?php break; 
    case "section":
    $i++;
?>
<div class="rm_section">
    <div class="rm_title clearfix">
        <h3><img src="<?php bloginfo('template_directory')?>/includes/options/clear.png" class="inactive" alt=""><?php echo $value['name']; ?></h3>
    </div>
    <div class="rm_options">
        <span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="btn" value="保存设置" /></span>
<?php 
    break;
    }
}
?>
<?php
function show_id() {
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) { 
        $output = '<ul>'.$category->name."&nbsp;&nbsp;ID= <em>".$category->term_id.'</em> </ul>';
        echo $output;
    }
}
?>
<!-- <span class="show_id"><h4>站点所有分类ID</h4><?php show_id();?></span> -->
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
    <p class="submit">
        <input name="reset" type="submit" value="恢复默认设置"  class="btn" />
        <input type="hidden" name="action" value="reset" />
    </p>
</form>
<p>提示：此按钮将恢复主题初始状态，您的所有设置将消失！</p>
</div>
<?php
}
?>
<?php
function mytheme_wp_head() { 
    $stylesheet = get_option('swt_alt_stylesheet');
    if($stylesheet != ''){?>
        <link href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" />
<?php }
} 
add_action('wp_head', 'mytheme_wp_head');
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>