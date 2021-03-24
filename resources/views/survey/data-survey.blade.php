@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5 mb-5" style="overflow-x:auto;">
    <div class="noprint">
        <div class="row mb-3">
            <div class="col-md-11">
                <a class="btn btn-primary" href="{{ URL::to('/download-data') }}">Export to PDF</a>
                <a  href="{{ route('home') }}" class="btn btn-danger" type="submit">Tambah Data</a>
                <a  class="btn btn-secondary" type="submit" onclick="window.print()">Cetak</a>  
            </div>
            <div class="col-md-1">
                <a class="btn btn-primary" href="{{ URL::to('/pwa') }} "type="submit">Setting to PWA</a>
            </div>
            
        </div>
        <p>Klik Untuk Sembunyikan kolom</p>
        <div class="row mt-1 mb-1">
            <div class="col">
                <input type="checkbox" checked="checked" value="hide" id="name_col" onchange="hide_show_table(this.id);"> Name
                <input type="checkbox" checked="checked" value="hide" id="kategori_col" onchange="hide_show_table(this.id);"> Kategori
                <input type="checkbox" checked="checked" value="hide" id="rt_col" onchange="hide_show_table(this.id);"> RT
                <input type="checkbox" checked="checked" value="hide" id="rw_col" onchange="hide_show_table(this.id);"> RW
                <input type="checkbox" checked="checked" value="hide" id="kelurahan_col" onchange="hide_show_table(this.id);"> Kelurahan
                <input type="checkbox" checked="checked" value="hide" id="kecamatan_col" onchange="hide_show_table(this.id);"> Kecamatan
                <input type="checkbox" checked="checked" value="hide" id="pic_1_col" onchange="hide_show_table(this.id);"> PIC 1
                <input type="checkbox" checked="checked" value="hide" id="no_telp_pic_1_col" onchange="hide_show_table(this.id);"> Telp PIC 1
                <input type="checkbox" checked="checked" value="hide" id="pic_2_col" onchange="hide_show_table(this.id);"> PIC 2
                <input type="checkbox" checked="checked" value="hide" id="no_telp_pic_2_col" onchange="hide_show_table(this.id);"> Telp PIC 2
                <input type="checkbox" checked="checked" value="hide" id="surveyor_col" onchange="hide_show_table(this.id);"> Surveyor
                <input type="checkbox" checked="checked" value="hide" id="tanggal_col" onchange="hide_show_table(this.id);"> Tanggal
                <input type="checkbox" checked="checked" value="hide" id="lattitude_col" onchange="hide_show_table(this.id);"> Lattitude
                <input type="checkbox" checked="checked" value="hide" id="longtitude_col" onchange="hide_show_table(this.id);"> Longtitude
                <input type="checkbox" checked="checked" value="hide" id="img1_col" onchange="hide_show_table(this.id);"> Gambar1

            </div>
        </div>
    </div>
    @if(!$survey->isEmpty())
    <form class="noprint" action="{{ url()->current() }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Cari Data (Nama/Kategori/Kelurahan/RW)"
                    name="keyword">
            </div>
            <div class="col-md-6">
                <button id="btnsearch" class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
    @else
    <div class="row text-center mb-5">
        <h3 class="font-weight-bold">Belum Ada Data</h3>
    </div>
    @endif
    <table id="example">
        @if(!$survey->isEmpty())
        <tr>
            <th style="min-width: 10px;">No.</th>
            <th id="name_col_head" style="min-width: 180px;">Nama Lokasi</th>
            <th id="kategori_col_head" style="min-width: 100px;">Kategori</th>
            <th id="rt_col_head" style="min-width: 100px;">RT</th>
            <th id="rw_col_head" style="min-width: 100px;">RW</th>
            <th id="kelurahan_col_head" style="min-width: 100px;">Kelurahan</th>
            <th id="kecamatan_col_head" style="min-width: 100px;">Kecamatan</th>
            <th id="pic_1_col_head" style="min-width: 100px;">PIC 1</th>
            <th id="no_telp_pic_1_col_head" style="min-width: 180px;">No Telp PIC 1</th>
            <th id="pic_2_col_head" style="min-width: 100px;">PIC 2</th>
            <th id="no_telp_pic_2_col_head" style="min-width: 180px;">No Telp PIC 2</th>
            <th id="surveyor_col_head" style="min-width: 100px;">Surveyor</th>
            <th id="tanggal_col_head" style="min-width: 180px;">Tanggal Survey</th>
            <th id="lattitude_col_head" style="min-width: 100px;">Lattitude</th>
            <th id="longtitude_col_head" style="min-width: 100px;">Longtitude</th>
            <th id="img1_col_head" id="actions" style="min-width: 300px;">Image</th>
            <th class="noprint" id="actions" style="min-width: 300px;">Actions</th>
        </tr>
        @else
        @endif
        @forelse ($survey as $data)
        <tr>
            <td>{{ $loop->iteration + $survey->firstItem() - 1 }}</td>
            <td class="name_col">{{ $data->namalokasi }}</td>
            <td class="kategori_col">{{ $data->kategori }}</td>
            <td class="rt_col">{{ $data->rt }}</td>
            <td class="rw_col">{{ $data->rw }}</td>
            <td class="kelurahan_col">{{ $data->kelurahan }}</td>
            <td class="kecamatan_col">{{ $data->kecamatan }}</td>
            <td class="pic_1_col">{{ $data->pic1 }}</td>
            <td class="no_telp_pic_1_col">{{ $data->telp1 }}</td>
            <td class="pic_2_col">{{ $data->pic2 }}</td>
            <td class="no_telp_pic_2_col">{{ $data->telp2 }}</td>
            <td class="surveyor_col">{{ $data->namasurveyor }}</td>
            <td class="tanggal_col">{{ $data->tanggal }}</td>
            <td class="lattitude_col">{{ $data->lattitude }}</td>
            <td class="longtitude_col">{{ $data->longtitude }}</td>
            <td class="img1_col">
                @foreach($data->foto->take(1) as $foto)
                <a href="{{ url('storage/images/'.$data->fotoFirst->path) }}" download>
                    <img src="{{ url('storage/images/'.$data->fotoFirst->path) }}" alt="" width="100px">
                </a>
                @endforeach
            </td>
            <td class="noprint">
                <div class="row">
                    <div class="col-3">
                        <form action="/detail/{{ $data->id }}">
                            <button class="btn btn-primary">
                                Detail
                            </button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="/edit-data/{{ $data->id }}">
                            <button type="submit" class="btn btn-warning">
                                Edit
                            </button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form method="post" action="/delete/{{ $data->id }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini ?')"
                                type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </td>
            @empty
            <div class="row justify-content-center">
                <img class="img-fluid" src="{{ asset('img/nodata.jpg') }}">
            </div>
            @endforelse
        </tr>
    </table>
</div>
{!! $survey->links() !!}

@push('scripts')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
    function hide_show_table(col_name) {
        var checkbox_val = document.getElementById(col_name).value;
        if (checkbox_val == "hide") {
            var all_col = document.getElementsByClassName(col_name);
            for (var i = 0; i < all_col.length; i++) {
                all_col[i].style.display = "none";
            }
            document.getElementById(col_name + "_head").style.display = "none";
            document.getElementById(col_name).value = "show";
        } else {
            var all_col = document.getElementsByClassName(col_name);
            for (var i = 0; i < all_col.length; i++) {
                all_col[i].style.display = "table-cell";
            }
            document.getElementById(col_name + "_head").style.display = "table-cell";
            document.getElementById(col_name).value = "hide";
        }
    }

</script>
@endpush

@endsection