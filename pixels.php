<?php defined("APP") or die() // Settings Page ?>
<div class="row">	
  <div id="user-content" class="col-md-8">  	
  	<?php echo $this->ads(728) ?>
		<?php echo Main::message() ?>  			
		<div class="main-content panel panel-default panel-body">
			<h3><?php echo e("Tracking Pixels") ?></h3>
			<form action="<?php echo Main::href("user/pixels") ?>" role="form" method="post">
        <div class="row">
        	<div class="col-md-4">
        		<div class="form-group">
        			<label for="type" class="label-control"><?php echo e("Pixel Provider") ?></label>
        			<select name="type" id="type">
        				<option value="facebook">Facebook</option>
        				<option value="adwords">Adwords</option>
        				<option value="linkedin">LinkedIn</option>
        				<option value="twitter">Twitter</option>
        				<option value="adroll">AdRoll</option>
        			</select>
        		</div>
        	</div>
        	<div class="col-md-4">
        		<label for="name" class="label-control"><?php echo e("Pixel Name") ?></label>
        		<input type="text" value="" name="name" class="form-control" placeholder="e.g. Shopify Campaign" />
        	</div>
        	<div class="col-md-4">
						<label for="tag" class="label-control"><?php echo e("Pixel Tag") ?></label>
        		<input type="text" value="" name="tag" class="form-control" placeholder="e.g. Numerical or alphanumerical values only" />        	
        	</div>
        </div>
				<?php echo Main::csrf_token(TRUE) ?>
				<p><button type="submit" class="btn btn-primary"><?php echo e("Add Pixel")?></button></p>
			</form>
			<hr>
			<?php if(is_array($this->user->fbpixel)): ?>
				<h3><?php echo e("Facebook Pixels") ?></h3>
				<?php foreach ($this->user->fbpixel as $id => $fb): ?>
					<form action="<?php echo Main::href("user/pixels/save?id={$id}") ?>" method="post">
		        <div class="form-group">	
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Name")?></label>
									<input type="text" value="<?php echo $fb->name ?>" name="fbpixel[name]" class="form-control" placeholder="e.g. Shopify Campaign" />
								</div>						
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Tag")?></label>		
									<input type="text" value="<?php echo $fb->tag ?>" name="fbpixel[tag]" class="form-control" placeholder="e.g. 1234567890123456" />
								</div>						
								<div class="col-sm-4">
									<div class="btn-group addmargin">
										<button type="submit" class="btn btn-success"><?php echo e("Save") ?></button>
										<a href="<?php echo Main::href("user/pixels/delete?id={$id}&type=fbpixel") ?>" class="btn btn-danger delete"><?php echo e("Delete") ?></a>
									</div>
								</div>
							</div>
		        </div>			
	        </form>
				<?php endforeach ?>
				<hr>
			<?php endif ?>
			<?php if(is_array($this->user->adwordspixel)): ?>
				<h3><?php echo e("Adwords Pixels") ?></h3>
				<?php foreach ($this->user->adwordspixel as $id => $adw): ?>
					<form action="<?php echo Main::href("user/pixels/save?id={$id}") ?>" method="post">
		        <div class="form-group">	
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Name")?></label>
									<input type="text" value="<?php echo $adw->name ?>" name="adwordspixel[name]" class="form-control" placeholder="e.g. Shopify Campaign" />
								</div>						
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Tag")?></label>	
									<input type="text" value="<?php echo $adw->tag ?>" name="adwordspixel[tag]" class="form-control" placeholder="e.g. AW-12345678901/ABCDEFGHIJKLMOPQRST" />
								</div>	
								<div class="col-sm-4">
									<div class="btn-group addmargin">
										<button type="submit" class="btn btn-success"><?php echo e("Save") ?></button>
										<a href="<?php echo Main::href("user/pixels/delete?id={$id}&type=adwordspixel") ?>" class="btn btn-danger delete"><?php echo e("Delete") ?></a>
									</div>
								</div>													
							</div>
		        </div>				
		      </form>
				<?php endforeach ?>
				<hr>
			<?php endif ?>
			<?php if(is_array($this->user->linkedinpixel)): ?>
				<h3><?php echo e("LinkedIn Pixels") ?></h3>
				<?php foreach ($this->user->linkedinpixel as $id => $lkd): ?>
					<form action="<?php echo Main::href("user/pixels/save?id={$id}") ?>" method="post">
	        	<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Name")?></label>
									<input type="text" value="<?php echo $lkd->name ?>" name="linkedinpixel[name]" class="form-control" placeholder="e.g. Shopify Campaign" />
								</div>						
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Tag")?></label>
									<input type="text" value="<?php echo $lkd->tag ?>" name="linkedinpixel[tag]" class="form-control" placeholder="e.g. 123456" />
								</div>		
								<div class="col-sm-4">
									<div class="btn-group addmargin">
										<button type="submit" class="btn btn-success"><?php echo e("Save") ?></button>
										<a href="<?php echo Main::href("user/pixels/delete?id={$id}&type=adwordspixel") ?>" class="btn btn-danger delete"><?php echo e("Delete") ?></a>
									</div>
								</div>												
							</div>
		        </div>				
		      </form>
				<?php endforeach ?>
			<?php endif ?>
			<?php if(is_array($this->user->twitterpixel)): ?>
				<h3><?php echo e("Twitter Pixels") ?></h3>
				<?php foreach ($this->user->twitterpixel as $id => $tw): ?>
					<form action="<?php echo Main::href("user/pixels/save?id={$id}") ?>" method="post">
		        <div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Name")?></label>
									<input type="text" value="<?php echo $tw->name ?>" name="twitterpixel[name]" class="form-control" placeholder="e.g. Shopify Campaign" />
								</div>						
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Tag")?></label>
									<input type="text" value="<?php echo $tw->tag ?>" name="twitterpixel[tag]" class="form-control" placeholder="e.g. 123456789" />
								</div>
								<div class="col-sm-4">
									<div class="btn-group addmargin">
										<button type="submit" class="btn btn-success"><?php echo e("Save") ?></button>
										<a href="<?php echo Main::href("user/pixels/delete?id={$id}&type=adwordspixel") ?>" class="btn btn-danger delete"><?php echo e("Delete") ?></a>
									</div>
								</div>																			
							</div>
		        </div>			
	        </form>	
				<?php endforeach ?>		
				<hr>
			<?php endif ?>
			<?php if(is_array($this->user->adrollpixel)): ?>
				<h3><?php echo e("AdRoll Pixels") ?></h3>
				<?php foreach ($this->user->adrollpixel as $id => $adr): ?>
					<form action="<?php echo Main::href("user/pixels/save?id={$id}") ?>" method="post">
		        <div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Name")?></label>
									<input type="text" value="<?php echo $adr->name ?>" name="adrollpixel[name]" class="form-control" placeholder="e.g. Shopify Campaign" />
								</div>						
								<div class="col-sm-4">
									<label class="control-label"><?php echo e("Tag")?></label>
									<input type="text" value="<?php echo $adr->tag ?>" name="adrollpixel[tag]" class="form-control" placeholder="e.g. 12345678901/ABCDEFGHIJKLMOPQRST" />
								</div>	
								<div class="col-sm-4">
									<div class="btn-group addmargin">
										<button type="submit" class="btn btn-success"><?php echo e("Save") ?></button>
										<a href="<?php echo Main::href("user/pixels/delete?id={$id}&type=adwordspixel") ?>" class="btn btn-danger delete"><?php echo e("Delete") ?></a>
									</div>
								</div>
							</div>
		        </div>
		      </form>			
				<?php endforeach ?>
				<hr>
			<?php endif ?>
		</div>	
  </div><!--/#user-content-->
  <div id="widgets" class="col-md-4">
  	<?php echo $this->sidebar() ?>
		<div class="panel panel-default panel-body">
			<h3><?php echo e("What are tracking pixels?") ?></h3>
			<p><?php echo e("Ad platforms such as Facebook and Adwords provide a conversion tracking tool to allow you to gather data on your customers and how they behave on your website. By adding your pixel ID from either of the platforms, you will be able to optimize marketing simply by using short URLs.") ?></p>
		</div>
		<div class="panel panel-default panel-body">
			<h3><?php echo e("Facebook Pixel") ?></h3>
			<p><?php echo e("Facebook pixel makes conversion tracking, optimization and remarketing easier than ever. The Facebook pixel ID is usually composed of 16 digits. Please make sure to add the correct value otherwise events will not be tracked!") ?> </p>
			<p><code>e.g. 1234567890123456</code></p>
			<a href="https://www.facebook.com/business/a/facebook-pixel" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Learn more") ?></a>
		</div>		
		<div class="panel panel-default panel-body">
			<h3><?php echo e("Google Adwords Conversion Pixel") ?></h3>
			<p><?php echo e("With AdWords conversion tracking, you can see how effectively your ad clicks lead to valuable customer activity. The Adwords pixel ID is usually composed of AW followed by 11 digits followed by 19 mixed characters. Please make sure to add the correct value otherwise events will not be tracked!") ?></p>
			<p><code>e.g. AW-12345678901/ABCDEFGHIJKLMOPQRST</code></p>
			<a href="https://support.google.com/adwords/answer/1722054?hl=en" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Learn more") ?></a>
		</div>	
		<div class="panel panel-default panel-body">
			<h3><?php echo e("LinkedIn Insight Tag") ?></h3>
			<p><?php echo e("The LinkedIn Insight Tag is a piece of lightweight JavaScript code that you can add to your website to enable in-depth campaign reporting and unlock valuable insights about your website visitors.You can use the LinkedIn Insight Tag to track conversions, retarget website visitors, and unlock additional insights about members interacting with your ads.!") ?></p>
			<p><code>e.g. 123456</code></p>
			<a href="https://www.linkedin.com/help/linkedin/answer/65521" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Learn more") ?></a>
		</div>	
		<div class="panel panel-default panel-body">
			<h3><?php echo e("Twitter Pixel Tag") ?></h3>
			<p><?php echo e("Conversion tracking for websites enables you to measure your return on investment by tracking the actions users take after viewing or engaging with your ads on Twitter.") ?></p>
			<p><code>e.g. 123456789</code></p>
			<a href="https://business.twitter.com/en/help/campaign-measurement-and-analytics/conversion-tracking-for-websites.html" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Learn more") ?></a>
		</div>				
		<div class="panel panel-default panel-body">
			<h3><?php echo e("AdRoll Pixel Tag") ?></h3>
			<p><?php echo e("The AdRoll Pixel is uniquely generated when you create an AdRoll account. The AdRoll ID has two components: the Advertiser ID or adroll_adv_id (X) and Pixel ID or adroll_pix_id (Y) for the AdRoll Pixel. To use the adRoll pixel, merge the two components together, separating them by a slash (/).") ?></p>
			<p><code>e.g. adroll_adv_id/adroll_pix_id</code></p>
			<a href="https://help.adroll.com/hc/en-us/articles/211846018" target="_blank" class="btn btn-primary btn-xs"><?php echo e("Learn more") ?></a>
		</div>						
  </div><!--/#widgets-->
</div><!--/.row-->