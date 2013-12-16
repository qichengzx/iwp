<?php 
function getOptions() {
    $options = get_option('z_options');
    if (!is_array($options)) {
        $options['meta_keywords'] = '';
        $options['meta_description']='';
        update_option('z_options', $options);
    }
    return $options;
}
/* 初始化 */
function init() {
    if(isset($_POST['input_save'])) {
        $options = getOptions();
        $options['meta_keywords'] = stripslashes($_POST['meta_keywords']);
        $options['meta_description']=stripcslashes($_POST['meta_description']);
        update_option('z_options', $options);
    } else {
        getOptions();
    }

    add_theme_page("主题选项", "主题选项", 'edit_themes', basename(__FILE__),  'display');
}

/* 界面 */
function display() {
    $options = getOptions();
?>
 
<form action="#" method="post" enctype="multipart/form-data" name="op_form" id="op_form">
    <div class="wrap">
        <h2>当前主题选项</h2>
        <div>
            <label>关键词</label><input name="meta_keywords" cols="50" rows="10" id="meta_keywords"><?php echo($options['meta_keywords']); ?></input>
        </div>
        <div>
            <label>描述</label><textarea name="meta_description" cols="50" rows="10" id="meta_description"><?php echo($options['meta_description']); ?></textarea>
        </div>
 
        <p class="submit">
            <input type="submit" name="input_save" value="保存" />
        </p>
    </div>
 
</form>
 
<?php
} 
    add_action('admin_menu', 'init');
?>