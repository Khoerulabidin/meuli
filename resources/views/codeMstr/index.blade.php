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
                        <h3 class="mb-0">List of Code Master</h3>
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
                            <h4 class="card-title mb-0">Code Master Data</h4>
                            <p class="card-subtitle mb-0">Manage your code master entries</p>
                        </div>
                        <div class="ms-md-auto">
                            <button type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddCode">
                                <i class="bi bi-plus-circle me-1"></i> Add Code Master
                            </button>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="table1">
                                <thead class="table-light">
                                    <tr>
                                        <th>fldname</th>
                                        <th>value</th>
                                        <th>cmmt</th>
                                        <th>cmmt2</th>
                                        <th>created by</th>
                                        <th>branch</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($codeMstrs as $r)
                                        <tr>
                                            <td>{{ $r->code_mstr_fldname }}</td>
                                            <td>{{ $r->code_mstr_value }}</td>
                                            <td>{{ $r->code_mstr_cmmt }}</td>
                                            <td>{{ $r->code_mstr_cmmt2 }}</td>
                                            <td>{{ $r->userMstr->user_mstr_name }}</td>
                                            <td>{{ $r->code_mstr_branch }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic action">
                                                    <button class="btn btn-sm btn-outline-primary editButton"
                                                        data-id="{{ $r->code_mstr_id }}"
                                                        data-fldname="{{ $r->code_mstr_fldname }}"
                                                        data-value="{{ $r->code_mstr_value }}"
                                                        data-cmmt="{{ $r->code_mstr_cmmt }}"
                                                        data-cmmt2="{{ $r->code_mstr_cmmt2 }}"
                                                        data-url="{{ url('CodeMstrs/' . $r->code_mstr_id) }}"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>

                                                    <a href="{{ url('CodeMstr/' . $r->code_mstr_id . '/delete') }}"
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

    {{-- modal add Code Master --}}
    <form action="{{ route('CodeMstrs.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="modal fade" id="modalAddCode" tabindex="-1" role="dialog" aria-labelledby="modalAddCodeTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Code Master</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="code_mstr_fldname" class="form-label">
                                    fldname
                                </label>

                                <input type="text" name="code_mstr_fldname" id="code_mstr_fldname"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('code_mstr_fldname') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="code_mstr_value" class="form-label">
                                    value
                                </label>
                                <input type="text" name="code_mstr_value" id="code_mstr_value"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('code_mstr_value') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="code_mstr_cmmt" class="form-label">
                                    cmmt
                                </label>
                                <input type="text" name="code_mstr_cmmt" id="code_mstr_cmmt"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('code_mstr_cmmt') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="code_mstr_cmmt2" class="form-label">
                                    cmmt2
                                </label>
                                <input type="text" name="code_mstr_cmmt2" id="code_mstr_cmmt2"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('code_mstr_cmmt2') }}">
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
                        <h5 class="modal-title" id="editModalLabel">Edit Code Master</h5>
                        <button type="button" class="btn btn-small btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_fldname" class="form-label">
                                    fldname
                                </label>

                                <input type="text" name="ef_fldname" id="ef_fldname"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('ef_fldname') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_value" class="form-label">
                                    value
                                </label>
                                <input type="text" name="ef_value" id="ef_value" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_value') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_cmmt" class="form-label">
                                    cmmt
                                </label>
                                <input type="text" name="ef_cmmt" id="ef_cmmt" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_cmmt') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_cmmt2" class="form-label">
                                    cmmt2
                                </label>
                                <input type="text" name="ef_cmmt2" id="ef_cmmt2" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" value="{{ old('ef_cmmt2') }}">
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
                const fldname = $(this).data("fldname");
                const value = $(this).data("value");
                const cmmt = $(this).data("cmmt");
                const cmmt2 = $(this).data("cmmt2");

                // $("#editForm #id").val(id ? id : "");
                $("#editForm #ef_fldname").val(fldname ? fldname : "");
                $("#editForm #ef_value").val(value ? value : "");
                $("#editForm #ef_cmmt").val(cmmt ? cmmt : "");
                $("#editForm #ef_cmmt2").val(cmmt2 ? cmmt2 : "");

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
