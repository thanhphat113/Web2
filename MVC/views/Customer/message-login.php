<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            display: none;
            z-index: 1000;
            width: 300px;
            text-align: center;
        }

        .success {
            background-color: #2ecc71;
            color: #fff;
        }

        .error {
            background-color: #e74c3c;
            color: #fff;
        }

        .ok-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .ok-button:hover {
            background-color: #2980b9;
        }
    </style>
</head> 
<body>
    <div id="notification" class="notification">
        <span id="notification-text"></span>
        <button class="ok-button" onclick="closeNotification()">OK</button>
    </div>

    <script>
        function showMessage(message, type) {
            var notification = document.getElementById("notification");
            var notificationText = document.getElementById("notification-text");

            notificationText.innerText = message;
            notification.className = "notification " + type;
            notification.style.display = "block";
            // Tự động ẩn thông báo sau 5 giây
            setTimeout(function() {
                notification.style.display = "none";
            }, 5000); // Thời gian tính bằng mili giây
        }

        function closeNotification() {
            var notification = document.getElementById("notification");
            notification.style.display = "none";
        }
    </script>
</body>
</html>
