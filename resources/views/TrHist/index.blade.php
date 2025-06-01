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
                        <h3 class="mb-0">Tr Hist</h3>
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
                            <h4 class="card-title mb-0">Transaction History</h4>
                            <p class="card-subtitle mb-0">Manage your transaction history</p>
                        </div>
                        <div class="ms-md-auto">
                            {{-- <button type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddbranch">
                                <i class="bi bi-plus-circle me-1"></i> Add tr hist
                            </button> --}}
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="table1">
                                <thead class="table-light">
                                    <tr>
                                        <th>date</th>
                                        <th>type</th>
                                        <th>item</th>
                                        <th>loc</th>
                                        <th>branch</th>
                                        <th>receiver</th>
                                        <th>description</th>
                                        <th>created by</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trHists as $r)
                                        <tr>
                                            <td>{{ $r->tr_hist_effdate }}</td>
                                            <td>{{ $r->tr_hist_type }}</td>
                                            <td>{{ $r->tr_hist_item }}</td>
                                            <td>{{ $r->tr_hist_loc }}</td>
                                            <td>{{ $r->tr_hist_branch }}</td>
                                            <td>{{ $r->tr_hist_receiver }}</td>
                                            <td>{{ $r->tr_hist_rmks }}</td>
                                            <td>{{ $r->tr_hist_cb }}</td>
                                            {{-- <td>{{ $r->userMstr->user_mstr_name }}</td> --}}
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic action">
                                                    <button class="btn btn-sm btn-outline-primary editButton"
                                                        data-id="{{ $r->branch_mstr_id }}"
                                                        data-joined="{{ $r->branch_mstr_joined }}"
                                                        data-name="{{ $r->branch_mstr_name }}"
                                                        data-addr1="{{ $r->branch_mstr_addr1 }}"
                                                        data-addr2="{{ $r->branch_mstr_addr2 }}"
                                                        data-telp="{{ $r->branch_mstr_telp }}"
                                                        data-fax="{{ $r->branch_mstr_fax }}"
                                                        data-email="{{ $r->branch_mstr_email }}"
                                                        data-pic="{{ $r->branch_mstr_pic }}"
                                                        data-sosmed1="{{ $r->branch_mstr_sosmed1 }}"
                                                        data-sosmed2="{{ $r->branch_mstr_sosmed2 }}"
                                                        data-sosmed3="{{ $r->branch_mstr_sosmed3 }}"
                                                        data-sosmed4="{{ $r->branch_mstr_sosmed4 }}"
                                                        data-url="{{ route('BranchMstrs.update', $r->branch_mstr_id) }}"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>


                                                    <form method="POST" action="{{ route('BranchMstrs.destroy', $r->branch_mstr_id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="btn btn-sm btn-outline-danger deleteButton"
                                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
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

    {{-- modal add tr hist --}}
    <form action="{{ route('BranchMstrs.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="modal fade" id="modalAddbranch" tabindex="-1" role="dialog" aria-labelledby="modalAddBranchTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add tr hist</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_name" class="form-label">
                                    Name
                                </label>
                                <input type="text" name="branch_mstr_name" id="branch_mstr_name"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_name') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_joined" class="form-label">
                                    Joined
                                </label>
                                <input type="date" name="branch_mstr_joined" id="branch_mstr_joined"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_joined') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_telp" class="form-label">
                                    Telp
                                </label>
                                <input type="text" name="branch_mstr_telp" id="branch_mstr_telp"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_telp') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_fax" class="form-label">
                                    Fax
                                </label>
                                <input type="text" name="branch_mstr_fax" id="branch_mstr_fax"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_fax') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_email" class="form-label">
                                    Email
                                </label>
                                <input type="text" name="branch_mstr_email" id="branch_mstr_email"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_email') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_pic" class="form-label">
                                    PIC
                                </label>
                                <input type="text" name="branch_mstr_pic" id="branch_mstr_pic"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_pic') }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_sosmed1" class="form-label">
                                    Instagram
                                </label>
                                <input type="text" name="branch_mstr_sosmed1" id="branch_mstr_sosmed1"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_sosmed1') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_sosmed2" class="form-label">
                                    Facebook
                                </label>
                                <input type="text" name="branch_mstr_sosmed2" id="branch_mstr_sosmed2"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_sosmed2') }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_sosmed3" class="form-label">
                                    X
                                </label>
                                <input type="text" name="branch_mstr_sosmed3" id="branch_mstr_sosmed3"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_sosmed3') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_sosmed4" class="form-label">
                                    Tiktok
                                </label>
                                <input type="text" name="branch_mstr_sosmed4" id="branch_mstr_sosmed4"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_sosmed4') }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_addr1" class="form-label">
                                    Address 1
                                </label>
                                <textarea class="{!! Config('app.inputForm') !!}" name="branch_mstr_addr1" 
                                    id="branch_mstr_addr1" cols="30" rows="3" value="{{ old('branch_mstr_addr1') }}" required></textarea>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_addr2" class="form-label">
                                    Address 2
                                </label>
                                <textarea class="{!! Config('app.inputForm') !!}" name="branch_mstr_addr2" 
                                    id="branch_mstr_addr2" cols="30" rows="3" value="{{ old('branch_mstr_addr2') }}"></textarea>
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
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit tr hist</h5>
                        <button type="button" class="btn btn-small btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_name" class="form-label">
                                    Name
                                </label>
                                <input type="text" name="branch_mstr_name" id="ef_name"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_name') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_joined" class="form-label">
                                    Joined
                                </label>
                                <input type="date" name="branch_mstr_joined" id="ef_joined"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_joined') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_telp" class="form-label">
                                    Telp
                                </label>
                                <input type="text" name="branch_mstr_telp" id="ef_telp"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_telp') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_fax" class="form-label">
                                    Fax
                                </label>
                                <input type="text" name="branch_mstr_fax" id="ef_fax"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('branch_mstr_fax') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_email" class="form-label">
                                    Email
                                </label>
                                <input type="text" name="branch_mstr_email" id="ef_email"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_email') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="branch_mstr_pic" class="form-label">
                                    PIC
                                </label>
                                <input type="text" name="branch_mstr_pic" id="ef_pic"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_pic') }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_sosmed3" class="form-label">
                                    X
                                </label>
                                <input type="text" name="branch_mstr_sosmed3" id="ef_sosmed3"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_sosmed3') }}" required>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_sosmed4" class="form-label">
                                    Tiktok
                                </label>
                                <input type="text" name="branch_mstr_sosmed4" id="ef_sosmed4"
                                    class="{!! Config('app.inputForm') !!}" placeholder=""
                                    value="{{ old('branch_mstr_sosmed4') }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_addr1" class="form-label">
                                    Address 1
                                </label>
                                <textarea class="{!! Config('app.inputForm') !!}" name="branch_mstr_addr1" 
                                    id="ef_addr1" cols="30" rows="3" required>{{ old('branch_mstr_addr1') }}</textarea>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="branch_mstr_addr2" class="form-label">
                                    Address 2
                                </label>
                                <textarea class="{!! Config('app.inputForm') !!}" name="branch_mstr_addr2" 
                                    id="ef_addr2" cols="30" rows="3">{{ old('branch_mstr_addr2') }}</textarea>
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
                const name = $(this).data("name");
                const joined = $(this).data("joined");
                const addr1 = $(this).data("addr1");
                const addr2 = $(this).data("addr2");
                const telp = $(this).data("telp");
                const fax = $(this).data("fax");
                const email = $(this).data("email");
                const pic = $(this).data("pic");
                const sosmed1 = $(this).data("sosmed1");
                const sosmed2 = $(this).data("sosmed2");
                const sosmed3 = $(this).data("sosmed3");
                const sosmed4 = $(this).data("sosmed4");

                // $("#editForm #id").val(id ? id : "");
                $("#editForm #ef_name").val(name ? name : "");
                $("#editForm #ef_joined").val(joined ? joined : "");
                $("#editForm #ef_addr1").val(addr1 ? addr1 : "");
                $("#editForm #ef_addr2").val(addr2 ? addr2 : "");
                $("#editForm #ef_telp").val(telp ? telp : "");
                $("#editForm #ef_fax").val(fax ? fax : "");
                $("#editForm #ef_email").val(email ? email : "");
                $("#editForm #ef_pic").val(pic ? pic : "");
                $("#editForm #ef_sosmed1").val(sosmed1 ? sosmed1 : "");
                $("#editForm #ef_sosmed2").val(sosmed2 ? sosmed2 : "");
                $("#editForm #ef_sosmed3").val(sosmed3 ? sosmed3 : "");
                $("#editForm #ef_sosmed4").val(sosmed4 ? sosmed4 : "");

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
