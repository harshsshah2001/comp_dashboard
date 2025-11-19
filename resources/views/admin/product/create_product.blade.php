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

            {{-- insert data --}}

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header">
                                <h5 class="card-title">Add Product</h5>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">


                                        <form id="addCategoryForm" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Select Category</label>
                                                <select class="form-control" id="category" name="category">
                                                    <option value="">Select Category</option>

                                                    @foreach($category as $cat)
                                                        <option value="{{ $cat->categoryTitle }}">{{ $cat->categoryTitle }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <div class="form-text">Select or enter the main parent category.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productname" class="form-label">product Title</label>
                                                <input type="text" class="form-control" id="productname"
                                                    name="productname" placeholder="Enter category title">
                                                <div class="form-text">Provide the visible title for this category.
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productimage" class="form-label">Product Image</label>
                                                <input type="file" class="form-control" id="productimage" name="image">
                                                <div class="form-text">Upload the main image for this product.</div>
                                            </div>


                                            <div class="mb-3">
                                                <label for="producticon" class="form-label">Product Icon</label>
                                                <input type="file" class="form-control" id="producticon" name="icon">
                                                <div class="form-text">Upload a small icon representing the product.
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <label for="productdescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="productdescription" rows="3"
                                                    name="productdescription"
                                                    placeholder="Enter Product description"></textarea>
                                                <div class="form-text">Short description about this product.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text" class="form-control" id="price" name="price"
                                                    placeholder="Enter product price">
                                                <div class="form-text">Provide the visible title for this Product.
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="saleprice" class="form-label">Sale Price</label>
                                                <input type="text" class="form-control" id="saleprice" name="saleprice"
                                                    placeholder="Enter sale price">
                                                <div class="form-text">Provide the visible title for this Product.
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

            <!-- display all data -->

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Product List</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Parent Category</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Icon</th>
                                        <th>Price</th>
                                        <th>Sale Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit product Modal -->
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

                                <!-- Parent Category -->
                                <div class="mb-3">
                                    <label>Parent Category</label>
                                    <select class="form-control" id="edit_productcategories" name="productcategories">
                                        <option value="">Select Parent Category</option>



                                    </select>
                                </div>

                                <!-- Category Title -->
                                <div class="mb-3">
                                    <label>Category Title</label>
                                    <input type="text" class="form-control" id="edit_productname" name="productname">
                                </div>

                                <!-- Category Image -->
                                <div class="mb-3">
                                    <label>Category Image</label>
                                    <div style="margin-bottom: 10px;">
                                        <img id="old_image_preview" src="" width="80" height="80"
                                            style="display:none; border-radius:5px;">
                                    </div>
                                    <input type="file" class="form-control" id="edit_image" name="image">

                                    <div style="margin-top: 10px;">
                                        <img id="new_image_preview" src="" width="80" height="80"
                                            style="display:none; border-radius:5px;">
                                    </div>
                                </div>

                                <!-- Category Icon -->
                                <div class="mb-3">
                                    <label>Category Icon</label>
                                    <div style="margin-bottom: 10px;">
                                        <img id="old_icon_preview" src="" width="80" height="80"
                                            style="display:none; border-radius:5px;">
                                    </div>
                                    <input type="file" class="form-control" id="edit_icon" name="icon">

                                    <div style="margin-top: 10px;">
                                        <img id="new_icon_preview" src="" width="80" height="80"
                                            style="display:none; border-radius:5px;">
                                    </div>
                                </div>


                                <!-- Description -->
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control" id="edit_productdescription"
                                        name="productdescription"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Update Category</button>
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
    $(document).ready(function () {

        $("#addCategoryForm").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('product.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === true) {
                        Swal.fire({
                            title: "Success!",
                            text: res.message,
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $("#addCategoryForm")[0].reset();
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let message = "";

                        $.each(errors, function (key, value) {
                            message += value[0] + "<br>";
                        });

                        Swal.fire({
                            title: "Validation Error!",
                            html: message,
                            icon: "error"
                        });

                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong!",
                            icon: "error"
                        });
                    }
                }
            });
        });




        // display data
        function loadProducts() {
            let products = @json($products);

            $("#datatable1").DataTable({
                data: products,
                destroy: true, // allow reinit
                columns: [
                    { data: 'id' },
                    { data: 'category', defaultContent: 'N/A' },
                    { data: 'productname' },
                    {
                        data: 'image',
                        render: function (img) {
                            return `<img src="/storage/${img}" width="40">`;
                        }
                    },
                    {
                        data: 'icon',
                        render: function (img) {
                            return `<img src="/storage/${img}" width="30">`;
                        }
                    },
                    { data: 'price' },
                    { data: 'saleprice' },
                    { data: 'productdescription' },
                    {
                        data: 'id',
                        render: function (id) {
                            return `
            <a href="#" class="text-primary edit-btn" data-id="${id}" title="Edit" style="font-size:18px; margin-right:10px;">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <a href="#" class="text-danger delete-btn" data-id="${id}" title="Delete" style="font-size:18px;">
                <i class="fa-solid fa-trash"></i>
            </a>
        `;
                        }
                    }

                ]
            });
        }

        loadProducts();
    });

</script>
