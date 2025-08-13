<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Form</title>
    <style>
        /* General Layout */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Wrapper */
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        /* Card */
        .login-card {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.6s ease-in-out;
        }

        /* Title */
        .login-title {
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-align: center;
            font-size: 1.4rem;
        }

        /* Floating Label Inputs */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 14px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: none;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 14px;
            transform: translateY(-50%);
            color: #999;
            font-size: 0.9rem;
            pointer-events: none;
            transition: all 0.3s ease;
            background: white;
            padding: 0 4px;
        }

        /* Move label when focused or valid */
        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -8px;
            font-size: 0.75rem;
            color: #667eea;
        }

        .input-group input:focus {
            border-color: #667eea;
        }

        /* Options */
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }

        .options label {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-link:hover {
            color: #764ba2;
        }

        /* Button */
        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-weight: 600;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }

        .login-btn:hover {
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            transform: translateY(-2px);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile */
        @media (max-width: 500px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <h2 class="login-title">Sign in to your account</h2>

        <form action="{{ route('login.store') }}" method="POST" id="formAuthentication">
            @csrf

            <div class="input-group">
                <input type="email" id="email" name="email" required>
                <label for="email">Email Address</label>
            </div>

            <div class="input-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>

            <div class="options">
                <label>
                    <input type="checkbox" name="stay_signed_in"> Stay Signed In
                </label>
                <a href="{{ route('forgot-password.index') }}" class="forgot-link">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>
    </div>
</div>

</body>
</html>
