// back to top button 
var btn = $("#buttonTop");

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass("showBtn");
  } else {
    btn.removeClass("showBtn");
  }
});

btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "300");
});
// back to top button end