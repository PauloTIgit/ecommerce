<!doctype html>
<html lang="en">

<x-admin-header-css></x-admin-header-css>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="assets/images/logo-img.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Cadastre-se</h3>
                                        <p>Já tem uma conta? <a href="./entrar">Faça login aqui</a>
                                        </p>
                                    </div>
                                    <!-- <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                                                <span>Sign Up with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div> -->
                                    <div class="login-separater text-center mb-4"> <span>OU CADASTRE-SE COM O E-MAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" id="formSubmit">
                                            <div class="col-sm-6">
                                                <label for="inputFirstName" class="form-label">Primeiro nome</label>
                                                <input type="email" class="form-control" id="inputFirstName" placeholder="Jhon">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inputLastName" class="form-label">Sobrenome</label>
                                                <input type="email" class="form-control" id="inputLastName" placeholder="Deo">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Endereço de email</label>
                                                <input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Senha</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <label for="inputSelectCountry" class="form-label">País</label>
                                                <select class="form-select" id="inputSelectCountry" aria-label="Default select example">
                                                    <option selected>India</option>
                                                    <option value="1">United Kingdom</option>
                                                    <option value="2">America</option>
                                                    <option value="3">Dubai</option>
                                                </select>
                                            </div> -->
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Li e concordo com os Termos e Condições</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Cadastre-se</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <x-admin-footer-js></x-admin-footer-js>
    <script>
        $("#formSubmit").submit(function(e) {
            e.preventDefault()
            if ($(this).parsley().validate()) {
                var url = "{{ url('creat_user') }}";
                $.ajax({
                    url: url,
                    data: $('#formSubmit').serialize(),
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == 200) {
                            alert('Sucesso');
                        } else {
                            alert('Credenciais erradas');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Ocorreu um erro: ' + error);
                    }
                });
            } else {
                alert('Ocorreu um erro');
            }
        });
    </script>