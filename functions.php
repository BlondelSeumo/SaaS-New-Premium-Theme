<?php 
/**
 * ====================================================================================
 *                           Premium URL Shortener (c) KBRmedia
 * ----------------------------------------------------------------------------------
 * @copyright This software is exclusively sold at CodeCanyon.net. If you have downloaded this
 *  from another site or received it from someone else than me, then you are engaged
 *  in an illegal activity. You must delete this software immediately or buy a proper
 *  license from http://codecanyon.net/user/KBRmedia/portfolio?ref=KBRmedia.
 *
 *  Thank you for your cooperation and don't hesitate to contact me if anything :)
 * ====================================================================================
 *
 * @author KBRmedia (http://gempixel.com)
 * @link http://gempixel.com 
 * @license http://gempixel.com/license
 * @package Theme Functions
 */

if(_VERSION < 5.4) return FALSE;

Main::hook("admin.theme.activate", "theme_activate");
Main::hook("admin.theme.deactivate", "theme_deactivate");
Main::hook("admin.theme.hasOption", "theme_hasOption");
Main::hook("admin.theme.getOptions", "theme_getOptions");
/**
 * [theme_activate description]
 * @author KBRmedia <https://gempixel.com>
 * @version 1.0
 * @return  [type] [description]
 */
function theme_activate(){
	global $db, $config;

	if(!isset($config["theme_config"])) {
		$db->insert("settings", [":config" => "theme_config", ":var" => ""]);
	}
	$default = [

		"scheme" => "default",

		"address" => [
				"enabled" => "1",
				"street" 	=> "",
				"city" 		=> "",
				"state" 	=> "",
				"country" => "",
				"phone" 	=> ""
		],
		
		"testimonial" => [
				"enabled" => "1",
				"items" => [
					[
						"text" => "Lorem ipsum ullamco elit consequat sed mollit ut proident qui consectetur veniam sit id tempor cupidatat sint pariatur.",
						"author" => "Tim Cook",
						"logo" => "https://image.freepik.com/free-icon/apple-logo_318-40184.jpg",
						"title" => "CEO at Apple Inc."						
					],
					[
						"text" => "Lorem ipsum ullamco elit consequat sed mollit ut proident qui consectetur veniam sit id tempor cupidatat sint pariatur.",
						"author" => "Satya Nadella",
						"logo" => "https://en.groupeaccess.ca/wp-content/uploads/2016/11/Microsoft-logo-313x313.png",
						"title" => "CEO at Microsoft Inc.",						
					],
					[
						"text" => "Lorem ipsum ullamco elit consequat sed mollit ut proident qui consectetur veniam sit id tempor cupidatat sint pariatur.",
						"author" => "Jeff Bezos",
						"logo" => "https://wwwen.uni.lu/var/storage/images/media/images/lcl_images/amazon_square_logo/1285786-1-fre-FR/amazon_square_logo.png",
						"title" => "CEO & Founder at Amazon Inc.",						
					]
				]
		],
	];	
	$db->update("settings", ["var" => json_encode($default)], ["config" => "theme_config"]);
}

function theme_deactivate(){
	global $db;
	$db->update("settings", ["var" => ""], ["config" => "theme_config"]);
}

function theme_hasOption(){
	return TRUE;
}

