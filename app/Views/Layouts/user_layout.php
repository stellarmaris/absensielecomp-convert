<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f5f7fc;
            height: 100vh;
            display: flex;
            align-items: flex-start;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: calc(100% - 15px);

            margin: 15px;
        }

        .sidebar {
            width: 250px;
            height: calc(100vh - 30px);
            margin-right: 15px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .btn-close {
            text-align: right;
            padding: 15px 20px 0px 20px;
        }

        .logo {
            margin-top: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .logo img {
            max-width: 150px;
        }

        .nav {
            list-style-type: none;
            padding: 0;
        }

        .nav-item {
            margin-bottom: 20px;
        }

        .nav-header {
            font-size: 12px;
            color: #a3a3a3;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 20px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            color: #333;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 0;
            transition: color 0.3s;
        }

        .nav-link i {
            font-size: 18px;
            margin-right: 10px;
            padding: 10px 20px;
        }

        .nav-link:hover {
            background-color: black;
            color: white;
        }

        .logout {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }

        .content {
            flex-grow: 1;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: calc(100vh - 70px);
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                margin-right: 0;
            }

            .content {
                width: 100%;
                margin-top: 15px;
            }
        }
    </style>
    <?= $this->renderSection('customStyles') ?>
</head>

<body>
    <div class="container">
        <?= $this->include('/partials/sidebar') ?>

        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</body>

</html>