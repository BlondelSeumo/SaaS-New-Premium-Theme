<?php defined("APP") or die() // Main Page ?>  
<section class="section-featured">
  <svg id="heroback">
    <defs>
      <linearGradient id="grad1" x1="0%" y1="0%" x2="80%" y2="0%">
        <stop offset="0%" style="stop-color:var(--color-stop-1);stop-opacity:1" />
        <stop offset="100%" style="stop-color:var(--color-stop-2);stop-opacity:1" />        
      </linearGradient>
    </defs>    
    <path d="M 1049.9932250976562 253.27206420898438 C 1049.9932250976562 464.46495701693016 927.4027099609375 1071.3050537109375 747.8369750976562 946.8558349609375 C 646.2172241210938 876.427490234375 192.1222686767578 729.349609375 187.61318969726562 528.688720703125 C 183.61166381835938 350.6175842285156 19.458803176879883 269.17242431640625 63.39866638183594 55.160675048828125 C 95.57649230957031 -101.56306457519531 1049.9932250976562 42.07917140103859 1049.9932250976562 253.27206420898438 Z" stroke-width="0" stroke="#000000" fill="url(#grad1)" transform="matrix(1 0 0 1 -20.2864 -92.3031)"></path>  
  </svg>   
  <svg id="hero">
    <defs>
      <linearGradient id="grad2" x1="0%" y1="0%" x2="80%" y2="0%">
        <stop offset="0%" style="stop-color:var(--color-stop-1);stop-opacity:1" />
        <stop offset="100%" style="stop-color:var(--color-stop-2);stop-opacity:1" />
      </linearGradient>
    </defs>    
    <path d="M 1049.9932250976562 253.27206420898438 C 1049.9932250976562 464.46495701693016 927.4027099609375 1071.3050537109375 747.8369750976562 946.8558349609375 C 646.2172241210938 876.427490234375 192.1222686767578 729.349609375 187.61318969726562 528.688720703125 C 183.61166381835938 350.6175842285156 19.458803176879883 269.17242431640625 63.39866638183594 55.160675048828125 C 95.57649230957031 -101.56306457519531 1049.9932250976562 42.07917140103859 1049.9932250976562 253.27206420898438 Z" stroke-width="0" stroke="#000000" fill="url(#grad2)" transform="matrix(1 0 0 1 -20.2864 -92.3031)"></path>  
  </svg>  
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <span class="hero-icon"><i class="ti-link"></i></span>
        <h2><?php echo e("A simple link <br>but a  powerful tool<br> for") ?> <span class="forPeople"></span></h2>
        <p><?php echo e("Our tool allows you to seamlessly track your audience with simple and easy-to-remember yet powerful links and provide your customers a unique tailored experience.") ?></p>

          <div class="shortener-simple">
            <div class="share-this"></div>
            <div class="ajax"></div>
            <form action="<?php echo Main::href("shorten") ?>" id="main-form" role="form" method="post">
              <div class="main-form">
                <div class="row" id="single">
                  <div class="col-sm-11">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                      <input type="text" class="form-control main-input" name="url" value="<?php if(isset($_GET["url"])) echo Main::clean($_GET["url"]) ?>" placeholder="https://youtube.com/watch?v=RdbnKbSXiA" autocomplete="off" />
                    </div>                 
                  </div>
                  <div class="col-sm-1">
                    <button class="btn btn-secondary btn-block main-button" id="shortenurl" type="submit"><span><?php echo e("Try now") ?></span> <i class="ti-link"></i></button>
                    <button class="btn btn-primary btn-block main-button" id="copyurl" type="button"><span><?php echo e("Copy") ?></span><i class="ti-clipboard"></i></button>
                  </div>
                </div>
              </div>
              <div id="captcha" style="display:none">
                <?php echo Main::captcha() ?>
              </div>
              <input type="hidden" value="<?php echo md5($this->config["public_token"]) ?>">
            </form><!--/.form--> 
          </div>  

        <a href="<?php echo Main::href("user/register") ?>" class="btn btn-primary"><?php echo e("Get Started") ?></a>
        <a href="#mainto" class="btn btn-transparent scroll"><?php echo e("Learn more") ?></a>      
      </div>      
    </div>   
  </div>  
