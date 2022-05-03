<!doctype html>
<html lang="en">
    <head>
    <title>Subscription Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #7f5a83; 
            background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%);
        }
        .card {
        border:none;
        padding: 20px 50px;
        }

        .card::after {
        position: absolute;
        z-index: -1;
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .card:hover {


        transform: scale(1.02, 1.02);
        -webkit-transform: scale(1.02, 1.02);
        backface-visibility: hidden; 
        will-change: transform;
        box-shadow: 0 1rem 3rem rgba(0,0,0,.75) !important;
        }

        .card:hover::after {
        opacity: 1;
        }

        .card:hover .btn-outline-primary{
        color:white;
        background:#007bff;
        }

        .container-fluid{
            height: 739px;
        }
    </style>

    </head>
    <body style="background-color: #7f5a83; background-image: linear-gradient(315deg, #7f5a83 0%, #0d324d 74%);">
    <div class="container-fluid">
        <div class="container p-5">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                <div class="text-center p-3">
                    <h5 class="card-title">Basic</h5>
                    <small>Individual</small>
                    <br><br>
                    <span class="h2">200</span>/month
                    <br><br>
                </div>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> 480p Streaming</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Upto 1 Device</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Mobile Only</li>
                </ul>
                <div class="card-body text-center">
                <button class="btn btn-outline-primary btn-lg" style="border-radius:30px" onclick="location.href = 'profile.php?subscribe=subscribe&tier=3';">Select</button>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                <div class="text-center p-3">
                    <h5 class="card-title">Standard</h5>
                    <small>Sharing</small>
                    <br><br>
                    <span class="h2">500</span>/month 
                    <br><br>
                </div>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> 1080p Streaming</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Upto 2 Devices</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Mobile, TV & Desktop</li>
                </ul>
                <div class="card-body text-center">
                <button class="btn btn-outline-primary btn-lg" style="border-radius:30px" onclick="location.href = 'profile.php?subscribe=subscribe&tier=2';">Select</button>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-4">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                <div class="text-center p-3">
                    <h5 class="card-title">Premium</h5>
                    <small>Family</small>
                    <br><br>
                    <span class="h2">800</span>/month
                    <br><br>
                </div>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> 4K Streaming</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Upto 4 Devices</li>
                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg> Mobile, TV & Desktop</li>
                </ul>
                <div class="card-body text-center">
                <button class="btn btn-outline-primary btn-lg" style="border-radius:30px" onclick="location.href = 'profile.php?subscribe=subscribe&tier=1';">Select</button>
                </div>
            </div>
            </div>
        </div>    
        </div>
    </body>
</html>