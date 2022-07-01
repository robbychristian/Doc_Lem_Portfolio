@extends('layouts.app')

@section('content')
    <section id="editAboutMe">
        <div class="flex items-center h-[10vh]">
            <div class="flex justify-center w-[45%]">
                <div class="text-2xl text-black lg:text-4xl ">Edit About Me</div>
            </div>
            <div class="flex justify-end lg:w-[38.5%]">
                <button class="uk-button bg-slate-500 text-white duration-300 hover:bg-slate-700"
                    uk-toggle="target: #modal-full">Show about me</button>
            </div>

            {{-- MODAL --}}
            <div id="modal-full" class="uk-modal-full" uk-modal>
                <div class="uk-modal-dialog h-full z-10">
                    <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                    <section class="panel w-screen">
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 items-center h-screen md:grid-cols-2 gap-10">
                                <!-- About Me -->
                                @foreach ($paragraphs as $paragraph)
                                    <div class="space-y-6 about-me">
                                        <h2 class="text-4xl font-bold text-slate-900">About Me</h2>
                                        <p class="text-neutral-400">
                                            {{ $paragraph->first_paragraph }}
                                        </p>
                                        <p class="text-neutral-400">
                                            {{ $paragraph->second_paragraph }}
                                        </p>
                                    </div>
                                    <!-- About Me Continuation -->
                                    <div class="about-me">
                                        <p class="text-neutral-400">
                                            {{ $paragraph->third_paragraph }}
                                        </p>
                                        <p class="text-neutral-400">
                                            {{ $paragraph->fourth_paragraph }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-start -z-10 w-full items-center">
            <form class="w-2/3 py-5">
                <fieldset class="uk-fieldset w-full">

                    <legend class="uk-legend">First Paragraph</legend>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" id="firstParagraph" rows="5" placeholder="First..."></textarea>
                    </div>

                    <legend class="uk-legend">Second Paragraph</legend>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" id="secondParagraph" rows="5" placeholder="Second..."></textarea>
                    </div>

                    <legend class="uk-legend">Third Paragraph</legend>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" id="thirdParagraph" rows="5" placeholder="Third..."></textarea>
                    </div>

                    <legend class="uk-legend">Fourth Paragraph</legend>
                    <div class="uk-margin">
                        <textarea class="uk-textarea" id="fourthParagraph" rows="5" placeholder="Fourth..."></textarea>
                    </div>
                    @foreach ($paragraphs as $paragraph)
                        <input class="hidden" id="aboutMeId" type="text" value="{{ $paragraph->id }}">
                    @endforeach
                </fieldset>
                <div class="flex justify-end w-[100%]">
                    <button class="uk-button bg-red-500 text-white duration-300 hover:bg-red-800" id="saveAboutMe"
                        type="button">Save Changes</button>
                </div>
            </form>
        </div>
    </section>
    <script src="{{ asset('js/aboutme.js') }}"></script>
@endsection
