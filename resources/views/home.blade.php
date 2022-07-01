@extends('layouts.app')

@section('content')
    <div class="mt-20 space-y-4 px-20">
        <h1 class="text-5xl font-bold">Welcome Dr. Braña</h1>
        <p class="text-slate-400">The graph below shows the statistics of your portfolio namely statistics about the site
            visit and number of emails.</p>
    </div>
    <div class="px-20">
        <div class="grid grid-cols-2 gap-8 my-14">
            <div class="w-[100%]">
                <canvas id="emailChart"></canvas>
            </div>
            <div class="w-[100%]">
                <canvas id="visitorsChart"></canvas>
            </div>
        </div>
    </div>
    <script>
        // var testlabel = JSON.parse({!! json_encode($email_data['label']) !!});
        console.log({!! json_encode($email_data['label']) !!})
        const labels = [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday",
        ];

        const data = {
            labels: {!! json_encode($email_data['label']) !!},
            datasets: [{
                label: "Emails Received",
                backgroundColor: "rgb(255, 99, 132)",
                borderColor: "rgb(255, 99, 132)",
                data: {!! json_encode($email_data['data']) !!},
            }, ],
        };

        const config = {
            type: "bar",
            data: data,
            options: {},
        };

        const emailChart = new Chart($("#emailChart"), config);

        const visitorsData = {
            labels: {!! json_encode($visitors_data['label']) !!},
            datasets: [{
                label: "Number of Visitors per Day",
                backgroundColor: "rgb(132, 99, 255)",
                borderColor: "rgb(132, 99, 255)",
                data: {!! json_encode($visitors_data['data']) !!},
            }, ],
        };

        const visitorsConfig = {
            type: "bar",
            data: visitorsData,
            options: {},
        };

        const visitorsChart = new Chart($("#visitorsChart"), visitorsConfig);
    </script>
@endsection
