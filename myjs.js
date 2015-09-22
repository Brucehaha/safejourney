// This is the javascript function code here

// This is function about that background image fit for the screen size
	$(".contentContainer").css("height",$(window).height());

// And make the text or content in front of image should be transparent	
//change transparent
    $(function() {
		$(".transparent").hover(function(){
			$(this).css("opacity", 1); 
        },
        function() {
			$(this).css("opacity",0.4);      
        });
    });
	

