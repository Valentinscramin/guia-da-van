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

                        <div class="description col-12 col-md-10 col-lg-9">Preenche seus dados abaixo e logo entraremos em contato. Estamos aguardando ansiosamente com a sua parceira.</div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="imagem" style="position: absolute; right: 0; text-align: right; z-index: 2;"> </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery("#anuncie").addClass("activeMenu");
</script>
@endsection