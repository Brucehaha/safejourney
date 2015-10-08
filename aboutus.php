<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About Us</title>
	<?php include("includes/head.html"); ?>  
  </head>
  
  <body>
	<?php include("includes/header.html"); ?>
	
	<!-- Put the video about our system here -->
	<div class="container contentContainer3" id="aboutvideo">
		<div class="row">
		    <div class="col-md-5">
				<h2>About Us</h2>
				<h4><span class="text-muted">Watch the video and know more about our website and team "Master Minds".</span></h4>
				
				<p class="lead">
				  This website allows you to find more information about the location of the traffic infringement occurred most often and the accumulated accident happened during past five years...
				</p>
			</div>
			<div id="movie" class="col-md-7">
				<iframe src="https://www.youtube.com/embed/Pqa5aNf46bo" frameborder="0" width="100%" height="100%" allowfullscreen></iframe>
			</div>
	    </div>
    </div> 
	<hr />
	<!-- Put more information about website here-->
	<div class="container contentContainer4" id="aboutwebsite">
		<div class="row aboutcontainer">
			<h2>What do you concern more about on your way to work?</h2><br /><br /><br /><br />
		</div>	
		<hr />
		<div class="row aboutimage">
			<div class="col-md-4">
				<img src="images/fines.jpg" class="img-responsive">
			</div>
			<div class="col-md-8">
				<h2>Know more details about your safety. <span class="text-muted"> Mark places where you may get fines...</span></h2>
				<p class="lead">It summarizes and shows the location where people get fines frequently. </p>
			</div>	
		</div>

		<div class="row aboutimage">
			<div class="col-md-8 ">
				<h2>Concern about your safety on the way. <span class="text-muted">Get accidents location... </span></h2>
				<p class="lead">In order to keep your journey safe, please find out what you want to know in our website. We will provide more information useful for you. </p>
			</div>
			<div class="col-md-4">
				<img src="images/accidentimg.jpg" class="img-responsive">
			</div>
		</div>
	</div>
	<hr />
	<!-- FOOTER -->
    <footer>
		<div class="footer">
			<p class="pull-left">&copy; 2015 MasterMinds, Inc.<br /><br />
			Disclaimer: <span style="color:grey;">The information contained in this website is to make daily commuter familiar with road accidents and infringements. The data is collected from Victoria government <a href="https://www.data.vic.gov.au/">open data</a>. We are not responsible for any harm caused by using the provided in formation.</span></p>
		</div>
    </footer>
    
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
	
  </body>
</html>