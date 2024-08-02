<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .container {
            max-width: 1000px;
            margin-top: 20px;
        }
        .custom-font {
            font-family: 'Inter', sans-serif; 
        }
        body {
            background-color: #EFF0F7; 
        }
        .custom-btn {
            width: 100%;
            max-width: 900px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: bold; 
            background-color: #130C90;
            border-radius: 20px;
            margin: 0 auto;
        }
        .custom-btn:hover {
            background-color: #0C074F;
        }
        .bold-text {
            font-weight: 900; 
        }
        .card {
            margin-bottom: 15px;
            border-radius: 20px;
            overflow: hidden; 
        }
        .form-group {
            margin-bottom: 20px;
        }
        .card-title {
            margin-left: 10px;
            font-size: 30px; 
        }
        .form-label {
            font-weight: 500; 
            font-size: 24px; 
        }
        .profile .form-control {
            padding: 20px;
            background-color: #F6F5FB; 
            border: 2px solid #130C90;
            border-radius: 20px;
            font-size: 20px; 
            font-weight: bold; 
            height: 60px; 
            width: 100%;
        }
        .profile .form-control[readonly] {
            border: none;
        }
    </style>
</head>
<body>
    <!-- container -->
    <div class="container">
        <!-- card title -->
        <div class="card title-card custom-font">
            <div class="card-body">
                <h3 class="card-title bold-text">PROFILE</h3>
            </div>
        </div>
        <!-- card profile -->
        <div class="card profile custom-font">
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="Budi">
                </div>
                <div class="form-group">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" id="gender" name="gender" class="form-control" value="Male" readonly>
                </div>
                <div class="form-group">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="tel" id="telephone" name="telephone" class="form-control" value="+62 812 3456 7890">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="budi@example.com" readonly>
                </div>
                <div class="form-group password-field">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="thisispassword">
                </div>
                <button type="submit" class="btn btn-primary custom-btn">Save Changes</button>
            </div>
        </div>
    </div>
</body>
</html>
