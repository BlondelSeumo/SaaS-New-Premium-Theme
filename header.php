<?php defined("APP") or die() ?>
<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  <head>       
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />  
    <meta name="description" content="<?php echo Main::description() ?>" />
    <meta name="keywords" content="<?php echo $this->config["keywords"] ?>" />
    <!-- Open Graph Tags -->
    <?php echo Main::ogp(); ?> 

    <title><?php echo Main::title() ?></title> 
        
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config["url"] ?>/static/css/bootstrap.min.css" rel="stylesheet">
    <!-- Component CSS -->    
    <link rel="stylesheet" type="text/css" href="<?php echo saasStyle("{$this->config["url"]}/themes/{$this->config["theme"]}") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/static/css/components.min.css">
    <!-- Required Javascript Files -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/application.fn.js"></script>

    <script type="text/javascript">
      var appurl="<?php echo $this->config["url"] ?>";
      var token="<?php echo $this->config["public_token"] ?>";
    </script>  
    <?php Main::enqueue() // Add scripts when needed ?>        
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/application.js"></script>  
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/server.js"></script>    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body<?php echo Main::body_class() ?> id="body">
    <a href="#body" id="back-to-top"><i class="glyphicon glyphicon-chevron-up"></i></a>
    <?php if($this->isUser): // Show header for logged user ?>
      <header class="app">
        <div class="navbar" role="navigation">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-2">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse, .sidebar">
                    <i class="ti-menu"></i>
                  </button>
                  <a class="navbar-brand" href="<?php echo $this->config["url"] ?>">
                    <?php if (!empty($this->config["logo"])): ?>
                    <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>">
                    <?php else: ?>
                      <?php echo $this->config["title"] ?>
                    <?php endif ?>
                  </a>
                </div>
                <a href="#" class="sidebar-collapse pull-right hidden-xs"><i class="ti-menu"></i></a>            
              </div>
              <div class="col-sm-10">
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <?php if($this->admin()):?>
                      <li><a href="<?php echo $this->config["url"] ?>/admin" class="active"><?php echo e("Admin") ?></a></li>
                    <?php endif ?>
                    <?php if(!$this->pro() && $this->config["pro"]): ?>
                      <li><a href="<?php echo Main::href("pricing") ?>" class="active"><?php echo e("Upgrade") ?></a></li>
                    <?php endif ?>
                    <li class="dropdown">
                      <a href="<?php echo Main::href("user") ?>"><span><?php echo ucfirst($this->user->username) ?> <i class="glyphicon glyphicon-chevron-down"></i></span> <img src="<?php echo saasAvatar($this->user) ?>" alt="<?php echo e("My Account") ?>"> </a>
                      <ul class="dropdown-nav">
                        <li>
                          <h3><?php echo ucfirst($this->user->username) ?> <span class="label label-primary"><?php echo $this->pro() ? e($this->user->plan->name) : e("Free") ?></span></h3>
                        </li>
                        <li><a href="<?php echo Main::href("user") ?>"><i class="ti-dashboard"></i> <?php echo e("Dashboard") ?></a></li>
                        <li><a href="<?php echo Main::href("profile/{$this->user->username}") ?>"><i class="ti-user"></i> <?php echo e("Public Profile") ?></a></li>
                        <li><a href="<?php echo Main::href("user/membership") ?>"><i class="ti-credit-card"></i> <?php echo e("Membership") ?></a></li>
                        <li><a href="<?php echo Main::href("user/tools") ?>"><i class="ti-shortcode"></i> <?php echo e("Developer Tools") ?></a></li>
                        <li><a href="<?php echo Main::href("user/settings") ?>"><i class="ti-settings"></i> <?php echo e("Settings") ?></a></li>
                        <li><a href="<?php echo Main::href("user/logout") ?>"><i class="ti-power-off"></i> <?php echo e("Logout") ?></a></li>
                      </ul>
                    </li>                   
                  </ul>
                </div>                
              </div>        
            </div>
          </div>
        </div>     
      </header>
      <section>
        <div class="container-fluid">          
          <div class="row">
            <div class="col-sm-2 sidebar">
              <?php echo $this->user_menu() ?>     
            </div> 
            <div class="col-sm-10 content">     
    <?php else: ?>
      <?php if($this->headerShow): // Show header ?>    
        <header>
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="ti-menu"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->config["url"] ?>">
                  <?php if (!empty($this->config["logo"])): ?>
                  <img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" alt="<?php echo $this->config["title"] ?>">
                  <?php else: ?>
                    <?php echo $this->config["title"] ?>
                  <?php endif ?>
                </a>
              </div>
              <div class="navbar-collapse collapse">
                <?php echo $this->menu([["href" => Main::href("#mainto"), "text" => e("Features")]]) ?>
              </div>
            </div>
          </div>    
        </header>      
      <?php endif ?>      
    <?php endif ?>