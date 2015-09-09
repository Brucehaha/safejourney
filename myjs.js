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
	
// suburbautocomplet : this function will be executed every time we change the text in the suburb textbox
	function suburbautocomplet() {
		var min_length = 0; // min caracters to display the autocomplete
		var keyword = $('#suburb_id').val();
		if (keyword.length > min_length) {
			$.ajax({
				url: 'suburbautocomplete.php',
				type: 'POST',
				data: {keyword:keyword},
				success:function(data){
					$('#suburb_list_id').show();
					$('#suburb_list_id').html(data);
				}
			});
		} else {
			$('#suburb_list_id').hide();
		}
	}

// set_item : this function will be executed when we select an item
	function set_item(item) {
		// change input value
		$('#suburb_id').val(item);
		// hide proposition list
		$('#suburb_list_id').hide();
	}
		
// streetautocomplet : this function will be executed every time we change the text in the street textbox
	function streetautocomplet() {
		var min_length = 0; // min caracters to display the autocomplete
		var keyword = $('#street_id').val();
		var suburbkey = $('#suburb_id').val();
		if (keyword.length > min_length) {
			$.ajax({
				url: 'streetautocomplete.php',
				type: 'POST',
				data: {keyword:keyword, suburbkey:suburbkey},
				success:function(data){
					$('#street_list_id').show();
					$('#street_list_id').html(data);
				}
			});
		} else {
			$('#street_list_id').hide();
		}
	}
	
// set_item : this function will be executed when we select an item
	function set_item2(item) {
		// change input value
		$('#street_id').val(item);
		// hide proposition list
		$('#street_list_id').hide();
	}
	

