<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Döviz Kurları</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            text-align: center;
            max-width: 1000px;
            width: 100%;
            padding: 20px;
        }
        .header {
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 2.5rem; /* Başlık boyutunu daha dengeli hale getirdik */
            font-weight: 700;  /* Daha kalın yazı */
            color: #f1f1f1;
            font-family: 'Montserrat', sans-serif;
        }
        .header p {
            font-size: 1.2rem; /* Açıklama metni için daha küçük boyut */
            color: #b5b5b5;
            font-weight: 400;
        }
        .rate-cards {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }
        .rate-card {
            flex: 1 1 calc(33.333% - 20px); /* Kartlar arasında boşluk bırakmak için %33.333'ten biraz daha az genişlik verdik */
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #ffffff;
            padding: 25px;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        .rate-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .rate-card h5 {
            font-size: 1.5rem; /* Para birimi başlığı için uygun boyut */
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
            font-family: 'Montserrat', sans-serif;
        }
        .rate-card p {
            font-size: 1.8rem; /* Kur değeri için dengeli boyut */
            margin-bottom: 0;
            font-weight: 700; /* Kalın yazı */
            color: #007bff; /* Kur değerleri için vurgulu renk */
        }
        .rate-icon {
            font-size: 3.5rem; /* İkon boyutunu daha dengeli hale getirdik */
            margin-bottom: 15px;
            color: #007bff;
        }
        .footer {
            margin-top: 40px;
            color: #b5b5b5;
            font-size: 1rem; /* Footer yazısı için uygun boyut */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Döviz Kurları</h1>
        <p>Son Güncelleme: <span id="last-update"></span></p>
    </div>
    <div class="rate-cards" id="exchange-rates">
       @forelse($currencies as $currencyCode => $value)
           <div class="rate-card">
               <i id="{{$currencyCode}}" class="rate-icon fas"></i>
               <h5>{{$currencyCode}}</h5>
               <p>{{$value}}</p>
           </div>
        @empty
            <h2>Gösterilecek veri bulunamadı</h2>
       @endforelse
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#USD').addClass('fa-dollar-sign');
        $('#EUR').addClass('fa-euro-sign');
        $('#GBP').addClass('fa-pound-sign');
    });
</script>
</body>
</html>
