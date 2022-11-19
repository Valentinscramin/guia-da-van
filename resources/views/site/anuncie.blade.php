@extends('layouts.appSite')

@section('content')
<section>
    <div class="bannerTop">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-lg-8">
                    <div class="takeItem">
                        <div class="button_tag">
                            <h2>Anuncie conosco</h2>
                        </div>

                        <div class="title">
                            <h2>Quer ter sua marca aparecendo no <span>Guia da Van?</span></h2>
                        </div>

                        <div class="description col-12 col-md-10 col-lg-9">Preenche seus dados abaixo e logo entraremos em contato. Estamos aguardando ansiosamente sua parceira.</div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="imagem" style="width: 40%;"> <img src="{{ URL('/images/anuncie-aqui.jpg') }}" alt="" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="default_page">
        <div class="container">
            <div class="row no-gutters">
                <div class="formulario col-12 col-lg-10 col-xl-8" style="margin: 0 auto;">Formulário Aqui</div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery("#anuncie").addClass("activeMenu");
</script>
@endsection