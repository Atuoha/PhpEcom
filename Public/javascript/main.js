$(document).ready(function(){
   $('.button-collapse').sideNav();
    $('.scrollspy').scrollSpy();
    $('.parallax').parallax();

    
    $('.slider').slider({
      indicators:false,
      height:800,
      interval:6000,
      transition:500});


    $('.bodyslides').slider({
      indicators:false,
      height:250,
      interval:6000,
      transition:500});


    $('.modal').modal();
//    $(".carousel").carousel();
    $(".carousel").carousel({fullWidth:true}); 



     $('.dropdown-button').dropdown({
    hover:true,
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    gutter: 2, // Spacing from edge
    belowOrigin: true, // Displays dropdown below the button
    alignment: 'left', // Displays dropdown with edge aligned to the left of button
    stopPropagation: false // Stops event propagation
  }
);
     

$slideCount = 1;

    window.setInterval(function(){
        $("div#slideCapDiv").animate({
            left: '-350px',
            opacity: '0',
        });
        $("div#slideImgDiv").animate({
            left: '+500px',
            opacity: '0',
        });
        displayAgain();
    }, 5000);

    function displayAgain(){
        window.setTimeout(function(){
            if($slideCount == 1){
                $('img#slideImg').attr('src','/E-commerce/Public/image/5.jpg');
                $('#slideCapDiv h1').text("Mobile up your stands for its in");
                $('#slideCapDiv p').text("New mobiles are here for your select!");
            }else if($slideCount == 2){
                $('img#slideImg').attr('src','/E-commerce/Public/image/gear.png');
                $('#slideCapDiv h1').text("Accessories with clues of your choice");
                $('#slideCapDiv p').text("Buy all kinds of Accessories and gadgets");
            }else if($slideCount == 3){
                $('img#slideImg').attr('src','/E-commerce/Public/image/s.jpg');
                $('#slideCapDiv h1').text("Travel and tours just got better ");
                $('#slideCapDiv p').text("Obtain the latest travel and tour bags");
            }
            $slideCount++;
            if($slideCount > 3){
                $slideCount = 1;
            }

            $("div#slideCapDiv").animate({
                left: '0',
                opacity: '1',
            });
            $("div#slideImgDiv").animate({
                left: '0',
                opacity: '1',
            });
        }, 500)
    }



// PRELOADER

// var divbox = "<div id='load-screen'><div id='loading'></div></div>";


// $("body").prepend(divbox);

// $('#load-screen').delay(800).fadeOut(600, function(){
//   $(this).remove();
// })



// PRELOADER





});