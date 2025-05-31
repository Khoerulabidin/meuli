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
                        <h3 class="mb-0">List of Item Master</h3>
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
                            <h4 class="card-title mb-0">Item Master Data</h4>
                            <p class="card-subtitle mb-0">Manage your item master entries</p>
                        </div>
                        <div class="ms-md-auto">
                            <button type="button" class="btn btn-outline-white btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddItem">
                                <i class="bi bi-plus-circle me-1"></i> Add Item Master
                            </button>
                        </div>
                    </div>
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" id="table1">
                                <thead class="table-light">
                                    <tr>
                                        <th>no</th>
                                        <th>code</th>
                                        <th>desc</th>
                                        <th>spec</th>
                                        <th>cat</th>
                                        <th>um</th>
                                        <th>status</th>
                                        <th>create by</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itemMstrs as $r)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $r->item_mstr_code }}</td>
                                            <td>{{ $r->item_mstr_desc }}</td>
                                            <td>{{ $r->item_mstr_spec }}</td>
                                            <td>{{ $r->cat->code_mstr_cmmt }}</td>
                                            <td>{{ $r->um->code_mstr_cmmt }}</td>
                                            <td>{{ $r->item_mstr_status }}</td>
                                            <td>{{ $r->userMstr->user_mstr_name }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic action">
                                                    <button class="btn btn-sm btn-outline-primary editButton"
                                                        data-id="{{ $r->item_mstr_id }}"
                                                        data-code="{{ $r->item_mstr_code }}"
                                                        data-desc="{{ $r->item_mstr_desc }}"
                                                        data-cat="{{ $r->item_mstr_cat }}"
                                                        data-um="{{ $r->ef_Um }}"
                                                        data-spec="{{ $r->item_mstr_spec }}"
                                                        data-url="{{ url('ItemMstrs/' . $r->item_mstr_id) }}"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>

                                                    <a href="{{ url('ItemMstr/' . $r->item_mstr_id . '/delete') }}"
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
    <form action="{{ route('ItemMstrs.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modalAddItem" tabindex="-1" role="dialog" aria-labelledby="modalAddItemTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Item Master</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="item_mstr_code" class="form-label">
                                    Code
                                </label>
                                <input type="text" name="item_mstr_code" id="item_mstr_code"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('item_mstr_code') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="item_mstr_desc" class="form-label">
                                    Desc
                                </label>
                                <input type="text" name="item_mstr_desc" id="item_mstr_desc"
                                    class="{!! Config('app.inputForm') !!}" placeholder="" required=""
                                    value="{{ old('item_mstr_desc') }}">
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <label for="item_mstr_cat" class="form-label">Category
                                </label>
                                <select style="width: 100%" name="item_mstr_cat" id="item_mstr_cat"
                                    class="item_mstr_cat">
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->code_mstr_value }} ">{{ $cat->code_mstr_cmmt }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <label for="item_mstr_um" class="form-label">Category
                                </label>
                                <select style="width: 100%" name="item_mstr_um" id="item_mstr_um"
                                    class="item_mstr_um">
                                    @foreach ($ums as $um)
                                        <option value="{{ $um->code_mstr_value }}">{{ $um->code_mstr_cmmt }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="">Item Spec</label>
                                <textarea name="item_mstr_spec" id="item_mstr_spec" class="form-control"></textarea>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <div class="form-group mb-3">
                                    <label for="item_mstr_img">Image</label>
                                    <input type="file" name="item_mstr_img" id="item_mstr_img"
                                        class="form-control" accept="image/*" onchange="previewImage(event)">
                                </div>

                                <div class="form-group mb-3">
                                    <img id="preview" src="#" alt="Preview"
                                        style="display: none; max-width: 100%; height: auto; border: 1px solid #ccc; padding: 5px;" />
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
                        <h5 class="modal-title" id="editModalLabel">Edit Item Master</h5>
                        <button type="button" class="btn btn-small btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-4">
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Code" class="form-label">
                                    Code
                                </label>
                                <input type="text" name="ef_Code" id="ef_Code" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_Code') }}">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="ef_Desc" class="form-label">
                                    Desc
                                </label>
                                <input type="text" name="ef_Desc" id="ef_Desc" class="{!! Config('app.inputForm') !!}"
                                    placeholder="" required="" value="{{ old('ef_Desc') }}">
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <label for="ef_Cat" class="form-label">Category
                                </label>
                                <select style="width: 100%" name="ef_Cat" id="ef_Cat" class="ef_Cat">
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->code_mstr_value }} ">{{ $cat->code_mstr_cmmt }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <label for="ef_Um" class="form-label">Category
                                </label>
                                <select style="width: 100%" name="ef_Um" id="ef_Um" class="ef_Um">
                                    @foreach ($ums as $um)
                                        <option value="{{ $um->code_mstr_value }}">{{ $um->code_mstr_cmmt }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <label for="ef_Spec">Item Spec</label>
                                <textarea name="ef_Spec" id="ef_Spec" class="form-control"></textarea>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-2">
                                <div class="form-group mb-3">
                                    <label for="item_mstr_img">Image</label>
                                    <input type="file" name="item_mstr_img" id="item_mstr_img"
                                        class="form-control" accept="image/*" onchange="previewImage(event)">
                                </div>

                                <div class="form-group mb-3">
                                    <img id="preview" src="#" alt="Preview"
                                        style="display: none; max-width: 100%; height: auto; border: 1px solid #ccc; padding: 5px;" />
                                </div>
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
        <script>
            function previewImage(event) {
                const input = event.target;
                const reader = new FileReader();
                reader.onload = function() {
                    const preview = document.getElementById('preview');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(document).ready(function() {
                $('.item_mstr_um').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#modalAddItem'),
                    allowClear: true
                });
                $('.item_mstr_cat').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#modalAddItem'),
                    allowClear: true
                });
                $('.ef_Um').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#editModal'),
                    allowClear: true
                });
                $('.ef_Cat').select2({
                    placeholder: "-- Choose --",
                    dropdownParent: $('#editModal'),
                    allowClear: true
                });
            });

            $(document).on("click", ".editButton", function() {
                console.log("Edit button clicked");
                const id = $(this).data("id");
                const url = $(this).data("url");
                const code = $(this).data("code");
                const desc = $(this).data("desc");
                const cat = $(this).data("cat");
                const um = $(this).data("um");
                const spec = $(this).data("spec");
                const image = $(this).data("image");

                // $("#editForm #id").val(id ? id : "");
                $("#editForm #ef_Code").val(code ? code : "");
                $("#editForm #ef_Desc").val(desc ? desc : "");
                $("#editForm #ef_Cat").val(cat ? cat : "");
                $("#editForm #ef_Um").val(um ? um : "");
                $("#editForm #ef_Spec").val(spec ? spec : "");
                $("#editForm #ef_Image").val(image ? image : "");

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
