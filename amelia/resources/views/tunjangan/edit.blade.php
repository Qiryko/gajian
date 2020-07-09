@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
       Edit Tunjangan Lain
      </h1>
 
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('tunjangan/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value="{{$tunjangan->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="tunjangan" class="col-sm-2 control-label">Tunjangan</label>
                  <div class="col-sm-10">
                    <input name="tunjangan" type="varchar" class="form-control" id="tunjangan" value="{{$tunjangan->tunjangan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input name="jumlah" type="double" class="form-control" id="jumlah" value="{{$tunjangan->jumlah}}">
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <a type="button" href="{{route('tunjangan')}}" class="btn btn-default float-right">Batal</a>
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