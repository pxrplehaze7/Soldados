<?php
error_reporting(E_ERROR);
require("./config/conexion.php");
require("./config/session.php");
require("./config/estado_soldados.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - FFAASTATUS</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="./styles/app.css">
    <link href="./styles/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/d78cf7985a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body id="page-top">

    <div id="wrapper">
        <?php require('./partials/menu.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require('./partials/toolbar.php') ?>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Combatientes vivos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_vivos['n_vivos'] ?></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dangers text-uppercase mb-1">
                                                Combatientes muertos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_muertos['n_muertos'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Combatientes Heridos
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_heridos['n_heridos'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Combatientes Prisioneros</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_prisioneros['n_prisioneros'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Combatientes Desaparecidos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_desaparecidos['n_desaparecidos'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Pie Chart -->
                        <div class="col-xl-5 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Nuestras fuerzas</h6>
                                </div>

                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myChart"></canvas>

                                        <script>
                                            // Pie Chart Example
                                            var ctx = document.getElementById("myChart");
                                            var myChart = new Chart(ctx, {
                                                plugins: [ChartDataLabels],
                                                type: 'doughnut',
                                                data: {
                                                    labels: ['Vivos', 'Muertos', 'Heridos', 'Prisioneros', 'Desaparecidos'],

                                                    datasets: [{
                                                        data: [
                                                            <?php echo $porcentajeV ?>,
                                                            <?php echo $porcentajeM ?>,
                                                            <?php echo $porcentajeH ?>,
                                                            <?php echo $porcentajeP ?>,
                                                            <?php echo $porcentajeD ?>
                                                        ],
                                                        backgroundColor: ['#5cb52a', '#ee6666', '#5470c6', '#fd8137', '#25262b'],
                                                        hoverBorderColor: "white",
                                                 
                                                       
                                                    }],
                                                },
                                                options: {
                                                    events: ['mousemove'],
                                                    maintainAspectRatio: false,

                                                    plugins: {
                                                        legend: {
                                                            position: 'bottom',
                                                            align: 'center',
                                                            labels: {
                                                                
                                                                
                                                                usePointStyle: true,
                                                                padding: 30,
                                                                font: {
                                                                    size: 14,
                                                                    fontStyle: "bold"
                                                                }
                                                               
                                                            }
                                                        },
                                                        tooltip: {
                                                            enabled: false,
                                                            borderWidth: 1,
                                                            displayColors: true,
                                                        },
                                                        datalabels: {
                                                            formatter: (dato) => dato.toFixed(0) + "%",
                                                            color: "white",
                                                            fontStyle: "bold"
                                                        }

                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require('./partials/footer.html') ?>

            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js" integrity="sha512-+QnjQxxaOpoJ+AAeNgvVatHiUWEDbvHja9l46BHhmzvP0blLTXC4LsvwDVeNhGgqqGQYBQLFhdKFyjzPX6HGmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>