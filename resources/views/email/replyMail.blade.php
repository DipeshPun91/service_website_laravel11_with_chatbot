<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Solution</title>
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .email-header h1 {
            margin: 0;
            color: #f5a623; 
        }
        .email-body {
            padding: 20px 0;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .reply-btn {
            display: inline-block;
            background-color: #f5a623; 
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Response to Your Inquiry: {{ $mailData['title'] }}</h1>
        </div>
        
        <div class="email-body">
            <p>Thank you for reaching out to us. We have received your inquiry and our team is currently reviewing it. Below is our response:</p>

            <div style="background-color: #f9f9f9; border-left: 4px solid #f5a623; padding: 15px; margin-top: 20px;">
                <p><strong>Reply:</strong></p>
                <p>{!! $mailData['body'] !!}</p>
            </div>

            <p>If you have any further questions, feel free to reply to this email. We are here to assist you!</p>

            <p>Best regards,</p>
            <p>The NextGen Solution Team</p>
        </div>

        <div class="footer">
            <p>If you did not request this, please disregard this email.</p>
        </div>
    </div>
</body>
</html>
