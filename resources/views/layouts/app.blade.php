<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- EMAILJS --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    {{-- ANIMATE.CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- UIKIT --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- CHART JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
</head>

<body>
    @auth
        <nav class="uk-navbar  uk-margin bg-red-600">
            <div class="uk-navbar-center">
                <div class="text-xl text-white">
                    <img src="{{ asset('images/logo.png') }}" class="h-24 w-24" alt="" srcset="">
                </div>
            </div>
            <div class="uk-navbar-right">
                <a class="uk-navbar-toggle" href="#offcanvas-slide" id="toggleNav" uk-toggle>
                    <span uk-navbar-toggle-icon class="text-white
                    "></span>
                </a>
            </div>
        </nav>

        <div id="offcanvas-slide" uk-offcanvas="flip: true">
            <div class="uk-offcanvas-bar bg-red-600">

                <ul class="uk-nav-default uk-nav-parent-icon space-y-6" uk-nav="multiple: true">
                    <li class="uk-active"><a href="/home" class="text-xl">Home</a></li>
                    <li class="uk-parent">
                        <a href="#" class="text-xl">About Me</a>
                        <ul class="uk-nav-sub">
                            <li><a href="{{ route('admin.editaboutme') }}" class="text-lg">Edit</a></li>
                        </ul>
                    </li>
                    <li class="uk-parent">
                        <a href="#" class="text-xl">Works and Experiences</a>
                        <ul class="uk-nav-sub">
                            <li><a href="/worksandexperiences" class="text-lg">View</a></li>
                            <li><a href="#addExperiencesModal" class="text-lg" uk-toggle>Add</a></li>
                        </ul>
                    </li>
                    <li class="uk-parent">
                        <a href="#" class="text-xl">Certifications</a>
                        <ul class="uk-nav-sub">
                            <li><a href="/certifications" class="text-lg">View</a></li>
                            <li><a href="#addCertificationModal" class="text-lg" uk-toggle>Add</a></li>
                        </ul>
                    </li>
                    <li class="uk-parent">
                        <a href="#" class="text-xl">Projects</a>
                        <ul class="uk-nav-sub">
                            <li><a href="/projects" class="text-lg">View</a></li>
                            <li><a href="#addProjectModal" class="text-lg" uk-toggle>Add</a></li>
                        </ul>
                    </li>
                    <li class="uk-nav-divider"></li>
                    <li>
                        <form action='/logout' method="POST">
                            @csrf
                            <button>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>

        {{-- ADD CERTIFICATION MODAL --}}
        <div id="addCertificationModal" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="text-4xl mb-5">Add Certification</div>
                <div class="uk-margin space-y-2">
                    <div class="text-xl">Title</div>
                    <input class="uk-input" id="certificationTitle" type="text" placeholder="Input">
                </div>
                <div class="uk-margin space-y-2">
                    <div class="text-xl">Description</div>
                    <textarea id="certificationDescription" class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                </div>

                <div class="flex justify-end w-full">
                    <button id="submitCertification"
                        class="uk-button text-white bg-red-500 duration-300 hover:bg-red-700">Submit</button>
                </div>

            </div>
        </div>
        {{-- ADD WORKS AND EXPERIENCES MODAL --}}
        <div id="addExperiencesModal" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="text-4xl mb-5">Add Works and Experiences</div>
                <div class="uk-margin space-y-2">
                    <div class="text-xl">Title</div>
                    <input class="uk-input" id="experiencesTitle" type="text" placeholder="Input">
                </div>
                <div class="uk-margin space-y-2">
                    <div class="text-xl">Description</div>
                    <textarea id="experiencesDescription" class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                </div>

                <div class="flex justify-end w-full">
                    <button id="submitExperiences"
                        class="uk-button text-white bg-red-500 duration-300 hover:bg-red-700">Submit</button>
                </div>

            </div>
        </div>
        {{-- ADD PROJECTS MODAL --}}
        <div id="addProjectModal" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="text-4xl mb-5">Add Project</div>
                <div class="uk-margin space-y-2">
                    <div class="text-xl">Title</div>
                    <input class="uk-input" id="projectTitle" type="text" placeholder="Input">
                </div>
                <div class="uk-margin space-y-2">
                    <div class="text-xl">Description</div>
                    <textarea id="projectDescription" class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                </div>
                <div class="uk-margin" uk-margin>
                    <div uk-form-custom="target: true" class="space-y-2">
                        <div class="text-xl">Image</div>
                        <input type="file" id="file">
                        <input id="fileUrl" class="uk-input uk-form-width-medium w-screen" type="text"
                            placeholder="Select file" disabled>
                    </div>
                </div>

                <div class="flex justify-end w-full">
                    <button id="submitProject"
                        class="uk-button text-white bg-red-500 duration-300 hover:bg-red-700">Submit</button>
                </div>

            </div>
        </div>
    @endauth
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>
</body>

</html>
