<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'; ?>
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain ">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Bem-vindo de volta</h3>
                  <p class="mb-0">Digite seu e-mail e senha para entrar</p>
                </div>
                <div class="card-body">
                  <form id="formulario" role="form">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Email" name="Usuario">
                    </div>
                    <label>Senha</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Senha" name="Senha">
                    </div>

                    <div class="text-center">
                      <button type="submit" name="enviar" class="btn bg-gradient-info w-100 mt-4 mb-0">Logar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include 'js.php'; ?>
  <script>
    $('#formulario').validate({
      errorPlacement: function() {
        return false; //REMOVER MENSAGENS
      },
      errorClass: 'is-invalid',
      validClass: 'is-valid',
      submitHandler: function(form) {
        var data = $(form).serialize();
        $('input, [name=enviar]').attr('disabled', 'disabled');
        $.post('assets/ajax/login.php', data)
          .done(function(response) {
            if (response == 'correto') {
              window.location.href = "produto_list.php";
            }
            if (response == 'erro') {
              Swal.fire('Ooops!', 'E-mail ou senha incorretos!', 'error');
              $('input, button').removeAttr('disabled');
              $(form)[0].reset();
              $('input').removeClass('is-valid');
            }
            if (response == 'bloqueado') {
              Swal.fire('Ooops!', 'Usuário temporariamente indisponível!', 'error');
              $('input, button').removeAttr('disabled');
              $(form)[0].reset();
              $('input').removeClass('is-valid');
            }
          })
          .fail(function() {
            Swal.fire('Ooops!', 'Tente novamente em instantes!', 'error');
            $('input, [name=enviar]').removeAttr('disabled');
          });
      }
    });
  </script>
</body>

</html>