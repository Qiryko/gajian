@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
       Edit Jabatan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('jabatan/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value={{$jabatan->id}}>
              <div class="box-body">
                <div class="form-group">
                  <label for="jabatan" class="col-sm-2 control-label">Nama Jabatan</label>
                  <div class="col-sm-10">
                    <input name="jabatan" type="text" class="form-control" id="jabatan" placeholder="Jabatan" value="{{$jabatan->jabatan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tunjangan" class="col-sm-2 control-label">Tunjangan</label>
                  <div class="col-sm-10">
                    <input name="tunjangan" type="double" class="form-control" id="tunjangan" placeholder="0"value="{{$jabatan->tunjangan}}">
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <a type="button" href="{{route('jabatan')}}" class="btn btn-default float-right">Batal</a>
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