$( document ).ready(function() {
    	$('#showCollapse').click(function(){
    		// $(".collapse-handmade").css("display",'block');
    		$(".collapse-handmade").slideToggle("slow");
    	});
    	$('#showCollapse2').click(function(){
    		// $(".collapse-handmade").css("display",'block');
    		$(".collapse-handmade").slideToggle("slow");
    	});
    	 

    	 $('.content_chatbox').hide();
    	 $('.chatbox').click(function(){
    	 	$('.content_chatbox').show();
    	 	$(this).hide();
    	 });
    	 $('#close').click(function(){
    	 	$('.content_chatbox').hide();
    	 	$('.chatbox').show();
    	 });

    	count = 0;
  		wordsArray = ["0902.298.300 - 0906.298.300","0912.298.300  - 0914.298.300"];
    	 setInterval(function () {
		    count++;
		    $("#hotline-1").slideUp(600, function () {
		    	// odd % 2 == 1
		      $(this).text(wordsArray[count % wordsArray.length]).slideDown(200);
		      console.log('wordsArray '+count % wordsArray.length+' count '+count+' length '+wordsArray.length);
		    });
		  }, 3000);

    	 setInterval(function () {
		    count++;
		    $("#hotline-2").slideUp(600, function () {
		    	// odd % 2 == 1
		      $(this).text(wordsArray[count % wordsArray.length]).slideDown(200);
		      console.log('wordsArray '+count % wordsArray.length+' count '+count+' length '+wordsArray.length);
		    });
		  }, 3000);

    	 	$('.content-responsive').hide();
	    	$('#showMenuRes').click(function(){
	    		$('.content-responsive').slideToggle();
    		});
	    	$(".center").slick({
				        dots: true,
				        infinite: true,
				        centerMode: true,
				        slidesToShow: 3,
				        slidesToScroll: 3,
				        dots:false,

				 responsive: [
			        {
			            breakpoint: 900,
			            settings: {
			                slidesToShow: 1,
			                slidesToScroll: 1,
			            }
			        }]

		      });
	    	// responsive slide 2

			
    		
	});