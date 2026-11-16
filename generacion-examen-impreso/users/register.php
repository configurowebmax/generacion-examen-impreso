<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="es" class="">
<?php require_once('inc/header.php') ?>

<body class="">
    <script>
        start_loader()
    </script>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        body {
            background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: brightness(.85);
        }

        #page-title {
            color: #fff4f4 !important;
            text-shadow: 3px 3px 7px #000
        }

        #sys-logo {
            height: 15rem;
            width: 15rem;
            object-fit: cover;
            object-position: center center;
        }

        img#cimg {
            height: 15vh;
            width: 15vh;
            object-fit: scale-down;
        }
    </style>

    <div id="main" class="h-100 d-flex flex-row align-item-center">
        <div class="col-5 h-100">
            <div class="d-flex flex-column h-100 w-100 align-items-center justify-content-center">
                <img src="<?= validate_image($_settings->info('logo')) ?>" alt="" id="sys-logo" class="img-thumbnail img-circle rounded-circle border border-4">
                <h1 class="text-center text-white px-4 py-5" id="page-title"><b><?php echo $_settings->info('name') ?></b></h1>
            </div>
        </div>
        <div class="col-7 h-100 bg-gradient-light">
            <div class="d-flex h-100 flex-column align-items-center justify-content-center w-100">
                <div class="card card-outline card-primary my-2 rounded-0 shadow w-75">
                    <div class="card-header">
                        <h5 class="card-title">Crear una Nueva Cuenta</h5>
                    </div>
                    <div class="card-body">
                        <form id="uregister-frm" action="" method="post">
                            <input type="hidden" name="id">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="firstname" class="control-label text-sm">Nombre</label>
                                        <input type="text" name="firstname" id="firstname" autofocus class="form-control form-control-sm form-control-border" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="middlename" class="control-label text-sm">Segundo Nombre</label>
                                        <input type="text" name="middlename" id="middlename" class="form-control form-control-sm form-control-border" placeholder="opcional">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastname" class="control-label text-sm">Apellido</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control form-control-sm form-control-border" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender" class="control-label text-sm">Género</label>
                                        <select name="gender" id="gender" class="form-control form-control-sm form-control-border" required="required">
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob" class="control-label text-sm">Fecha de Nacimiento</label>
                                        <input type="date" name="dob" id="dob" class="form-control form-control-sm form-control-border" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact" class="control-label text-sm">Teléfono</label>
                                        <input type="text" name="contact" id="contact" class="form-control form-control-sm form-control-border" required="required">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="control-label text-sm">Correo Electrónico</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-sm form-control-border" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="control-label text-sm">Contraseña</label>
                                        <div class="input-group input-sm">
                                            <input type="password" name="password" id="password" class="form-control form-control-sm form-control-border" required="required">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-default border-top-0 border-left-0 border-right-0 rounded-0 pass_view btn-sm" tabindex="-1"><i class="fa fa-eye-slash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword" class="control-label text-sm">Confirmar Contraseña</label>
                                        <div class="input-group input-sm">
                                            <input type="password" id="cpassword" class="form-control form-control-sm form-control-border" required="required">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-default border-top-0 border-left-0 border-right-0 rounded-0 pass_view btn-sm" tabindex="-1"><i class="fa fa-eye-slash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Avatar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="customFile">Elegir archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group d-flex justify-content-center">
                                        <img src="<?php echo validate_image('') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <a href="<?php echo base_url ?>">Ir al Sitio Web</a>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-warning btn-block btn-flat btn-sm">Registrarse</button>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="./login.php">¿Ya tienes una cuenta?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function displayImg(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cimg').attr('src', e.target.result);
                    _this.siblings('label').text(input.files[0].name)
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                $('#cimg').attr('src', "<?php echo validate_image('') ?>");
                _this.siblings('label').text('Elegir archivo')
            }
        }
        $(document).ready(function() {
            end_loader();
            $('.pass_view').click(function() {
                var group = $(this).closest('.input-group')
                var type = group.find('input').attr('type')
                if (type == 'password') {
                    group.find('input').attr('type', 'text').focus()
                    $(this).html('<i class="fa fa-eye"></i>')
                } else {
                    group.find('input').attr('type', 'password').focus()
                    $(this).html('<i class="fa fa-eye-slash"></i>')
                }
            })
            $('#uregister-frm').submit(function(e) {
                e.preventDefault();
                var _this = $(this)
                $('.err-msg').remove();
                var el = $('<div>')
                el.addClass('alert alert-danger err-msg')
                el.hide()
                if ($('#password').val() != $('#cpassword').val()) {
                    el.text('Las contraseñas no coinciden');
                    _this.prepend(el)
                    el.show('slow')
                    $("html, body").animate({
                        scrollTop: _this.closest('.card').offset().top
                    }, "fast");
                    return false;
                }
                start_loader();
                $.ajax({
                    url: _base_url_ + "classes/Users.php?f=save_ruser",
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    dataType: 'json',
                    error: err => {
                        console.log(err)
                        alert_toast("Ocurrió un error", 'error');
                        end_loader();
                    },
                    success: function(resp) {
                        if (typeof resp == 'object' && resp.status == 'success') {
                            location.replace("./login.php")
                        } else if (resp.status == 'failed' && !!resp.msg) {
                            el.text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')

                        } else {
                            el.text("Ocurrió un error")
                            _this.prepend(el)
                            el.show('slow')
                        }
                        $("html, body").animate({
                            scrollTop: _this.closest('.card').offset().top
                        }, "fast");
                        end_loader()
                    }
                })
            })
        })
    </script>
</body>

</html>