</section>
<section class="section-secondary" id="mainto">
  <?php testimonialsItems() ?>
  <div class="container">
    <h3 class="text-center feature-h">
      <?php echo e("One short link, infinite possibilities.") ?>        
    </h3>
    <p class="text-center feature-p">
      <?php echo e("A short link is a powerful marketing tool when you use it carefully. It is not just a link but a medium between your customer and their destination. A short link allows you to collect so much data about your customers and their behaviors.") ?>
    </p>
    <div class="row feature">
      <div class="col-sm-7 image">
        <div class="row">
          <div class="col-md-6">
            <div class="panelette panelette-grad1">
              <h3>
                <i class="glyphicon glyphicon-screenshot"></i>
                <?php echo e("Target. Re-target.") ?>
              </h3>
              <p>
                <?php echo e("Target your customers to increase your reach and redirect them to a relevant page. Add a pixel to retarget them in your social media ad campaign to capture them.") ?>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panelette panelette-grad">
              <h3>
                <i class="glyphicon glyphicon-fire"></i>
                <?php echo e("Measure. Optimize.") ?>
              </h3>
              <p>
                <?php echo e("Share your links to your network and measure data to optimize your marketing campaign's performance. Reach an audience that fits your needs.") ?>
              </p>                
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5 info">
        <h2>
          <i class="glyphicon glyphicon-send"></i>
          <small><?php echo e("Reach & increase sales.") ?></small>
          <?php echo e("Perfect for sales & marketing") ?>
        </h2>
        <p>
          <?php echo e("Understanding your users and customers will help you increase your conversion. Our system allows you to track everything. Whether it is the amount of clicks, the country or the referrer, the data is there for you to analyze it.") ?>
        </p>
      </div>      
    </div>                
  </div>          
</section>
<section class="section-blue section-split">
  <div class="tilted-grad"></div>
  <div class="container">
    <div class="row feature">
      <div class="col-md-6">
        <div class="split-content info">
          <i class="glyphicon glyphicon-filter"></i>
          <h2>
            <small><?php echo e("Target interested users.") ?></small>
            <?php echo e("Powerful tools that work") ?>
          </h2>
          <p>
            <?php echo e("Our product lets your target your users to better understand their behavior and provide them a better overall experience through smart re-targeting. We provide you many powerful tools to reach them better.") ?>
          </p>          
        </div>        
      </div>
      <div class="col-md-6">
        <div class="split-content info">
          <i class="glyphicon glyphicon-tasks"></i>
          <h2>
            <small><?php echo e("Control on each and everything.") ?></small>
            <?php echo e("Complete control on your links") ?>
          </h2>
          <p>
            <?php echo e("With our premium membership, you will have complete control on your links. This means you can change the destination anytime you want. Add, change or remove any filters, anytime.") ?>
          </p>        
        </div>
      </div>
    </div>          
    <div class="row">
      <div class="col-md-6 hidden-xs">
        <div id="panel-preview">
          <div id="panel-sidebar">
            <div class="logo">
              <?php if ($this->config["logo"]): ?>
                <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="">
              <?php else: ?>
                <h3><?php echo $this->config["title"] ?></h3>
              <?php endif ?>
            </div>
            <ul class="tabs">
              <li class="active"><a href="#splash"><?php echo e("Custom Splash Page") ?></a> <span><?php echo e("Create a custom landing page to promote your product or service on forefront.") ?></span></li>
              <li><a href="#overlay"><?php echo e("Custom Overlay") ?></a> <span><?php echo e("Use our overlay tool to display unobtrusive notifications on the target website.") ?></span></li>
              <li><a href="#domain"><?php echo e("Custom Domain") ?></a> <span><?php echo e("Use your own domain name to brand each link.") ?></span></li>
            </ul>
          </div>
          <div id="panel-content">
            <div id="splash" class="tabbed">
              <span id="navigation">
                <i class="ti-arrow-left"></i>
                <i class="ti-arrow-right"></i>
                <i class="glyphicon glyphicon-repeat"></i>
                <i class="ti-home"></i>
                <span class="address"><?php echo Main::href("black-friday-deals-live") ?></span>
                <a href="<?php echo Main::href("pricing") ?>" class="btn btn-default btn-round btn-xs pull-right"> <?php echo e("Get Started") ?> </a>
              </span>                
              <div class="custom-splash panel panel-default" id="splash">
                <div class="banner"></div>
                <div class="custom-message">
                  <div class="c-avatar"></div>
                  <div class="c-message">
                    <h2></h2>
                    <p class="description"></p>
                    <p><a href="#null" rel="nofollow" class="btn btn-primary btn-xs"><span></span></a></p>
                  </div>
                  <div class="c-countdown"><span>5</span><?php echo e("seconds") ?></div>
                </div>
              </div>
            </div>
            <div id="overlay" class="tabbed">
              <span id="navigation">
                <i class="ti-arrow-left"></i>
                <i class="ti-arrow-right"></i>
                <i class="glyphicon glyphicon-repeat"></i>
                <i class="ti-home"></i>
                <span class="address"><?php echo Main::href("electronics-deals") ?></span>
                <a href="<?php echo Main::href("pricing") ?>" class="btn btn-default btn-round btn-xs pull-right"> <?php echo e("Get Started") ?> </a>
              </span>      
              <div id="dummy-website">
                <nav></nav>
                <div id="dummy-content">
                  <article>
                    <h1></h1>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                  </article>                   
                  <aside>
                    <h2></h2>
                    <p></p>
                    <p></p>
                    <p></p>
                  </aside>                  
                </div>
              </div>                              
              <div id="main-overlay">
                <div class='custom-message br'>
                  <div class='custom-label'><?php echo e("Demo") ?></div>
                  <p></p>
                  <p></p>
                  <a href="#null" class='btn btn-xs'></a>
                  <a href="#null" class="remove"><i class="glyphicon glyphicon-remove-sign"></i></a>
                </div>   
              </div>          
            </div>
            <div id="domain" class="tabbed">
              <span id="navigation">
                <i class="ti-arrow-left"></i>
                <i class="ti-arrow-right"></i>
                <i class="glyphicon glyphicon-repeat"></i>
                <i class="ti-home"></i>
                <span class="address"><strong>https://bra.nd/fb-campaign</strong></span>
                <a href="<?php echo Main::href("pricing") ?>" class="btn btn-default btn-round btn-xs pull-right"> <?php echo e("Get Started") ?> </a>
              </span>                 
              <div id="dummy-website">
                <nav></nav>
                <div id="dummy-content">
                  <article>
                    <h1></h1>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                  </article>
                  <aside>
                    <h2></h2>
                    <p></p>
                    <p></p>
                    <p></p>
                  </aside>
                </div>
              </div>          
            </div>              
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="featurette">
          <div class="row">
            <div class="col-sm-6">
              <i class="glyphicon glyphicon-globe"></i>
              <h3><?php echo e("Target Customers") ?></h3>
              <p><?php echo e("Target your users based on their location and device and redirect them to specialized pages to increase your conversion.") ?></p>
            </div>    
            <div class="col-sm-6">
              <i class="glyphicon glyphicon-star"></i>
              <h3><?php echo e("Custom Landing Page") ?></h3>
              <p><?php echo e("Create a custom landing page to promote your product or service on forefront and engage the user in your marketing campaign.") ?></p>
            </div>  
          </div>
          <div class="row">
            <div class="col-sm-6">
              <i class="glyphicon glyphicon-asterisk"></i>
              <h3><?php echo e("Overlays") ?></h3>
              <p><?php echo e("Use our overlay tool to display unobtrusive notifications on the target website. A perfect way to send a message to your customers or run a promotion campaign.") ?></p>
            </div>
            <div class="col-sm-6">
              <i class="glyphicon glyphicon-th"></i>
              <h3><?php echo e("Event Tracking") ?></h3>
              <p><?php echo e("Add your custom pixel from providers such as Facebook and track events right when they are happening.") ?></p>
            </div>       
          </div>  
        </div>        
      </div>
    </div>
  </div>      
