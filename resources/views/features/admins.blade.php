@extends('layouts.app')

@section('content')
    <section id="admins">
        <div class="flex justify-between items-center h-[10vh]">
            <div class="flex justify-center w-[45%]">
                <div class="text-2xl text-black lg:text-4xl ">Manage Admin</div>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="uk-overflow-auto w-[80%]">
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Edited</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="text" class="hidden" value="0" id="numberOfChecked">
                        @foreach ($admins as $admin)
                            <tr>
                                <td>
                                    <label>
                                        <input class="uk-checkbox" type="checkbox" name="multidelete"
                                            id="multidelete{{ $admin->id }}" value="{{ $admin->id }}">
                                    </label>
                                </td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td id="dateUpdated{{ $admin->id }}">{{ $admin->updated_at }}</td>
                                <td>
                                    <span class="text-teal-500" id="edit{{ $admin->id }}" uk-icon="icon: file-edit"
                                        uk-toggle="target: #editModal{{ $admin->id }}"></span>
                                    <span class="text-red-500" id="delete{{ $admin->id }}" uk-icon="icon: trash"></span>
                                </td>
                            </tr>

                            <div id="editModal{{ $admin->id }}" class="uk-flex-top" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                    <button class="uk-modal-close-default" type="button" uk-close></button>

                                    <div class="text-3xl mb-5">Edit Password</div>
                                    <div class="uk-margin space-y-2">
                                        <div class="text-lg">Password</div>
                                        <input class="uk-input" id="password{{ $admin->id }}" type="password">
                                    </div>
                                    <div class="uk-margin space-y-2">
                                        <div class="text-lg">Confirm Password</div>
                                        <input class="uk-input" id="confirmPassword{{ $admin->id }}" type="password">
                                    </div>
                                    <div class="flex justify-end w-full">
                                        <button id="submitEdit{{ $admin->id }}"
                                            class="uk-button text-white bg-red-500 duration-300 hover:bg-red-700">Submit</button>
                                    </div>

                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    const dateUpdated = $("#dateUpdated{{ $admin->id }}").html()
                                    const formatted = moment(dateUpdated).format('LL | HH:mmA')
                                    $("#dateUpdated{{ $admin->id }}").text(formatted)
                                })

                                $("#submitEdit{{ $admin->id }}").click(function() {
                                    const password = $("#password{{ $admin->id }}").val()
                                    const confirmPassword = $("#confirmPassword{{ $admin->id }}").val()
                                    const formdata = new FormData()
                                    if (password != confirmPassword) {
                                        swal({
                                            icon: "error",
                                            title: "Error!",
                                            text: "Password does not match!",
                                            buttons: false
                                        })
                                    } else {
                                        swal({
                                            icon: "warning",
                                            title: "Change Password?",
                                            text: "Are you sure you want to change the password?",
                                            buttons: {
                                                cancel: "Cancel",
                                                true: "OK"
                                            }
                                        }).then(response => {
                                            if (response == 'true') {
                                                swal({
                                                    icon: "success",
                                                    title: "Password Changed!",
                                                    text: "The password has been successfully changed!",
                                                    buttons: false
                                                }).then(response => {
                                                    formdata.append('id', "{{ $admin->id }}")
                                                    formdata.append('password', password)
                                                    axios.post('/editadmin', formdata)
                                                        .then(response => {
                                                            location.reload()
                                                        })
                                                })
                                            }
                                        })
                                    }
                                })

                                $("#delete{{ $admin->id }}").click(function() {
                                    swal({
                                        icon: "warning",
                                        title: "Delete Admin?",
                                        text: "Are you sure you want to delete the admin?",
                                        buttons: {
                                            cancel: "Cancel",
                                            true: "OK"
                                        }
                                    }).then(response => {
                                        if (response == 'true') {
                                            swal({
                                                icon: "success",
                                                title: "Admin Deleted!",
                                                text: "Admin has been successfully deleted!",
                                                buttons: false,
                                            }).then(response => {
                                                const formdata = new FormData()
                                                formdata.append('id', '{{ $admin->id }}')
                                                axios.post('/deleteadmin', formdata)
                                                    .then(response => {
                                                        location.reload()
                                                    })
                                            })
                                        }
                                    })
                                })
                                $("#multidelete{{ $admin->id }}").change(function() {
                                    if (this.checked) {
                                        const currTotal = $('#numberOfChecked').val()
                                        const newTotal = parseInt($("#numberOfChecked").val()) + 1
                                        $("#numberOfChecked").val(newTotal)
                                        if (newTotal >= 1) {
                                            $("#deleteAllAdmins").addClass('bg-black')
                                            $("#deleteAllAdmins").removeClass('bg-gray-300')
                                            $("#deleteAllAdmins").removeAttr('disabled')
                                        }
                                    } else {
                                        const currTotal = $('#numberOfChecked').val()
                                        const newTotal = parseInt($("#numberOfChecked").val()) - 1
                                        $("#numberOfChecked").val(newTotal)
                                        if (newTotal == 0) {
                                            $("#deleteAllAdmins").removeClass('bg-black')
                                            $("#deleteAllAdmins").addClass('bg-gray-300')
                                            $("#deleteAllAdmins").attr('disabled', true)
                                        }
                                    }
                                })
                            </script>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="w-1/5">
                                <button disabled class="uk-button bg-gray-300 text-white" id="deleteAllAdmins">Delete
                                    All</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
