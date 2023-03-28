<form action="" method="post">
    <div class="modal fade text-left" id="ModalCreateKategori" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-lg" role="document" aria-hidden="true"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Kategori</h4>
                    <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kategori" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori">
                          </div>
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-success">Simpan</button>
                          <a href="/kategori" class="btn btn-danger">Cancel</a>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
  </form>