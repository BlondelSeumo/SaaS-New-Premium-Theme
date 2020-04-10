<?php defined("APP") or die() ?>
<section class="section-plan" id="plan">
  <div class="container">
    <div class="feature-h text-center">
      <h1><?php echo e("Simple & Transparent Pricing.") ?></h1>
      <p class="subtitle"><?php echo e("Know what you pay with our clear pricing structure. No hidden fees.") ?></p>     
      <div class="toggle-container cf">
        <div class="switch-toggles">
          <div class="monthly"><?php echo e("Monthly") ?></div>
          <div class="yearly">
            <?php echo e("Yearly") ?>
            <?php if ($discountMax): ?>
              <span><?php echo e("Save") ?> <?php echo $discountMax ?>%</span>          
            <?php endif ?> 
          </div>
        </div>
      </div>           
    </div>
    <br>
    <?php echo Main::message() ?>
    <div class="row">
      <div id="price-tables">
        <div class="monthly cf">
          <?php foreach ($free as $plan): ?>
            <div class="price-table">
              <div class="table-inner text-center">    
                <?php if (isset($plan["icon"]) && !empty($plan["icon"])): ?>
                  <i class="<?php echo $plan["icon"] ?>"></i>         
                <?php endif ?>       
                <h3><?php echo e($plan["name"]) ?></h3>
                <div class="phrase"><?php echo e($plan["description"]) ?></div>
                <span class="price"><?php echo e("Free") ?></span>
                <ul class="feature-list">
                  <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Basic Features") ?></span></li>
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
                  <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Limited URL Customization") ?></span></li>
                  <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Advertisement") ?></span></li>          
                  <li>&nbsp;</li>
                </ul>
                <?php if($this->logged()): ?>
                  <?php if (!$this->pro()): ?>
                    <a class="btn btn-primary btn-round"><?php echo e("Current Plan") ?></a> 
                  <?php endif ?>
                <?php else: ?>
                  <a href="<?php echo Main::href("user/register") ?>" class="btn btn-secondary btn-round"><?php echo e("Get Started") ?></a> 
                <?php endif ?>               
              </div>
            </div>          
          <?php endforeach ?>          
          <?php foreach ($monthly as $plan): ?>
            <div class="price-table highlighted">
              <div class="table-inner text-center">
                <?php if (isset($plan["icon"]) && !empty($plan["icon"])): ?>
                  <i class="<?php echo $plan["icon"] ?>"></i>         
                <?php endif ?> 
                <h3><?php echo e($plan["name"]) ?></h3>
                <div class="phrase"><?php echo e($plan["description"]) ?></div>
                <span class="price"><?php echo Main::currency($this->config["currency"],$plan["price"]) ?></strong><span>/<?php echo e("mo") ?></span></span>
                <ul class="feature-list">
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
                </ul>
                <?php if ($this->logged() && $this->pro() && $this->user->planid == $plan["id"]): ?>
                    <a class="btn btn-primary btn-round"><?php echo e("Current Plan") ?></a> 
                <?php else: ?>
                  <a href="<?php echo Main::href("upgrade/monthly/{$plan["id"]}") ?>" class="btn btn-secondary btn-round"><?php echo e("Go Pro") ?></a>     
                <?php endif ?>                            
              </div>
            </div>          
          <?php endforeach ?>
        </div>

        <div class="yearly cf">
          <?php foreach ($free as $plan): ?>
            <div class="price-table">
              <div class="table-inner text-center">    
                <?php if (isset($plan["icon"]) && !empty($plan["icon"])): ?>
                  <i class="<?php echo $plan["icon"] ?>"></i>         
                <?php endif ?>          
                <h3><?php echo e($plan["name"]) ?></h3>
                <div class="phrase"><?php echo e($plan["description"]) ?></div>
                <span class="price"><?php echo e("Free") ?> <br></span>
                <p>&nbsp;</p>
                <ul class="feature-list">
                  <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Basic Features") ?></span></li>
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
                  <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Limited URL Customization") ?></span></li>
                  <li><i class="glyphicon glyphicon-ok"></i> <span><?php echo e("Advertisement") ?></span></li>          
                  <li>&nbsp;</li>
                </ul>
                <?php if($this->logged()): ?>
                  <?php if (!$this->pro()): ?>
                    <a class="btn btn-primary btn-round"><?php echo e("Current Plan") ?></a> 
                  <?php endif ?>
                <?php else: ?>
                  <a href="<?php echo Main::href("user/register") ?>" class="btn btn-secondary btn-round"><?php echo e("Get Started") ?></a> 
                <?php endif ?>               
              </div>
            </div>          
          <?php endforeach ?>          
          <?php foreach ($yearly as $plan): ?>
            <div class="price-table highlighted">
              <div class="table-inner text-center">
                <?php if (isset($plan["icon"]) && !empty($plan["icon"])): ?>
                  <i class="<?php echo $plan["icon"] ?>"></i>         
                <?php endif ?> 
                <h3><?php echo e($plan["name"]) ?></h3>
                <div class="phrase"><?php echo e($plan["description"]) ?></div>
                <span class="price"><?php echo Main::currency($this->config["currency"],number_format($plan["price"]/12,2)) ?><span>/<?php echo e("mo") ?></span><small class="billed"><?php echo e("Billed") ?> <?php echo Main::currency($this->config["currency"],$plan["price"]) ?></small></span>
                <p class="discount">
                  <?php if ($plan["discount"]): ?>
                    <span><?php echo e("Save") ?> <?php echo $plan["discount"] ?>%</span>                 
                  <?php endif ?>   
                </p>                              
                <ul class="feature-list">
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
                </ul>
                <?php if ($this->logged() && $this->pro() && $this->user->planid == $plan["id"]): ?>
                    <a class="btn btn-primary btn-round"><?php echo e("Current Plan") ?></a> 
                <?php else: ?>
                  <a href="<?php echo Main::href("upgrade/yearly/{$plan["id"]}") ?>" class="btn btn-secondary btn-round"><?php echo e("Go Pro") ?></a>     
                <?php endif ?>                            
              </div>
            </div>          
          <?php endforeach ?>
        </div>
      </div>       
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default panel-body">
          <div class="media">
            <div class="media-left">
              <i class="ti-star"></i>
            </div>
            <div class="media-body">
              <h4><?php echo e("Custom Splash Pages") ?></h4>
              <?php echo e("Create a custom landing page to promote your product or service on forefront and engage the user in your marketing campaign.") ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default panel-body">
          <div class="media">
            <div class="media-left">
              <i class="ti-layout-cta-right"></i>
            </div>
            <div class="media-body">
              <h4><?php echo e("Overlays") ?></h4>
              <?php echo e("Use our overlay tool to display unobtrusive notifications on the target website. A perfect way to send a message to your customers or run a promotion campaign.") ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default panel-body">
          <div class="media">
            <div class="media-left">
              <i class="ti-layout-grid3"></i>
            </div>
            <div class="media-body">
              <h4><?php echo e("Event Tracking") ?></h4>
              <?php echo e("Add your custom pixel from providers such as Facebook and track events right when they are happening.") ?>
            </div>
          </div>
        </div>                   
      </div>
    </div>    
  </div>
