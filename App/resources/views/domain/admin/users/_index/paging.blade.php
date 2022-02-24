<div class="d-flex">
    <div class="p-2 docs-highlight">Showing latest {{ $paging['from'] }} to {{ $paging['to'] }} from total {{ $paging['total'] }} records.</div>
    <div class="ms-auto p-2 docs-highlight">{!! $users->render() !!}</div>
</div>