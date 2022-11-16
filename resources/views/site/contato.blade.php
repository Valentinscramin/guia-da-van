@extends('layouts.appSite')

@section('content')
<section>
    <div class="bannerTop">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-lg-8">
                    <div class="takeItem">
                        <div class="button_tag">
                            <h2>O que fazemos?</h2>
                        </div>

                        <div class="title">
                            <h2>A procura por vans de <span>forma simples e eficaz</span></h2>
                        </div>

                        <div class="description col-12 col-md-10 col-lg-9">Guia da Van é um sistema desenvolvido para facilitar a oferta e procura por serviços com Vans através do cadastro pelos próprios proprietários de uma forma muito simples.</div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="imagem" style="position: absolute; right: 0; text-align: right; z-index: 2;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery("#contato").addClass("activeMenu");
</script>
@endsection