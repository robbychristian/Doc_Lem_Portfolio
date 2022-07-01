<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- EMAILJS --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    {{-- External JS --}}
    <script src="{{ asset('js/chatbot.js') }}" defer></script>
</head>

<body>
    <!-- Sidebar -->
    <div
        class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[100px] overflow-y-auto text-center border border-t-0 border-l-0 border-b-0 border-zinc-300 h-screen bg-white z-40 hidden lg:block">
        <div class="flex flex-col justify-between h-full">
            <div class="mt-6">
                <a href="">Logo</a>
            </div>
            <!-- Social Media Accounts -->
            <div class="mb-10">
                <ul class="list-none space-y-2">
                    <li class="hover:text-red-500">
                        <i class="fa-brands fa-facebook-f"></i>
                    </li>
                    <li class="hover:text-red-500">
                        <i class="fa-brands fa-instagram"></i>
                    </li>
                    <li class="hover:text-red-500">
                        <i class="fa-brands fa-behance"></i>
                    </li>
                    <li class="hover:text-red-500">
                        <i class="fa-brands fa-twitter"></i>
                    </li>
                    <li class="hover:text-red-500">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Main NavBar -->
    <nav class="fixed z-44 left-44 hidden lg:block">
        <div class="container mx-auto">
            <div class="flex p-2 mt-6">
                <div class="space-x-6">
                    <a href="#home" class="active pb-2">Home</a>
                    <a href="#about-me" class="pb-2">About Me</a>
                    <a href="#education" class="pb-2">Education</a>
                    <a href="#experience" class="pb-2">Experience</a>
                    <a href="#certifications" class="pb-2">Certifications</a>
                    <a href="{{ route('welcome.projects') }}" class="pb-2">Projects</a>
                </div>
            </div>
            <!-- Chatbot Button Trigger -->
            <div class="mt-8" id="inquiries-btn">
                <button uk-toggle="target: #modal" class="text-red-500 font-medium" type="button">
                    <i class="fa-solid fa-circle-info mr-2"></i> Inquiries
                </button>
            </div>
        </div>
    </nav>

    <!-- Chatbot -->
    <form action="" id="chat-bot" class="border border-slate-400 bg-white fixed hidden">
        <div class="header bg-red-500 p-3 mb-4" id="chatHeader">
            <h4 class="text-white text-left">How Can I Help You?</h4>
        </div>
        <div class="p-4 space-y-4 overflow-auto h-[30rem] w-[20rem]" id="chatBody">
            <!-- Choices of Topic -->
            <!-- <div class="bg-slate-200 p-2 rounded-md">
              <p class="border-neutral-400 border-b pb-2 mb-4">Insert Greeting Here!</p> -->
            <!-- Questions -->
            <!-- <ul class="space-y-4">
                <li class="border-neutral-400 border-b pb-2 list-none">Insert Question Here</li>
                <li class="border-neutral-400 border-b pb-2 list-none">Insert Another Question Here</li>
                <li class="border-neutral-400 border-b pb-2 list-none">Another Question Goes Here</li>
              </ul>
            </div> -->

            <!-- User Reply Sample -->
            <div class="bg-red-500 float-right p-2 rounded-md">
                <p class="text-white" id="userReply">Insert User Reply Here</p>
            </div>

            <!-- Chatbot Reply Sample -->
            <div class="bg-slate-200 rounded-md p-2 clear-both float-left">
                <p id="botReply">Insert Chatbot Reply Here</p>
            </div>
        </div>
        <div class="border-t-2 p-2 border-gray-300">
            <ul class="space-y-4 h-16 overflow-y-auto">
                <li class="border-neutral-400 border-b list-none flex items-center">
                    <div class="text-md" id="question1">What are your work experiences</div>
                </li>
                <li class="border-neutral-400 border-b list-none flex items-center">
                    <div class="text-md" id="question2">What certifications have you accumulated</div>
                </li>
                <li class="border-neutral-400 border-b list-none flex items-center">
                    <div class="text-md" id="question1">What are your work experiences</div>
                </li>
            </ul>
        </div>
    </form>

    <!-- Chatbot Button Bottom Right -->
    <button type="button" id="chatbot-btn" class="text-white bg-red-500 rounded-full px-6 py-3">
        <i class="fa-solid fa-comment"></i>
    </button>

    <!-- Email Modal -->
    <div id="modal" uk-modal class="uk-flex-top">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <div class="flex flex-row justify-between mb-4">
                <div class="">
                    <i class="fa-solid fa-message text-red-500"></i>
                </div>
                <!-- Close Button -->
                <button class="uk-modal-close" type="button">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <!-- Modal Text -->
            <div class="space-y-4">
                <h2 class="uk-modal-title">Get In Touch</h2>
                <p class="text-neutral-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis,
                    dignissimos!</p>
            </div>
            <!-- Form -->
            <form action="" class="space-y-4 mt-4">
                <!-- Subject -->
                <div>
                    <small class="font-bold text-slate-700">
                        <label for="">Subject</label>
                    </small>
                    <input type="text" id="emailSubject"
                        class="mt-1 w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                        placeholder="Enter your subject" />
                </div>
                <!-- Email -->
                <div>
                    <small class="font-bold text-slate-700">
                        <label for="">Email</label>
                    </small>
                    <input type="text" id="emailSender"
                        class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                        placeholder="Enter your email" />
                </div>
                <!-- Textarea -->
                <div>
                    <small class="font-bold text-slate-700">
                        <label for="">Message</label>
                    </small>
                    <textarea name="" id="emailMessage" cols="30" rows="10"
                        class="mt-1 w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                        placeholder="Enter your message"></textarea>
                </div>

                <div class="float-right">
                    <div class="flex flex-row">
                        <button class="uk-modal-close rounded-full bg-slate-600 text-white px-6 py-2 mr-3"
                            type="button">Close</button>
                        <button id="emailSubmitButton" class="rounded-full bg-red-500 text-white px-6 py-2"
                            type="button">Send
                            Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="gsap-container">
        <!--  Header -->
        <section class="panel w-screen scrollspy" id="home">
            <div class="container mx-auto -mt-20">
                <!-- Grid Container -->
                <div class="grid grid-cols-1 items-center h-screen md:grid-cols-2">
                    <!-- Greetings Message -->
                    <div
                        class="px-10 md:px-0 space-y-3 md:space-y-4 text-center md:text-left -mt-32 md:-mt-0 animate__animated animate__fadeInLeft animate__slower">
                        <small class="hidden md:block font-normal">Welcome To</small>
                        <p class="text-2xl md:text-6xl font-extrabold text-neutral-900"><span
                                class="text-red-500">L</span>emuel Rodolfo Braña</p>
                        <p class="font-normal text-sm md:text-2xl">Organization and Project Development Consultancy</p>
                        <button uk-toggle="target: #modal"
                            class="rounded-none px-12 py-3 text-white bg-red-500 hover:bg-red-600">Contact Me</button>
                        <br>
                        <button>
                            <small class="sm:hidden text-red-500">
                                <i class="fa-solid fa-eye mr-1"></i>
                                <a href="project.html">View My Projects</a>
                            </small>
                        </button>
                    </div>
                    <!-- Image of Doc Lem -->
                    <div
                        class="order-first md:order-last mt-32 md:mt-0 animate__animated animate__fadeIn animate__slower animate__delay-2s">
                        <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
                    </div>
                </div>
                <!-- Flex Container -->
                <div class="hidden md:flex -mt-32 animate__animated animate__fadeInUp animate__slow animate__delay-3s">
                    <!-- Email -->
                    <div class="border-r-2 pr-16 border-slate-900 space-y-2 mr-20">
                        <label for="" class="font-bold text-slate-900">Email</label>
                        <p class="text-neutral-400">lemuelbrana3@gmail.com</p>
                    </div>
                    <!-- Phone -->
                    <div class="border-r-2 pr-16 border-slate-900 space-y-2 mr-20">
                        <label for="" class="font-bold text-slate-900">Contact Number</label>
                        <p class="text-neutral-400">0917-832-5710</p>
                    </div>
                    <div class="space-y-2">
                        <label for="" class="font-bold text-slate-900">Office Address</label>
                        <p class="text-neutral-400">Suite 402 Jade Place Condo 33 Visayas Avenue, Bgy Vasra Quezon City
                            1128</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Me -->
        <section class="panel w-screen scrollspy" id="about-me">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center h-screen gap-10">
                    <!-- About Me -->
                    @foreach ($about_me as $details)
                        <div class="px-10 md:px-0 space-y-3 md:space-y-6">
                            <h2 class="text-2xl md:text-4xl font-bold text-slate-900">About Me</h2>
                            <div class="block h-1 md:h-2 w-20"></div>
                            <p class="text-sm md:text-base text-neutral-400">
                                {{ $details->first_paragraph }}
                            </p>
                            <p class="hidden md:block text-sm md:text-base text-neutral-400">
                                {{ $details->second_paragraph }}
                            </p>
                        </div>
                        <!-- About Me Continuation -->
                        <div class="space-y-6">
                            <p class="hidden md:block text-sm md:text-base text-neutral-400">
                                {{ $details->third_paragraph }}
                            </p>
                            <p class="hidden md:block text-sm md:text-base text-neutral-400">
                                {{ $details->fourth_paragraph }}
                            </p>
                        </div>
                    @endforeach
        </section>

        <!-- Education -->
        <section class="panel w-screen px-32 scrollspy" id="education">
            <div class="container mx-auto">
                <div class="space-y-6">
                    <h2 class="text-2xl md:text-4xl font-bold mt-10 md:mt-32 text-slate-900">Educational Background
                    </h2>
                    <div class="block h-1 md:h-2 w-20"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                    <!-- Education Part 1 -->
                    <div class="timeline-area space-y-6 border-l px-0 md:px-6 w-60 h-screen md:w-full">
                        <div class="timeline-item bg-red-500 p-6 relative space-y-3">
                            <h2 class="text-lg font-bold text-white">University of the Philippines, Diliman Quezon City
                                (1993)</h2>
                            <p class="text-sm text-white hidden md:block">College of Business Administration - B.S.
                                Business Administration Degree (Major subjects in Finance)</p>
                        </div>
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">University of the Philippines, Diliman Quezon City
                                (2002)</h2>
                            <p class="text-sm text-white hidden md:block">Technology Management Center - Master of
                                Technology Management Degree (Major in Business & Industry)</p>
                        </div>
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">University of the Philippines, Diliman Quezon City
                                (2004 - 2006)</h2>
                            <p class="text-sm text-white hidden md:block">UP Information Technology Development Center
                                - Certificate Courses on: Project Management, Change Management, Embedded Systems,
                                Network Systems, Software Quality Assurance & Testing, User Experience & Interaction
                                Design, Software Engineering</p>
                        </div>
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">University of the Philippines, Diliman Quezon City
                                (2007)</h2>
                            <p class="text-sm text-white hidden md:block">College of Education - PhD. in Education
                                Degree</p>
                        </div>
                    </div>
                    <!-- Education Part 2 -->
                    <div class="timeline-area space-y-6 border-l px-6 hidden md:block">
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">Small Business Training Institute, South Korea
                                (Ansan Campus - 2008)</h2>
                            <p class="text-sm text-white">Certificate Course on Business Process Re-engineering</p>
                        </div>
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">Association for Overseas Technical Cooperation,
                                Japan (Aichi Campus - 2009)</h2>
                            <p class="text-sm text-white">Certificate Course on Project Management</p>
                        </div>
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">Japan International Cooperation Agency, Japan
                                (Tokyo International Center - 2010)</h2>
                            <p class="text-sm text-white">Certificate Course on Digital Transformation Management</p>
                        </div>
                        <div class="timeline-item bg-red-500 p-6 relative space-y-2">
                            <h2 class="text-lg font-bold text-white">Indian School of Business, Hyderabad, India (2018)
                            </h2>
                            <p class="text-sm text-white">Certificate Course on Executive Leadership</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Work Experience -->
        <section class="panel w-screen px-44 hidden md:block" id="experience">
            <div class="space-y-6">
                <h2 class="text-2xl md:text-4xl font-bold text-slate-900 mt-32">Work & Experience</h2>
                <div class="block h-1 md:h-2 w-20"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                @foreach ($works_and_experiences as $works_and_experience)
                    <!-- List Item 1 -->
                    <div class="flex flex-col space-y-3 md:space-y-0 md:space-x-6 md:flex-row">
                        <!-- Heading -->
                        <div class="rounded-l-full bg-red-100 md:bg-transparent">
                            <div class="flex items-center space-x-2">
                                {{-- <div class="px-4 py-2 text-white rounded-full md:py-1 bg-red-500">
                                    01
                                </div> --}}
                                <h3 class="text-base font-bold md:mb-4 md:hidden">
                                    {{ $works_and_experience->title }}
                                </h3>
                            </div>
                        </div>
                        <!-- End of Heading -->
                        <div>
                            <h3 class="hidden mb-4 text-lg font-bold md:block">
                                {{ $works_and_experience->title }}
                            </h3>
                            <p class="text-gray-400">
                                {{ $works_and_experience->description }}
                            </p>
                        </div>
                    </div>
                    <!-- End of List Item 1 -->
                @endforeach


        </section>

        <section class="panel w-screen" id="certifications">
            <div class="container mx-auto">
                <div class="space-y-6 p-12 md:p-0">
                    <h2 class="text-2xl md:text-4xl font-bold text-slate-900 mt-10 md:mt-32">Certifications & Titles
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/gsap.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>
</body>

</html>
