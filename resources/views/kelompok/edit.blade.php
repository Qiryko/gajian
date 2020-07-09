@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
Edit Kelompok Kerja
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('kelompok/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value="{{$kelompok->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="kelompok" class="col-sm-2 control-label">Kelompok Kerja</label>
                  <div class="col-sm-10">
                    <input name="kelompok" type="varchar" class="form-control" id="kelompok" value="{{$kelompok->kelompok}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="rating" class="col-sm-2 control-label">Rating</label>
                  <div class="col-sm-10">
                    <input name="rating" type="double" class="form-control" id="rating" value="{{$kelompok->rating}}">
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <a type="button" href="{{route('kelompok')}}" class="btn btn-default float-right">Batal</a>
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