@include('customer.layout.header');
    <!-- Main Menu area End-->
	
    <!-- Form Element area Start-->
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
                            <h2>Pengaduan</h2>
                            <p>Mohon di-isi dengan benar.</p>
                        </div>
                        <div class="row">
                            <form action="{{ route('pengaduan.update', $pengaduan->id_pengaduan) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>

                                    <div class="nk-int-st">
                                        <select class="form-control" name="no_meja" required>
                                            <option value="" disabled>
                                                Pilih No. Meja
                                            </option>

                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}"
                                                    @if ($i == $pengaduan->no_meja)
                                                        selected
                                                    @endif>
                                                    Meja {{ $i }}
                                                </option>
                                            @endfor
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $pengaduan->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $pengaduan->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="no_tp" class="form-control" placeholder="No. Telepon" value="{{ $pengaduan->no_tp }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <textarea class="form-control" name="deskripsi" rows="5" placeholder="Tuliskan pengaduan anda...">{{ $pengaduan->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>

                                    <div class="nk-int-st">
                                        <select class="form-control" name="kategori" required>
                                            <option value="" disabled>
                                                Pilih kategori pengaduan
                                            </option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id_kategori }}"
                                                @if ($kategori->id_kategori == $pengaduan->kategori)
                                                    selected
                                                @endif>
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="file"
                                            class="form-control"
                                            name="foto"
                                            >
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="hidden" class="form-control" name="user_id" value=""> -->
                            
                            
                                       
                        </div>
                        <button class="btn btn-success notika-btn-success" type="submit">Kirim</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Form Element area End-->
    <!-- Datepicker area Start-->
    
    <!-- Dropzone area End-->
    <!-- Start Footer area-->
@include('customer.layout.footer');