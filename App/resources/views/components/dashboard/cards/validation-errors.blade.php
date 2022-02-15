@props(['errors'])

@if ($errors->any())
    <div class="card mb-0 bg-transparent border-0">
        <div class="card-body p-0">
            <div {{ $attributes }}>
                <div>
                    {{ __('Whoops! Something went wrong.') }}
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
