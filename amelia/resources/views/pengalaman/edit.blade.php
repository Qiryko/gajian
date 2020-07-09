@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Edit Pengalaman Kerja
        <!-- <small>it all starts here</small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('pengalaman/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value="{{$pengalaman->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="pengalaman" class="col-sm-2 control-label">Lama Pengalaman Kerja</label>
                  <div class="col-sm-10">
                    <input name="pengalaman" type="text" class="form-control" id="pengalaman" placeholder="pengalaman" value="{{$pengalaman->pengalaman}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="rating" class="col-sm-2 control-label">Rating</label>
                  <div class="col-sm-10">
                    <input name="rating" type="double" class="form-control" id="rating" placeholder="0"value="{{$pengalaman->rating}}">
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
               <a type="button" href="{{route('pengalaman')}}" class="btn btn-default float-right">Batal</a>
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