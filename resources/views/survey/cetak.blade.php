<!doctype html>
<html lang="en">
    <form class="form-inline">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
                crossorigin="anonymous">
            <title>Life Media</title>
        </head>

        <body onload="window.print()">
            <div class="container mt-5">
                <h1 class="text-center"><u> Data Survey Wifi Publik {{ $survey->namalokasi }}</u></h1>
                <div>
                    <div>
                        <table>
                            <tr>
                                <th style="min-width: 180px;">Nama Lokasi</th>
                                <td>:  {{ $survey->namalokasi }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Kategori</th>
                                <td>:  {{ $survey->kategori }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">RT</th>
                                <td>:  {{ $survey->rt }}</td>
                            </tr> 
                            <tr>
                                <th style="min-width: 180px;">RW</th>
                                <td>:  {{ $survey->rw }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Kelurahan</th>
                                <td>:  {{ $survey->kelurahan }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Kecamatan</th>
                                <td>:  {{ $survey->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">PIC 1</th>
                                <td>:  {{ $survey->pic1 }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">No Telp PIC 1</th>
                                <td>:  {{ $survey->telp1 }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">PIC 2</th>
                                <td>:  {{ $survey->pic2 }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">No Telp PIC 2</th>
                                <td>:  {{ $survey->telp2 }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Surveyor</th>
                                <td>:  {{ $survey->namasurveyor }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Tanggal Survey</th>
                                <td>:  {{ $survey->tanggal }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Lattitude</th>
                                <td>:  {{ $survey->lattitude }}</td>
                            </tr>
                            <tr>
                                <th style="min-width: 180px;">Longtitude</th>
                                <td>:  {{ $survey->longtitude }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                        @foreach($survey->foto->take(4) as $foto)
                        <img src="{{ url('storage/images/'.$foto->path)}}" alt="" width="250px">
                        @endforeach
                        </div>
                    </div>
                    @push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
                        crossorigin="anonymous">
                        window.print();

                    </script>
                    @endpush
                </div>
        </body>
    </form>

</html>