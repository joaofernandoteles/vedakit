$(".busca").select2({
  placeholder: "Selecione aqui",
  initSelection: function (element, callback) {},
});
$(".busca2").select2({
  placeholder: "Selecione aqui",
  initSelection: function (element, callback) {},
});
function cliente(IDCliente) {
  if (IDCliente >= 1) {
    $("#IDSubCliente").html("");
    $("#IDSubCliente").attr("disabled", "disabled");
    $.post("assets/ajax/subcliente.php?option=selectCampo", {
      IDCliente: IDCliente,
    }).done(function (response) {
      $("#IDSubCliente").html(response);
      $("#IDSubCliente").removeAttr("disabled");
    });
  }
}
