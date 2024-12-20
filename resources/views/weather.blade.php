<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom right, #007bff, #6610f2);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding:0;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- <div class="text-center mb-5"> -->
            <h3 class="fw-bold text-center mb-3">Weather App</h3>
        <!-- </div> -->

        <div class="card shadow p-4 mb-4">
            <form class="row g-3" method="get" action="/weather">
                <div class="col-12">
                    <input 
                        type="text" 
                        name="city" 
                        class="form-control form-control-lg" 
                        placeholder="Enter city name" 
                        required>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Get Weather</button>
                </div>
            </form>
        </div>

        @isset($weather)
            <div class="card shadow-lg p-4">
                <div class="card-body text-center">
                    <h2 class="card-title display-6 fw-bold">{{ $city }}</h2>
                    <hr>
                    <p class="fs-5 mb-3">Local Time: <strong class="text-info">{{ $gmtTime }}</strong></p>
        <p class="fs-5 mb-3">Temperature: <strong class="text-danger">{{ $weather['main']['temp'] }}°C</strong></p>
        <p class="fs-5 mb-3">Weather: <strong class="text-capitalize text-warning">{{ $weather['weather'][0]['description'] }}</strong></p>
        <p class="fs-5 mb-3">Humidity: <strong class="text-primary">{{ $weather['main']['humidity'] }}%</strong></p>
        <p class="fs-5 mb-3">Wind Speed: <strong class="text-success">{{ $weather['wind']['speed'] }} m/s</strong></p>
                </div>
            </div>
        @endisset

        @isset($error)
            <div class="alert alert-danger mt-4 text-center">
                {{ $error }}
            </div>
        @endisset
    </div>
</body>
</html>
