@include('admin.includes.header')
@include('admin.includes.sidebar')

<style>
    /* Make top bar (Show entries + Search) on the same line */
    div.dataTables_wrapper div.dataTables_length {
        float: left !important;
    }

    div.dataTables_wrapper div.dataTables_filter {
        float: right !important;
        text-align: right !important;
    }

    /* Align the Search label + input inside */
    div.dataTables_filter label {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 6px;
        margin-bottom: 0 !important;
    }

    div.dataTables_wrapper .dataTables_paginate {
        display: none !important;
    }
</style>

<div class="app-content">

    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header">
                                <h5 class="card-title">Add Category</h5>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <form id="addCategoryForm" enctype="multipart/form-data">
                                            @csrf

                                            <!-- ROW 1 -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="parentCategory" class="form-label">Parent
                                                        Category</label>
                                                    <select class="form-control" id="parentCategory"
                                                        name="parentCategory">
                                                        <option value="">Select Parent Category</option>
                                                        @foreach($categoryTitles as $cat)
                                                            <option value="{{ $cat->categoryTitle }}">
                                                                {{ $cat->categoryTitle }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-text">Select or enter the main parent category.
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="categoryTitle" class="form-label">Category Title</label>
                                                    <input type="text" class="form-control" id="categoryTitle"
                                                        name="categoryTitle" placeholder="Enter category title">
                                                    <div class="form-text">Provide the visible title for this category.
                                                    </div>
                                                    <span class="text-danger error-text categoryTitle_error"></span>

                                                </div>
                                            </div>

                                            <!-- ROW 2 -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="categoryImage" class="form-label">Category Image</label>
                                                    <input type="file" class="form-control" id="categoryImage"
                                                        name="image">
                                                    <div class="form-text">Upload the main image for this category.
                                                    </div>
                                                    <span class="text-danger error-text image_error"></span>

                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="categoryIcon" class="form-label">Category Icon</label>
                                                    <input type="file" class="form-control" id="categoryIcon"
                                                        name="icon">
                                                    <div class="form-text">Upload a small icon representing the
                                                        category.</div>
                                                </div>
                                            </div>

                                            <!-- ROW 3 (Description) -->
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="categoryDescription"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" id="categoryDescription" rows="3"
                                                        name="categoryDescription"
                                                        placeholder="Enter category description"></textarea>
                                                    <div class="form-text">Short description about this category.</div>
                                                    <span
                                                        class="text-danger error-text categoryDescription_error"></span>

                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Category List</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Parent Category</th>
                                        <th>Category Title</th>
                                        <th>Category Image</th>
                                        <th>Category Icon</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Category Modal -->
            <div class="modal fade" id="editCategoryModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <form id="updateCategoryForm">
                                @csrf

                                <input type="hidden" id="edit_id" name="id">

                                <!-- ROW 1 -->
                                <div class="row">

                                    <!-- Parent Category -->
                                    <div class="col-md-6 mb-3">
                                        <label>Parent Category</label>
                                        <select class="form-control" id="edit_parentCategory" name="parentCategory">
                                            <option value="">Select Parent Category</option>
                                            @foreach($categoryTitles as $cat)
                                                <option value="{{ $cat->categoryTitle }}">{{ $cat->categoryTitle }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Category Title -->
                                    <div class="col-md-6 mb-3">
                                        <label>Category Title</label>
                                        <input type="text" class="form-control" id="edit_categoryTitle"
                                            name="categoryTitle">
                                        <span class="text-danger error-text categoryTitle_error"></span>

                                    </div>

                                </div>

                                <!-- ROW 2 -->
                                <div class="row">

                                    <!-- Category Image -->
                                    <div class="col-md-6 mb-3">
                                        <label>Category Image</label>

                                        <!-- Old Image -->
                                        <div style="margin-bottom: 10px;">
                                            <img id="old_image_preview" src="" width="80" height="80"
                                                style="display:none; border-radius:5px;">
                                        </div>

                                        <input type="file" class="form-control" id="edit_image" name="image">

                                        <!-- New Preview -->
                                        <div style="margin-top: 10px;">
                                            <img id="new_image_preview" src="" width="80" height="80"
                                                style="display:none; border-radius:5px;">
                                        </div>
                                        <span class="text-danger error-text image_error"></span>

                                    </div>

                                    <!-- Category Icon -->
                                    <div class="col-md-6 mb-3">
                                        <label>Category Icon</label>

                                        <!-- Old Icon -->
                                        <div style="margin-bottom: 10px;">
                                            <img id="old_icon_preview" src="" width="80" height="80"
                                                style="display:none; border-radius:5px;">
                                        </div>

                                        <input type="file" class="form-control" id="edit_icon" name="icon">

                                        <!-- New Preview -->
                                        <div style="margin-top: 10px;">
                                            <img id="new_icon_preview" src="" width="80" height="80"
                                                style="display:none; border-radius:5px;">
                                        </div>
                                    </div>

                                </div>

                                <!-- ROW 3 (Description) -->
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>Description</label>
                                        <textarea class="form-control" id="edit_categoryDescription"
                                            name="categoryDescription"></textarea>
                                    </div>
                                    <span class="text-danger error-text categoryDescription_error"></span>

                                </div>

                                <button type="submit" class="btn btn-primary btn-sm float-start">Update
                                    Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@include('admin.includes.footer')


<script>

    // DataTable initialization
    let table = $('#datatable1').DataTable({
        processing: true,
        serverSide: false,
        ordering: false,

        ajax: {
            url: "{{ route('category.create') }}",
            type: "GET"
        },

        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },

            {
                data: "parentCategory",
                render: function (data) {
                    return data ? data : "—"; // hides null
                }
            },

            { data: "categoryTitle" },

            {
                data: "image",
                render: function (data) {
                    if (data) {
                        return `<img src="/storage/${data}" width="50" height="50">`;
                    }
                    return "No Image";
                }
            },

            {
                data: "icon",
                render: function (data) {
                    if (data) {
                        return `<img src="/storage/${data}" width="50" height="50">`;
                    }
                    return "No Icon";
                }
            },

            { data: "categoryDescription" },

            {
                data: "id",
                render: function (id) {
                    return `
            <a href="javascript:void(0)" class="text-warning me-2 editBtn" data-id="${id}" style="cursor:pointer;">
                <i class="fa-solid fa-pen-to-square fa-lg"></i>
            </a>

            <a href="javascript:void(0)" class="text-danger deleteBtn" data-id="${id}" style="cursor:pointer;">
                <i class="fa-solid fa-trash fa-lg"></i>
            </a>
        `;
                }
            }

        ]

    });

    //open pop form for update category
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');

        $.ajax({
            url: "/admin/category/edit/" + id,
            type: "GET",
            success: function (res) {

                $("#edit_id").val(res.id);
                $("#edit_parentCategory").val(res.parentCategory);
                $("#edit_categoryTitle").val(res.categoryTitle);
                $("#edit_categoryDescription").val(res.categoryDescription);

                // Show old image
                if (res.image) {
                    $("#old_image_preview").attr("src", "/storage/" + res.image).show();
                } else {
                    $("#old_image_preview").hide();
                }

                // Show old icon
                if (res.icon) {
                    $("#old_icon_preview").attr("src", "/storage/" + res.icon).show();
                } else {
                    $("#old_icon_preview").hide();
                }

                // Clear new previews
                $("#new_image_preview").hide();
                $("#new_icon_preview").hide();

                $("#editCategoryModal").modal('show');
            }

        });
    });

    // Preview new CATEGORY image
    $("#edit_image").on("change", function () {
        let file = this.files[0];
        if (file) {
            $("#new_image_preview")
                .attr("src", URL.createObjectURL(file))
                .show();

            // Hide old image when new one is selected
            $("#old_image_preview").hide();
        }
    });

    // Preview new CATEGORY icon
    $("#edit_icon").on("change", function () {
        let file = this.files[0];
        if (file) {
            $("#new_icon_preview")
                .attr("src", URL.createObjectURL(file))
                .show();

            // Hide old icon when new one is selected
            $("#old_icon_preview").hide();
        }
    });

    //update category
    $("#updateCategoryForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#edit_id").val();
        let formData = new FormData(this);

        $.ajax({
            url: "/admin/category/update/" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (res) {
                if (res.status === true) {
                    Swal.fire({
                        icon: "success",
                        text: res.message,
                        timer: 1500,
                        showConfirmButton: false
                    });

                    $("#editCategoryModal").modal('hide');
                    $('#datatable1').DataTable().ajax.reload();
                }
            }
            

        });
    });

    // Preview new CATEGORY image
    $("#edit_image").on("change", function () {
        let file = this.files[0];
        if (file) {
            $("#new_image_preview").attr("src", URL.createObjectURL(file)).show();
        }
    });

    // Preview new CATEGORY icon
    $("#edit_icon").on("change", function () {
        let file = this.files[0];
        if (file) {
            $("#new_icon_preview").attr("src", URL.createObjectURL(file)).show();
        }
    });

    // Delete script
    $(document).on('click', '.deleteBtn', function () {

        let id = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "This record will be deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "/admin/category/delete/" + id,
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },

                    success: function (res) {
                        if (res.status === true) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted',
                                text: res.message,
                                timer: 1500,
                                showConfirmButton: false
                            });

                            $('#datatable1').DataTable().ajax.reload();
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    },

                    error: function () {
                        Swal.fire("Error", "Server Error", "error");
                    }
                });

            }
        });

    });

    // for refresh a category dropdown
    function loadCategoryDropdown() {
        $.ajax({
            url: "{{ route('category.titles') }}",
            type: "GET",
            success: function (data) {

                let dropdown = $("#parentCategory");
                dropdown.empty();          // reset dropdown
                dropdown.append(`<option value="">Select Parent Category</option>`);

                // Repopulate
                data.forEach(cat => {
                    dropdown.append(`<option value="${cat.categoryTitle}">${cat.categoryTitle}</option>`);
                });
            }
        });
    }

    // category store
    $("#addCategoryForm").on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('category.store') }}",

            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },

            success: function (res) {
                if (res.status === true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message,
                        timer: 1000,
                        showConfirmButton: false
                    });

                    $("#addCategoryForm")[0].reset();
                    table.ajax.reload(null, false);
                    loadCategoryDropdown();  // 🔥 Refresh dropdown list

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message,
                    });
                }
            },

            error: function (err) {

                // Clear old errors
                $('.error-text').text('');


                if (err.status === 422) {
                    // Loop through validation errors and show below fields
                    $.each(err.responseJSON.errors, function (field, messages) {
                        $('.' + field + '_error').text(messages[0]);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Something went wrong!'
                    });
                }
            }


        });
    });

</script>
