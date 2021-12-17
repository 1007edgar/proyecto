<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HOTEL  MAUVA</title>
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("fonts/css/font-awesome.css"); ?>"/>
    <style>
     html,body{
        background-image: url('/imagenes/fondo-login.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }


</style>
</head>
<body>
    <div id="template-bg-1">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">

            <div class="card p-4 text-light bg-dark mb-5">
                <div class="card-header">
                    <h3>Iniciar Sesión</h3>
                </div>
                <div class="card-body w-100">
                    <form name="login"  action="<?php echo base_url(); ?>main/login_validacion" method="post">
                        <div class="input-group form-group mt-3">
                            <div class="bg-secondary rounded-start">
                                <span class="m-3"><i
                                    class="fas fa-user mt-2"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control" placeholder="usuario" value="josefina">
                            </div>
                            <span class="text-danger"><?php echo form_error('username'); ?></span>  
                            <div class="input-group form-group mt-3">
                                <div class="bg-secondary rounded-start">
                                    <span class="m-3"><i class="fas fa-key mt-2"></i></span>
                                </div>
                                <input type="password" class="form-control"
                                placeholder="contraseña" name="password" value="josefina">
                            </div>
                            <span class="text-danger"><?php echo form_error('password'); ?></span>  

                            <div class="form-group mt-3">
                                <div class="form-group">  
                                    <input type="submit" name="insert" value="Iniciar Sesión" class="btn bg-secondary float-end text-white w-100" />  
                                    <?php echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>'; ?>  
                                </div>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

