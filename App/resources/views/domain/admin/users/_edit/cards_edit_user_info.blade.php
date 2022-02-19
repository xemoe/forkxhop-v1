<div class="card mb-4">
    <form method="POST" class="needs-validation" action="{{ route('admin.users.update', ['user' => $user]) }}" novalidate>
        @csrf
        @method('patch')
        <input type="hidden" name="update_form" value="information"/>
        <div class="card-header">
            <strong>Edit User Information</strong>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="inputName">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                           minlength="3" maxlength="255"
                           type="text" placeholder="Name" value="{{ $user->name }}" required>
                    <small class="form-text text-muted">
                        {{ $errors->first('name') }}
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="inputSelectRole">Role</label>
                    <select class="form-select" id="inputSelectRole" size="4" name="role">
                        <option class="text-capitalize">Choose...</option>
                        @foreach ($roleOptions as $role)
                            <option value="{{ $role }}" class="text-capitalize" {{ $user->hasRole($role) ? 'selected' : '' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="inputSelectRole">Active</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input bg-primary border-dark" type="checkbox" name="active"
                               role="switch" id="flexSwitchCheckChecked" {{ $user->active ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Activated this user</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="col-12">
                <button class="btn btn-primary bg-primary btn-shadow" type="submit">Update</button>
            </div>
        </div>
    </form>
</div>
