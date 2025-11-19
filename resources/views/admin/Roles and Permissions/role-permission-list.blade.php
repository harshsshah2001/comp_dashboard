@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Role Permissions Management</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatable1" class="display w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Manage Permissions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Manage Permissions Modal -->
            <div class="modal fade" id="managePermissionsModal" tabindex="-1"
                aria-labelledby="managePermissionsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="assignPermissionsForm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="managePermissionsModalLabel">Manage Permissions</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" name="role_id" id="modal_role_id">

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="select_all_permissions">
                                        <label class="form-check-label fw-bold" for="select_all_permissions">Select All
                                            Permissions</label>
                                    </div>
                                </div>

                                <div id="permissionsList" class="row">
                                    <!-- Permissions will be dynamically loaded here -->
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Permissions</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@include('admin.includes.footer')
