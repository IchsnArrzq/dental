<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama_metode" id="nama" class="form-control" value="{{ $payment->nama_metode }}">

    @error('nama_metode')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="potongan">Potongan</label>
    <input type="text" name="potongan" id="potongan" class="form-control" value="{{ $payment->potongan }}">

    @error('potongan')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="rekening">Rekening</label>
    <input type="text" name="rekening" id="rekening" class="form-control" value="{{ $payment->rekening }}">

    @error('rekening')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="m-t-20 text-center">
    <button type="submit" class="btn btn-primary submit-btn"><i class="fa fa-save"></i> Save</button>
</div>