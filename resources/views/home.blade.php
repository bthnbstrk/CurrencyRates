<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kur Değerleri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .currency-card {
            margin: 15px 0;
        }
        .currency-card h5 {
            margin-bottom: 0;
        }
        .currency-card p {
            margin-bottom: 0;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="text-center my-4">
        <h1>Kur Değerleri</h1>
        <p>Son güncellenme tarihi: <span id="update-time">12:00 PM</span></p>
    </header>

    <div class="row">
        <div class="col-md-4">
            <div class="card currency-card">
                <div class="card-body">
                    <h5 class="card-title">Dolar</h5>
                    <p class="card-text" id="usd-rate">$1.00</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card currency-card">
                <div class="card-body">
                    <h5 class="card-title">Euro</h5>
                    <p class="card-text" id="eur-rate">€0.85</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card currency-card">
                <div class="card-body">
                    <h5 class="card-title">Altın</h5>
                    <p class="card-text" id="gold-rate">₺800.00</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Dinamik veri güncellemeleri için JavaScript örneği
    document.addEventListener('DOMContentLoaded', function() {
        // Örnek veri güncelleme
        const usdRate = 1.00;
        const eurRate = 0.85;
        const goldRate = 800.00;
        const updateTime = new Date().toLocaleTimeString();

        document.getElementById('usd-rate').textContent = `$${usdRate.toFixed(2)}`;
        document.getElementById('eur-rate').textContent = `€${eurRate.toFixed(2)}`;
        document.getElementById('gold-rate').textContent = `₺${goldRate.toFixed(2)}`;
        document.getElementById('update-time').textContent = updateTime;
    });
</script>
</body>
</html>
