$(document).ready(function () {

 
// open menu 

$('.bar').click(function() {
    $('body').toggleClass('dog');
    $('nav').toggleClass('open');
})

});

$('.owl-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots: false,
    rtl:true,
    autoplay:true,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('.owl-elected').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    dots: false,
    rtl:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

$('.owl-elected2').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    dots: false,
    rtl:true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
})
$('.owl-slider .owl-nav .owl-prev ').html('<img src="./img/r1r.svg" alt="">')
$('.owl-slider .owl-nav .owl-next ').html('<img src="./img/r1l.svg" alt="r">')


$('.owl-elected .owl-nav .owl-prev ').html('<img src="./img/arr.svg" alt="">')
$('.owl-elected .owl-nav .owl-next ').html('<img src="./img/arl.svg" alt="r">')

$('.owl-elected2 .owl-nav .owl-prev ').html('<img src="./img/arr.svg" alt="">')
$('.owl-elected2 .owl-nav .owl-next ').html('<img src="./img/arl.svg" alt="r">')

