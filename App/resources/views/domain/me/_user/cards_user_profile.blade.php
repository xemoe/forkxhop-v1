<div class="card mb-4">

    @php
        $rolesBadge = [
            'root' => 'bg-primary',
            'admin' => 'bg-success',
            'simple' => 'bg-light text-dark',
        ];
    @endphp

    <div class="card-body p-3">

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-dark">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control bg-white border-0 px-0" value="{{ $me->name }}"
                        readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-dark">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control bg-white border-0 px-0" value="{{ $me->email }}"
                        readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-dark">Roles</label>
            <div class="col-sm-10 align-middle">
                @if(!empty($me->getRoleNames()))
                    @foreach($me->getRoleNames() as $v)
                        <label
                            class="mt-2 badge rounded-pill {{ $rolesBadge[$v] ?? '' }}">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-dark">Status</label>
            <div class="col-sm-10">
                <div class="form-check form-switch mt-2">
                    <input
                        class="form-check-input {{ $me->active ? 'bg-success border-success' : 'bg-secondary border-dark' }}"
                        type="checkbox"
                        role="switch" id="flexSwitchCheckChecked"
                        disabled {{ $me->active ? 'checked' : '' }}>
                    <label class="form-check-label"
                            for="flexSwitchCheckChecked">User {{ $me->active ? 'activated.' : 'deactivated.' }}</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-dark">Account Created</label>
            <div class="col-sm-10">
                <input type="text" class="form-control bg-white border-0 px-0" value="{{ $me->created_at }}"
                        readonly>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label text-dark">Recently Updated</label>
            <div class="col-sm-10">
                <input type="text" class="form-control bg-white border-0 px-0" value="{{ $me->updated_at }}"
                        readonly>
            </div>
        </div>

    </div>
</div>
