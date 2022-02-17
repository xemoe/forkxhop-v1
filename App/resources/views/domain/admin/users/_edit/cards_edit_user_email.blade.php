<div class="card mb-4">
    <form method="POST" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('patch')
        <input type="hidden" name="update_form" value="email"/>
        <div class="card-header bg-info text-white">
            <strong>Change User Email</strong>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label" for="inputEmail">Email</label>
                    <input class="form-control" id="inputEmail" name="email"
                           type="email" placeholder="name@example.com" value="{{ $user->email }}" required>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="col-12">
                <button class="btn btn-primary bg-info btn-shadow" type="submit">Change Email</button>
            </div>
        </div>
    </form>
</div>
