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
                        <h3 class="mb-0">List of Stock Detail</h3>
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
                            <h4 class="card-title mb-0">Stock Detail Data</h4>
                            <p class="card-subtitle mb-0">Manage your stock detail here</p>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="table1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Item</th>
                                        <th>Um</th>
                                        <th>Qty</th>
                                        <th>Lokasi</th>
                                        <th>Cabang</th>
                                        <th>Created by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stockDets as $r)
                                        <tr>
                                            <td>{{ $r->itemMstr->item_mstr_code }}</td>
                                            <td>{{ $r->itemMstr->um->code_mstr_cmmt }}</td>
                                            <td>{{ $r->stock_det_qty }}</td>
                                            <td>{{ $r->stock_det_loc }}</td>
                                            <td>{{ $r->stock_det_branch }}</td>
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
    @endpush

</x-app-layout>
