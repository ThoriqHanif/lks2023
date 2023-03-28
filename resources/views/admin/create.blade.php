<form action="" method="post">
    <div class="modal fade text-left" id="ModalCreateSiswa" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document" aria-hidden="true"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Data Siswa</h4>
                    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label>NIS</label>
                            <input type="number" class="form-control" name="nis" placeholder="Masukkan NIS">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="level" value="user">
                          </div>
                          <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="text" class="form-control" name="asal" placeholder="Masukkan Asal Sekolah">
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                          </div>
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</form>