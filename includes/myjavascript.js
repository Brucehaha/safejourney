<script>


$(".header1").click(function () {

    $header1 = $(this);
    $header1.css("font-size", "1.5em")
    //getting the next element
    $wraper = $header1.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $wraper.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header1.text(function () {
            //change text based on condition
            return $wraper.is(":visible") ? "Click to collapse" : "Click to navigate your safe journey";
        });
		
    });

});
</script>