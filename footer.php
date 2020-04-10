<?php defined("APP") or die() // Footer ?>
  <?php if ($this->isUser): // Show user page footer ?>
              <footer class="appmain">
                <div class="row">
                  <div class="col-sm-5">
                    <?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.
                  </div>
                  <div class="col-sm-7 text-right">                                      
                    <?php foreach ($pages as $page):?>        
                      <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
                    <?php endforeach; ?>
                    <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a> 
                    <div class="languages">
                      <a href="#lang" class="active" id="show-language"><i class="ti-world"></i> <?php saasCurrentLang() ?></a>
                      <div class="langs">
                        <?php echo $this->lang(0) ?>
                      </div>          
                    </div>                      
                  </div>
                </div>
            </footer>  
          </div><!--/.content-->
        </div><!--/.row-->
      </div><!--/.container-->      
    </section>
  <?php else: // Show general footer ?>
    <?php if ($this->footerShow): ?>
      <footer class="main">
        <div class="container">
          <?php if (!empty($this->config["logo"])): ?>
            <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>">
          <?php else: ?>
            <h2><?php echo $this->config["title"] ?></h2>
          <?php endif ?>
          <p class="description"><?php echo $this->config["description"] ?></p>
          <ul class="social-icons">
            <?php if (!empty($this->config["facebook"])): ?>
              <li><a href="<?php echo $this->config["facebook"] ?>" target="_blank"><i class="ti-facebook"></i></a></li>
            <?php endif ?>
            <?php if (!empty($this->config["twitter"])): ?>
              <li><a href="<?php echo $this->config["twitter"] ?>" target="_blank"><i class="ti-twitter"></i></a></li>
            <?php endif ?>                
          </ul>
          <div class="row">
            <div class="col-sm-5">
              <p><?php echo date("Y") ?> &copy; <?php echo $this->config["title"] ?>.</p>
            </div>
            <div class="col-sm-7 text-right">
              <?php foreach ($pages as $page):?>        
                <a href='<?php echo $this->config["url"]?>/page/<?php echo $page->seo ?>' title='<?php echo e($page->name)?>'><?php echo e($page->name)?></a>
              <?php endforeach; ?>
              <a href='<?php echo $this->config["url"]?>/contact' title='<?php echo e("Contact")?>'><?php echo e("Contact")?></a>
              <div class="languages">
                <a href="#lang" id="show-language"><i class="ti-world"></i> <?php saasCurrentLang() ?></a>
                <div class="langs">
                  <?php echo $this->lang(0) ?>
                </div>          
              </div>                            
            </div>
          </div>
        </div>
      </footer>      
    <?php endif ?>
  <?php endif ?>   
  <script type="text/javascript">
    <?php 
      $js_lang = [
        "del" => e("Delete"),
        "url" => e("URL"),
        "count" => e("Country"),
        "copied"  =>  e("Copied"),
        "geo" => e("Geotargeting data for"),
        "error" => e('Please enter a valid URL.'),
        "success" => e('URL has been successfully shortened. Click Copy or CRTL+C to Copy it.'),
        "stats" => e('You can access the statistic page via this link'),
        "copy" => e('Copied to clipboard.'),
        "from" => e('Redirect from'),
        "to" => e('Redirect to'),
        "share" => e('Share this on'),
        "congrats"  => e('Congratulation! Your URL has been successfully shortened. You can share it on Facebook or Twitter by clicking the links below.'),
        "qr" => e('Save QR Code'),
        "continue"  =>  e("Continue"),
        "cookie" => e("This website uses cookies to ensure you get the best experience on our website."),
        "cookieok" => e("Got it!"),
        "cookiemore" => e("Learn more"),
        "typed" => [e("Marketers."), e("Influencers."), e("Youtubers."), e("Artists."), e("Corporate."), e("Everyone.")]
      ];
    ?>
    var lang = <?php echo json_encode($js_lang) ?>;
  </script>  
	<?php Main::enqueue('footer') ?>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->theme("assets/js/main.js") ?>"></script>
	</body>
</html>