<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body onload="window.print()">
        <div id="tabledownload">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="max-width: 30px;">No.</th>
                        <th id="name_col_head" style="max-width: 30px;">Nama Lokasi</th>
                        <th id="kategori_col_head" style="max-width: 30px;">Kategori</th>
                        <th id="rt_col_head" style="max-width: 30px;">RT</th>
                        <th id="rw_col_head" style="max-width: 30px;">RW</th>
                        <th id="kelurahan_col_head" style="max-width: 30px;">Kelurahan</th>
                        <th id="kecamatan_col_head" style="max-width: 30px;">Kecamatan</th>
                        <th id="pic_1_col_head" style="max-width: 30px;">PIC 1</th>
                        <th id="no_telp_pic_1_col_head" style="max-width: 30px;">Telp PIC 1</th>
                        <th id="pic_2_col_head" style="max-width: 30px;">PIC 2</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($survey as $data)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="name_col">{{ $data->namalokasi }}</td>
                        <td class="kategori_col">{{ $data->kategori }}</td>
                        <td class="rt_col">{{ $data->rt }}</td>
                        <td class="rw_col">{{ $data->rw }}</td>
                        <td class="kelurahan_col">{{ $data->kelurahan }}</td>
                        <td class="kecamatan_col">{{ $data->kecamatan }}</td>
                        <td class="pic_1_col">{{ $data->pic1 }}</td>
                        <td class="no_telp_pic_1_col">{{ $data->telp1 }}</td>
                        <td class="pic_2_col">{{ $data->pic2 }}</td>
                        

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th id="no_telp_pic_2_col_head" style="max-width: 30px;">Telp PIC 2</th>
                        <th id="surveyor_col_head" style="max-width: 30px;">Surveyor</th>
                        <th id="tanggal_col_head" style="max-width: 30px;">Tanggal Survey</th>
                        <th id="lattitude_col_head" style="max-width: 30px;">Lattitude</th>
                        <th id="longtitude_col_head" style="max-width: 30px;">Longtitude</th>
                        <th id="img1_col_head" style="max-width: 30px;">Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($survey as $data)
                    <tr>
                        <td class="no_telp_pic_2_col">{{ $data->telp2 }}</td>
                        <td class="surveyor_col">{{ $data->namasurveyor }}</td>
                        <td class="tanggal_col">{{ $data->tanggal }}</td>
                        <td class="lattitude_col">{{ $data->lattitude }}</td>
                        <td class="longtitude_col">{{ $data->longtitude }}</td>
                        <td class="img1_col">
                            @foreach ($data->foto as $foto)

                            <img src="{{ url('storage/images/'.$foto->path)}}" alt="" width="100px">

                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous">
        window.print();

    </script>
    </body>

</html>