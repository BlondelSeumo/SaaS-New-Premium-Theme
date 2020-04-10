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

          <?php if($this->config["user"] && !$this->config["private"] && !$this->config["maintenance"]): ?>
            <h2><?php echo e("Don't have an account?")?></h2>
            <a href="<?php echo Main::href("user/register") ?>" class="btn btn-transparent-white btn-lg"><?php echo e("Create account") ?></a>
          <?php else: ?>
            <h2><?php echo e("A great tool for savvy marketers") ?></h2>
          <?php endif ?>          
        </div>      

        <div class="footer">
          <div class="row">
            <div class="col-md-5 col-sm-12">
              <?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.
            </div>
            <div class="col-md-7 hidden-sm text-right">                                      
              <?php foreach ($this->db->get("page", ["menu" => "1"], ["limit" => 4]) as $i => $page):?>                  
                <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
              <?php endforeach; ?>
              <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
            </div>
          </div>          
        </div>
      </div>

      <div class="right-side col-sm-8">
        <div class="centered form">      
          <?php echo Main::message() ?> 
          <form role="form" class="live_form form" id="login_form" method="post" action="<?php echo Main::href("user/login")?>">
            <div class="form-group">
              <label for="email"><?php echo e("Email or username") ?></label>
              <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
              <i class="ti-user hidden-sm hidden-md hidden-lg"></i>
            </div>
            <div class="form-group">
              <label for="pass"><?php echo e("Password")?></label>
              <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
              <i class="ti-eye"></i>
            </div>
            <p><?php echo Main::captcha() ?></p>
            <div class="form-group">
              <label>
                  <input type="checkbox" name="rememberme" value="1" data-class="aero">  
                  <span class="check-box"><?php echo e("Remember me")?></span>
              </label>
            </div>
            <?php echo Main::csrf_token(TRUE) ?>
            <button type="submit" class="btn btn-primary"><?php echo e("Login")?></button>  
            <small><a href="#forgot" id="forgot-password"><?php echo e("Forgot Password")?></a></small>
          </form>  

          <form role="form" class="live_form" id="forgot_form" method="post" action="<?php echo Main::href("user/forgot")?>">
            <div class="form-group">
              <label for="email1"><?php echo e("Email address")?></label>
              <input type="email" class="form-control" id="email1" placeholder="Enter email" name="email">
            </div>                 
            <p><?php echo Main::captcha() ?></p>
            <?php echo Main::csrf_token(TRUE) ?>
            <button type="submit" class="btn btn-primary"><?php echo e("Reset Password")?></button>
            <small><a href="<?php echo Main::href("user/login") ?>"><?php echo e("Back to login")?></a></small>
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