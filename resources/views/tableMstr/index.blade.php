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
                        <h3 class="mb-0">List of Table Master</h3>
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
                            <h4 class="card-title mb-0">List of Table Master</h4>
                            <p class="card-subtitle mb-0">Daftar meja yang terdaftar beserta QR Code untuk diunduh.</p>
                        </div>
                        <div class="ms-md-auto">
                            <button type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddTable">
                                <i class="bi bi-plus-circle me-1"></i> Add Table Master
                            </button>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="row g-4">
                            @forelse ($tableMstrs as $table)
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column">
                                            <div class="text-center">
                                                <div class="p-3">
                                                    <img src="{{ asset('storage/' . $table->table_mstr_barcode) }}"
                                                        alt="QR Code for {{ $table->table_mstr_name }}"
                                                        class="img-fluid rounded">
                                                </div>
                                                <h5 class="card-title mt-2">{{ $table->table_mstr_name }}</h5>
                                                <p class="card-text small text-muted">{{ $table->table_mstr_desc }}</p>
                                            </div>

                                            <div class="mt-auto pt-3">
                                                <div class="d-grid mb-2">
                                                    <a href="{{ asset('storage/' . $table->table_mstr_barcode) }}"
                                                        class="btn btn-outline-primary"
                                                        download="qr-code-{{ Str::slug($table->table_mstr_name) }}.svg">
                                                        <i class="bi bi-download"></i> Unduh QR
                                                    </a>
                                                </div>

                                                <div class="btn-group w-100" role="group" aria-label="Aksi Meja">
                                                    <button class="btn btn-sm btn-outline-secondary editButton"
                                                        data-id="{{ $table->table_mstr_id }}"
                                                        data-name="{{ $table->table_mstr_name }}"
                                                        data-desc="{{ $table->table_mstr_desc }}"
                                                        data-barcode="{{ $table->table_mstr_barcode }}"
                                                        data-branch="{{ $table->table_mstr_branch }}"
                                                        data-status="{{ $table->table_mstr_status }}"
                                                        data-url="{{ url('TableMstrs/' . $table->table_mstr_id) }}"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>

                                                    <a href="{{ url('TableMstrs/' . $table->table_mstr_id . '/delete') }}"
                                                        class="btn btn-sm btn-outline-danger deleteButton"
                                                        onclick="return confirm('Anda yakin ingin menghapus meja \'{{ $table->table_mstr_name }}\'?')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info text-center">
                                        <h4>Belum Ada Meja</h4>
                                        <p>Silakan tambahkan data meja terlebih dahulu untuk melihat QR Code di sini.
                                        </p>
                                    </div>
                                </div>
                            @endforelse
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

    {{-- modal add Table Master --}}
    <form action="{{ route('TableMstrs.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="modal fade" id="modalAddTable" tabindex="-1" role="dialog" aria-labelledby="modalAddTableTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Table Master</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="table_mstr_name" class="form-label">
                                    Name
                                </label>

                                <input type="text" name="table_mstr_name" id="table_mstr_name"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('table_mstr_name') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="table_mstr_desc" class="form-label">
                                    Description
                                </label>

                                <input type="text" name="table_mstr_desc" id="table_mstr_desc"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('table_mstr_desc') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="table_mstr_barcode" class="form-label">
                                    Barcode
                                </label>

                                <input type="text" name="table_mstr_barcode" id="table_mstr_barcode"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('table_mstr_barcode') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="table_mstr_branch" class="form-label">
                                    Branch
                                </label>
                                <select name="table_mstr_branch" id="table_mstr_branch"
                                    class="form-select form-select-sm">
                                    <option value="">Select Branch</option>
                                    @foreach ($branchMstrs as $branch)
                                        <option value="{{ $branch->branch_mstr_id }}"
                                            {{ old('table_mstr_branch') == $branch->branch_mstr_id ? 'selected' : '' }}>
                                            {{ $branch->branch_mstr_name }}</option>
                                    @endforeach
                                </select>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Table Master</h5>
                        <button type="button" class="btn btn-small btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_name" class="form-label">
                                    Name
                                </label>

                                <input type="text" name="ef_name" id="ef_name" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_name') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_desc" class="form-label">
                                    Description
                                </label>

                                <input type="text" name="ef_desc" id="ef_desc" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_desc') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_barcode" class="form-label">
                                    Barcode
                                </label>

                                <input type="text" name="ef_barcode" id="ef_barcode"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('ef_barcode') }}" readonly>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_status" class="form-label">
                                    Status
                                </label>
                                {{-- reserved or available --}}
                                <select name="ef_status" id="ef_status" class="form-select form-select-sm">
                                    <option value="">Select Status</option>
                                    <option value="available" {{ old('ef_status') == 'available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="reserved" {{ old('ef_status') == 'reserved' ? 'selected' : '' }}>
                                        Reserved</option>
                                </select>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_branch" class="form-label">
                                    Branch
                                </label>
                                <select name="ef_branch" id="ef_branch" class="form-select form-select-sm">
                                    <option value="">Select Branch</option>
                                    @foreach ($branchMstrs as $branch)
                                        <option value="{{ $branch->branch_mstr_id }}"
                                            {{ old('ef_branch') == $branch->branch_mstr_id ? 'selected' : '' }}>
                                            {{ $branch->branch_mstr_name }}</option>
                                    @endforeach
                                </select>
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
        <script>
            $(document).on("click", ".editButton", function() {
                console.log("Edit button clicked");
                const id = $(this).data("id");
                const url = $(this).data("url");
                const barcode = $(this).data("barcode");
                const status = $(this).data("status");
                const branch = $(this).data("branch");
                const name = $(this).data("name");
                const desc = $(this).data("desc");

                // $("#editForm #id").val(id ? id : "");
                $("#editForm #ef_barcode").val(barcode ? barcode : "");
                $("#editForm #ef_status").val(status ? status : "");
                $("#editForm #ef_branch").val(branch ? branch : "");
                $("#editForm #ef_name").val(name ? name : "");
                $("#editForm #ef_desc").val(desc ? desc : "");

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
