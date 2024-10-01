<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            max-width: 600px;
            padding: 40px;
            background: #34495e;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .icon {
            font-size: 80px;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #3498db;
            border: none;
            padding: 12px 24px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🔒</div>
        <h1>Access Denied</h1>
        <p>You do not have the necessary permissions to access this page. Please contact your administrator or try logging in with appropriate credentials.</p>
        <a href="<?= base_url('login'); ?>" class="btn">Return to Login</a>
    </div>
</body>
</html>
