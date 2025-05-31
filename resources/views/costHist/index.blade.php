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
                        <h3 class="mb-0">List of Cost History</h3>
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
                            <h4 class="card-title mb-0">Cost History Data</h4>
                            <p class="card-subtitle mb-0">View your Cost History entries</p>
                        </div>
                        <div class="ms-md-auto">
                            {{-- <button type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddPrice">
                                <i class="bi bi-plus-circle me-1"></i> Add price Master
                            </button> --}}
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="table1">
                                <thead class="table-light">
                                    <tr>
                                        <th>no</th>
                                        <th>date</th>
                                        <th>type</th>
                                        <th>amount</th>
                                        <th>curr</th>
                                        <th>rate</th>
                                        <th>invoice</th>
                                        <th>remark</th>
                                        <th>branch</th>
                                        <th>create by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($costHists as $r)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $r->cost_hist_effdate }}</td>
                                            <td>{{ $r->cost_hist_type }}</td>
                                            <td>Rp. {{ number_format($r->cost_hist_amount, '2', ',', '.') }}</td>
                                            <td>{{ $r->cost_hist_curr }}</td>
                                            <td>{{ $r->cost_hist_rate }}</td>
                                            <td>{{ $r->cost_hist_inv }}</td>
                                            <td>{{ $r->cost_hist_rmks }}</td>
                                            <td>{{ $r->cost_hist_branch }}</td>
                                            <td>{{ $r->userMstr->user_mstr_name }}</td>
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


    @push('scripts')
        <script src="{{ 'resources/js/alert.js' }}"></script>
        <script src="{{ 'resources/js/index.js' }}"></script>
        {{-- <script>
            $(document).ready(function() {
                $('.price_mstr_um').select2({
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
        </script> --}}
    @endpush

</x-app-layout>
