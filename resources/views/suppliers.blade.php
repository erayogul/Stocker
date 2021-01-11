@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top: 25px;" class="card">

                <div class="card-body">


                    <div class="card-tools" style="margin:10px;">
                        <button type="button" class="btn btn-success create-suppliers-button" id="create-suppliers-button" data-action="0">
                            <i class="fas fa-building"></i>
                            Tedarikçi Oluştur
                        </button>
                    </div>
                    <div class="row d-flex align-items-stretch">
                        @foreach ($suppliers as $supplier)
                        <div class="col-12 col-sm-6 col-md-4 align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="lead" style="text-align: center;"><b>{{$supplier->company_name}}</b></h2>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                @if ($supplier->company_adress != null)
                                                <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span> <a target="_blank" href="https://www.google.com/maps/search/?api=1&query={{$supplier->company_adress}}"> {{$supplier->company_adress}}</a></li>
                                                @endif
                                                @if ($supplier->company_tel != null)
                                                <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <a href="tel:{{$supplier->company_tel}}">{{$supplier->company_tel}}</a></li>
                                                @endif
                                                @if ($supplier->company_mail != null)
                                                <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <a href="mailto:{{$supplier->company_mail}}">{{$supplier->company_mail}}</a></li>
                                                @endif
                                                <hr>
                                                @if ($supplier->contact_name != null)
                                                <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> {{$supplier->contact_name}} </li>
                                                @endif
                                                @if ($supplier->contact_tel != null)
                                                <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-mobile"></i></span> <a href="tel:{{$supplier->contact_tel}}">{{$supplier->contact_tel}}</a></li>
                                                @endif
                                                @if ($supplier->contact_mail != null)
                                                <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <a href="mailto:{{$supplier->contact_mail}}">{{$supplier->contact_mail}}</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" data-id="{{$supplier->id}}" data-action="1" data-company_name="{{$supplier->company_name}}" data-company_adress="{{$supplier->company_adress}}" data-company_tel="{{$supplier->company_tel}}" data-company_mail="{{$supplier->company_mail}}" data-contact_name="{{$supplier->contact_name}}" data-contact_tel="{{$supplier->contact_tel}}" data-contact_mail="{{$supplier->contact_mail}}" id="edit-suppliers-button" class="btn btn-sm bg-teal edit-suppliers-button">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="#" data-id="{{$supplier->id}}" class="btn btn-sm btn-danger delete-suppliers-button" id="delete-suppliers-button">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="modal fade" id="modal-suppliers">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title modal-title-suppliers " id="modal-title-suppliers"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('create-supplier') }}">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id-supplier">
                                    <input type="hidden" name="action" id="actionType">
                                    <div class="form-group">
                                        <label>Şirket Adı:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <input name="company_name" id="company_name" type="text" class="form-control" placeholder="Şirket Adı" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Şirket Adresi:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <textarea name="company_adress" id="company_adress" class="form-control" rows="3" placeholder="Adres"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Şirket Telefonu:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input name="company_tel" id="company_tel" type="text" class="form-control" placeholder="0XXX XXX XXXX">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Şirket Mail Adresi:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input name="company_mail" id="company_mail" type="email" class="form-control" placeholder="info@company.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>İlgili Kişi:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input name="contact_name" id="contact_name" type="text" class="form-control" placeholder="Ad Soyad">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kişi Telefonu:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input name="contact_tel" id="contact_tel" type="text" class="form-control" placeholder="0XXX XXX XXXX">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Kişi Mail Adresi:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input name="contact_mail" id="contact_mail" type="email" class="form-control" placeholder="info@company.com">
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        İptal
                                    </button>
                                    <button type="submit" id="finish-add-edit" class="btn btn-primary">
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
                <div class="modal fade" id="modal-suppliers-delete">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Silmek istediğinize emin misiniz?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('delete-supplier') }}">
                                <input type="hidden" name="id" id="id-suppliers-delete">
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