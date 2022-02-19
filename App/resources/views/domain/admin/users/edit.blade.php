<x-dashboard-layout :breadcrumb="$breadcrumb">

    <div class="container-fluid p-0">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @elseif ($message = Session::get('failed'))
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @elseif ($message = Session::get('none'))
            <div class="alert alert-info" role="alert">
                {{ $message }}
            </div>
        @endif

        <x-dashboard.cards.validation-errors class="callout callout-danger bg-white" :errors="$errors" />
        <div class="row">
            <div class="col-md-6">
                @include('domain.admin.users._edit.cards_edit_user_info')
                @include('domain.admin.users._edit.cards_delete_user')
            </div>
            <div class="col-md-6">
                @include('domain.admin.users._edit.cards_edit_user_email')
                @include('domain.admin.users._edit.cards_edit_user_password')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</x-dashboard-layout>
