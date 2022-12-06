@extends('layouts.app')

@section('content')
    <div class="container">
        @if (is_null(Auth::user()->cpf_cnpj))
            <br>
            <div class="alert alert-warning mx-auto" role="alert">
                Deseja cadastrar sua primeira van e poder fazer upload de imagens? Preencha todos os dados do seu <a
                    href="{{ URL('/user/profile') }}">perfil</a>.
            </div>
        @endif
        @if (session('status'))
            <br>
            <div class="alert alert-success mx-auto" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <canvas id="acessos" width="100%"></canvas>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        jQuery("#dashboard").addClass("active_dashboard");

        var months = <?php echo $months; ?>;
        var acessos = <?php echo $acessos; ?>;

        var AcessosChartData = {
            labels: months,
            datasets: [{
                label: 'Acessos',
                backgroundColor: "purple",
                data: acessos
            }]
        };

        window.onload = function() {
            // Acessos
            var ctx = document.getElementById("acessos").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'radar',
                data: AcessosChartData,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: '#c1c1c1',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Acessos no site',
                    }
                }
            });
        }
    </script>
@endsection
