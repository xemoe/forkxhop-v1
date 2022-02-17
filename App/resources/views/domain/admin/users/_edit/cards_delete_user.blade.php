<div class="card mb-4">
    <form method="POST" action="{{ route('admin.users.destroy', ['user' => $user]) }}">
        @csrf
        @method('delete')
        <div class="card-header bg-danger text-white">
            <strong>Remove User</strong>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="inputSelectRole">Delete</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input bg-danger border-danger" type="checkbox" name="confirm_delete"
                               role="switch" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Confirm delete user</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="col-12">
                <button class="btn btn-primary bg-danger btn-shadow" type="submit">Delete User</button>
            </div>
        </div>
    </form>
</div>
