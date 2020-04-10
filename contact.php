<?php defined("APP") or die() ?>
<section class="section-light">
  <div class="container">
    <h3 class="feature-h text-center"><?php echo e("Contact us") ?></h3>
    <ol class="breadcrumb text-center">
      <li><a href="<?php echo Main::href("") ?>"><?php echo e("Home") ?></a></li>
      <li class="active"><?php echo e("Contact us") ?></li>
    </ol>   
  </div>
</section>
<section>
	<div class="container">    
		<div class="row">
      <div class="col-sm-7">
        <div class="centered form full-width">      
          <?php echo Main::message() ?>
          <form role="form" class="live_form" method="post" action="<?php echo Main::href("contact")?>">
            <h3><?php echo e("Contact us") ?></h3>
            <p><?php echo e("If you have any questions, feel free to contact us on this page."); ?></p>
            <div class="form-group">
              <label for="name"><?php echo e("Name") ?></label>
              <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo e("Name") ?>" value="<?php echo ($this->logged() ? $this->user->username : "") ?>">             
            </div>
            <div class="form-group">
              <label for="email"><?php echo e("Email") ?> (<?php echo e("Required") ?>)</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo e("Email") ?>" value="<?php echo ($this->logged() ? $this->user->email : "") ?>" required>                
            </div>  
            <div class="form-group">
              <label for="message"><?php echo e("Message") ?> (<?php echo e("Required") ?>)</label>
              <textarea name="message" id="message" class="form-control" rows="10" placeholder="<?php echo e("Message") ?>" required></textarea>
            </div>          
            <p><?php echo Main::captcha() ?></p>
            <?php echo Main::csrf_token(TRUE) ?>
            <div class="submit-button">
              <button type="submit" class="btn btn-primary btn-round"><?php echo e("Contact us") ?></button>              
            </div>
          </form>        
        </div>        
      </div>
      <div class="col-sm-5">
        <div class="reachus">
          <?php if (!empty($this->config["facebook"]) || !empty($this->config["twitter"])): ?>
            <h3><?php echo e("We are social") ?></h3>
            <ul class="social-icons">
              <?php if (!empty($this->config["facebook"])): ?>
                <li><a href="<?php echo $this->config["facebook"] ?>" target="_blank"><i class="ti-facebook"></i></a></li>
              <?php endif ?>
              <?php if (!empty($this->config["twitter"])): ?>
                <li><a href="<?php echo $this->config["twitter"] ?>" target="_blank"><i class="ti-twitter"></i></a></li>
              <?php endif ?>               
            <?php endif ?>     
          </ul>          
          <?php getAddress() ?>          
        </div>
      </div>
    </div>
	</div>
</section>