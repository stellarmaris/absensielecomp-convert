<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->

    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            margin-top: 30px;
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
            font-weight: 400;
        }

        .nav-link {
            display: flex;
            align-items: center;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            padding: 10px 0;
            transition: color 0.3s;
            font-weight: 500;
        }

        .nav-link i {
            font-size: 18px;
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
            height: calc(100vh - 30px);
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
        <?php 
            if (isset($validation)):?>
            <div class="alert alert-danger">
                <?= $validation->listErrors()?> 
            </div>
        <?php endif; ?>
        
    <div class="container">
        <?= $this->include('/partials/sidebar') ?>

        <div class="content">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</body>

</html>