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

 if ($("#switch_responsabilidade1").is(":checked")) {
  $("#responsabilidade1").prop("readonly", false);
 } else {
  $("#responsabilidade1").prop("readonly", true);
 }

 $("#switch_responsabilidade1").click(function () {
  if ($("#switch_responsabilidade1").is(":checked")) {
   $("#responsabilidade1").prop("readonly", false);
  } else {
   $("#responsabilidade1").prop("readonly", true);
  }
 });


})
