@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top: 25px;" class="card">
                <div class="card-body">

                
                <div class="card-tools" style="margin:10px;">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-cubes"></i>
                            Ürün Oluştur
                        </button>
                    </div>

                    <table id="table_id" class="table table-striped table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Stok No</th>
                                <th>Ürün Adı</th>
                                <th>Tedarikçi</th>
                                <th>Lokasyon</th>
                                <th>Stok</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Ofis Ürünleri</a></td>
                                <td>45261</td>
                                <td>Kalem</td>
                                <td>abc</td>
                                <td>Depo-1</td>
                                <td>135</td>
                                <td>
                                    <a href="#">
                                        <i class="fas fa-caret-square-up " data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record" style="font-size: 20px;margin-right: 10px; color:green;"></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record">
                                        <i class="fas fa-caret-square-down" style="font-size: 20px;margin-right: 10px; color:orange; "></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-edit blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record" style="font-size: 20px;margin-right: 10px;"></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record">
                                        <i class="fas fa-trash red" style="font-size: 20px;margin-right: 10px; color:red; "></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record">
                                        <i class="fas fa-shopping-cart " style="font-size: 20px;margin-right: 10px; color:#03871d; "></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kategori</th>
                                <th>Stok No</th>
                                <th>Ürün Adı</th>
                                <th>Tedarikçi</th>
                                <th>Lokasyon</th>
                                <th>Stok</th>
                                <th>İşlem</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Stok Oluştur</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('createNewEmployee') }}">
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <label>Stok Adı</label>
                                            <input type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" />
                                            <has-error :form="form" field="name"></has-error>

                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Email" class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" />
                                            <has-error :form="form" field="email"></has-error>

                                            <label>Password</label>
                                            <div class="form-group">
                                                <input type="text" name="password" id="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" />
                                                <has-error :form="form" field="password"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            İptal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Oluştur
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
            </div>
        </div>
    </div>
</div>
@endsection