<?php include "weatherdata.php"; ?>

<!DOCTYPE html>
<!-- 10K Weather, by Mark Wahl, Copyright 2016 -->
<html lang="en">
<head>
	<title>10K Weather</title>
	<meta charset="utf-8">
	<meta name="description" content="10K Weather: Current weather and forecasts without all the extra junk!">
	
  	<!-- Mobile-friendly viewport -->
	<meta name='viewport' content='content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0' />

   <!-- Style sheet link -->
	<link href="css/main.min.css" rel="stylesheet" media="all">
	<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
</head>

<body>

	<div id="weather-1" class="slider-container">
	    <div id="weather-2" class="slider-container">
	        <div id="weather-3" class="slider-container">

	            <!-- Top Navigation -->
				<header role="banner">
					<a href="index.php"><div id="brand">
						<div class="logo green"><img src="images/10k.png" alt="10K Weather"></div>
						<span id="brandname">Weather</span>
					</div></a>
					<div id="finder-container">
						<input type="checkbox" id="finder-toggle"/>  
						<form id="finder" name="locationFinder" method="get" action="index.php">
							<label style="display:none" for="zipcode">Enter City/State or Zip Code</label>  
							<input type="text" id="zipcode" name="address" placeholder="Enter City/State or Zip Code" title="Enter City/State or Zip Code"><button type="submit" id="findersubmit" value="">&#x27A4;</button>
						</form>
						<label class="location-finder" for="finder-toggle">Choose Location</label>  
					</div>
					<nav role="navigation">
						<ul class="navbar">
							<a href="#weather-1" class="slide"><li>Today</li></a>
							<a href="#weather-2"><li>Tomorrow</li></a>
							<a href="#weather-3"><li>7 Day</li></a>
						</ul>	
					</nav>
				</header>

	            <div class="pages">
	                <!-- First Page #weather-1 -->
	                <div id="w1" class="page">
						<main role="main">
							
							<div id="location-time">
								<h1><?php echo $fullLocation; ?></h1>
								<?php echo $currentLocLink; ?>
						   	    <p><?php echo date('l, F jS, Y - g:i A'); ?></p>
							</div>		

						    <div id="weather-grid">
						    	<div class="col-100 grid-temp"><?php echo $current_temp; ?>&deg;</div>
						    	<!-- weather icons from http://www.alessioatzeni.com/meteocons/ -->
						    	<div class="col-100 grid-hilow"><span style="font-size: 13px; font-weight: normal; margin-left: -5px;">Low - High</span><br/><?php echo $temp_low; ?>&deg; - <?php echo $temp_hi; ?>&deg;</div>
						    	<div class="col-100 grid-icon"><img src="images/icons/<?php echo $current_icon; ?>.svg" alt="<?php echo $current_desc; ?>"><span style="display: block; margin-bottom: 20px;"><?php echo $current_desc; ?></span></div>
						    	<div class="grid-forecast""><?php echo $current_forecast; ?></div>
						    </div>

						    <div class="clear"></div>

						</main><!-- End primary page content -->
	                </div>
	                
	                <!-- Second Page #weather-2 -->
	                <div id="w2" class="page">
						<main role="main">
							
							<div id="location-time">
								<h1><?php echo $fullLocation; ?></h1>
								<?php $datetime = new DateTime('tomorrow'); ?>
						   	    <p><?php echo $datetime->format('l, F jS, Y'); ?></p>
							</div>		

						    <div id="weather-grid">
						    	<div class="col-100 grid-hilow"><span style="font-size: 13px; font-weight: normal; margin-left: -5px;">Low - High</span><br/><?php echo $tomorrow_temp_low; ?>&deg; - <?php echo $tomorrow_temp_hi; ?>&deg;</div>
						    	<div class="col-100 grid-icon""><img src="images/icons/<?php echo $current_icon; ?>.svg" alt="<?php echo $current_weather; ?>"></div>
						    	<div class="grid-forecast"><?php echo $tomorrow_weather; ?></div>
						    </div>

						    <div class="clear"></div>

						</main><!-- End primary page content -->
	                </div>
	                
	                <!-- Third Page #weather-3 -->
	                <div id="w3" class="page">
						<main role="main" class="multiday-table">
							
							<div id="location-time">
								<h1><?php echo $fullLocation; ?></h1>
						   	    <p>7-Day Forecast</p>
							</div>		

						    <div id="weather-grid">

								<div class="col-100 multiday titles"><div class="period">DAY</div><div class="temp">TEMP</div><div class="pop">PREC</div><div class="weather">FORECAST</div>
								</div>
								<?php
									$a = 0;
									foreach ($multi_period as &$period) {
										echo '<div class="col-100 multiday '.$multi_tempLabel[$a].'"><div class="period">';
										echo $period;
										echo ", ";
										echo date("M j", strtotime($multi_date[$a]));
										echo '</div><div class="temp">';
										echo $multi_temperature[$a];
										echo '&deg;f</div><div class="pop">';
										if ($multi_pop[$a] == '') { echo '0'; }
										else { echo $multi_pop[$a]; }	
										echo '%</div><div class="weather">';
										echo $multi_weather[$a];
										echo '</div></div>';
									$a++;
									}
								?>
						    </div>
						    <div class="clear"></div>
						</main><!-- End primary page content -->
	                </div>
	            </div>
	        </div>
	    </div>
	</div>


	<footer role="contentinfo">
		<div class="center"><strong>10K WEATHER</strong><br>Current weather and forecasts without all the extra junk! <br><small>Copyright &copy; <time datetime="2016">2016</time></small></div>
	</footer>

</body>
</html>