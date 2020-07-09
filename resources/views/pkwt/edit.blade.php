@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Edit Gaji PKWT
       
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('pkwt/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value="{{$pkwt->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama" value="{{$pkwt->nama}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="gaji" class="col-sm-2 control-label">Gaji</label>
                  <div class="col-sm-10">
                    <input name="gaji" type="double" class="form-control" id="gaji" placeholder="0"value="{{$pkwt->gaji}}">
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <a type="button" href="{{route('pkwt')}}" class="btn btn-default float-right">Batal</a>                
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
    </section>
    <!-- /.content -->
    @endsection