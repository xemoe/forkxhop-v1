<button class="header-toggler px-md-0 me-md-3"
        type="button"
        onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
    <svg class="icon icon-lg">
        <use xlink:href="{{ asset('/icons/sprites/free.svg') }}#cil-menu"/>
    </svg>
</button>
<a class="header-brand d-md-none" href="#">
    <svg width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#full"/>
    </svg>
</a>
