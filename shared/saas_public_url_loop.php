<?php defined("APP") or die() // This file is looped in each instances to show the URL. Please don't edit this file if you don't know what you are doing! ?>
<div class="url-list fix" id="url-container-<?php echo $url->id ?>" data-id="<?php echo $url->id ?>">
	<div class="url-info">
		<h3 class="title">
			<img src="https://www.google.com/s2/favicons?domain=<?php echo $url->url ?>" alt="Favicon">
			<a href="<?php echo $user->domain ?>/<?php echo $url->alias.$url->custom ?>" target="_blank"><?php echo Main::truncate(empty($url->meta_title)?$url->url:fixTitle($url->meta_title),50) ?></a>
		</h3>
		<p class="description"><?php echo $url->meta_description ?></p>
		<div class="short-url">
			<a href="<?php echo $user->domain ?>/<?php echo $url->alias.$url->custom ?>" target="_blank"><?php echo $user->domain ?>/<?php echo $url->alias.$url->custom ?></a>
			<a href="#copy" class="copy inline-copy" data-value="<?php echo $user->domain ?>/<?php echo $url->alias.$url->custom ?>"><?php echo e("Copy")?></a>							
			<p>
				<i class='glyphicon glyphicon-time'></i> <?php echo Main::timeago($url->date) ?>
				&nbsp;&nbsp;&bullet;&nbsp;&nbsp; <a href="<?php echo $user->domain ?>/<?php echo $url->alias.$url->custom ?>+" target="_blank"><strong><?php echo $url->click ?></strong> <?php echo e("Clicks") ?></a>
			</p>
		</div>
	</div>
</div><!-- /.url-list -->