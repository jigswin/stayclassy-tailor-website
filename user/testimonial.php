


<!DOCTYPE html>
<html>
<head>
    <title>www.thestayclassy.com</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">


<style type="text/css">
#container1{
    background-color: red;
    margin-top: 5rem;
    padding: 8rem
}
    .testimonial{
    text-align: center;
}
.testimonial .pic{
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto;
    margin-bottom: 3rem
    
}
.testimonial .pic img{
    width: 100%;
    height: 100%;
    border-radius: 50%;
}
.testimonial .testimonial-title{
    display: inline-block;
    font-weight: 600;
    color: #0c4767;
    margin-bottom: 3rem;
    font-size: 2.4rem;
    
}
.testimonial .testimonial-title small{
    font-size: 1.8rem;
    font-weight: 600;
    color: #787878;
}
.testimonial .description{
    font-size: 14px;
    color: #787878;
    line-height: 10px;
    position: relative;
    margin: 0;
}

.owl-theme .owl-controls .owl-page span{
    background: #fff;
    border: 2px solid #0c4767;
    opacity: 1;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls .owl-page:hover span{
    border: 2px solid #fa7921;
}
#testi{
    font-size: 1.8rem;

}
@media (max-width: 500px){
    #container1{
        background-color: yellow;
        padding-right: 3rem;
        padding-left: 3rem;
    }
}

</style>
</head>
<body>


<div class="container" id="container1">
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                <div class="testimonial">
                    <div class="pic" >
                       <img src="image/ban.jpg" alt="">
                    </div>
                    <h3 class="testimonial-title" style="">
                        Williamson<small>, Web Developer</small>
                    </h3>
                     <p id="testi">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim diam, tempus vel ultricies viverra, luctus in elit. Aliquam tempus blandit velit, in pharetra ex volutpat a. Cras eu augue ac nisl tempor commodo.
                    </p> 
                </div>
 
                <div class="testimonial">
                    <div class="pic">
                        <img src="image/ban.jpg" alt="">
                    </div>
                    <h3 class="testimonial-title">
                        Kristiana<small>, Web Designer</small>
                    </h3>
                    <p id="testi">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim diam, tempus vel ultricies viverra, luctus in elit. Aliquam tempus blandit velit, in pharetra ex volutpat a. Cras eu augue ac nisl tempor commodo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

 




<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
    
</script>
<script type="text/javascript">
 
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:false,
        navigationText:["",""],
        slideSpeed:1000,
        singleItem:true,
        transitionStyle:"fade",
        autoPlay:true
    });
});
</script>

</body>
</html>