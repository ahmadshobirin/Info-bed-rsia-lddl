<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <style>
        th{
            text-align: center
        }
        td{
            font-weight: bolder;
            text-align: center
        }

        .merah{
            background-color: #e74c3c;
        }

        .hijau{
            background-color: #2ecc71;
        }

        h1{
            color:white;
        }

        .col-md-4{
            margin-top:30px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"><br>
                <div class="card">
                    <div class="card-header">
                        <h2 style="color:black"><b>INFORMASI TEMPAT TIDUR RAWAT INAP <br> RSIA Lombok dua dua Lontar</b></h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col-md-4">
                                    <div class="card-header">
                                        <center><h3>{{$item->kelas}}</h3></center>
                                    </div>
                                    @php
                                        $tersedia = (int) $item->kapasitas - (int) $item->terisi
                                    @endphp
                                    <div class="card-body {{ ($tersedia >= 0) ? 'hijau' : 'merah'}}  ">
                                        <center><h1><b>{{$tersedia}}</b></h1></center>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"><br>
                <div class="card">
                    <div class="card-header">
                        <h2 style="color:black"><b>KAMAR INAP</b></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kelas</th>
                                    <th>Kapasitas</th>
                                    <th>Terisi</th>
                                    <th>Tersedia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalKapasitas = 0;
                                    $totalTerisi = 0;
                                    $totalTersedia = 0;
                                @endphp
                                @foreach ($data as $item)
                                    @php
                                        $totalKapasitas += $item->kapasitas;
                                        $totalTerisi += $item->terisi;
                                        $tersedia = (int) $item->kapasitas - (int) $item->terisi;
                                        $totalTersedia = $tersedia;
                                    @endphp
                                    <tr class="{{$classColorRowTable[$loop->index]}}">
                                        <td>{{$item->kelas}}</td>
                                        <td>{{$item->kapasitas}}</td>
                                        <td>{{$item->terisi}}</td>
                                        <td>{{ $tersedia }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="">
                                    <td>JUMLAH</td>
                                    <td>{{ $totalKapasitas }}</td>
                                    <td>{{ $totalTerisi }}</td>
                                    <td>{{ $totalTersedia }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>