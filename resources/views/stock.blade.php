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
                            @foreach($stocks as $stock)
                            <tr>
                                <td><a href="#">{{$stock->category}}</a></td>
                                <td>{{$stock->stock_id}}</td>
                                <td>{{$stock->name}}</td>
                                <td>{{$stock->supplier}}</td>
                                <td>{{$stock->location}}</td>
                                <td>{{$stock->quantity}}</td>
                                <td>
                                    <a href="#" class="increase-stock-button" data-id="{{ $stock->id }}" data-quantity="{{ $stock->quantity }}">
                                        <i class="fas fa-caret-square-up " data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record" style="font-size: 20px;margin-right: 10px; color:green;"></i>
                                    </a>
                                    <a href="#"  class="decrease-stock-button" data-id="{{ $stock->id }}" data-quantity="{{ $stock->quantity }}">
                                        <i class="fas fa-caret-square-down" style="font-size: 20px;margin-right: 10px; color:orange; "></i>
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-edit blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record" style="font-size: 20px;margin-right: 10px;"></i>
                                    </a>
                                    <a href="#" class="delete-stock-button" data-id="{{ $stock->id }}" data-placement="top" title="" data-original-title="Delete Record">
                                        <i class="fas fa-trash red" style="font-size: 20px;margin-right: 10px; color:red; "></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record">
                                        <i class="fas fa-shopping-cart " style="font-size: 20px;margin-right: 10px; color:#03871d; "></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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
                                <h4 class="modal-title">Ürün Oluştur</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('createStock') }}">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Ürün Adı</label>
                                        <input type="text" name="name" placeholder="Ürün Adı" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Numarası</label>
                                        <input type="text" name="stockNo" placeholder="Stok No" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="category" placeholder="Kategori" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->category_id }}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tedarikçi</label>
                                        <input type="text" name="supplier" placeholder="Tedarikçi" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasyon</label>
                                        <input type="text" name="location" placeholder="Lokasyon" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Miktar</label>
                                        <input type="text" name="quantity" placeholder="Miktar" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="notification" class="custom-control-input stockNotificationSwitch" id="stockNotificationSwitch">
                                            <label class="custom-control-label" for="stockNotificationSwitch">Bildirim</label>
                                        </div>
                                    </div>

                                    <div id="stockNotificationArea" class="stockNotificationArea" style="display:none">
                                        <div class="form-group">
                                            <label>Bildirim Kişisi</label>
                                            <select name="notificationPerson" placeholder="Kategori" class="form-control">
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bildirim Sınırı</label>
                                            <input type="text" name="notificationQuantity" placeholder="Miktar" class="form-control" />
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
                <div class="modal fade" id="modal-delete">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Silmek istediğinize emin misiniz?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('delete-stock') }}">
                                <input type="hidden" name="id" id="id-delete">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                        İptal
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Sil
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="modal-change">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title modal-title-change " id="modal-title-change">sfghsffghg</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('change-stock') }}">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id-change">
                                    <div class="form-group row">
                                        <label class="col-form-label modal-label-change" id="modal-lable-change">Düşülecek Miktar:</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="changeQuantity" id="changeQuantity" value="1" class="form-control changeQuantity" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label">Mevcut Stok Miktarı:</label>
                                        <div class="col-sm-4">
                                            <input readonly type="number" name="oldStockQuantity" id="oldStockQuantity"  class="form-control oldStockQuantity" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label">Yeni Stok Miktarı:</label>
                                        <div class="col-sm-4">
                                            <input readonly type="number" name="newStockQuantity" id="newStockQuantity"  class="form-control newStockQuantity" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        İptal
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        Kaydet
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