<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->

<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>
<!--app JS-->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script>
<script src="{{asset('snackbar/dist/js-snackbar.js')}}"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

<script>
    $(document).ready(function(e){
        $('#formSubmit').on('submit', (function(e){
            if($(this).parsley().validate()) {
                e.preventDefault();
                var formData = new FormData(this);
                var html = '<button class="btn btn-primary" type="button"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...</button>';
                var html1 = '<input id="submitButton" type="submit" class="btn btn-primary px-4" />';
                $('#submitButton').html(html);
                $.ajax({
                    type:'POST',
                    url:$(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(result)
                    {
                        if(result.status=='Success'){
                            showAlert(result.status, result.message);
                            $('#submitButton').html(html1);
                        }else{     
                            showAlert(result.status, result.message);
                            if(result.message == 'validation.mimes'){
                                result.message = 'Imagem invalida';
                            }
                            if(result.message == 'validation.required'){
                                result.message = 'Preencha todos campos obrigatorios';
                            }
                            $('#submitButton').html(html1);
                        }
                    },
                    error:function(result)
                    {
                        console.log(result.responseJSON);
                        showAlert(result.responseJSON.status, result.responseJSON.message);
                        $('#submitButton').html(html1);
                    }
                });
                // location.reload();
            }
        }))
    })
</script>
<script>
    function showAlert(status, message){
        SnackBar({
            status:status,
            message:message,
            position:'br'
        });
    }
</script>