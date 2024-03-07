<!DOCTYPE html>
<html>
<head>
  <style>
    .card {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      width: 300px;
      background-color: #f2f2f2;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .card-description {
      font-size: 14px;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2 class="card-title">{{ $subject }}</h2>
    <p class="card-description">{{ $body }}</p>
  </div>
</body>
</html>
