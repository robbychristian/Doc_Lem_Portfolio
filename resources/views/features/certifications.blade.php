@extends('layouts.app')

@section('content')
    <section id="certifications">
        <div class="flex justify-between items-center h-[10vh]">
            <div class="flex justify-center w-[45%]">
                <div class="text-2xl text-black lg:text-4xl ">Certifications</div>
            </div>
            <div class="flex justify-center lg:w-[38.5%]">
                <button type="button" uk-toggle="target: #certificationModal"
                    class="uk-button bg-slate-500 text-white duration-300 hover:bg-slate-600">Show Certifications</button>
            </div>

            <div id="certificationModal" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog h-full">
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                    <div class="uk-grid-collapse uk-child-width-1-2@s
uk-flex-middle" uk-grid>
                        <section class="panel w-screen" id="certifications">
                            <div class="container mx-auto">
                                <div class="space-y-6 p-12 md:p-0">
                                    <h2 class="text-2xl md:text-4xl font-bold text-slate-900 mt-10 md:mt-32">Certifications
                                        & Titles
                                    </h2>
                                    <div class="block h-1 md:h-2 w-20"></div>
                                </div>
                                <div class="p-12 md:p-0 grid grid-cols-1 md:grid-cols-4 gap-3 md:gap-6 mt-0 md:mt-10">
                                    @foreach ($certifications as $details)
                                        <div
                                            class="uk-card uk-card-default space-y-4 p-6 border-solid border-2 border-slate-900 hvr-float">
                                            <h3 class="uk-card-title">{{ $details->title }}</h3>
                                            <p class="text-neutral-400 hidden md:block">{{ $details->description }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <table class="uk-table uk-table-striped w-[80%]">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="text" class="hidden" value="0" id="numberOfChecked">
                    @foreach ($certifications as $certification)
                        <tr>
                            <td>
                                <label>
                                    <input class="uk-checkbox" type="checkbox" name="multidelete"
                                        id="multidelete{{ $certification->id }}" value="{{ $certification->id }}">
                                </label>
                            </td>
                            <td>{{ $certification->title }}</td>
                            <td>{{ Str::substr($certification->description, 0, 100) }}...</td>
                            <td>
                                <span class="text-teal-500" id="edit{{ $certification->id }}" uk-icon="icon: file-edit"
                                    uk-toggle="target: #editModal{{ $certification->id }}"></span>
                                <span class="text-red-500" id="delete{{ $certification->id }}"
                                    uk-icon="icon: trash"></span>
                            </td>
                        </tr>
                        <div id="editModal{{ $certification->id }}" class="uk-flex-top" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                <button class="uk-modal-close-default" type="button" uk-close></button>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>

                            </div>
                        </div>
                        <script>
                            $("#delete{{ $certification->id }}").click(function() {
                                swal({
                                    icon: 'warning',
                                    title: 'Warning',
                                    text: 'Are you sure you want to delete the certification?',
                                    buttons: {
                                        cancel: "Cancel",
                                        true: "OK"
                                    }
                                }).then(response => {
                                    if (response == 'true') {
                                        swal({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: 'The certification has been deleted successfully!',
                                            button: false
                                        }).then(response => {
                                            const formdata = new FormData()
                                            formdata.append('id', '{{ $certification->id }}')
                                            axios.post('/deletecertification', formdata)
                                                .then(response => {
                                                    location.reload()
                                                })
                                        })
                                    }
                                })
                            })
                            $("#multidelete{{ $certification->id }}").change(function() {
                                if (this.checked) {
                                    const currTotal = $('#numberOfChecked').val()
                                    const newTotal = parseInt($("#numberOfChecked").val()) + 1
                                    $("#numberOfChecked").val(newTotal)
                                    if (newTotal >= 1) {
                                        $("#deleteAllCertifications").addClass('bg-black')
                                        $("#deleteAllCertifications").removeClass('bg-gray-300')
                                        $("#deleteAllCertifications").removeAttr('disabled')
                                    }
                                } else {
                                    const currTotal = $('#numberOfChecked').val()
                                    const newTotal = parseInt($("#numberOfChecked").val()) - 1
                                    $("#numberOfChecked").val(newTotal)
                                    if (newTotal == 0) {
                                        $("#deleteAllCertifications").removeClass('bg-black')
                                        $("#deleteAllCertifications").addClass('bg-gray-300')
                                        $("#deleteAllCertifications").attr('disabled', true)
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
                            <button disabled class="uk-button bg-gray-300 text-white" id="deleteAllCertifications">Delete
                                All</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection
