@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
       Edit Masa Kerja
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('masa/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value="{{$masa->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="masa" class="col-sm-2 control-label">Lama Masa Kerja</label>
                  <div class="col-sm-10">
                    <input name="masakerja" type="text" class="form-control" id="masa" placeholder="masa" value="{{$masa->masakerja}}">
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
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