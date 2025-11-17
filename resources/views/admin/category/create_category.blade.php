@include('admin.includes.header')
@include('admin.includes.sidebar')
<div class="app-content">

    <div class="app-container">
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
                                        <!-- Parent Category -->
                                        <div class="mb-3">
                                            <label for="parentCategory" class="form-label">Parent Category</label>
                                            <select class="form-control" id="parentCategory" name="parentCategory">
                                                <option value="">Select Parent Category</option>

                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->categoryTitle }}">{{ $cat->categoryTitle }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <div class="form-text">Select or enter the main parent category.</div>
                                        </div>



                                        <!-- Category Title -->
                                        <div class="mb-3">
                                            <label for="categoryTitle" class="form-label">Category Title</label>
                                            <input type="text" class="form-control" id="categoryTitle"
                                                name="categoryTitle" placeholder="Enter category title">
                                            <div class="form-text">Provide the visible title for this category.</div>
                                        </div>

                                        <!-- Category Image -->
                                        <div class="mb-3">
                                            <label for="categoryImage" class="form-label">Category Image</label>
                                            <input type="file" class="form-control" id="categoryImage" name="image">
                                            <div class="form-text">Upload the main image for this category.</div>
                                        </div>

                                        <!-- Category Icon -->
                                        <div class="mb-3">
                                            <label for="categoryIcon" class="form-label">Category Icon</label>
                                            <input type="file" class="form-control" id="categoryIcon" name="icon">
                                            <div class="form-text">Upload a small icon representing the category.</div>
                                        </div>

                                        <!-- Description -->
                                        <div class="mb-3">
                                            <label for="categoryDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="categoryDescription" rows="3"
                                                name="categoryDescription"
                                                placeholder="Enter category description"></textarea>
                                            <div class="form-text">Short description about this category.</div>
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
    </div>
</div>


@include('admin.includes.footer')

<script>
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
                        timer: 2000,
                        showConfirmButton: false
                    });

                    $("#addCategoryForm")[0].reset();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message,
                    });
                }
            },

            error: function (err) {
                console.log(err.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: err.responseText
                });
            }

        });
    });
</script>
