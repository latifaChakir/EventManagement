<!DOCTYPE html>
<html>
<head>
  <style>
    .card {
      border: 2px solid #3498db; 
      border-radius: 10px;
      padding: 20px;
      width: 300px;
      background-color: #f9f9f9;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 20px auto;
    }

    .card-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
      text-align: center;
    }

    .card-description {
      font-size: 16px;
      color: #666;
      line-height: 1.5;
      margin-bottom: 15px;
    }

    .welcome-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
      text-align: center;
      color: linear-gradient(to right, #3498db, #c0392b);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .welcome-message {
      font-size: 14px;
      color: #666;
      line-height: 1.5;
      margin-bottom: 15px;
      text-align: center
    }
  </style>
</head>
<body>
  <div class="card">
    <h2 class="card-title">{{ $subject }}</h2>
    <div class="welcome-title">Welcome!</div>
    <p class="welcome-message">Thank you for your reservation. We look forward to seeing you at the event!</p>
    <p class="card-description">{{ $body }}</p>
  </div>
</body>
</html>
