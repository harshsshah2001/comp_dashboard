@include('admin.includes.header')
@include('admin.includes.sidebar')


<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Permission</h5>
                        </div>
                        <div class="card-body">
                            <form class="row g-3" method="post" action=""
                                id="permissionForm">
                                <div class="col-md-5">
                                    <label class="form-label">Permission Key</label>
                                    <input type="text" name="key" class="form-control" placeholder="e.g., agent.create">
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Short description">
                                </div>

                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">Save Permission</button>
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
                            <h5 class="card-title">Permission List</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Key</th>
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
