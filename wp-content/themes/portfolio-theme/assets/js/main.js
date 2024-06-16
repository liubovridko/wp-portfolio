
jQuery(document).ready(function($) {

   // Testimonials slider
   let currentIndex = 0;
   const $slider = $('.testimonial-slider');
   const $slides = $slider.children('.testimonial');
   const totalSlides = $slides.length;

   function showSlide(index) {
       $slides.removeClass('active');
       $slides.eq(index).addClass('active');
       $slider.css('transform', 'translateX(' + (-index * 100 ) + '%)');
       $('.indicator').removeClass('active');
       $('.indicator').eq(index).addClass('active');
   }

   $('.prev').click(function() {
       currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalSlides - 1;
       showSlide(currentIndex);
   });

   $('.next').click(function() {
       currentIndex = (currentIndex < totalSlides - 1) ? currentIndex + 1 : 0;
       showSlide(currentIndex);
   });

   $('.indicator').click(function() {
       const index = $(this).index();
       currentIndex = index;
       showSlide(index);
   });

   // Initialize
   showSlide(currentIndex);

   // Remove attr rows
   $('textarea[name="textarea-1"]').attr('rows', '0');
});