function theme_getOptions(){
	global $config, $db;

	if(isset($_POST["token"])){
    if(!Main::validate_csrf_token($_POST["token"])){
      return Main::redirect(Main::ahref("themes/options","",FALSE),array("danger","Something went wrong, please try again."));
    }


		$data = [];

		if(in_array($_POST["scheme"], ["default","blue","green","yellow","black"])){
			$data["scheme"] = $_POST["scheme"];
		}

		$data["address"] = array_map('Main::clean', $_POST["address"]);
		$data["testimonial"]["enabled"] = in_array($_POST["testimonial"]["enabled"], ["0","1"]) ? $_POST["testimonial"]["enabled"] : "1";

		foreach ($_POST["testimonial"]["items"] as $items) {
			if(empty($items["text"])) continue;
			$data["testimonial"]["items"][] = $items;
		}
		foreach ($_POST["testimonial"]["new"]["text"] as $i => $items) {
			if(empty($items)) continue;
			$data["testimonial"]["items"][] = [
					"text" => $_POST["testimonial"]["new"]["text"][$i],
					"author" => $_POST["testimonial"]["new"]["author"][$i],
					"title" => $_POST["testimonial"]["new"]["title"][$i],
					"logo" => $_POST["testimonial"]["new"]["logo"][$i]
			];
		}

		$db->update("settings", ["var" => json_encode($data)], ["config" => "theme_config"]);
		return Main::redirect(Main::ahref("themes/options","",FALSE), ["success", "Settings are successfully saved."]);
	}

	$option = json_decode($config["theme_config"], TRUE);

	Main::admin_add('<script>
								    var html = $(".testimonial-template").html();
								    $(".btn-add-testimonial").click(function(){
								      $(".testimonial-template").after("<hr><div class=\'testimonial\'>"+html+"</div><p><a href=\'#\' class=\'btn btn-danger btn-xs btn-delete-testimonial\'>Delete</a></p>");
								      update_sidebar();
								      return false;
								    }); 
								    $(document).on("click",".btn-delete-testimonial",function(e){
								      e.preventDefault();
								      var t = $(this);
								      $(this).parent("p").prev("div.testimonial").slideUp("slow",function(){
								        $(this).remove();
								        t.parent("p").remove();
								      });
								      return false;
								    }); 
									</script>',"custom", TRUE);

	$content = "<div class='row'>
						  		<div class='col-md-8'>
						<div class='panel panel-default'>
						<div class='panel-heading'>Theme Settings</div>
						<div class='panel-body'>
							<form action='".Main::ahref("themes/options")."' method='post'>
								<div class='form-group'>
							    <label class='control-label'>Theme Color Scheme</label>
						      <ul class='themes-style'>
						      	<li class='default'><a href='' ".($option["scheme"] == "default" ? "class='current'": "")."data-class='default' style='background:#FF4E73'>Red</a></li>
						      	<li class='blue'><a href='' ".($option["scheme"] == "blue" ? "class='current'": "")." data-class='blue' style='background:#0067F4'>Blue</a></li>
						      	<li class='green'><a href='' ".($option["scheme"] == "green" ? "class='current'": "")."data-class='green' style='background:#82e26f'>Green</a></li>
						      	<li class='yellow'><a href='' ".($option["scheme"] == "yellow" ? "class='current'": "")."data-class='yellow' style='background:#FFB400'>Yellow</a></li>
						      	<li class='black'><a href='' ".($option["scheme"] == "black" ? "class='current'": "")."data-class='black' style='background:#000000'>Black</a></li>
						      </ul>			
						      <input type='hidden' name='scheme' id='theme_value' value='{$option["scheme"]}'>			    
						  	</div>	
						  	<hr>
								<ul class='form_opt' data-id='address-enabled'>
									<li class='text-label'>Address <small>Enabling this will display your address on the contact page.</small></li>
									<li><a href='' class='last".((!$option["address"]["enabled"])?' current':'')."' data-value='0'>Disable</a></li>
									<li><a href='' class='first".(($option["address"]["enabled"])?' current':'')."' data-value='1'>Enable</a></li>
								</ul>
								<input type='hidden' name='address[enabled]' id='address-enabled' value='{$option["address"]["enabled"]}'>							  	
									<div class='form-group'>
	 								 <label for='address[street]' class='control-label'>Street</label>
									 <input type='text' class='form-control' name='address[street]' id='address[street]' value='{$option["address"]["street"]}'>
									</div>	
									<div class='form-group'>
									 <label for='address[city]' class='control-label'>City</label>
									 <input type='text' class='form-control' name='address[city]' id='address[city]' value='{$option["address"]["city"]}'>
									</div>	
									<div class='form-group'>
									 <label for='address[state]' class='control-label'>State</label>
									 <input type='text' class='form-control' name='address[state]' id='address[state]' value='{$option["address"]["state"]}'>
									</div>	
									<div class='form-group'>
									 <label for='address[country]' class='control-label'>Country</label>
									 <input type='text' class='form-control' name='address[country]' id='address[country]' value='{$option["address"]["country"]}'>
									</div>
									<div class='form-group'>
									 <label for='address[phone]' class='control-label'>Phone</label>
									 <input type='text' class='form-control' name='address[phone]' id='address[phone]' value='{$option["address"]["phone"]}'>
									</div>						  		
						  	<hr>
								<ul class='form_opt' data-id='testimonial-enabled'>
									<li class='text-label'>Testimonials <small>Enabling this will display a testimonial slider on the homepage.</small></li>
									<li><a href='' class='last".((!$option["testimonial"]["enabled"])?' current':'')."' data-value='0'>Disable</a></li>
									<li><a href='' class='first".(($option["testimonial"]["enabled"])?' current':'')."' data-value='1'>Enable</a></li>
								</ul>
								<input type='hidden' name='testimonial[enabled]' id='testimonial-enabled' value='{$option["testimonial"]["enabled"]}'>	";

						  	foreach ($option["testimonial"]["items"] as $key => $item) {
						  		$content .= "<div class='testimonial'>";
									$content .= "<div class='form-group'>
																 <label for='testimonial-t-{$key}' class='control-label'>Testimonial</label>
																 <textarea class='form-control' name='testimonial[items][{$key}][text]' id='testimonial-t-{$key}'>{$item["text"]}</textarea>
																</div>";
									$content .= "<div class='row'> 
																<div class='col-md-4'>
																	<div class='form-group'>
																	 <label for='testimonial-a-{$key}' class='control-label'>Author</label>
																	 <input type='text' class='form-control' name='testimonial[items][{$key}][author]' id='testimonial-a-{$key}' value='{$item["author"]}'>
																	</div>																
																</div>
																<div class='col-md-4'>
																	<div class='form-group'>
																	 <label for='testimonial-ti-{$key}' class='control-label'>Title</label>
																	 <input type='text' class='form-control' name='testimonial[items][{$key}][title]' id='testimonial-ti-{$key}' value='{$item["title"]}'>
																	</div>																
																</div>
																<div class='col-md-4'>
																	<div class='form-group'>
																	 <label for='testimonial-lo-{$key}' class='control-label'>Logo/Avatar (link)</label>
																	 <input type='text' class='form-control' name='testimonial[items][{$key}][logo]' id='testimonial-lo-{$key}' value='{$item["logo"]}'>
																	</div>
																</div>
															</div>															
															</div><p><a href='#' class='btn btn-xs btn-danger btn-delete-testimonial'>Delete</a><hr></p>";																
						  	}
								$content .= "<div class='testimonial-template'><div class='form-group'>
															 <label for='testimonial-t' class='control-label'>New Testimonial</label>
															 <textarea class='form-control' name='testimonial[new][text][]' id='testimonial-t'></textarea>
															</div>";
								$content .= "<div class='row'> 
															<div class='col-md-4'>
																<div class='form-group'>
																 <label for='testimonial-a' class='control-label'>Author</label>
																 <input type='text' class='form-control' name='testimonial[new][author][]' id='testimonial-a value=''>
																</div>																
															</div>
															<div class='col-md-4'>
																<div class='form-group'>
																 <label for='testimonial-ti' class='control-label'>Title</label>
																 <input type='text' class='form-control' name='testimonial[new][title][]' id='testimonial-ti' value=''>
																</div>																
															</div>
															<div class='col-md-4'>
																<div class='form-group'>
																 <label for='testimonial-lo-{$key}' class='control-label'>Logo/Avatar (link)</label>
																 <input type='text' class='form-control' name='testimonial[new][logo][]' id='testimonial-lo' value=''>
																</div>
															</div>
														</div></div><hr><p><a href='#' class='btn btn-xs btn-info btn-add-testimonial'>Add</a><br><br></p>";
		$content .= "
				        ".Main::csrf_token(TRUE)."
				        <button class='btn btn-primary'>Save Settings</button>          
				      </form>
				     </div>
		     </div></div>
			     <div class='col-md-4'>
							<div class='panel panel-default'>
								<div class='panel-heading'>Help</div>
								<div class='panel-body'>	
									<p><strong>Color Schemes</strong></p>
									<p>Color scheme CSS files are located in the folder assets/css. You can edit them as you wish. All changes you make must be on that respective file.</p>

									<p><strong>Address</strong></p>
									<p>If you choose to add your company's address, you can enable this feature and fill the form. This will show your company address in the contact page.</p>	

									<p><strong>Testimonials</strong></p>
									<p>Testimonials are a great way to show your customers' feedback on your site. Once enabled, it will be displayed right after the main section on the homepage. You can add and delete testimonials as you need here.</p>

									<p><strong>Support</strong></p>
									<p>For support, please open a ticket by clicking the link below. Make sure to add your purchase codes for faster response.</p>
									<a href='https://support.gempixel.com' class='btn btn-primary btn-xs' target='_blank'>Open Support</a>
								</div>							
							</div>		     
			     </div>
		     </div>";
		return $content;
}

	/**
	 * Global Variables
	 */
	$scheme = "";	
	$testimonial = "";
	$address = "";
	saasint(json_decode($config["theme_config"], TRUE));
	/**
		 * Trigger Options
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $options [description]
		 * @return  [type]          [description]
		 */
		function saasint($options){

			$get = getParam($options);

			if($options["testimonial"]["enabled"]){
				saas_int_testimonial($options["testimonial"]);
			}

			if(in_array($options["scheme"], ["default","blue","green","yellow","black"])){
				saas_int_scheme($options["scheme"]);
			}

			if($options["address"]){
				saas_set_address($options["address"]);
			}			
		}
		/**
		 * [getParam description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function getParam($options){

			if(isset($_GET["a"])){
				$a = explode("/", $_GET["a"]);
				if(isset($options["custompages"][$a[0]]) && function_exists($options["custompages"][$a[0]])){
					$options["custompages"][$a[0]]();
					exit;
				}
			}
		}
		/**
		 * Scheme Int
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $option [description]
		 * @return  [type]         [description]
		 */
		function saas_int_scheme($option){
			global $scheme;
			$scheme = $option;
		}

		/**
		 * Set Address
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $option [description]
		 * @return  [type]         [description]
		 */
		function saas_set_address($option){
			global $address;
			$address = $option;
		}
		/**
		 * getAddress
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function getAddress(){
			global $address;

			if(!$address["enabled"]) return FALSE;

			if($address){				
          echo '<h3 class="address">'.e("Our office").'</h3>';
					if(!empty($address["street"])){
						echo "<p><i class='ti-pin'></i> {$address["street"]}</p>";						
					}
					if(!empty($address["city"]) && !empty($address["state"])){
						echo "<p class='pad'>{$address["city"]}, {$address["state"]}</p>";
					}					
					if(!empty($address["country"])){
						echo "<p class='pad'>{$address["country"]}</p>";								
					}				
					if(!empty($address["phone"]))		{
						echo "<p class='phone'><i class='glyphicon glyphicon-earphone'></i> {$address["phone"]}</p>";								
					}
			}
			return FALSE;
		}		

		/**
		 * Testimonial Int
		 */
		function saas_int_testimonial($config){
			global $testimonial;

			// Add CarouselJS Library
			Main::add("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css","style", FALSE);
			Main::add("https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js","script", FALSE);


			$testimonial = "<div class='owl-carousel testimonials'>";
			foreach ($config["items"] as $item) {
				$testimonial .= "<div class='testimonial-item'>";
					$testimonial .= "<div class='media'>";
						if(isset($item["logo"]) && !empty($item["logo"])) {
							$testimonial .= "<div class='media-left pull-left'><img src='{$item["logo"]}' class='media-object'></div>";
						}
						$testimonial .= "<div class='media-body'><h4 class='media-heading'>{$item["author"]} <span>".(isset($item["title"]) ? $item["title"] : "")."</span></h4></div>";
					$testimonial .= "</div>";
					$testimonial .= "<p>{$item["text"]}</p>";
				$testimonial .= "</div>";
			}
			$testimonial .= "</div>";
		}

		/**
		 * Testimonial Options
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $items [description]
		 * @return  [type]        [description]
		 */
		function testimonialsItems(){
			global $testimonial;

			echo $testimonial;
		}
		/**
		 * Select Style
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function saasStyle($url){
			global $scheme;

			if(empty($scheme) || $scheme == "default") return "{$url}/style.css";
			return "{$url}/assets/css/style-{$scheme}.css";
		}
		/**
		 * [saasPublicList description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   string $limit [description]
		 * @return  [type]        [description]
		 */
		function saasPublicList($limit = "12"){
			global $db, $config;
			
			if(!$config["public_dir"]) return FALSE;

			if($urls = $db->get("url", array("public" => "1"), array("limit"=> $limit, "order"=>"date"))){

			echo '<section class="section-urls-holder">
					    <div class="container">
					      <div id="user-content">
					        <div class="addmargin public_list" id="data-container">
										<h3 class="text-center feature-h">'.e("Latest Public Links").'</h3>
										<p class="text-center feature-p">'.e("These are an example of some new links generated by our users through our system. They are public so feel free to use them.").'</p>									
										<div class="row">';
					          $user = new stdClass; $user->domain = $config["url"];
					          $i = "1";
					          foreach ($urls as $url){
					           echo '<div class="col-md-4">';
					           	$url->meta_title = Main::truncate($url->meta_title, 30);
											include(TEMPLATE."/shared/saas_public_url_loop.php");				           
				           	 echo '</div>';
					           if($i%3 == 0) {
					           	echo '</div><div class="row">';
					           }
					           $i++;
					          }
			        echo '</div>
		        			</div>
					      </div>    
					    </div>
					  </section>';
			}		
		}
		/**
		 * [saasHistory description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   string $limit [description]
		 * @return  [type]        [description]
		 */
		function saasHistory($limit = "12"){
			global $db, $config;
			
			if(!$config["user_history"]) return FALSE;
			
			// Get Aliases
			$alias = json_decode(Main::cookie("aid"),TRUE);

			// If empty return False
			if(!$alias) return FALSE;						
			// Get URLs
      $query="(";
      $c = count($alias);
      $value = [];
      $i = 1;
      foreach ($alias as $id) {
        if($i>=$c){
          $query.="(`alias` = :id$i OR `custom`= :id$i)";
        }else{
          $query.="(`alias` = :id$i OR `custom`= :id$i) OR ";
        }

        $value[':id'.$i] = $id;
        $i++;
      }  
      $value[":user"] = "0";
      $query .= ") AND userid=:user";		

			if($urls = $db->get("url",$query, ["limit"=>10, "order"=>"date"], $value)){

				echo '<section class="section-urls-holder">
					    <div class="container">
					      <div id="user-content">
					        <div class="addmargin public_list" id="data-container">
										<h3 class="text-center feature-h">'.e("Your Latest Links").'</h3>
										<p class="text-center feature-p">'.e("These are an example of some of the links generated by you through our system. You can use them anytime you want.").'</p>									
										<div class="row">';
					          $user = new stdClass; $user->domain = $config["url"];
					          $i = "1";
					          foreach ($urls as $url){
					           echo '<div class="col-md-4">';
					           	$url->meta_title = Main::truncate($url->meta_title, 30);
											include(TEMPLATE."/shared/saas_public_url_loop.php");				           
				           	 echo '</div>';
					           if($i%3 == 0) {
					           	echo '</div><div class="row">';
					           }
					           $i++;
					          }
			        echo '</div>
		        			</div>
					      </div>    
					    </div>
					  </section>';
			}		
		}		
		/**
		 * [saasAvatar description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $user [description]
		 * @return  [type]       [description]
		 */
		function saasAvatar($user){
			global $config;
			return "https://gravatar.com/avatar/".md5($user->email)."?s=32&r=pg&d=mm";
		}
		/**
		 * [saascountUp description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function saascountUp(){
			Main::add("//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js","script", TRUE);
			Main::add("//cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js","script", TRUE);			
			Main::add("<script>
									$(document).ready(function() {
										$('.thisCounter').counterUp();
									});									
								</script>","custom", TRUE);
		}
		/**
		 * [saasCurrentLang description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function saasCurrentLang(){
			global $_language;
			if(empty($_language)) $_language = "en";
			echo ucwords($_language);
		}
		/**
		 * [saasCharts description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   integer $span [description]
		 * @return  [type]        [description]
		 */
		function saasCharts($id, $span = 20){
			global $db, $config;
			$json = [];
			$chart = [];
      $db->object=FALSE;

			$timestamp = time();
	    for ($i = 0 ; $i < $span ; $i++) {
	        $chart[date('Ymd', $timestamp)]=0;
	        $timestamp -= 24 * 3600;
	    } 	

      $query = $db->get(array("count"=>"COUNT(DATE(date)) as count, DATE(date) as date","table"=>"stats"),"(date >= CURDATE() - INTERVAL $span DAY) AND urluserid = '$id'",array("group_custom"=>"DATE(date)","limit"=>"0 , $span"));  
			$db->object=TRUE;		
      foreach ($query as $data) {
        $chart[date("Ymd", strtotime($data["date"]))] = $data["count"];
      }  	    
      foreach ($chart as $date => $count) {
        $json[]=[strtotime($date)*1000, (int) $count];
      }  

      $json = json_encode(["data" => array_values($json)]);

      Main::add("{$config["url"]}/static/js/flot.js","script",TRUE);
      Main::add("<script type='text/javascript'>var options = {
								  series: {
								  //lines: { show: true, lineWidth: 2,fill: true},                
								  //points: { show: true, lineWidth: 2 }, 
								  bars: { show: true, barWidth: 1000*60*60*24, align: 'center' },
							  	shadowSize: 0
								  },
								  grid: { hoverable: true, clickable: true, tickColor: 'transparent', borderWidth:0 },
								  colors: ['#2d5bd8'],
								  yaxis: [{ min: 0}],
								  xaxes: [ { mode: 'time', timeformat: '%d %b'} ]
								} 
        var data = [$json];
        $.plot('#url-chart', data ,options);</script>",'custom',TRUE); 
		}
		/**
		 * [saasTopCountry description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function saasTopCountry($text, $userid){
			global $db, $config;
			$data = $db->get(array("count"=>"country AS country, COUNT(country) AS count","table"=>"stats"),array("urluserid"=>"?"),array("group"=>"country","order"=>"count", "limit"=> 1),array($userid));
			if($data->country && !empty($data->country)){
				return $text." ".ucwords($data->country);
			}else{
				return "N/A";
			}
		}
		/**
		 * [saasTopReferrer description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @return  [type] [description]
		 */
		function saasTopReferrer($text, $userid){
			global $db, $config;
			$data = $db->get(array("count"=>"domain AS domain, COUNT(domain) AS count","table"=>"stats"),array("urluserid"=>"?"), array('group' => "domain","limit"=>1),array($userid));
			if($data->domain && !empty($data->domain)){
				return $text." ".$data->domain;
			}else{
				return $text." ".e("Direct, email and other");
			}
		}
		/**
		 * [saasDevice description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $text [description]
		 * @return  [type]       [description]
		 */
		function saasDevice($text, $userid){
			global $db, $config;
			
			$data = $db->get(array("count"=>"os as os, COUNT(os) AS count","table"=>"stats"),array("urluserid"=>"?"), array('group' => "os","limit"=>1,"order" => "count"),array($userid));		
			if($data->os && !empty($data->os)){
				return $text." ".ucwords($data->os);
			}else{
				return "N/A";
			}			
		}
		/**
		 * [saasGetPlan description]
		 * @author KBRmedia <https://gempixel.com>
		 * @version 1.0
		 * @param   [type] $id [description]
		 * @return  [type]     [description]
		 */
		function saasGetPlan($type, $id){
			global $db, $config;

			$plan = $db->get("plans", ["id" => $id], ["limit" => 1]);
			return [
					"id" => $plan->id,
					"name" => $plan->name,
					"description" => $plan->description,
					"icon" => $plan->icon,
					"price" => $plan->price_monthly,
					"urls" => $plan->numurls,
					"permission" => json_decode($plan->permission)
				];
		}