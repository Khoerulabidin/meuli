<x-app-layout>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                    <div class="mb-2 mb-md-2">
                        <h3 class="mb-0">Detail of Price #{{ $priceMstr->price_mstr_nbr }}</h3>
                    </div>
                    <div class="ms-md-auto">
                        <nav aria-label="breadcrumb" class="breadcrumb-header">
                            <ol class="breadcrumb mb-0">
                                @foreach ($breadcrumbs ?? [] as $breadcrumb)
                                    <li class="breadcrumb-item {{ empty($breadcrumb['url']) ? 'active' : '' }}">
                                        @if (empty($breadcrumb['url']))
                                            {{ $breadcrumb['name'] }}
                                        @else
                                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div
                        class="card-header bg-primary text-white d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div class="mb-2 mb-md-0">
                            <h4 class="card-title mb-0">Detail Price {{ $priceMstr->price_mstr_nbr }}</h4>
                            <p class="card-subtitle mb-0">Manage your price detail entries</p>
                        </div>
                        <div class="ms-md-auto">
                            <button type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddPrice">
                                <i class="bi bi-plus-circle me-1"></i> Add price detail
                            </button>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="table1">
                                <thead class="table-light">
                                    <tr>
                                        <th>no</th>
                                        <th>item</th>
                                        <th>um</th>
                                        <th>cost</th>
                                        <th>create by</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($priceDets as $r)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $r->itemMstr->item_mstr_desc }}</td>
                                            <td>{{ $r->um->code_mstr_cmmt }}</td>
                                            <td>Rp.
                                                {{ number_format($r->price_det_cost, '2', ',', '.') }}
                                            </td>
                                            <td>{{ $r->userMstr->user_mstr_name }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic action">
                                                    <button class="btn btn-sm btn-outline-primary editButton"
                                                        data-id="{{ $r->price_det_id }}"
                                                        data-item="{{ $r->price_det_item }}"
                                                        data-um="{{ $r->price_det_um }}"
                                                        data-cost="{{ number_format($r->price_det_cost, '2', ',', '.') }}"
                                                        data-url="{{ url('PriceDets/' . $r->price_det_id) }}"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>

                                                    <a href="{{ url('PriceDet/' . $r->price_det_id . '/delete') }}"
                                                        class="btn btn-sm btn-outline-danger deleteButton"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2025 &copy; Meuli</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://github.com/meulikeun">Meuli Teams</a></p>
                </div>
            </div>
        </footer>
    </div>

    {{-- modal add Item Master --}}
    <form action="{{ route('PriceDets.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modalAddPrice" tabindex="-1" role="dialog" aria-labelledby="modalAddPriceTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Price Master</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <input type="hidden" name="price_det_mstr" value="{{ $priceMstr->price_mstr_id }}">
                            <div class="col-sm-12 col-md-12">
                                <label for="price_det_item" class="form-label">
                                    Item
                                </label>
                                <select style="width: 100%" name="price_det_item" id="price_det_item"
                                    class="price_det_item">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->item_mstr_id }}">
                                            {{ $item->item_mstr_code . ' - ' . $item->item_mstr_desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <label for="price_det_um" class="form-label">Unit Measurement
                                </label>
                                <select style="width: 100%" name="price_det_um" id="price_det_um" class="price_det_um">
                                    @foreach ($ums as $um)
                                        <option value="{{ $um->code_mstr_value }}">
                                            {{ $um->code_mstr_cmmt }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="price_det_cost" class="form-label">
                                    Cost
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control"
                                        aria-label="Amount (to the nearest dollar)" name="price_det_cost"
                                        id="price_det_cost" class="{!! Config('app.inputForm') !!}" placeholder=""
                                        required="" value="{{ old('price_det_cost') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- modal edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Price Master</h5>
                        <button type="button" class="btn btn-small btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Nbr" class="form-label">
                                    Number
                                </label>
                                <input type="text" name="ef_Nbr" id="ef_Nbr" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_Nbr') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Item" class="form-label">
                                    Item
                                </label>
                                <input type="text" name="ef_Item" id="ef_Item" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_Item') }}">
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <label for="ef_Um" class="form-label">Item Master
                                </label>
                                <select style="width: 100%" name="ef_Um" id="ef_Um" class="ef_Um">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->item_mstr_id }}">
                                            {{ $item->item_mstr_code . ' - ' . $item->item_mstr_desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Cost" class="form-label">
                                    Cost
                                </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control"
                                        aria-label="Amount (to the nearest dollar)" name="ef_Cost" id="ef_Cost"
                                        class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                        value="{{ old('ef_Cost') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Start" class="form-label">
                                    Start
                                </label>
                                <input type="date" name="ef_Start" id="ef_Start" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_Start') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Expire" class="form-label">
                                    Expire
                                </label>
                                <input type="date" name="ef_Expire" id="ef_Expire"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('ef_Expire') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ 'resources/js/alert.js' }}"></script>
        <script src="{{ 'resources/js/index.js' }}"></script>
        <script>
            $(document).ready(function() {
                $('.price_det_um').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#modalAddPrice'),
                    allowClear: true
                });
                $('.price_det_item').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#modalAddPrice'),
                    allowClear: true
                });
                $('.ef_Um').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#editModal'),
                    allowClear: true
                });
            });

            $(document).on("click", ".editButton", function() {
                console.log("Edit button clicked");
                const id = $(this).data("id");
                const url = $(this).data("url");
                const nbr = $(this).data("nbr");
                const item = $(this).data("item");
                const um = $(this).data("um");
                const cost = $(this).data("cost");
                const start = $(this).data("start");
                const expire = $(this).data("expire");

                // $("#editForm #id").val(id ? id : "");
                $("#editForm #ef_Nbr").val(nbr ? nbr : "");
                $("#editForm #ef_Item").val(item ? item : "");
                $("#editForm #ef_Um").val(um ? um : "");
                $("#editForm #ef_Cost").val(cost ? cost : "");
                $("#editForm #ef_Start").val(start ? start : "");
                $("#editForm #ef_Expire").val(expire ? expire : "");

                $("#editForm").attr("action", url);
            });

            $(document).on("click", ".deleteButton", function() {
                const id = $(this).data("id");
                const url = $(this).data("url");

                $("#deleteForm").attr("action", url);
            });
        </script>
    @endpush

</x-app-layout>
