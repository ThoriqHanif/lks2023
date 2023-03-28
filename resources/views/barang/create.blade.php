<form action="" method="post">
  <div class="modal fade text-left" id="ModalCreateBarang" tabindex="-1" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-lg" role="document" aria-hidden="true"> 
          <div class="modal-content">
              <div class="modal-header">
                  <h4>Tambah Data Buku</h4>
                  <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="/barang" method="post">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Buku">
                        </div>
                        <div class="form-group">
                          <label>Kategori</label><br>
                          <select name="id_kategori" id="">
                            <option value="" selected>Pilih Kategori</option>
                            @foreach ($kategori as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                            @endforeach

                          </select>
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" class="form-control" name="harga" placeholder="Masukkan Harga">
                        </div>
                        {{-- <div class="form-group">
                          <label>Stok</label>
                          <input type="number" class="form-control" name="stok" placeholder="Masukkan Stok">
                        </div> --}}
                        
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="/barang"  class="btn btn-danger">Cancel</a>
                      </div>
                    </form>
              </div>
          </div>
      </div>
  </div>
</form>