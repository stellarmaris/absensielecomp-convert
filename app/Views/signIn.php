<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            font-family: var(--font-family);
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /*===== Color =====*/
            --body-color: #eff0f7;
            --sidebar-color: #ffffff;
            --primary-color: #130c90;
            --primary-color-light: rgba(18, 13, 144, 0.04);
            --toggle-color: var(--primary-color);
            --toggle-color-hover: var(--primary-color-light);
            --text-color: rgba(0, 0, 0, 0.74);
            --text-color-hover: var(--primary-color);
            --text-color-selected: var(--primary-color-light);
            --border-color: #898989;

            /*===== Transition =====*/
            --trans-01: all 0.1s ease-out;
            --trans-02: all 0.2s ease-out;
            --trans-03: all 0.3s ease-out;
            --trans-04: all 0.4s ease-out;
            --trans-05: all 0.5s ease-out;

            --font-family: "Poppins", sans-serif;
        }

        body {
            height: 100vh;
            background-image: url('/images/Sign In 1.png');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: var(--sidebar-color);
            height: fit-content;
            width: 500px;
            border-radius: 10px;
            box-shadow: 0 2px 2px 0px rgba(0, 0, 0, 0.25);
            padding: 30px;
        }

        .head {
            text-align: center;
            display: grid;
            row-gap: 10px;
        }

        .head .title p {
            font-family: var(--font-family);
            font-size: 25px;
            font-weight: 700;
        }

        .head .subtitle p {
            font-family: var(--font-family);
            font-size: 13px;
            color: var(--text-color);
        }

        .form {
            margin: 20px 0px 10px 0px;
            display: grid;
            row-gap: 15px;
        }

        .form .form-email {
            display: grid;
            row-gap: 10px;
        }

        .form .form-email label {
            font-family: var(--font-family);
            font-size: 14px;
            font-weight: 500;
            color: var(--text-color);
        }

        .form .form-email input {
            width: 100%;
            height: 55px;
            border-radius: 10px;
            padding: 10px 20px;
            border: 1px solid var(--border-color);
        }

        .form .form-password {
            display: grid;
            row-gap: 10px;
        }

        .form .form-password label {
            font-family: var(--font-family);
            font-size: 14px;
            font-weight: 500;
            color: var(--text-color);
        }

        .form .form-password input {
            width: 100%;
            height: 55px;
            border-radius: 10px;
            padding: 10px 20px;
            border: 1px solid var(--border-color);
        }

        .link-text {
            margin: 0px 0px 20px 0px;
        }

        .link-text a {
            font-family: var(--font-family);
            font-size: 12px;
            font-weight: 500;
            color: var(--text-color);
            text-decoration: none;
        }

        .btn input {
            width: 100%;
            height: 62px;
            background-color: var(--primary-color);
            color: var(--sidebar-color);
            font-weight: 500;
            font-size: 14px;
            border-radius: 10px;
            font-family: var(--font-family);
            border: none;
        }

        .sign-up-link {
            font-family: var(--font-family);
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0px;
        }

        .sign-up-link a {
            color: var(--primary-color);
            padding: 0px 3px;
            font-weight: 500;
            text-decoration: none;
        }

        /* Pop-up styling */
        .alert-popup {
            position: fixed;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 1500px;
            z-index: 1050;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Menampilkan alert jika ada error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-popup" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
            <script>
                setTimeout(function() {
                    document.querySelector('.alert-popup').style.display = 'none';
                }, 3000);
            </script>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <div class="head">
                <div class="title">
                    <p>Form Masuk Absensi</p>
                </div>
                <div class="subtitle">
                    <p>Hai, Masukkan detail Anda untuk masuk ke akun Anda</p>
                </div>
            </div>
            <div class="form">
                <div class="form-email">
                    <div class="label">
                        <label for="email">Email</label>
                    </div>
                    <div class="input">
                        <input type="email" name="email" id="email" required placeholder="Ex : Admin@gmail.com" />
                    </div>
                </div>
                <div class="form-password">
                    <div class="password">
                        <label for="password">Kata Sandi</label>
                    </div>
                    <div class="input">
                        <input type="password" name="password" id="password" required placeholder="at least 16 character with number & special character" />
                    </div>
                </div>
            </div>
            <div class="link-text">
                <a href="#">Having trouble in sign in?</a>
            </div>
            <div class="btn" style="width: 100%;">
                <input type="submit" value="Masuk" style="width:100%">
            </div>
            <div class="sign-up-link">
                <p>Don't Have an account? <a href="/signUp">Sign Up</a></p>

            </div>
        </form>
    </div>
    <!-- Bootstrap JS for alert dismissal -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>