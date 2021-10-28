<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> -->
    <link type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- Styles -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.2.1/dist/echarts.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="col-12" style="margin-top: 20px;">

    </div>
    <div class="container">
        <div class="col">
            <div class="card">
                <div class="card-header bg-warning">
                    COMTELINDO RAI
                </div>
                <div class="card-body">
                    <div class="container">

                        <div class="col-12" style="padding-left: 120px;">

                            <div class="row">
                                @foreach ($data_udang as $data)
                                <div class="col-sm-5">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            {{ $data->nama_kolam }} &nbsp; <?= date('d/m/Y'); ?>
                                        </div>
                                        <div class="card-body">

                                            <!-- <h5 class="card-title"></h5> -->
                                            <p class="card-text">Suhu: {{ $data->suhu }}</p>
                                            <p class="card-text">TH: {{ $data->th }}</p>
                                            <!-- <a href="#" class="btn btn-info">Detail</a> -->
                                            <a data-toggle="tooltip" id="detail" data-id="{{ $data->id_kolam }}" data-original-title="Detail" class="btn btn-info detail">Selengkapnya</a>
                                            <!-- <button class="btn btn-info" id="detail">Detail</button> -->
                                            <!-- <button class="btn btn-info">Detail<input type="hidden" value="{{$data->id}}"></button> -->
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>

                <p>

                    {!! $chart->container() !!}

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                    {!! $chart->script() !!}

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered data_tabel">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Suhu</th>
                                    <th scope="col">TH</th>
                                </tr>
                            </thead>
                            <tbody id="isiTabel">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->


    <script src="https://code.highcharts.com/highcharts.js"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // $('.data_tabel').DataTable();


            // /* When click edit user */
            $('body').on('click', '.detail', function() {
                var id = $(this).data('id');
                // alert(id)
                $.get('/get_kolam/' + id + '/show', function(data) {

                    // console.log(data.tabel);
                    // $('.data_tabel').DataTable();
                    $('#exampleModal').modal('show');
                    $('#exampleModalLabel').html(data.nama_kolam);
                    $('#isiTabel').html(data.tabel);

                })
            });



        });
    </script>


</body>

</html>