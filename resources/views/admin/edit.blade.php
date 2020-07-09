@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Edit Data Pegawai
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <form class="form-horizontal" action="{{route('dashboard/update')}}" method="POST">
              {{csrf_field()}}
              <input name="id" type="hidden" class="form-control" value={{$data->id}}>
              <div class="box-body">

                  <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Nomor Induk Pegawai</label>
                  <div class="col-sm-10">
                    <input name="nik" type="text" class="form-control" id="bobot" placeholder="nik" value="{{$data->nik}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input name="nama_lengkap" type="text" class="form-control" id="bobot" placeholder="nama lengkap" value="{{$data->nama_lengkap}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="jenis_kelamin" required>
                          <option value="Pria" @if($data->jenis_kelamin == "Pria") selected 
                          @endif>Pria</option>
                          <option value="Wanita" @if($data->jenis_kelamin == "Wanita") selected 
                          @endif>Wanita</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="agama" required>
                          <option value="Islam" @if($data->agama == "Islam") selected 
                          @endif>Islam</option>
                          <option value="Katholik" @if($data->agama == "Katholik") selected 
                          @endif>Katholik</option>
                          <option value="Kristen" @if($data->agama == "Kristen") selected 
                          @endif>Kristen</option>
                          <option value="Hindu" @if($data->agama == "Hindu") selected 
                          @endif>Hindu</option>
                          <option value="Budha" @if($data->agama == "Budha") selected 
                          @endif>Budha</option>
                          <option value="Konghucu" @if($data->agama == "Konghucu") selected 
                          @endif>Konghucu</option>
                  </select>
                  </div>
                </div>                        
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input name="tempat_lahir" type="text" class="form-control" id="bobot" placeholder="tempat lahir" value="{{$data->tempat_lahir}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tgl Lahir</label>
                  <div class="col-sm-10">
                    <input name="tanggal_lahir" type="date" class="form-control" id="bobot" value="{{$data->tanggal_lahir}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Status Nikah</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="status_nikah" required>
                          <option value="Menikah" @if($data->status_nikah == "Menikah") selected 
                          @endif>Menikah</option>
                          <option value="Belum Menikah" @if($data->status_nikah == "Belum Menikah") selected 
                          @endif>Belum Menikah</option>
                  </select>
                  </div>
                </div>

                <div class="form-group" hidden="true">
                  <label for="bobot" class="col-sm-2 control-label">Masa Kerja</label>
                  <div class="col-sm-10">
                    <input name="masa_kerja" value="{{$data->masa_kerja}}" type="number" class="form-control" id="bobot" placeholder="nama lengkap">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Masa Kerja</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="masa_kerja" required>
                      @foreach($masa as $item)
                          <option value="{{$item->id}}" 
                          @if($data->masa_kerja == $item->id) selected 
                          @endif>{{$item->masakerja}}</option>    
                      @endforeach
                  </select>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Status Pegawai</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="status_pegawai" required>
                      @foreach($pegawai as $item)
                      <option value="{{$item->id}}" 
                          @if($data->status_pegawai == $item->id) selected 
                          @endif>{{$item->status}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Jabatan Struktural</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="jabatan_struktural" required>
                      @foreach($jabatan as $item)
                      <option value="{{$item->id}}"
                      @if($data->jabatan_struktural == $item->id) selected 
                          @endif>{{$item->jabatan}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tunjangan Lain</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="tunjangan_lain" required>
                      @foreach($tunjangan as $item)
                      <option value="{{$item->id}}"
                      @if($data->tunjangan_lain == $item->id) selected 
                          @endif>{{$item->tunjangan}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Kelompok</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="kel_pekerjaan" required>
                      @foreach($kelompok as $item)
                          <option value="{{$item->id}}"
                          @if($data->kel_pekerjaan == $item->id) selected 
                          @endif>{{$item->kelompok}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Tgl Masuk</label>
                  <div class="col-sm-10">
                    <input name="tanggal_masuk" type="date" class="form-control" id="nilai" value="{{$data->tanggal_masuk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">Tgl Diangkat</label>
                  <div class="col-sm-10">
                    <input name="tanggal_diangkat" type="date" class="form-control" id="nilai" value="{{$data->tanggal_diangkat}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No KTP</label>
                  <div class="col-sm-10">
                    <input name="no_ktp" type="number" class="form-control" id="nilai" placeholder="no ktp" value="{{$data->no_ktp}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No bpjs kesehatan</label>
                  <div class="col-sm-10">
                    <input name="no_bpjs_kes" type="number" class="form-control" id="nilai" placeholder="bpjs kesehatan" value="{{$data->no_bpjs_kes}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No bpjs ketenagakerjaan</label>
                  <div class="col-sm-10">
                    <input name="no_bpjs_ketenag" type="number" class="form-control" id="nilai" placeholder="bpjs ketenagakerjaan" value="{{$data->no_bpjs_ketenag}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nilai" class="col-sm-2 control-label">No KK</label>
                  <div class="col-sm-10">
                    <input name="no_kk" type="number" class="form-control" id="nilai" placeholder="No KK" value="{{$data->no_kk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Tingkat Pendidikan</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="tingkat_pendidikan" required>
                      @foreach($pendidikan as $item)
                      <option value="{{$item->id}}"
                      @if($data->tingkat_pendidikan == $item->id) selected 
                          @endif>{{$item->pendidikan}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">Pengalaman Kerja</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="pengalaman_kerja" required>
                      @foreach($pengalaman as $item)
                      <option value="{{$item->id}}"
                      @if($data->pengalaman_kerja == $item->id) selected 
                          @endif>{{$item->pengalaman}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bobot" class="col-sm-2 control-label">PKWT</label>
                  <div class="col-sm-10">
                    <select class="form-control" style="background: white!important;" 
                          name="pkwt" required>
                      @foreach($pkwt as $item)
                      <option value="{{$item->id}}"
                      @if($data->pkwt == $item->id) selected 
                          @endif>{{$item->nama}}</option>
                      @endforeach
                  </select>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
           
              </div>
              <div class="modal-footer">
                 <a href="{{route('dashboard')}}" type="button" class="btn btn-default float-right">
                                Batal
                              </a>
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