<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dealfair | Thank You</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @if (GlobalHelper::getSettingValue('website_favicon'))
        <link rel="shortcut icon" href="{{ GlobalHelper::getSettingValue('website_favicon') }}"/>
    @else
        <link rel="shortcut icon" href="{{ asset('assets/media/logos/small-logo.png') }}"/>
    @endif
    <link href="{{ asset('assets/frontend/panel/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <style>
        .confetti {
            width: 100%;
            height: 100%;
            display: block;
            margin: 0 auto;
            user-select: none;
        }
    </style>
</head>

<body>
<canvas class="confetti" id="canvas"></canvas>
<div>
    <div class="position-absolute top-50 start-50 translate-middle z-100 shadow-sm rounded-4 "
         style="background-color: rgba(0, 0, 0, 0.04)">
        <div class="border-top border-top-5 border-primary rounded-4 p-8">
            <div class="fw-bold fs-2hx text-center text-uppercase">
                Order confirmed
            </div>
            <div style="line-height: 24px">
                <div class="fw-bold fs-2hx text-center text-uppercase mt-2">
                    Thank You
                </div>
                <div class="fw-bold fs-6 text-center text-uppercase">
                    for choosing Dealfair!
                </div>
            </div>
            <div class="df-fs-13 text-uppercase fw-semibold text-center mt-3 w-350px">
                Congratulations on finding something awesome! . Your
                support drives us, and we're dedicated to delivering quality and excellence. We're excited to serve you
                again.
            </div>
            <div>
                <ul class="list-unstyled d-flex justify-content-center mt-5">
                    <li ><a class="link-body-emphasis" href="#"><svg
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="#5d6eb3" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="#5d6eb3" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg
                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="#5d6eb3" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg></a></li>
                </ul>
            </div>
            <div class="df-fs-14 fw-bold text-center mt-3 text-uppercase">
                Share Dealfair with your closest <br> friends and family
            </div>

            <div class="d-flex justify-content-center gap-2 mt-5">
                <a href="{{route('home')}}" class="btn btn-primary text-uppercase">
                    Go to homepage
                </a>
            </div>
        </div>
    </div>
</div>


<script>
    //-----------Var Inits--------------
    canvas = document.getElementById("canvas");
    ctx = canvas.getContext("2d");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    cx = ctx.canvas.width / 2;
    cy = ctx.canvas.height / 2;
    let shouldAnimateConfetti = true; // Flag to control animation

    let confetti = [];
    const confettiCount = 200;
    const gravity = 0.5;
    const terminalVelocity = 5;
    const drag = 0.075;
    const colors = [
        {front: 'red', back: 'darkred'},
        {front: 'green', back: 'darkgreen'},
        {front: 'blue', back: 'darkblue'},
        {front: 'yellow', back: 'darkyellow'},
        {front: 'orange', back: 'darkorange'},
        {front: 'pink', back: 'darkpink'},
        {front: 'purple', back: 'darkpurple'},
        {front: 'turquoise', back: 'darkturquoise'}];


    //-----------Functions--------------
    resizeCanvas = () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        cx = ctx.canvas.width / 2;
        cy = ctx.canvas.height / 2;
    };

    randomRange = (min, max) => Math.random() * (max - min) + min;

    initConfetti = () => {
        for (let i = 0; i < confettiCount; i++) {
            confetti.push({
                color: colors[Math.floor(randomRange(0, colors.length))],
                dimensions: {
                    x: randomRange(5, 10),
                    y: randomRange(5, 15)
                },

                position: {
                    x: randomRange(0, canvas.width),
                    y: canvas.height - 1
                },

                rotation: randomRange(0, 2 * Math.PI),
                scale: {
                    x: 1,
                    y: 1
                },

                velocity: {
                    x: randomRange(-25, 25),
                    y: randomRange(0, -50)
                }
            });


        }
    };

    //---------Render-----------
    render = () => {
        if (!shouldAnimateConfetti) {
            return; // If flag is false, stop rendering
        }
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        confetti.forEach((confetto, index) => {
            let width = confetto.dimensions.x * confetto.scale.x;
            let height = confetto.dimensions.y * confetto.scale.y;

// Move canvas to position and rotate
            ctx.translate(confetto.position.x, confetto.position.y);
            ctx.rotate(confetto.rotation);

// Apply forces to velocity
            confetto.velocity.x -= confetto.velocity.x * drag;
            confetto.velocity.y = Math.min(confetto.velocity.y + gravity, terminalVelocity);
            confetto.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random();

// Set position
            confetto.position.x += confetto.velocity.x;
            confetto.position.y += confetto.velocity.y;

// Delete confetti when out of frame
            if (confetto.position.y >= canvas.height) confetti.splice(index, 1);

// Loop confetto x position
            if (confetto.position.x > canvas.width) confetto.position.x = 0;
            if (confetto.position.x < 0) confetto.position.x = canvas.width;

// Spin confetto by scaling y
            confetto.scale.y = Math.cos(confetto.position.y * 0.1);
            ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back;

// Draw confetti
            ctx.fillRect(-width / 2, -height / 2, width, height);

// Reset transform matrix
            ctx.setTransform(1, 0, 0, 1, 0, 0);
        });

// Fire off another round of confetti
        if (confetti.length <= 10) initConfetti();

        window.requestAnimationFrame(render);
    };
    // Other functions...

    //---------Execution--------
    function startConfetti() {
        initConfetti();
        render();

        // Stop the confetti animation after 2 seconds
        setTimeout(function () {
            shouldAnimateConfetti = false; // Set flag to stop animation
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
        }, 4000); // Stop the animation after 2 seconds
    }

    window.onload = startConfetti;

    //----------Resize----------
    window.addEventListener('resize', function () {
        resizeCanvas();
    });
</script>
</body>
</html>
