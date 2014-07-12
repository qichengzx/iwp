<!--近期热门&最受欢迎-->
<div class="widget hot">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs entry-list" id="hot-nav-tabs">
		<li class="active"><a href="#home" data-toggle="tab" rel="nofollow">近期热门</a></li>
		<li><a href="#profile" data-toggle="tab" rel="nofollow">分类目录</a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="home">
			<dl class="panel-body">
				<?php simple_get_most_vieweds('8','15');?>
			</dl>
		</div>
		<div class="tab-pane" id="profile">
			<dl class="panel-body">
				<?php wp_list_cats('sort_column=name&hierarchical=0&list=0'); ?>
		    </dl>
		</div>
	</div>
</div>