@extends('layouts.appAdmin')

@section('content')
<div class="content_middle_dashboard">
    <div class="container">
        <div class="row no-gutters">
            <div class="takeCardsGraphic">
                <div class="card_graphic col-12 col-md-6">
                    <div class="takeItem">
                        <canvas id="user" width="100%"></canvas>
                    </div>
                </div>
                <div class="card_graphic col-12 col-md-6">
                    <div class="takeItem">
                        <canvas id="vans" width="100%"></canvas>
                    </div>
                </div>
                <div class="card_graphic col-12 col-md-6">
                    <div class="takeItem">
                        <canvas id="acessos" width="100%"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    jQuery("#dashboard").addClass("active_dashboard");

    var months = <?php echo $months; ?>;
    var user = <?php echo $user; ?>;
    var vans = <?php echo $vans; ?>;
    var acessos = <?php echo $acessos; ?>;

    var AcessosChartData = {
        labels: months,
        datasets: [{
            label: 'Acessos',
            backgroundColor: "purple",
            data: acessos
        }]
    };

    var UserChartData = {
        labels: months,
        datasets: [{
            label: 'Usuario',
            backgroundColor: "blue",
            data: user
        }]
    };

    var VanChartData = {
        labels: months,
        datasets: [{
            label: 'Vans',
            backgroundColor: "yellow",
            data: vans
        }]
    };

    window.onload = function() {

        // USER
        var ctx = document.getElementById("user").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: UserChartData,
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
                    text: 'Usuarios Cadastrados',
                }
            }
        });

        // Vans
        var ctx = document.getElementById("vans").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: VanChartData,
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
                    text: 'Vans cadastradas',
                }
            }
        });

        // Acessos
        var ctx = document.getElementById("acessos").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
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

    };
</script>
@endsection