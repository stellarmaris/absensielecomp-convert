<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Trouble</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        body {
            font-family: "Poppins", sans-serif;
            margin: 0px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('/images/Sign In 1.png');
        }

        .container {
            background-color: #ffffff;
            height: fit-content;
            width: 700px;
            border-radius: 10px;
            box-shadow: 0 2px 2px 0px rgba(0, 0, 0, 0.25);
            padding: 30px;

        }

        .images {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .title {
            width: 100%;
        }

        .title h2 {
            text-align: center;
        }

        .title p {
            text-align: center;
            font-size: 14px;
        }


        img {
            max-width: 200px;
        }

        label {
            font-size: 14px;
            font-weight: 500;

        }

        input {
            margin-top: 10px;
            width: calc(100% - 10px);
            height: 30px;
            padding: 5px 10px;
            border: 1px solid lightgray;
            border-radius: 5px;
        }

        textarea {
            margin-top: 10px;
            width: calc(100% - 10px);
            height: 30px;
            padding: 7px 10px;
            border: 1px solid lightgray;
            border-radius: 5px;
        }

        button {
            width: 100%;
            height: 50px;
            background-color: #130c90;
            color: #ffffff;
            font-weight: 500;
            font-size: 14px;
            border-radius: 10px;
            font-family: var(--font-family);
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="images">
            <img src="/images/troubleimage.png" alt="" srcset="">
        </div>
        <div class="title">
            <h2>Oops! Ada Trouble Nih?</h2>
            <p>Elisabet siap bantu. Jelasin masalahmu di sini!</p>
        </div>

        <form id="troubleForm" onsubmit="sendMessage(event)">
            <label for="troubleSpot">Trouble Spot:</label><br>
            <input type="text" id="troubleSpot" name="troubleSpot" placeholder="Dimana nih masalahnya? Jelasin yuk!" required><br><br>

            <label for="details">Details:</label><br>
            <textarea id="details" name="details" placeholder="Ceritain lengkap biar Elisabet paham." required></textarea><br><br>

            <label for="yourName">Your Name:</label><br>
            <input type="text" id="yourName" name="yourName" placeholder="Siapa yang kena sial kali ini? 😅" required><br><br>

            <button type="submit">Keluhkan ke Elisabet via WhatsApp</button>
        </form>

        <p id="successMessage" style="display:none;">Sip! Pesanmu udah dikirim ke Elisabet. Jangan lupa cek WA-mu ya, biar kita bisa cepat atasi!</p>

    </div>

    <script>
        function sendMessage(event) {
            event.preventDefault();

            // Get form values
            const troubleSpot = document.getElementById('troubleSpot').value;
            const details = document.getElementById('details').value;
            const yourName = document.getElementById('yourName').value;

            // Construct WhatsApp message
            const message = `Halo Elisabet, ada trouble nih!%0A%0A*Trouble Spot:* ${troubleSpot}%0A*Details:* ${details}%0A*Nama:* ${yourName}`;

            // WhatsApp number to send the message to
            const whatsappNumber = '6282276944556'; // Replace with Elisabet's WhatsApp number

            // Construct the WhatsApp URL
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${message}`;

            // Redirect to WhatsApp
            window.open(whatsappURL, '_blank');

            // Show success message
            document.getElementById('successMessage').style.display = 'block';
        }
    </script>
</body>

</html>