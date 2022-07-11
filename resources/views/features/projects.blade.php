@extends('layouts.app')

@section('content')
    <section id="projects">
        {{-- <div class="flex items-center h-[10vh]">
            <div class="flex justify-center w-[45%]">
                <div class="text-2xl text-black lg:text-4xl ">Projects</div>
            </div>
        </div> --}}
        <div class="flex justify-center">
            <div class="container">

                <div class="space-y-6 mt-10">
                    <!-- Short Description About the Page -->
                    <h2 class="text-2xl md:text-4xl font-bold text-slate-900">Projects</h2>
                    <div class="block h-1 md:h-2 w-20"></div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="text-neutral-400 text-sm">Below are the projects that are currently posted in your
                            portfolio.
                        </p>
                        <!-- Tooltip About the Page -->
                        <button
                            uk-tooltip="title: In this page, you can edit the projects displayed in your portfolio.; pos: top-left">
                            <i class="fa-solid fa-circle-question text-2xl text-red-500"></i>
                        </button>
                    </div>
                    <div class="float-right">
                        <button class="text-white bg-gray-300 px-3 py-2 rounded-md mb-4" disabled type="button"
                            id="deleteAllProjects">
                            <i class="fa-solid fa-trash-can mr-1"></i>
                            Delete All
                        </button>
                    </div>
                    <!-- Grid Container -->
                    <!-- Project 1 -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 clear-both">
                        <input type="text" class="hidden" value="0" id="numberOfChecked">
                        @foreach ($projects as $project)
                            <div class="h-100 w-30 border-2 border-slate-900">
                                <!-- Control Buttons -->
                                <div class="flex flex-row justify-between p-2">
                                    <!-- Checkbox -->
                                    <div>
                                        <input type="checkbox" name="multidelete" id="multidelete{{ $project->id }}"
                                            value="{{ $project->id }}">
                                    </div>
                                    <!-- Dropdown -->
                                    <div>
                                        <button type="button">
                                            <i class="fa-solid fa-ellipsis-vertical text-2xl"></i>
                                        </button>
                                        <div uk-drop="mode: click; pos: bottom-center" class="border border-1 w-40"
                                            id="dropdown-content">
                                            <ul class="bg-white">
                                                <li class="p-2" uk-toggle="target: #edit{{ $project->id }}">Edit</li>
                                                <hr>
                                                <li class="p-2" id="delete{{ $project->id }}">Delete</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Project Image -->
                                <img src="{{ asset('project_images/images/' . $project->image_url) }}" alt=""
                                    class="w-2/3 mx-auto">
                                <!-- Project Description -->
                                <div class="p-2 space-y-2">
                                    <p class="font-bold text-neutral-900">{{ $project->title }}</p>
                                    <p class="text-sm text-neutral-40">{{ $project->description }}
                                    </p>
                                    <p class="text-sm text-neutral-400">Date Updated: <span
                                            id="dateUpdated{{ $project->id }}">{{ $project->updated_at }}</span></p>
                                </div>
                            </div>

                            <!-- Modal For Edit -->
                            <div id="edit{{ $project->id }}" uk-modal class="uk-flex-top">
                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                    <div class="flex flex-row justify-between mb-4">
                                        <div class="">
                                            <i class="fa-solid fa-pen text-red-500"></i>
                                        </div>
                                        <!-- Close Button -->
                                        <button class="uk-modal-close" type="button">
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                    <!-- Modal Text -->
                                    <div class="space-y-4">
                                        <h2 class="uk-modal-title">Edit This Project</h2>
                                        <p class="text-neutral-400">Make sure to apply the necessary changes you want.</p>
                                    </div>
                                    <!-- Form -->
                                    <form action="" class="space-y-4 mt-4">
                                        <!-- Project Title -->
                                        <div>
                                            <small class="font-bold text-slate-700">
                                                <label for="">Project Title</label>
                                            </small>
                                            <input type="text"
                                                class="mt-1 w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                                                    focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                                id="editTitle{{ $project->id }}"
                                                placeholder="Enter your project's title" />
                                        </div>
                                        <!-- Project Description -->
                                        <div>
                                            <small class="font-bold text-slate-700">
                                                <label for="">Project Description</label>
                                            </small>
                                            <input type="text"
                                                class="mt-1 w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                                                    focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                                                id="editDescription{{ $project->id }}"
                                                placeholder="Enter your project's description" />
                                        </div>
                                        <!-- File Input -->
                                        <div>
                                            <small class="font-bold text-slate-700">
                                                <label for="">Upload an Image</label>
                                            </small>
                                            <label class="block">
                                                <input type="file" id="editImage{{ $project->id }}"
                                                    class="w-full text-sm text-slate-900 bg-white
                                                          file:mr-4 file:py-2 file:px-4
                                                          file:rounded-full file:border-0
                                                          file:text-sm file:font-semibold
                                                          file:bg-red-500 file:text-slate-900
                                                        " />
                                            </label>
                                        </div>

                                        <div class="float-right">
                                            <div class="flex flex-row">
                                                <button
                                                    class="uk-modal-close rounded-full bg-slate-600 text-white px-6 py-2 mr-3"
                                                    type="button">Close</button>
                                                <button class="rounded-full bg-red-500 text-white px-6 py-2" type="button"
                                                    id="saveEditButton{{ $project->id }}">Save
                                                    Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function() {
                                    const dateUpdated = $("#dateUpdated{{ $project->id }}").html()
                                    const formatted = moment(dateUpdated).format('LL | HH:mmA')
                                    $("#dateUpdated{{ $project->id }}").text(formatted)
                                })
                                $("#delete{{ $project->id }}").click(function() {
                                    swal({
                                        icon: "warning",
                                        title: "Delete Project?",
                                        text: "Are you sure you want to delete the project?",
                                        buttons: {
                                            cancel: "Cancel",
                                            true: "OK"
                                        }
                                    }).then(response => {
                                        if (response == 'true') {
                                            const formdata = new FormData()
                                            formdata.append('id', "{{ $project->id }}")
                                            axios.post('/deleteproject', formdata)
                                                .then(response => {
                                                    swal({
                                                        icon: "success",
                                                        title: "Project Deleted!",
                                                        text: "The project has been deleted!",
                                                        buttons: false,
                                                    }).then(response => {
                                                        location.reload()
                                                    })
                                                })
                                                .catch(e => {
                                                    swal({
                                                        icon: 'error',
                                                        title: "Error!",
                                                        text: "An error occurred while deleting the project!",
                                                        buttons: false
                                                    })
                                                })
                                        }
                                    })
                                })

                                $("#multidelete{{ $project->id }}").change(function() {
                                    if (this.checked) {
                                        const currTotal = $('#numberOfChecked').val()
                                        const newTotal = parseInt($("#numberOfChecked").val()) + 1
                                        $("#numberOfChecked").val(newTotal)
                                        if (newTotal >= 1) {
                                            $("#deleteAllProjects").addClass('bg-black')
                                            $("#deleteAllProjects").removeClass('bg-gray-300')
                                            $("#deleteAllProjects").removeAttr('disabled')
                                        }
                                    } else {
                                        const currTotal = $('#numberOfChecked').val()
                                        const newTotal = parseInt($("#numberOfChecked").val()) - 1
                                        $("#numberOfChecked").val(newTotal)
                                        if (newTotal == 0) {
                                            $("#deleteAllProjects").removeClass('bg-black')
                                            $("#deleteAllProjects").addClass('bg-gray-300')
                                            $("#deleteAllProjects").attr('disabled', true)
                                        }
                                    }
                                })
                                $("#saveEditButton{{ $project->id }}").click(function() {
                                    const title = $("#editTitle{{ $project->id }}").val()
                                    const description = $("#editDescription{{ $project->id }}").val()
                                    const image = document.getElementById('editImage{{ $project->id }}').files[0]
                                    const formdata = new FormData()
                                    formdata.append('id', '{{ $project->id }}')
                                    formdata.append('title', title)
                                    formdata.append('description', description)
                                    formdata.append('image_url', image)
                                    axios.post('/editproject', formdata)
                                        .then(response => {
                                            swal({
                                                icon: "success",
                                                title: "Project Edited Successfully!",
                                                text: "The project has been successfully edited!",
                                                buttons: false
                                            }).then(response => {
                                                location.reload()
                                            })
                                        })
                                })
                            </script>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="flex justify-center">
            <div class="uk-overflow-auto w-[80%]">
                <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="text" class="hidden" value="0" id="numberOfChecked">
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <label>
                                        <input class="uk-checkbox" type="checkbox" name="multidelete"
                                            id="multidelete{{ $project->id }}" value="{{ $project->id }}">
                                    </label>
                                </td>
                                <td class="md:w-[30%]">
                                    <img src="{{ asset('project_images/images/' . $project->image_url) }}" alt=""
                                        srcset="" class="lg:h-72 lg:w-72">
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>
                                    <span class="text-red-500" id="delete{{ $project->id }}" uk-icon="icon: trash"></span>
                                </td>
                            </tr>
                            <script>
                                $("#delete{{ $project->id }}").click(function() {
                                    swal({
                                        icon: "warning",
                                        title: "Delete Project?",
                                        text: "Are you sure you want to delete the project?",
                                        buttons: {
                                            cancel: "Cancel",
                                            true: "OK"
                                        }
                                    }).then(response => {
                                        if (response == 'true') {
                                            const formdata = new FormData()
                                            formdata.append('id', "{{ $project->id }}")
                                            axios.post('/deleteproject', formdata)
                                                .then(response => {
                                                    swal({
                                                        icon: "success",
                                                        title: "Project Deleted!",
                                                        text: "The project has been deleted!",
                                                        buttons: false,
                                                    }).then(response => {
                                                        location.reload()
                                                    })
                                                })
                                                .catch(e => {
                                                    swal({
                                                        icon: 'error',
                                                        title: "Error!",
                                                        text: "An error occurred while deleting the project!",
                                                        buttons: false
                                                    })
                                                })
                                        }
                                    })
                                })

                                $("#multidelete{{ $project->id }}").change(function() {
                                    if (this.checked) {
                                        const currTotal = $('#numberOfChecked').val()
                                        const newTotal = parseInt($("#numberOfChecked").val()) + 1
                                        $("#numberOfChecked").val(newTotal)
                                        if (newTotal >= 1) {
                                            $("#deleteAllProjects").addClass('bg-black')
                                            $("#deleteAllProjects").removeClass('bg-gray-300')
                                            $("#deleteAllProjects").removeAttr('disabled')
                                        }
                                    } else {
                                        const currTotal = $('#numberOfChecked').val()
                                        const newTotal = parseInt($("#numberOfChecked").val()) - 1
                                        $("#numberOfChecked").val(newTotal)
                                        if (newTotal == 0) {
                                            $("#deleteAllProjects").removeClass('bg-black')
                                            $("#deleteAllProjects").addClass('bg-gray-300')
                                            $("#deleteAllProjects").attr('disabled', true)
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
                            <td></td>
                            <td class="w-1/4">
                                <button disabled class="uk-button bg-gray-300 text-white" id="deleteAllProjects">Delete
                                    All</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div> --}}
    </section>
@endsection
