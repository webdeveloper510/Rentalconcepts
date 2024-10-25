@extends('layout.main')
@section('main-content')
<style>
    #bubble-chart {
        height: 80vh;
        position: relative;
        margin: 0 auto;
    }

    .bubble {
        position: absolute;
        width: 150px;
        height: 150px;
        background-color: #939598;
        border-radius: 50%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .bubble p {
        color: #fff;
        font-size: 16px;
        margin: 0;
        padding: 0 10px;
    }

    .bubble button {
        margin: 2px;
        padding: 3px 8px;
        border: none;
        border-radius: 5px;
        background-color: #6c757d;
        color: white;
        cursor: pointer;
        font-size: 12px;
    }

    .bubble button:hover {
        background-color: #2a2d30;
    }

    .hidden {
        opacity: 0;
        pointer-events: none;
    }

    .bubble:hover {
        transform: scale(1.05);
    }

    .custom {
        margin-top: 15px;
    }
</style>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="width: 70%; margin: auto; padding-top: 20px;">
    <div id="bubble-chart" class="position-relative">
        <!-- First Question Bubble -->
        <div class="bubble" id="bubble1" style="top: 20%; left: 30%;">
            <div class="custom">
                <p>Do you need IT help?</p>
                <button onclick="showNext('bubble1', 'bubble2')">Yes</button>
                <button onclick="showNext('bubble1', 'bubbleGoodbye')">No</button>
            </div>
        </div>

        <!-- Goodbye Bubble -->
        <div class="bubble hidden" id="bubbleGoodbye" style="top: 50%; left: 20%;">
            <div class="custom">
                <p>Have a nice day, goodbye!</p>
                <button onclick="showNext('bubbleGoodbye', 'bubble1')">Exit</button>
            </div>
        </div>

        <!-- Second Question Bubble -->
        <div class="bubble hidden" id="bubble2" style="top: 70%; left: 50%;">
            <div class="custom">
                <p>Did you turn it off and on again?</p>
                <button onclick="showNext('bubble2', 'bubble3')">Yes</button>
                <button onclick="showNext('bubble2', 'bubble3')">No</button>
            </div>
        </div>

        <!-- Third Message Bubble -->
        <div class="bubble hidden" id="bubble3" style="top: 30%; left: 60%;">
            <div class="custom">
                <p>Please contact the IT department for further assistance.</p>
                <button onclick="showNext('bubble3', 'bubble1')">Exit</button>
            </div>
        </div>
    </div>
</main>

<script>
    function showNext(current, next) {
        // Hide the current bubble
        document.getElementById(current).classList.add('hidden');

        // Show the next bubble
        document.getElementById(next).classList.remove('hidden');
    }
</script>
@endsection