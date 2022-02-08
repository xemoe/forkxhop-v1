<x-dashboard-layout
    :menuSettings="$menuSettings"
    :headerSettings="$headerSettings"
    :breadcrumb="$breadcrumb">

    <div class="container-lg">
        <div class="card mb-4">
            <form class="">

                <div class="card-header">
                    <strong>Create new user</strong>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputName">Name</label>
                            <input class="form-control" id="inputName" type="text" placeholder="Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputEmail">Email</label>
                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="inputPassword">Password</label>
                            <input class="form-control" id="inputPassword" type="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="inputConfirmPassword">Confirm Password</label>
                            <input class="form-control" id="inputConfirmPassword" type="password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputSelectRole">Role</label>
                            <select class="form-select" id="inputSelectRole" size="4">
                                <option selected>Choose...</option>
                                <option value="1">Admin</option>
                                <option value="2">Simple</option>
                                <option value="3">Unassigned</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="inputSelectRole">Active</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Active this user</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-dashboard-layout>
