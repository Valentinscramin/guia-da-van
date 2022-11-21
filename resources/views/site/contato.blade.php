@extends('layouts.appSite')

@section('content')
<section>
    <div class="bannerTop">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-lg-8">
                    <div class="takeItem">
                        <div class="button_tag">
                            <h2>Fale conosco</h2>
                        </div>

                        <div class="title">
                            <h2>Entre em contato preenchendo o <span>formulário abaixo</span></h2>
                        </div>

                        <div class="description col-12 col-md-10 col-lg-9">Nossa equipe irá solucionar todas as suas dúvidas, porém você pode nos enviar sugestões ou críticas.</div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="imagem" style="width: 40%;"> <img src="{{ URL('/images/contact.jpg') }}" alt="" class="img-fluid"></div>
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
    jQuery("#contato").addClass("activeMenu");
</script>
@endsection