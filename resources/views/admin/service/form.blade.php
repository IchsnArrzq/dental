<div class="form-group">
    <label for="kode_barang">Kode Service</label>
    <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ $service->kode_barang }}">

    @error('kode_barang')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="nama_barang">Nama</label>
    <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $service->nama_barang }}">

    @error('nama_barang')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="durasi">Durasi</label>
    <input type="number" name="durasi" id="durasi" class="form-control" value="{{ $service->durasi }}">

    @error('durasi')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="type">type</label>
    <select name="type" id="type" class="form-control">
        <option value="1">Lanjutan</option>
        <option value="0">Biasa</option>
    </select>

    @error('type')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


<div class="m-t-20 text-center">
    <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-save"></i> Save</button>
</div>