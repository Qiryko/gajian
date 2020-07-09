@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
 Edit Bobot
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('bobot/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value={{$bobot->id}}>
              <div class="box-body">
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Nama Bobot</label>
                  <div class="col-sm-10">
                    <input name="bobot" type="text" class="form-control" id="bobot" placeholder="Bobot" value={{$bobot->bobot}}>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Nilai</label>
                  <div class="col-sm-10">
                    <input name="nilai" type="double" class="form-control" id="nilai" placeholder="0"value={{$bobot->nilai}}>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <a type="button" href="{{route('bobot')}}" class="btn btn-default float-right">Batal</a>
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