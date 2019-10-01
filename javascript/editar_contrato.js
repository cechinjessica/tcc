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
 //////////////////////////////////////////////////////////////////////////////
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
 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_responsabilidade2").is(":checked")) {
  $("#responsabilidade2").prop("readonly", false);
 } else {
  $("#responsabilidade2").prop("readonly", true);
 }

 $("#switch_responsabilidade2").click(function () {
  if ($("#switch_responsabilidade2").is(":checked")) {
   $("#responsabilidade2").prop("readonly", false);
  } else {
   $("#responsabilidade2").prop("readonly", true);
  }
 });
 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_transferencia").is(":checked")) {
  $("#transferencia").prop("readonly", false);
 } else {
  $("#transferencia").prop("readonly", true);
 }

 $("#switch_transferencia").click(function () {
  if ($("#switch_transferencia").is(":checked")) {
   $("#transferencia").prop("readonly", false);
  } else {
   $("#transferencia").prop("readonly", true);
  }
 });
 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_condicao1").is(":checked")) {
  $("#condicao1").prop("readonly", false);
 } else {
  $("#condicao1").prop("readonly", true);
 }

 $("#switch_condicao1").click(function () {
  if ($("#switch_condicao1").is(":checked")) {
   $("#condicao1").prop("readonly", false);
  } else {
   $("#condicao1").prop("readonly", true);
  }
 });

})
