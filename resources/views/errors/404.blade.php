<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .error-message {
            background-color: #673ce7;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .error-message h1 {
            font-size: 80px;
            margin: 0;
        }

        .error-message p {
            font-size: 24px;
            margin: 20px 0;
        }

        .error-message a {
            color: #fff;
            text-decoration: none;
            background-color: #412bc0;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-message">
            <h1>404</h1>
            <p>Page Not Found</p>
            <a href="javascript:void(0)" id="goBackButton">Go Back</a>
        </div>
    </div>

    <script>
        document.getElementById('goBackButton').addEventListener('click', function() {
            window.history.go(-1);
        });
        </script>

</body>
</html>
