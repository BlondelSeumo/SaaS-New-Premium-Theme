<?php defined("APP") or die() // Stats Page ?>
<section>
	<div class="stats-page panel panel-body panel-default">
		<div class="container">
			<div class="row info">
				<div class="col-md-3 thumb">
					<img src="<?php echo $url->short ?>/i" alt="">
				</div>
				<hr class="visible-sm visible-xs">
				<div class="col-md-9 url-info">
					<h2>
						<a href="<?php echo $url->url ?>" rel="nofollow"><?php echo $url->meta_title ? fixTitle($url->meta_title) : $url->url?></a>
						<small class="pull-right"><?php echo Main::timeago($url->date) ?></small>
						<span><?php echo $url->meta_description ?></span>
					</h2>
					<p>
						<span><strong><?php echo $url->click ?></strong><?php echo e("Total Clicks") ?></span>
						<span><strong><?php echo $url->unique ?></strong><?php echo e("Unique Clicks") ?></span>
					</p>
					<p>
						<a href="" class="copy-s inline-copy tooltip" data-content="<?php echo e("Copy Link") ?>" data-clipboard-text="<?php echo $this->config["url"] ?>/<?php echo $url->alias.$url->custom ?>"><i class="glyphicon glyphicon-link"></i></a>
						<a href="" class="copy-s inline-copy tooltip" data-content="<?php echo e("Copy QR Code") ?>" data-clipboard-text="<?php echo $this->config["url"] ?>/<?php echo $url->alias.$url->custom ?>/qr"><i class="glyphicon glyphicon-qrcode"></i></a>
						<a href="https://www.facebook.com/sharer.php?u=<?php echo $this->config["url"] ?>/<?php echo $url->alias.$url->custom ?>" class="btn btn-facebook u_share tooltip" data-content="<?php echo e("Share to") ?> Facebook"><i class="ti-facebook"></i></a>
						<a href="https://twitter.com/share?url=<?php echo $this->config["url"] ?>/<?php echo $url->alias.$url->custom ?>&amp;text=Check+out+this+url" class="btn btn-twitter u_share tooltip" data-content="<?php echo e("Share to") ?> Twitter""><i class="ti-twitter"></i></a>								
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php echo $this->ads(728) ?>
<section class="analytics">
	<div class="container">
		<div class="panel panel-default panel-body panel-alt">
			<div class="panel-heading">
				<div class="btn-group btn-group-xs pull-right">
					<a href="#" class="btn btn-gray chart_data active" data-value='d'><?php echo e("Daily") ?></a>			
					<a href="#" class="btn btn-gray chart_data" data-value='<?php echo json_encode(array("m",$url->alias.$url->custom,$url->click)) ?>'><?php echo e("Monthly") ?></a>
					<a href="#" class="btn btn-gray chart_data" data-value='<?php echo json_encode(array("y",$url->alias.$url->custom,$url->click)) ?>'><?php echo e("Yearly") ?></a>   				
				</div>
			</div>
			<div class="panel-body">
				<div id="url-chart" class="chart"></div>
			</div>
		</div>
	</div>
</section>
<section class="analytics">
	<div class="container">
		<div class="panel panel-dark panel-body panel-alt">
			<div class="row">
	      <div class="col-md-6">
	      	<div id="country" style="width:100%; height: 300px"></div>
	      </div>
	    	<div class="col-md-6">	
	    		<h3><?php echo e("Top Countries") ?></h3>
	    		<ol id="country-list"></ol>
	    	</div> 			    
			</div>	
		</div>			
	</div>	
</section>
<section class="analytics">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default panel-body panel-alt">
					<h3><span><?php echo e("Operating Systems")?></span></h3>
					<canvas style="width:99%;height:300px;" id="os"></canvas>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="panel panel-default panel-body panel-alt">
					<h3><span><?php echo e("Browsers")?></span></h3>
					<canvas style="width:99%;height:300px;" id="browsers"></canvas>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="analytics">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default panel-body">
					<h3><?php echo e("Referrers")?></h3>
					<ul id="referrer">      
			  	</ul>	
				</div>	
			</div>
			<div class="col-md-6">
				<div class="panel panel-default panel-body">
					<h3><?php echo e("Social Shares")?></h3>
					<div style="width:99%;height:300px;" id="social-shares"></div>
				</div>
			</div>
		</div>
	</div>
</section>