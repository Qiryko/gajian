@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Edit Status Pegawai
        <!-- <small>it all starts here</small> -->
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('pegawai/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value="{{$pegawai->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <input name="status" type="text" class="form-control" id="status" placeholder="Status" value="{{$pegawai->status}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tunjangan" class="col-sm-2 control-label">Tunjangan JHT</label>
                  <div class="col-sm-10">
                    <input name="tunjanganJHT" type="double" class="form-control" id="tunjangan" placeholder="0"value="{{$pegawai->tunjanganJHT}}">
                  </div>
                </div>
                <div class="form-group">
                <label for="intensif" class="col-sm-2 control-label">Intensif</label>
                  <div class="col-sm-10">
                    <input name="intensif" type="double" class="form-control" id="intensif" placeholder="Intensif" value="{{$pegawai->intensif}}">
                  </div>
                </div>
                <div class="form-group">
                <label for="transport" class="col-sm-2 control-label">Transport</label>
                  <div class="col-sm-10">
                    <input name="transport" type="double" class="form-control" id="transport" placeholder="Transport" value="{{$pegawai->transport}}">
                  </div>
                </div>
                <div class="form-group">
                <label for="makan" class="col-sm-2 control-label">Makan</label>
                  <div class="col-sm-10">
                    <input name="makan" type="double" class="form-control" id="makan" placeholder="Makan" value="{{$pegawai->makan}}">
                  </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                <a type="button" href="{{route('pegawai')}}" class="btn btn-default float-right">Batal</a>
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