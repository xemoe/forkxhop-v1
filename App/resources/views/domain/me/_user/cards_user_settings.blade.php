<div class="card mb-4">
    <form method="POST" class="needs-validation" action="{{ route('me.user.update-settings') }}" novalidate>
        @csrf
        @method('patch')
        <div class="card-header">
            <strong>Settings</strong>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="inputName">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                        minlength="3" maxlength="255"
                        type="text" placeholder="Name" value="{{ $me->name }}" required>
                    <small class="form-text text-muted">
                        {{ $errors->first('name') }}
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="inputEmail">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email"
                        minlength="3" maxlength="255"
                        type="email" placeholder="Email" value="{{ $me->email }}" required>
                    <small class="form-text text-muted">
                        {{ $errors->first('email') }}
                    </small>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="col-12">
                <button class="btn btn-primary bg-primary btn-shadow" type="submit">Update settings</button>
            </div>
        </div>
    </form>
</div>