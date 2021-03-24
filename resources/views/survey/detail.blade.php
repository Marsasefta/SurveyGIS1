<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Detail</title>
    </head>

    <body>
        <div class="container d-flex justify-content-center mt-5 p-5 border">
            <div class="row">
                <div class="col-4">
                    <table>
                        <tr>
                            <th style="min-width: 180px;">Nama Lokasi</th>
                            <td>{{ $survey->namalokasi }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Kategori</th>
                            <td>{{ $survey->kategori }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">RT</th>
                            <td>{{ $survey->rt }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">RW</th>
                            <td>{{ $survey->rw }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Kelurahan</th>
                            <td>{{ $survey->kelurahan }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Kecamatan</th>
                            <td>{{ $survey->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">PIC 1</th>
                            <td>{{ $survey->pic1 }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">No Telp PIC 1</th>
                            <td>{{ $survey->telp1 }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">PIC 2</th>
                            <td>{{ $survey->pic2 }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">No Telp PIC 2</th>
                            <td>{{ $survey->telp2 }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Surveyor</th>
                            <td>{{ $survey->namasurveyor }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Tanggal Survey</th>
                            <td>{{ $survey->tanggal }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Lattitude</th>
                            <td>{{ $survey->lattitude }}</td>
                        </tr>
                        <tr>
                            <th style="min-width: 180px;">Longtitude</th>
                            <td>{{ $survey->longtitude }}</td>
                        </tr>
                    </table>
                    <form action="/cetak/{{ $survey->id }}">
                        <button class="btn btn-primary mt-3"
                            onclick="window.onload = function() { window.print(); }">Cetak</button>
                    </form>
                </div>
                <div class="col-8">
                    @foreach($survey->foto as $foto)
                    <a href="{{ url('storage/images/'.$foto->path) }}" download>
                        <img src="{{ url('storage/images/'.$foto->path) }}" alt="" width="300px">
                    </a>
                    @endforeach
                </div>
            </div>

            @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
                crossorigin="anonymous">
            </script>
            @endpush
    </body>

</html>