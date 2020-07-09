@extends('layouts.master')

@section('content')
<section class="content-header">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <h1>
        Data Riwayat Gaji
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
                      {{csrf_field()}}
                        <select name="filter_tanggal" id="filter_tanggal" class="form-control" required>
                            <option value="">Pilih Tanggal Simpan</option>
                            @foreach($tanggal as $tanggal)
                            <option value="{{$tanggal->tanggal_simpan}}">{{$tanggal->tanggal_simpan}}</option>

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
              <div class="modal fade" id="modal-default">

            <!-- /.modal-content -->
          </div>
        </div>
          <!-- /.modal-dialog -->
        
        <div class="table-responsive">
              <table id="dashboard-table2" class="table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tingkat Pendidikan</th>
                  <th>Masa Kerja</th>
                  <th>Skor</th>
                  <th>Pengali</th>
                  <th>Gaji Pokok</th>
                  <th>Mulai Kerja</th>
                  <th>Karyawan Tetap</th>
                  <th>Nama Karyawan</th>
                  <th>Tunj. Makan</th>
                  <th>Tunj. Transport</th>
                  <th>Tunj. JHT</th>
                  <th>Tunj. Intensif</th>
                  <th>Tunj. Lain2</th>
                  <th>Jumlah Tunj.</th>
                  <th>Yang Diajukan</th>
                  <th>Tanggal Simpan</th>
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
        $('#dashboard-table2').DataTable().destroy();
        getData();
      });

      $('#reset').click(function(){
        $('#filter_tanggal').val('');
        $('#dashboard-table2').DataTable().destroy();
        getData();
        fill_datatable();
    });

        function getData() {
          $('#dashboard-table2').DataTable().destroy();
            $('#dashboard-table2').DataTable({
                processing: true,
                serverSide: true,
                "dom": '<B<t>lp>',
                buttons: [
                    'excel'
                ],
                ajax: {
                    url :'{{url('getDataJson1')}}',
                    // type : 'POST',
                    data : {
                      'filter_tanggal' : $('#filter_tanggal').val(),
                    }
                },
                columns: [
                {
                    data:'DT_RowIndex',
                    name:'DT_RowIndex'
                },
                {
                    data:'pendidikan',
                    name:'pendidikan'
                },
                {
                    data:'masakerja',
                    name:'masakerja'
                },
                {
                    data:'skor_total',
                    name:'skor_total'
                },
                {
                    data:'pengali',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                {
                    data:'gaji_pokok',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                {
                    data:'tanggal_masuk',
                    name:'tanggal_masuk'
                },
                {
                    data: 'tanggal_diangkat',
                    name: 'tanggal_diangkat'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data:'makan',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                {
                    data:'transport',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                {
                    data:'tunjanganJHT',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                  {
                    data:'intensif',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                {
                    data:'jumlah',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                  {
                    data:'tunj',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },
                {
                    data:'total_gaji',
                    render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp. ' )
                },

                {
                    data:'tanggal_simpan',
                    name:'tanggal_simpan'
                }
            ]
            
        });
          }
    </script>
@endpush