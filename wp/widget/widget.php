<?php
class news extends WP_Widget{
	function news(){
		$widget_options = array('classname'=>'set_contact','description'=>'主题自带的最新文章');
		$this->WP_Widget( false,'主题小工具&nbsp;&nbsp;&nbsp;&nbsp;最新文章',$widget_options );
    }
	function widget($instance){
		include("tab.php");
?>
<?php
}
}
add_action('widgets_init',create_function('', 'return register_widget("news");'));