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
 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_condicao2").is(":checked")) {
  $("#condicao2").prop("readonly", false);
 } else {
  $("#condicao2").prop("readonly", true);
 }

 $("#switch_condicao2").click(function () {
  if ($("#switch_condicao2").is(":checked")) {
   $("#condicao2").prop("readonly", false);
  } else {
   $("#condicao2").prop("readonly", true);
  }
 });
 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_recisao1").is(":checked")) {
  $("#recisao1").prop("readonly", false);
 } else {
  $("#recisao1").prop("readonly", true);
 }

 $("#switch_recisao1").click(function () {
  if ($("#switch_recisao1").is(":checked")) {
   $("#recisao1").prop("readonly", false);
  } else {
   $("#recisao1").prop("readonly", true);
  }
 });
 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_recisao2").is(":checked")) {

  $("#switch_recisao1").prop("checked", true);
  $("#recisao2").prop("readonly", false);
 } else {
  $("#recisao2").prop("readonly", true);
 }

 $("#switch_recisao2").click(function () {
  if ($("#switch_recisao2").is(":checked")) {
   $("#recisao2").prop("readonly", false);
   $("#switch_recisao1").prop("checked", true);
   $("#recisao1").prop("readonly", false);
  } else {
   $("#recisao2").prop("readonly", true);
  }
 });

 /////////////////////////////////////////////////////////////////////////////
 if ($("#switch_foro").is(":checked")) {
  $("#foro").prop("readonly", false);
 } else {
  $("#foro").prop("readonly", true);
 }

 $("#switch_foro").click(function () {
  if ($("#switch_foro").is(":checked")) {
   $("#foro").prop("readonly", false);
  } else {
   $("#foro").prop("readonly", true);
  }
 });
 ////////////////////////////////////////////////////////////////////////////////



})
