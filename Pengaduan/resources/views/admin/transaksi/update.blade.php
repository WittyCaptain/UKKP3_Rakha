@include('petugas.layout.header')
<div class="form-element-area">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list tengah">
                        <!-- <div class="basic-tb-hd">
                            <h2>Silahkan </h2>
                            <p>Text Inputs with different sizes by height and column.</p>
                        </div> -->
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Update Status</h2>
                            <p>Iyahhh!{{ $transaksi->id_parkir }}</p>
                        </div>
                        <div class="row">
                            <form action="" method="POST">
                            @csrf
                            
                            
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="id_kendaraan">
                                                <option value="" disabled>-- Pemilik Kendaraan --</option>
                                                @forelse ($kendaraan as $kendaraans)
                                                    <option value="{{ $kendaraans->id_kendaraan }}">{{ $kendaraans->pemilik }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="id_tarif">
                                                <option disabled>-- Tarif Per Jam --</option>
                                                @forelse ($tarif as $tarifs)
                                                    <option value="{{ $tarifs->id_tarif }}">{{ $tarifs->jenis_kendaraan }} (Rp.{{ $tarifs->tarif_per_jam }})</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="status">
                                                <option disabled>-- Status Kendaraan --</option>
                                                
                                                    <option value="Keluar">Keluar</option>
                                                    <option value="Masuk">Masuk</option>
                                                    <option value="Batal">Batal</option>
                                                
                                            </select>
                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                        <div class="nk-int-st">
                                            <select class="form-control" name="id_area">
                                                <option disabled>-- Area Parkir --</option>
                                                @forelse ($area as $areas)
                                                    <option value="{{ $areas->id_area }}" @if($transaksi->id_area == $areas->id_area )selected @endif>{{ $areas->nama_area }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                </div>
                            </div>
                                       
                        </div>
                        <button class="btn btn-success notika-btn-success" type="submit">Buat Sekarang</button>
                        </form> 
                        <a href="{{ route('transaksi.create') }}" class="kiri">Data Kendaraan tidak ada?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Form Element area End-->
    <!-- Datepicker area Start-->
    
    <!-- Dropzone area End-->
    <!-- Start Footer area-->
@include('petugas.layout.footer')