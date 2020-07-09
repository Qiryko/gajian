@extends('layouts.master')

@section('content')
<section class="content-header">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <h1>
        Data Pegawai
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

<div>
<!--         <div class="col-xs-12">
          <div class="box"> -->
<!-- /.box-header -->
            <div class="box-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <select name="filter_jenis" id="filter_jenis" class="form-control" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group">
                      {{csrf_field()}}
                        <select name="filter_status" id="filter_status" class="form-control" required>
                            <option value="">Status Pegawai</option>
                            @foreach($statuspegawai as $status)

                            <option value="{{$status->status}}">{{$status->status}}</option>

                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-2">
                    <div class="form-group" textalign="center">
                        <button type="button" name="filter" id="filter" onclick="getData()" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                    </div>
                </div>
                <div>
                            <a href="{{route('dashboard/create')}}" type="button" class="btn btn-primary ">
                                Tambah Data
                              </a>
                </div>
              <div class="modal fade" id="modal-default">

            <!-- /.modal-content -->
          </div>
        </div>
          <!-- /.modal-dialog -->
        
        <div class="table-responsive">
              <table id="dashboard-table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Status Menikah</th>
                  <th>Tingkat Pendidikan</th>
                  <th>Tanggal Masuk</th>
                  <th>Masa Kerja</th>
                  <th>Status Pegawai</th>
                  <th>Jabatan Struktural</th>
                  <th>PKWT</th>
                  <th>Agama</th>
                  <th>Tanggal Lahir</th>
                  <th>Tunjangan</th>
                  <th>Kelompok</th>
                  <th>Tanggal Diangkat</th>
                  <th>No KTP</th>
                  <th>No BPJS Kesehatan</th>
                  <th>No PBJS Ketenagakerjaan</th>
                  <th>No KK</th>
                  <th>Pengalaman Kerja</th>
                  <th>Action</th>
                </tr>
                </thead>

              </table>
              </div>
              <br />
            <br />
  <!--           </div>
 
          </div> -->
          <!-- /.box -->
       
        <!-- /.col -->
      
      
     
    </section>
    <!-- /.content -->
    @endsection

    @push('scripts')
    <script>
      $(document).ready(function () {
        $('#dashboard-table').DataTable().destroy();
        getData();
      });

      $('#reset').click(function(){
        $('#filter_jenis').val('');
        $('#filter_status').val('');
        $('#dashboard-table').DataTable().destroy();
        getData();
        fill_datatable();
    });

        function getData() {
          $('#dashboard-table').DataTable().destroy();
            $('#dashboard-table').DataTable({
                processing: true,
                serverSide: true,
                "dom": '<f<t>lp>',
                "language": {
                "search": "Cari Nama :"
                },
                ajax: {
                    url :'{{url('getDataJson')}}',
                    // type : 'POST',
                    data : {
                      'filter_jenis' : $('#filter_jenis').val(),
                      'filter_status' : $('#filter_status').val(),
                    }
                },
                columns: [
                {
                    data:'DT_RowIndex',
                    name:'DT_RowIndex'
                },
                {
                    data:'nik',
                    name:'nik'
                },
                {
                    data:'nama_lengkap',
                    name:'nama_lengkap'
                },
                {
                    data:'jenis_kelamin',
                    name:'jenis_kelamin'
                },
                {
                    data:'tempat_lahir',
                    name:'tempat_lahir'
                },
                {
                    data:'status_nikah',
                    name:'status_nikah'
                },
                {
                    data:'pendidikan',
                    name:'pendidikan'
                },
                {
                    data:'tanggal_masuk',
                    name:'tanggal_masuk'
                },
                {
                    data:'masakerja',
                    name:'masakerja'
                },
                {
                    data:'status',
                    name:'status'
                },
                {
                    data:'jabatan',
                    name:'jabatan'
                },
                {
                    data:'nama',
                    name:'nama'
                },
                {
                    data:'agama',
                    name:'agama'
                },
                {
                    data:'tanggal_lahir',
                    name:'tanggal_lahir'
                },
                {
                    data:'tunjangan',
                    name:'tunjangan'
                },
                {
                    data:'kelompok',
                    name:'kelompok'
                },
                {
                    data:'tanggal_diangkat',
                    name:'tanggal_diangkat'
                },
                {
                    data:'no_ktp',
                    name:'no_ktp'
                },
                {
                    data:'no_bpjs_kes',
                    name:'no_bpjs_kes'
                },
                {
                    data:'no_bpjs_ketenag',
                    name:'no_bpjs_ketenag'
                },
                {
                    data:'no_kk',
                    name:'no_kk'
                },
                {
                    data:'pengalaman',
                    name:'pengalaman'
                },
                {
                data:'action',
                    name:'action'
            }
            ]
            
        });
          }
    </script>
@endpush