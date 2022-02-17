<thead class="table-light">
<tr>
    <th scope="col" colspan="2"></th>
    @foreach (['name', 'email', 'role', 'created_at', 'updated_at'] as $th)
        @if (in_array($th, ['role']))
            <th scope="col">Role</th>
        @elseif ($orderBy == $th && $sort == 'asc')
            <th scope="col">
                <div class="d-flex">
                    <div class="p-0">{{ $th }}</div>
                    <div class="ms-auto p-0">
                        <a href="{{ route('admin.users.index', ['order' => $th, 'sort' => 'desc']) }}">
                            <svg class="icon icon-sm {{ $orderBy == $th ? 'text-info' : 'text-black-50' }}">
                                <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-sort-ascending"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </th>
        @else
            <th scope="col">
                <div class="d-flex">
                    <div class="p-0">{{ $th }}</div>
                    <div class="ms-auto p-0">
                        <a href="{{ route('admin.users.index', ['order' => $th, 'sort' => 'asc']) }}">
                            <svg class="icon icon-sm {{ $orderBy == $th ? 'text-info' : 'text-black-50' }}">
                                <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-sort-descending"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </th>
        @endif
    @endforeach
</tr>
</thead>
