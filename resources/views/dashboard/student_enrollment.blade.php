<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->


            <div class="row mt-4">




                <div class="col-xl-12 col-lg-12">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <h1>Bienvenido, porfavor acompleta tu registro escribiendo tu matrícula!</h1>
                                <br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let timerInterval
        Swal.fire({
            title: 'Seras redireccionado!',
            html: 'Para que actualices tus datos y así llevar a cabo este gran evento',
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    // b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)

            }
        }).then((result) => {
            $(location).attr('href', "<?php echo  route('profile.edit')  ?>");
        })
    })
</script>