</section>
<section class="section-faq">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 faq-title">
        <h3 class="text-right feature-h">
          <span><?php echo e("Frequently Asked Questions") ?></span>        
        </h3>        
        <p><?php echo e("Have questions about our pricing?") ?> <strong><a href="<?php echo Main::href("contact") ?>"><?php echo e("Contact us") ?></a></strong></p>
      </div>
      <div class="col-sm-6">
        <?php if ($discountMax): ?>
          <div class="faq-list clearfix">
            <h2><span><i class="glyphicon glyphicon-gift"></i></span> <?php echo e("If I pay yearly, do I get a discount?") ?></h2>
            <p class="info"><?php echo e("Definitely! If you choose to pay yearly, not only will you make great use of premium features but also you will get a discount of up to $discountMax%.") ?></p>
          </div>                  
        <?php endif ?>      
        <div class="faq-list clearfix">
          <h2><span><i class="glyphicon glyphicon-flash"></i></span> <?php echo e("Can I upgrade my account at any time?") ?></h2>
          <p class="info"><?php echo e("Yes! You can start with our free package and upgrade anytime to enjoy premium features.") ?></p>
        </div>
        <?php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe"): ?>
          <div class="faq-list clearfix">
            <h2><span><i class="glyphicon glyphicon-credit-card"></i></span> <?php echo e("How will I be charged?") ?></h2>
            <p class="info"><?php echo e("You will be charged at the beginning of each period automatically until canceled.") ?></p>
          </div>           
        <?php else: ?>
          <div class="faq-list clearfix">
            <h2><span><i class="glyphicon glyphicon-credit-card"></i></span> <?php echo e("How will I be charged?") ?></h2>
            <p class="info"><?php echo e("You will be reminded to renew your membership 7 days before your expiration.") ?></p>
          </div>          
        <?php endif ?>
        <?php if (isset($this->config["pt"]) && $this->config["pt"] == "stripe"): ?>
          <div class="faq-list clearfix">
            <h2><span><i class="glyphicon glyphicon-log-in"></i></span> <?php echo e("How do refunds work?") ?></h2>
            <p class="info">
              <?php echo e("Upon request, we will issue a refund at the moment of the request for all <strong>upcoming</strong> periods. If you are on a monthly plan, we will stop charging you at the end of your current billing period. If you are on a yearly plan, we will refund amounts for the remaining months.") ?>            
            </p>
          </div>          
        <?php else: ?>
        <div class="faq-list clearfix">
          <h2><span><i class="glyphicon glyphicon-log-in"></i></span> <?php echo e("How do refunds work?") ?></h2>
          <p class="info">
            <?php echo e("Upon request, we will issue a refund at the moment of the request for all <strong>upcoming</strong> periods. You will just need to contact us and we will take care of everything.") ?>            
          </p>
        </div>       
        <?php endif ?>            
      </div>
    </div>           
  </div>          
</section>