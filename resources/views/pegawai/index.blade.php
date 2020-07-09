@extends('layouts.master')

@section('content')
<section class="content-header">
      @if(session('sukses'))
      <div class="alert alert-success" role="alert">
        {{session('sukses')}}
      </div>
      @endif
      <h1>
        Data Status Pegawai
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
<!-- /.box-header -->
            <div class="box-body">
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-default">
                Tambah Data
              </button>
              <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Status Pegawai</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" action="{{route('pegawai/create')}}" method="POST">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                    <input name="status" type="text" class="form-control" id="status" placeholder="Status">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tunjangan" class="col-sm-2 control-label">Tunjangan JHT</label>
                  <div class="col-sm-10">
                    <input name="tunjanganJHT" type="double" class="form-control" id="tunjangan" placeholder="Rp.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="intensif" class="col-sm-2 control-label">Intensif</label>
                  <div class="col-sm-10">
                    <input name="intensif" type="double" class="form-control" id="intensif" placeholder="Rp.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="transport" class="col-sm-2 control-label">Transport</label>
                  <div class="col-sm-10">
                    <input name="transport" type="double" class="form-control" id="transport" placeholder="Rp.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="makan" class="col-sm-2 control-label">Makan</label>
                  <div class="col-sm-10">
                    <input name="makan" type="double" class="form-control" id="makan" placeholder="Rp.">
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
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Status</th>
                  <th>Tunjangan JHT</th>
                  <th>Intensif</th>
                  <th>Transport</th>
                  <th>Makan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataPegawai as $didik)
                <tr>
                <td>{{$didik->id}}</td>
                <td>{{$didik->status}}</td>
                <td>@currency($didik->tunjanganJHT)</td>
                <td>@currency($didik->intensif)</td>
                <td>@currency($didik->transport)</td>
                <td>@currency($didik->makan)</td>
                <td>
                <div class="btn-group">
                  <!-- <button type="button" class="btn btn-default">Action</button> -->
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('pegawai/edit', ['id'=>$didik->id])}}">Edit</a></li>
                    <li><a href="{{route('pegawai/destroy', ['id'=>$didik->id])}}">Delete</a></li>
                  </ul>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
    </section>
    <!-- /.content -->
    @endsection