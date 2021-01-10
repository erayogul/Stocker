@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top: 25px;" class="card">
                <div class="card-body">

                
                <div class="card-tools" style="margin:10px;">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                            <i class="fas fa-cubes"></i>
                            Kategori Oluştur
                        </button>
                    </div>
                    <table id="table_id" class="table table-striped table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Ürün Sayısı</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->category_name}}</a></td>
                                <td>{{count_stocks_in_category($category->category_id)}}</td>
                                <td>
                                    <a href="#" class="edit-stock-category-button" data-id="{{ $category->id }}" data-name="{{ $category->category_name }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record" >
                                        <i class="fas fa-edit blue"  style="font-size: 20px;margin-right: 10px;"></i>
                                    </a>
                                    <a href="#" class="delete-stock-category-button" data-id="{{ $category->id }}" data-placement="top" title="" data-original-title="Delete Record">
                                        <i class="fas fa-trash red" style="font-size: 20px;margin-right: 10px; color:red; "></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Kategori</th>
                                <th>Ürün Sayısı</th>
                                <th>İşlem</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <div class="modal fade" id="modal-create">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Kategori Oluştur</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('createStockCategory') }}">
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <label>Kategori Adı</label>
                                            <input type="text" name="category_name" required="required" placeholder="Kategori Adı" class="form-control" />
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
                    <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Kategori Güncelle</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('edit-stock-category') }}">
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <label>Kategori Adı</label>
                                            <input type="hidden" name="id" id="id-edit" >
                                            <input type="text" name="category_name" id="category_name" required="required" placeholder="Kategori Adı" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            İptal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Güncelle
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
                                <form action="{{ route('delete-stock-category') }}">
                                        <input type="hidden" name="id" id="id-delete" >
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
            </div>
        </div>
    </div>
</div>
@endsection