<!DOCTYPE html>
<html lang="en">

<head>
    <title>Absensi Elecomp</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="CRM">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="<?= base_url('/images/Logo.jpeg') ?>">

    <!-- FontAwesome JS-->
    <script defer src="<?php echo base_url('assets/plugins/fontawesome/js/all.min.js'); ?>"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?php echo base_url('/css/portal.css'); ?>">
    <style>
        :root {
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
            --trans-01: all 0.1s ease-out;
            --trans-02: all 0.2s ease-out;
            --trans-03: all 0.3s ease-out;
            --trans-04: all 0.4s ease-out;
            --trans-05: all 0.5s ease-out;

           
        }

        .head {
            text-align: center;
            display: grid;
            /* row-gap: 1px; */
        }

        .title {
          
            font-size: 25px;
            font-weight: 700;
        }

        .subtitle {
          
            font-size: 15px;
            color: var(--text-color);
            margin: 0px !important;
        }

        .btn-log-in {
            background-color: #130c90;
            height: 50px;
            color: var(--sidebar-color);
            font-weight: 500;
            font-size: 14px;
            border-radius: 10px;
          
            border: none;
        }

        .auth-background-col {
            background-image: url('/images/hero-images.jpg');
            /* Ganti dengan URL gambar Anda */
            background-size: cover;
            /* Agar gambar memenuhi seluruh elemen */
            background-position: center;
            /* Memusatkan gambar */
            background-repeat: no-repeat;
            /* Mencegah pengulangan gambar */
            height: 100vh;

            /* Tinggi elemen setara dengan tinggi layar */
        }

        label {
          
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            height: 55px;
            border-radius: 10px;
            padding: 10px 20px;
            border: 1px solid var(--border-color);
        }

        .trouble {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .trouble a {
            text-decoration: none;
            color: black;

        }

        .sign-up-link {
          
            font-size: 14px;
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
    </style>

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-6 col-md-7 col-lg-6 auth-main-col  d-flex justify-content-center  " style="padding-top:50px">
            <div>
                <div class="app-auth-branding mb-4 d-flex justify-content-center align-items-center"><a class="app-logo" href=""><img class="logo-icon me-2" style="height:auto; width:180px;" src="<?php echo base_url('/images/Logo.jpeg'); ?>" alt="logo"></a></div>

                <div class="head" style="padding-left:100px; padding-right:100px">
                    <p class="title ">Form Masuk Absensi</p>
                    <p class="subtitle ">Hai, Masukkan detail Anda untuk masuk ke akun Anda</p>

                </div>
                <div class="" style="    padding-top:40px;">
                    <form class="auth-form login-form" method="post" action=<?= base_url('login') ?>>
                        <?= csrf_field(); ?>
                        <div class="email mb-3">
                            <div>
                                <label for="email">Email</label>
                            </div>
                            <div>
                                <input type="email" name="email" id="email" required placeholder="Ex : Admin@gmail.com" />
                            </div>

                        </div><!--//form-group-->
                        <div class="password mb-3">
                            <div>
                                <label for="password">Kata Sandi</label>
                            </div>
                            <div>
                                <input type="password" name="password" id="password" required placeholder="at least 16 character with number & special character" />
                            </div>

                        </div>
                        <div class="trouble">
                            <p><a href="/trouble-form">Lupa Password ?</a></p>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-log-in  w-100 theme-btn mx-auto">Log In</button>
                        </div>
                        <div class="sign-up-link">
                            <p>Don't Have an account? <a href="/signUp">Sign Up</a></p>

                        </div>
                    </form>

                </div>

            </div>

        </div><!--//auth-main-col-->
        <div class="col-6 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->
    </div><!--//row-->
</body>

</html>