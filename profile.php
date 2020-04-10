<?php defined("APP") or die() // Public Profile ?>
<section>
	<div class="bundle-page panel panel-body panel-default">
		<div class="container">
			<div class="row info">
				<div class="col-md-2 thumb">
					<img src="<?php echo $user->avatar ?>" alt="<?php echo $user->username ?>'s Avatar" class="avatar pull-left">
				</div>
				<hr class="visible-sm visible-xs">
				<div class="col-md-10 url-info">
					<h2>
						<strong>@<?php echo $user->username ?></strong>
						<small class="pull-right"><?php echo e("Since") ?> <?php echo date("F, Y",strtotime($user->date)) ?></small>
					</h2>
					<p>
						<span><strong><?php echo $this->count("user_public_urls",$user->id) ?></strong><?php echo e("Public URLs") ?></span>
						<span><strong><?php echo $this->count("user_public_bundles",$user->id) ?></strong><?php echo e("Public Bundles") ?></span>
					</p>
					<p>

						<a href="<?php echo Main::href("profile/{$user->username}") ?>" class="btn btn-primary"><?php echo e("View Profile") ?></a>						
						<a href="#" class="btn btn-primary ajax_call" data-class="return-ajax" data-id="<?php echo base64_encode(Main::strrand(3).$user->id) ?>" data-active="active" data-action="bundles"><?php echo e("View Bundles") ?></a>	

					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<?php echo $this->ads(728,0) ?>
	<div class="container content addmargin">
		<div class="row" id="user-content">
			<div class="col-md-8">
				<div class="panel panel-default panel-body return-ajax" id="data-container">
					<h3><?php echo $heading ?></h3>
						<?php foreach ($urls as $url): ?>
							<?php include(TEMPLATE."/shared/public_url_loop.php") ?>
						<?php endforeach ?>
						<?php echo $pagination ?>	
				</div>	
			</div>
			<div class="col-md-4">
				<?php echo $this->widgets("social_count") ?>
				<?php echo $this->ads(300,0) ?>
			</div>
		</div>
	</div>
</section>