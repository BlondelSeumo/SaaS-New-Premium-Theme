<?php defined("APP") or die() ?>
<section class="section-light">
	<div class="container">
		<h3 class="feature-h text-center"><?php echo e($page->name) ?></h3>
		<ol class="breadcrumb text-center">
		  <li><a href="<?php echo Main::href("") ?>"><?php echo e("Home") ?></a></li>
		  <li class="active"><?php echo e($page->name) ?></li>
		</ol>		
	</div>
</section>
<section>
	<div class="container content">
		<?php echo $this->ads(728,0) ?>		
		<div class="row main-content">
			<div class="col-md-8">				
				<div class="panel panel-body panel-default">
					<?php echo $this->page_replace($page->content) ?>
				</div>
			</div>
			<div class="col-md-4">
				<?php echo $this->ads(300,0) ?>
				<?php echo $this->widgets("social_count") ?>
			</div>
		</div>		
	</div>
</section>