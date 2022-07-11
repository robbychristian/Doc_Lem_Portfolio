@extends('layouts.app')

@section('content')
    <section id="works">
        <div class="flex justify-between items-center h-[10vh]">
            <div class="flex justify-center w-[45%]">
                <div class="text-2xl text-black lg:text-4xl ">Works and Experiences</div>
            </div>
            <div class="flex justify-center lg:w-[38.5%]">
                <button type="button" uk-toggle="target: #worksAndExperiencesModal"
                    class="uk-button bg-slate-500 text-white duration-300 hover:bg-slate-600">Show Works and
                    Experiences</button>
            </div>

            <div id="worksAndExperiencesModal" class="uk-modal-full h-screen" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-full uk-close-large h-full" type="button" uk-close></button>
                    <div class="uk-grid-collapse uk-child-width-1-1@s
uk-flex-middle" uk-grid>
                        <section class="panel w-screen px-44 hidden md:block" id="experience">
                            <div class="space-y-6">
                                <h2 class="text-2xl md:text-4xl font-bold text-slate-900 mt-32">Work & Experience</h2>
                                <div class="block h-1 md:h-2 w-20"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                                @foreach ($experiences as $experience)
                                    <!-- List Item 1 -->
                                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                                        <!-- Heading -->
                                        <div class="rounded-l-full bg-red-100 md:bg-transparent">
                                            <div class="flex items-center space-x-2">
                                                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-red-500">
                                                    ►
                                                </div>
                                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                                    {{ $experience->title }}
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- End of Heading -->
                                        <div>
                                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                                {{ $experience->title }}
                                            </h3>
                                            <p class="text-gray-400">
                                                {{ $experience->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End of List Item 1 -->
                                @endforeach



                            </div>
                    </div>
    </section>
    </div>
    </div>
    </div>
    </div>
    <div class="flex justify-center">
        <div class="uk-overflow-auto w-[80%]">
            <table class="uk-table uk-table-small uk-table-divider">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date Edited</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="text" class="hidden" value="0" id="numberOfChecked">
                    @foreach ($experiences as $experience)
                        <tr>
                            <td>
                                <label>
                                    <input class="uk-checkbox" type="checkbox" name="multidelete"
                                        id="multidelete{{ $experience->id }}" value="{{ $experience->id }}">
                                </label>
                            </td>
                            <td>{{ $experience->title }}</td>
                            <td>{{ Str::substr($experience->description, 0, 100) }}...</td>
                            <td id="dateUpdated{{ $experience->id }}">{{ $experience->updated_at }}</td>
                            <td>
                                <span class="text-teal-500" id="edit{{ $experience->id }}" uk-icon="icon: file-edit"
                                    uk-toggle="target: #editModal{{ $experience->id }}"></span>
                                <span class="text-red-500" id="delete{{ $experience->id }}" uk-icon="icon: trash"></span>
                            </td>
                        </tr>
                        <div id="editModal{{ $experience->id }}" class="uk-flex-top" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                <button class="uk-modal-close-default" type="button" uk-close></button>

                                <div class="text-3xl mb-5">Edit Works and Experience</div>
                                <div class="uk-margin space-y-2">
                                    <div class="text-lg">Title</div>
                                    <input class="uk-input" id="worksAndExperienceTitle{{ $experience->id }}"
                                        type="text" placeholder="Title...">
                                </div>
                                <div class="uk-margin space-y-2">
                                    <div class="text-lg">Description</div>
                                    <input class="uk-input" id="worksAndExperienceDescription{{ $experience->id }}"
                                        type="text" placeholder="Description...">
                                </div>
                                <div class="flex justify-end w-full">
                                    <button id="submitEdit{{ $experience->id }}"
                                        class="uk-button text-white bg-red-500 duration-300 hover:bg-red-700">Submit</button>
                                </div>

                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                const dateUpdated = $("#dateUpdated{{ $experience->id }}").html()
                                const formatted = moment(dateUpdated).format('LL | HH:mmA')
                                $("#dateUpdated{{ $experience->id }}").text(formatted)
                            })
                            $("#delete{{ $experience->id }}").click(function() {
                                swal({
                                    icon: "warning",
                                    title: "Delete Works and Experience?",
                                    text: "Are you sure you want to delete this entry?",
                                    buttons: {
                                        cancel: "Cancel",
                                        true: "OK"
                                    }
                                }).then(response => {
                                    if (response == 'true') {
                                        const formdata = new FormData()
                                        formdata.append('id', "{{ $experience->id }}")
                                        axios.post('/deleteworksandexperiences', formdata)
                                            .then(response => {
                                                location.reload()
                                            })
                                            .catch(e => {
                                                console.log(e)
                                            })
                                    }
                                })
                            })
                            $("#multidelete{{ $experience->id }}").change(function() {
                                if (this.checked) {
                                    const currTotal = $('#numberOfChecked').val()
                                    const newTotal = parseInt($("#numberOfChecked").val()) + 1
                                    $("#numberOfChecked").val(newTotal)
                                    if (newTotal >= 1) {
                                        $("#deleteAll").addClass('bg-black')
                                        $("#deleteAll").removeClass('bg-gray-300')
                                        $("#deleteAll").removeAttr('disabled')
                                    }
                                } else {
                                    const currTotal = $('#numberOfChecked').val()
                                    const newTotal = parseInt($("#numberOfChecked").val()) - 1
                                    $("#numberOfChecked").val(newTotal)
                                    if (newTotal == 0) {
                                        $("#deleteAll").removeClass('bg-black')
                                        $("#deleteAll").addClass('bg-gray-300')
                                        $("#deleteAll").attr('disabled', true)
                                    }
                                }
                            })

                            $("#submitEdit{{ $experience->id }}").click(function() {
                                const title = $("#worksAndExperienceTitle{{ $experience->id }}").val()
                                const description = $('#worksAndExperienceDescription{{ $experience->id }}').val()
                                const formdata = new FormData()
                                formdata.append('id', '{{ $experience->id }}')
                                formdata.append('title', title)
                                formdata.append('description', description)
                                axios.post('/editworksandexperiences', formdata)
                                    .then(response => {
                                        location.reload()
                                    })
                            })
                        </script>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <button disabled class="uk-button bg-gray-300 text-white w-40" id="deleteAll">Delete
                                All</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </section>
@endsection
