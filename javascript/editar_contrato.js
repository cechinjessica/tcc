$(document).ready(function () {
 if ($("#switch1").is(":checked")) {
  $("#textarea1").prop("readonly", false);
 } else {
  $("#textarea1").prop("readonly", true);
 }

 $("#switch1").click(function () {
  if ($("#switch1").is(":checked")) {
   $("#textarea1").prop("readonly", false);
  } else {
   $("#textarea1").prop("readonly", true);
  }
 });

 $("#switch1").change(function () {
  if ($("#switch1").is(":checked")) {
   $("#textarea1").prop("readonly", false);
  } else {
   $("#textarea1").prop("readonly", true);
  }
 });

})
