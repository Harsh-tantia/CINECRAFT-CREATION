$(document).ready(function () {
  $('.slick-slider').slick({
    slidesToShow: 3,  // Default to 3 slides on desktop
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: '<div class="slick-prev"><</div>',
    nextArrow: '<div class="slick-next">></div>',
    responsive: [
      {
        breakpoint: 768,  // Adjust for mobile view
        settings: {
          slidesToShow: 1,  // Show only 1 slide on mobile
          slidesToScroll: 1,
          arrows: false,    // Optional: hide arrows on mobile
        }
      }
    ]
  });
});
