$(".toggle-1").on("click", function() {
  $(".toggle-1").toggleClass("checked");
  if(!$('input[name="cash"]').prop("checked")) {
    $(".toggle-1 input").prop("checked", true);
  } else {
    $(".toggle-1 input").prop("checked", false);
  }
});

$(".toggle-2").on("click", function() {
  $(".toggle-2").toggleClass("checked");
  if(!$('input[name="payment"]').prop("checked")) {
    $(".toggle-2 input").prop("checked", true);
  } else {
    $(".toggle-2 input").prop("checked", false);
  }
});

$(".toggle-3").on("click", function() {
  $(".toggle-3").toggleClass("checked");
  if(!$('input[name="no_payment"]').prop("checked")) {
    $(".toggle-3 input").prop("checked", true);
  } else {
    $(".toggle-3 input").prop("checked", false);
  }
});
