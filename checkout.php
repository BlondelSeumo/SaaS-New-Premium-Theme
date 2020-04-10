<?php defined("APP") or die() ?>
<section class="section-checkout">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
	      <div class="panel panel-default">
          <div class="panel-body text-center">
          	<?php $plan = saasGetPlan($this->do, $this->id); ?>
            <h3><?php echo e($plan["name"]) ?></h3>
            <ul class="f-list text-left">
              <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Premium Features") ?></span></li>
              <li><i class="glyphicon glyphicon-ok"></i> <span><strong><?php echo $plan["urls"]== "0" ? e("Unlimited") : $plan["urls"] ?></strong> <?php echo e("URLs allowed") ?></span></li>               
              <?php if ($plan["permission"]->splash->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><strong><?php echo ($plan["permission"]->splash->count == "0" ? e("Unlimited") : $plan["permission"]->splash->count)?></strong> <?php echo e("Custom Splash Pages"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Custom Splash Pages"); ?></span></li>
              <?php endif ?>
              <?php if ($plan["permission"]->overlay->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><strong><?php echo ($plan["permission"]->overlay->count == "0" ? e("Unlimited") : $plan["permission"]->overlay->count)?></strong> <?php echo e("Custom Overlay Pages"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Custom Overlay Pages"); ?></span></li>                    
              <?php endif ?>         
              <?php if ($plan["permission"]->pixels->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><strong><?php echo ($plan["permission"]->pixels->count == "0" ? e("Unlimited") : $plan["permission"]->pixels->count)?></strong> <?php echo e("Event Tracking"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Event Tracking"); ?></span></li>                                     
              <?php endif ?>                 
              <?php if ($plan["permission"]->domain->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><strong><?php echo ($plan["permission"]->domain->count == "0" ? e("Unlimited") : $plan["permission"]->domain->count)?></strong> <?php echo e("Custom Domains"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Custom Domains"); ?></span></li> 
              <?php endif ?>
              <?php if ($plan["permission"]->geo->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Geotargeting"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Geotargeting"); ?></span></li>
              <?php endif ?>
              <?php if ($plan["permission"]->device->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Device Targeting"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Device Targeting"); ?></span></li>
              <?php endif ?>    
              <?php if ($plan["permission"]->export->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Export Data") ?></span></li> 
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Export Data"); ?></span></li>
              <?php endif ?>                 
              <?php if ($plan["permission"]->api->enabled): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Developer API"); ?></span></li>
              <?php else: ?>
                <li class="disabled"><i class="glyphicon glyphicon-remove"></i> <span><?php echo e("Developer API"); ?></span></li>
              <?php endif ?>                                                  
              <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("URL Customization") ?></span></li>                   
              <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("No Advertisements") ?></span></li>
              <?php if (!empty($plan["permission"]->custom)): ?>
                <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e($plan["permission"]->custom); ?></span></li>
              <?php endif ?>  
							<li class="total"><strong><?php echo e("Total") ?> <span class="pull-right"><?php echo Main::currency($this->config["currency"],$price) ?> / <?php echo e($this->do) ?></span></strong></li>              
            </ul>   
						<?php if ($this->config["pt"] == "stripe"): ?>
							<p class="info">
								<?php echo e("Next payment will be automatically charged at the beginning of each period.") ?>
							</p>
						<?php endif ?>                                  
          </div>
	      </div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3><?php echo e("Checkout") ?></h3>
						<form action="<?php echo Main::href("upgrade/{$this->do}/{$this->id}") ?>" method="post" id="payment-form">
						<div class="form-group">
								<label for="name"><?php echo e("Full Name") ?></label>
								<input type="text" class="form-control" id="name" name="name" placeholder="e.g. John Smith" required>
							</div>							
							<div class="form-group">
								<label for="address"><?php echo e("Address") ?></label>
								<input type="text" class="form-control" id="address" name="address" placeholder="e.g. 111 Apple St." required>
							</div>
							<div class="row">
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="city"><?php echo e("City") ?></label>
										<input type="text" class="form-control" id="city" name="city" placeholder="e.g. New York" required>
									</div>									
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="state"><?php echo e("State/Province") ?></label>
										<input type="text" class="form-control" id="state" name="state" placeholder="e.g. NY" required>
									</div>										
								</div>
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="country"><?php echo e("Country") ?></label>
										<select name="country" id="country" required>
											<?php echo Main::countries($this->country()) ?>
										</select>
									</div>									
								</div>								
								<div class="col-md-3 col-xs-6">
									<div class="form-group">
										<label for="zip"><?php echo e("Zip/Postal code") ?></label>
										<input type="text" class="form-control" id="zip" name="zip" placeholder="e.g. 44205" required>
									</div>										
								</div>								
							</div>	
							<br>					
							<?php echo Main::csrf_token(TRUE) ?>
							<?php if(isset($this->config["pt"]) && $this->config["pt"] == "stripe"): ?>
							<script
						    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						    data-key="<?php echo $this->config["stpk"] ?>"
						    data-amount="<?php echo $price*100 ?>"
						    data-email="<?php echo $this->user->email ?>"
						    data-name="<?php echo $this->config["title"] ?>"
						    data-description="<?php echo $term." - ".$text ?>"
						    data-image="<?php echo $logo ?>"
						    data-locale="auto"
						    data-currency="<?php echo strtolower($this->config["currency"]) ?>">
						  </script>								
							<?php else: ?>
								<button class="btn btn-secondary btn-round" type="submit"><?php echo e("Pay with PayPal") ?></button>
							<?php endif; ?>
						</form>
					</div>
				</div>
				<?php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe"): ?>
					<p><img src="<?php echo Main::fstatic("img/powered_by_stripe.png") ?>" alt="Stripe" class="pull-right"></p>				
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>