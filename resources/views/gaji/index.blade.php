@extends('layouts.master')

@section('content')
<section class="content-header">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <h1>
        Data Gaji
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
<!-- /.box-header -->
            <div class="box-body">
              
            <form class="form" action="{{route('gaji/simpan')}}" method="POST">
              {{csrf_field()}}
              <div>
               <div class= "col-md-4">
                    <input class= "form-control form-control-sm" type= "date" name= "tgl" value="" required>
               </div>

             </div>
             
             <button type="submit" class="btn btn-primary">Simpan</button>
              
                            <a href="{{route('riwayat')}}" type="button" class="btn btn-warning">
                                Lihat Riwayat
                              </a>

            </form>



            
              <!-- <a href="/gaji/simpan" type="button" class="btn btn-default ">
                Simpan data
              </a> -->
              <div class="modal fade" id="modal-default">

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <div class="table-responsive">
              <table id="example2" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <!-- <th>Id Pegawai</th> -->
                  <th>Nama Lengkap</th>
                  <th>Skor Masa Kerja</th>
                  <th>Skor Pengalaman</th>
                  <th>Skor Tingkat Pendidikan</th>
                  <th>Skor Kelompok Kerja</th>
                  <th>Total Skor</th>
                  <th>Pengali</th>
                  <th>Gaji Pokok</th>
                  <th>Jml Tunjangan</th>
                  <th>Yang Diajukan</th>
                </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                @foreach($data as $row)
                <tr>
                <th>{{ $no++ }}</th>
                <td class= "hidden">{{$row->id}}</td>
                <td>{{$row->nama_lengkap}}</td>
                <td>{{$row->skor_masaker}}</td>
                <td>{{$row->skor_pengker}}</td>
                <td>{{$row->skor_tingkatpdk}}</td>
                <td>{{$row->skor_kelker}}</td>
                <td>{{$row->total_skor}}</td>
                <td>{{$row->pengali}}</td>
                <td>@currency($row->gaji_pokok)</td>
                <td>@currency($row->tunjangan)</td>
                <td>@currency($row->total)</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
    </section>
    <!-- /.content -->
    @endsection