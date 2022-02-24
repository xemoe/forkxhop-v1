<div class="d-flex">
    <div class="p-0">Showing latest {{ $paging['from'] }} to {{ $paging['to'] }} from total {{ $paging['total'] }} records.</div>
    <div class="ms-auto p-0">{!! $users->render() !!}</div>
</div>