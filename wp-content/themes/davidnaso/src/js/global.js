var loader = {

    show: function(callback)
    {
        $('.preloader').fadeIn(function()
        {
            if ('function' === typeof callback)
            {
                callback();
            }
        });
    },

    hide: function(callback)
    {
        $('.preloader').fadeOut(function()
        {
            if ('function' === typeof callback)
            {
                callback();
            }
        });
    }
};


// Add slideDown animation to dropdown

window.onload = function()
{
    


    $('.dropdown').on('show.bs.dropdown', function(e)
    {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(200);
    });


    $('.dropdown').on('hide.bs.dropdown', function(e)
    {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });

    var hasShrunk = false;

    if ($(window).width() > 768) {
        
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() 
        {

            if (document.body.scrollTop > 90 || document.documentElement.scrollTop > 90) 
            {
            
               
                $(".uxjason-header-logo").css({"max-height" : "40px", "transition": "max-height 0.3s ease-in-out" }, {queue: false });
            }
            else 
            {
                $(".uxjason-header-logo").css({"max-height" : "75px", "transition": "max-height 0.3s ease-in-out"  }, {queue: false });
            }
        }
    }
};

$(window).scroll(function() 
    
    {    
        var scroll = $(window).scrollTop();

        if (scroll >= 50) 
        {
           $(".navbar-brand").addClass("rotate");
        }
        else
        {
           $(".navbar-brand").removeClass("rotate"); 
        }
    });



// // Footer chevron scroll mobile
$('#footer-chevron-scroll-mobile').click(function(event) 
{
    $('html, body').animate({ scrollTop: 0 }, 600);
    
    return false;
});

// Footer chevron scroll
$('#footer-chevron-scroll').click(function(event) 
{
    $('html, body').animate({ scrollTop: 0 }, 600);

    return false;
});


// Portfolio modal https://www.w3schools.com/howto/howto_css_modal_images.asp

window.onload = function()
{
if(document.getElementById("myModal"))
{

    var modal = document.querySelectorAll(".myModal");

    var portfolioImg = document.querySelectorAll(".portfolio-image");

    var modalImg = document.getElementById("modalImage");

    var captionText = document.getElementById("caption");


    for (i = 0; i < portfolioImg.length; ++i) 
    {

        portfolioImg[i].onclick = function()
        {
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

    }

    var modal = document.getElementById('myModal');

    modal.addEventListener('click',function()
    {
        this.style.display = "none";
    });

    var span = document.getElementsByClassName("close-modal")[0];

    span.onclick = function() 
    { 
      modal.style.display = "none";
    }
}
}
