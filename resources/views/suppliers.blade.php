@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="margin-top: 25px;" class="card">

                <div class="card-body">


                    <div class="card-tools" style="margin:10px;">
                        <button type="button" class="btn btn-success create-suppliers-button" data-action="0">
                            <i class="fas fa-building"></i>
                            Ürün Oluştur
                        </button>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="lead" style="text-align: center;"><b>Asaş Alüminyum</b></h2>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=Rüzgarlı Bahçe Mah., Kumlu Sok. No.2 Asaş İş Merkezi, 34810 Kavacık, Beykoz – İstanbul, Türkiye"> Rüzgarlı Bahçe Mah., Kumlu Sok. No.2 Asaş İş Merkezi, 34810 Kavacık, Beykoz – İstanbul, Türkiye</a></li>
                                            <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <a href="tel:90 216 680 07 80">+90 216 680 07 80</a></li>
                                            <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <a href="mailto:info@asas.com">info@asas.com</a></li>
                                            <hr>
                                            <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Mehmet Ercan </li>
                                            <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-mobile"></i></span> <a href="tel:90 216 680 07 80">+90 216 680 07 80</a></li>
                                            <li style="margin-bottom: 5px;" class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <a href="mailto:mehmet@asas.com">mehmet@asas.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal fade" id="modal-suppliers">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title modal-title-add-edit " id="modal-title-add-edit"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('create-supplier') }}">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id-add-edit">
                                    <input type="hidden" name="action" id="actionType">
                                    <div class="form-group">
                                        <label>Ürün Adı</label>
                                        <input type="text" name="name" id="name-add-edit" placeholder="Tedarikçi " class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Numarası</label>
                                        <input type="text" name="stockNo" id="stock_id-add-edit" placeholder="Stok No" class="form-control" />
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
            </div>
        </div>
    </div>
</div>
@endsection