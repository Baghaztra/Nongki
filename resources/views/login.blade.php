<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Pojok Diskusi</title>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #B19C7B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .login-container {
            background: #ffffff;
            padding: 70px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            width: 100%;
            height: 400px;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box;
            position: relative;
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-weight: 700;
            color: #5D4037;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container h1 i {
            margin-right: 10px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
            text-align: left;
        }

        .input-group label {
            position: absolute;
            top: 10px;
            left: 40px;
            background: transparent;
            padding: 0 5px;
            transition: 0.2s;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #A1887F;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            background: transparent;
        }

        .input-group input:focus,
        .input-group input:not(:placeholder-shown) {
            border-color: #8D6E63;
            outline: none;
            box-shadow: 0 0 4px rgba(141, 110, 99, 0.2);
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -10px;
            background: #ffffff;
            left: 40px;
            font-size: 12px;
            color: #8D6E63;
        }

        .input-group i {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #8D6E63;
        }

        .btn {
            background-color: #8D6E63;
            color: #FFFFFF;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn:hover {
            background-color: #442929;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Nongki - Admin</h1>
        <form action="/login" method="post">
            @csrf
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder=" " required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Login</button>
        </form>
    </div>
</body>
</html>
