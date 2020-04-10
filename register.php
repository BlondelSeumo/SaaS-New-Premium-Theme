<?php defined("APP") or die() ?>
<section class="section-full-page">
  <div class="container-fluid">
    <div class="row">
      <div class="left-side col-sm-4">
        <a class="navbar-brand" href="<?php echo $this->config["url"] ?>">
          <?php if (!empty($this->config["logo"])): ?>
          <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>">
          <?php else: ?>
            <?php echo $this->config["title"] ?>
          <?php endif ?>
        </a>        
        <div class="inner-text text-center">
            <h2><?php echo e("Already have an account?")?></h2>
            <a href="<?php echo Main::href("user/login") ?>" class="btn btn-transparent-white btn-lg"><?php echo e("Login") ?></a>
        </div>      

        <div class="footer">
          <div class="row">
            <div class="col-md-5">
              <?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.
            </div>
            <div class="col-md-7 text-right">                                      
              <?php foreach ($this->db->get("page", ["menu" => "1"]) as $i => $page):?>   
                <?php if ($i == 4) break; ?>                       
                <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
              <?php endforeach; ?>
              <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
            </div>
          </div>          
        </div>
      </div>

      <div class="right-side col-sm-8">
        <div class="centered form">      
          <div class="site_logo hidden-sm hidden-md hidden-lg">
            <?php if (!empty($this->config["logo"])): ?>
              <a href="<?php echo $this->config["url"] ?>"><img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>"></a>
            <?php else: ?>
              <h3><a href="<?php echo $this->config["url"] ?>"><?php echo $this->config["title"] ?></a></h3>
            <?php endif ?>
          </div>          
          <?php echo Main::message() ?> 
          <form role="form" class="live_form" id="login_form" method="post" action="<?php echo Main::href("user/register")?>">
            <div class="form-group">
              <label for="name"><label><?php echo e("Username") ?></label></label>
              <input type="text" class="form-control" id="name" placeholder="<?php echo e("Please enter a username") ?>" name="username" value="<?php echo Main::get("username") ?>">
            </div>        
            <div class="form-group">
              <label for="email"><?php echo e("Email address")?></label>
              <input type="email" class="form-control" id="email" placeholder="<?php echo e("Please enter a valid email.") ?>" name="email" value="<?php echo Main::get("email") ?>">
            </div>
            <div class="form-group">
              <label for="pass"><?php echo e("Password")?></label>
              <input type="password" class="form-control" id="pass" placeholder="<?php echo e("Please enter a valid password.") ?>" name="password">
            </div>     
            <div class="form-group">
              <label for="pass2"><?php echo e("Confirm Password")?></label>
              <input type="password" class="form-control" id="pass2" placeholder="<?php echo e("Please confirm your password.") ?>" name="cpassword">
            </div>  
            <p><?php echo Main::captcha() ?></p>
            <div class="form-group">
              <label>
                  <input type="checkbox" name="terms" value="1" data-class="aero">  
                  <span class="check-box"><?php echo e("I agree to the")?> <a href="<?php echo $this->config["url"] ?>/page/terms" target="_blank"><?php echo e("terms and conditions")?></a>.</span>
              </label>
            </div>          
            <?php echo Main::csrf_token(TRUE) ?>
            <button type="submit" class="btn btn-primary"><?php echo e("Create account")?></button>
          </form>   

          <?php if(!$this->config["private"] && !$this->config["maintenance"] && $this->config["user"] && ($this->config["fb_connect"] || $this->config["tw_connect"] || $this->config["gl_connect"])):?>
            <div class="social">
              <h3><?php echo e("Login using a social network") ?></h3>
              <?php if($this->config["fb_connect"]):?>
              <a href="<?php echo $this->config["url"]?>/user/login/facebook" class="btn btn-facebook btn-full-round"><i class="ti-facebook"></i></a>
              <?php endif;?>
              <?php if($this->config["tw_connect"]):?>
              <a href="<?php echo $this->config["url"]?>/user/login/twitter" class="btn btn-twitter btn-full-round"><i class="ti-twitter"></i></a>
              <?php endif;?>
              <?php if($this->config["gl_connect"]):?>
              <a href="<?php echo $this->config["url"]?>/user/login/google" class="btn btn-google btn-full-round"><i class="ti-google"></i></a>
              <?php endif;?>          
            </div>
          <?php endif;?>                 
        </div>                       
      </div>
    </div>
  </div>
</section>