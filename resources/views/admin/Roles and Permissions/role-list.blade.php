@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Role</h5>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" method="post" action="" id="roleForm">
                                <div class="col-md-3">
                                    <label class="form-label">Role Name</label>
                                    <input type="text" name="role_name" class="form-control"
                                        placeholder="Enter role name">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">description</label>
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Enter description">
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save Role</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Role List</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Role Name</th>
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

        </div>
    </div>
</div>


@include('admin.includes.footer')
