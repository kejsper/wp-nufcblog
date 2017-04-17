$(document).ready(function () {
  var scrolltop = $('#scrolltop');
  var imgWrapper = $('p img');
  var cardAdjust = $('.single-card:last-child');

  // Hiding last card in most popular on small devices
  cardAdjust.addClass('hidden-md-down');


  // runs fitvid function that adjust yt/vimeo vids to window size
  $('iframe[src*="youtube"]').parent().fitVids();

  // init responsive image function
  changeSize();

  //Init show return to top arrow on refresh
  showScrolltop();

  //Init show return to top arrow on scroll
  $(document).on('scroll', function () {
  setTimeout(showScrolltop, 300);
  });
  //Scroll to top after click of return to top arrow
  scrolltop.on('click', function (event) {
  event.preventDefault();
  $('html, body').animate({scrollTop: 0}, 600);
  });

  // Shows scroll top arrow
  function showScrolltop () {
    var scrollPosition = $(document).scrollTop();
    if (scrollPosition > 50) {
      scrolltop.fadeIn(300);
    }
    else {
      scrolltop.fadeOut(300);
    }
  }

  // remove inline attributes for images and wrap them in responsive div
  function changeSize() {
    imgWrapper.removeAttr('width');
    imgWrapper.removeAttr('height');
    imgWrapper.addClass('custom-img');
    imgWrapper.removeClass('size-medium');
    imgWrapper.wrap('<div class="img-wrapper"></div>')
  }
});
