@php
    // @doc
    // ยกตัวอย่างเช่น เข้าสู่ระบบด้วยผู้ใช้กลุ่ม Administrator มายัง Route dashboard.home
    // จะต้องตรวจสอบสิทธิ์และเรียก Sidebar (Menu) items ที่ต้องการแสดงผลเฉพาะผู้ใช้
    // และจะต้องแสดง Breadcrumb ของ Route dashboard.home
    // - ตัวแปรที่มาจาก Properties ของ App\View\Components\DashboardLayout
    //   - $menuSettings
    //   - $headerSettings
    //   - $breadcrumb
    //
@endphp

<x-app-layout>
    <style>
        .bg-light {
            background-color: var(--cui-light, #ebedef) !important;
        }
        thead th {
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .form-label {
            font-weight: 600;
        }
    </style>
    <x-dashboard.sidebar :menuSettings="$menuSettings"/>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <x-dashboard.container-header :headerSettings="$headerSettings" :breadcrumb="$breadcrumb"/>
        <x-dashboard.container-body>{{ $slot }}</x-dashboard.container-body>
        <x-dashboard.container.footer/>
    </div>
</x-app-layout>