</section>
<?php saasHistory() ?>
<?php saasPublicList() ?>
<section class="section-c2a"> 
  <div class="tilted-grad-reverse"></div>
  <div class="container">
    <div class="actionbar">
      <div class="row">
        <div class="col-sm-7">
          <h2><?php echo e("Ready to get started?") ?></h2>
          <p><?php echo e("Start your marketing campaign now and reach your customers efficiently with all the tools you need. Our platform is built for you and we are always improving it forward.") ?></p>    
          <p><a href="<?php echo Main::href("pricing") ?>" class="btn btn-primary btn-round"><?php echo e("Register now") ?></a></p>      
        </div>
        <div class="col-sm-5">
          <i class="ti-infinite"></i>
        </div>
      </div>
    </div>
    <?php if ($this->config["homepage_stats"]): ?>
      <?php saascountUp() ?>
      <div class="stats">
        <h2 class="text-center"><?php echo e("Marketing with confidence.") ?></h2>
        <div class="row">
          <div class="col-xs-4">
            <strong><?php echo e("Powering") ?></strong>      
            <h3><span class="thisCounter"><?php echo number_format($this->count("urls"), 0, ",",",") ?></span> <p><?php echo e("Links") ?></p></h3>
          </div>
          <div class="col-xs-4">
            <strong><?php echo e("Serving") ?></strong>      
            <h3><span class="thisCounter"><?php echo number_format($this->count("clicks"), 0, ",",",") ?></span> <p> <?php echo e("Clicks") ?></p></h3>
          </div>
          <div class="col-xs-4">
            <strong><?php echo e("Trusted by") ?></strong>
            <h3><span class="thisCounter"><?php echo number_format($this->count("users"), 0, ",",",") ?></span> <p><?php echo e("Customers") ?></p></h3>
          </div>
        </div>           
      </div>    
    <?php endif ?> 
  </div>
</section>