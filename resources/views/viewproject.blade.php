<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- EMAILJS --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/chatbot.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />
    <title>Projects</title>
</head>

<body>
    <!-- Email Trigger -->
    <div id="inquiries-btn">
        <button uk-toggle="target: #modal" class="text-red-500 font-medium" type="button">
            <i class="fa-solid fa-circle-info mr-2"></i> Inquiries
        </button>
    </div>
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
                    <input type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                        id="emailSubject" placeholder="Enter your subject" />
                </div>
                <!-- Email -->
                <div>
                    <small class="font-bold text-slate-700">
                        <label for="">Email</label>
                    </small>
                    <input type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                        id="emailSender" placeholder="Enter your email" />
                </div>
                <!-- Textarea -->
                <div>
                    <small class="font-bold text-slate-700">
                        <label for="">Message</label>
                    </small>
                    <textarea name="" id="" cols="30" rows="10"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
            focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                        id="emailMessage" placeholder="Enter your message"></textarea>
                </div>

                <div class="float-right">
                    <div class="flex flex-row">
                        <button class="uk-modal-close rounded-full bg-slate-600 text-white px-6 py-2 mr-3"
                            type="button">Close</button>
                        <button class="rounded-full bg-red-500 text-white px-6 py-2" id="emailSubmitButton"
                            type="button">Send
                            Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Chatbot Button -->
    <button type="button" id="chatbot-btn" class="text-white bg-red-500 rounded-full px-6 py-3">
        <i class="fa-solid fa-comment"></i>
    </button>

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

    <div class="slide active">
        <div class="card">
            <div class="card-img"
                style="background-image: url('{{ asset('project_images/images/business_project_expert.png') }}')">
                <div class="card-content flex flex-col h-screen justify-center">
                    <h2 class="card-header text-red-500 text-sm font-extrabold md:text-6xl">Business Process Expert
                    </h2>
                    <p class="card-para text-neutral-400 text-xs md:text-base">The consultant evaluated the current
                        business processes of the Program and recommended improvements/enhancements during the workshop.
                        This also included conducting/facilitating consultation meetings and other activities necessary
                        in developing the Business Process Flow.</p>
                </div>
            </div>
        </div>
    </div>
    @foreach ($projects as $project)
        <div class="slide">
            <div class="card">
                <div class="card-img"
                    style="background-image: url('{{ asset('project_images/images/' . $project->image_url) }}')">
                    <div class="card-content flex flex-col h-screen justify-center">
                        <h2 class="card-header text-red-500">{{ $project->title }}</h2>
                        <p class="card-para text-neutral-400 text-md">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    <div class="prevnext">
        <a href="/" class="pn-btn">
            <i class="fa-solid fa-house md:ml-2 mb-4">
            </i>
        </a>
        <button class="pn-btn" id="prev"></button>
        <button class="pn-btn" id="next"></button>
    </div>

    <script type="text/javascript">
        var $activeSlide = $('.active'),
            $homeSlide = $(".slide"),
            $slideNavPrev = $("#prev"),
            $slideNavNext = $("#next");

        function init() {
            TweenMax.set($homeSlide.not($activeSlide), {
                autoAlpha: 0
            });
            TweenMax.set($slideNavPrev, {
                autoAlpha: 0.2
            });
        }

        init();

        function goToNextSlide(slideOut, slideIn, slideInAll) {
            var t1 = new TimelineLite(),
                slideOutContent = slideOut.find('.card-content'),
                slideInContent = slideIn.find('.card-content'),
                slideOutImg = slideOut.find('.card-img'),
                slideInImg = slideIn.find('.card-img'),
                index = slideIn.index(),
                size = $homeSlide,
                length;


            if (slideIn.length !== 0) {
                t1
                    .set(slideIn, {
                        autoAlpha: 1,
                        className: '+=active'
                    })
                    .set(slideOut, {
                        className: '-=active'
                    })
                    .to(slideOutContent, 0.65, {
                        y: "+=40px",
                        ease: Power3.easeInOut
                    }, 0)
                    .to(slideOutImg, 0.65, {
                        backgroundPosition: 'bottom',
                        ease: Power3.easeInOut
                    }, 0)
                    .to(slideInAll, 1, {
                        y: "-=100%",
                        ease: Power3.easeInOut
                    }, 0)
                    .fromTo(slideInContent, 0.65, {
                        y: '-=40px'
                    }, {
                        y: 0,
                        ease: Power3.easeInOut
                    }, "-=0.7")
                    .fromTo(slideInImg, 0.65, {
                        backgroundPosition: 'top'
                    }, {
                        backgroundPosition: 'bottom',
                        ease: Power3.easeInOut
                    }, '-=0.7')
            }

            TweenMax.set($slideNavPrev, {
                autoAlpha: 1
            });

            if (index === size - 1) {
                TweenMax.to($slideNavNext, 0.3, {
                    autoAlpha: 0.2,
                    ease: Linear.easeNone
                });
            }
        };

        $slideNavNext.click(function(e) {
            e.preventDefault();

            var slideOut = $('.slide.active'),
                slideIn = $('.slide.active').next('.slide'),
                slideInAll = $('.slide');

            goToNextSlide(slideOut, slideIn, slideInAll);
        });

        function goToPrevSlide(slideOut, slideIn, slideInAll) {
            var t1 = new TimelineLite(),
                slideOutContent = slideOut.find('.card-content'),
                slideInContent = slideIn.find('.card-content'),
                slideOutImg = slideOut.find('.card-img'),
                slideInImg = slideIn.find('.card-img'),
                index = slideIn.index(),
                size = $homeSlide.length;

            if (slideIn.length !== 0) {
                t1
                    .set(slideIn, {
                        autoAlpha: 1,
                        className: '+=active'
                    })
                    .set(slideOut, {
                        className: '-=active'
                    })
                    .to(slideOutContent, 0.65, {
                        y: "-=40px",
                        ease: Power3.easeInOut
                    }, 0)
                    .to(slideOutImg, 0.65, {
                        backgroundPosition: 'top',
                        ease: Power3.easeInOut
                    }, 0)
                    .to(slideInAll, 1, {
                        y: "+=100%",
                        ease: Power3.easeInOut
                    }, 0)
                    .fromTo(slideInContent, 0.65, {
                        y: '+=40px'
                    }, {
                        y: 0,
                        ease: Power3.easeInOut
                    }, "-=0.7")
                    .fromTo(slideInImg, 0.65, {
                        backgroundPosition: 'bottom'
                    }, {
                        backgroundPosition: 'top',
                        ease: Power3.easeInOut
                    }, '-=0.7')
            }

            TweenMax.set($slideNavPrev, {
                autoAlpha: 1
            });

            if (index === 0) {
                TweenMax.to($slideNavPrev, 0.3, {
                    autoAlpha: 0.2,
                    ease: Linear.easeNone
                });
            }
        };

        $slideNavPrev.click(function(e) {
            e.preventDefault();

            var slideOut = $('.slide.active'),
                slideIn = $('.slide.active').prev('.slide'),
                slideInAll = $('.slide');

            goToPrevSlide(slideOut, slideIn, slideInAll);

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>
</body>

</html>
