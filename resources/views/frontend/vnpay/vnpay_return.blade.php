<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            border-radius: 8px;
        }
        .header {
            border-bottom: 2px solid #008080;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .header h3 {
            color: #008080;
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            font-size: 16px;
        }
        .form-group label:nth-child(2) {
            font-weight: normal;
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #aaa;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #008080;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
        .green-divider {
            border: none;
            border-top: 2px solid #008080;
            margin: 10px 0;
        }
        .centerr {
            display: flex;
  justify-content: center;
        }
    </style>
</head>
<body>

<!-- Header Starts Here -->
<header style="display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #ccc;">
    <div>
        <img src="{{ asset('images/logo.png') }}" alt="CNET Logo" style="height: 50px;">
    </div>
    <div style="text-align: center; flex-grow: 1;">
        <h1>HÓA ĐƠN</h1>
    </div>
    <div style="width: 50px;"> <!-- Placeholder để logo ở giữa -->
    </div>
</header>
    {{-- <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">HOÁ ĐƠN</h3>
        </div> --}}
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label>{{ $vnpayData['vnp_TxnRef'] }}</label>
            </div>    
            <hr class="green-divider">
            <div class="form-group">
                <label>Tổng tiền:</label>
                <label>{{ number_format($vnpayData['vnp_Amount'] / 100, 0, ',', '.') }} VND</label>
            </div>  
            <hr class="green-divider">
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label>{{ $vnpayData['vnp_OrderInfo'] }}</label>
            </div> 
            <hr class="green-divider">
            <div class="form-group">
                <label>Mã khoá học đăng ký:</label>
                @if (isset($courseIDs))
                    <label>{{ implode(', ', $courseIDs) }}</label>
                @endif
            </div> 
            <hr class="green-divider">
            <div class="form-group">
                <label>Mã giao dịch Tại VNPAY:</label>
                <label>{{ $vnpayData['vnp_TransactionNo'] }}</label>
            </div> 
            <hr class="green-divider">
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label>{{ $vnpayData['vnp_BankCode'] }}</label>
            </div> 
            <hr class="green-divider">
            <div class="form-group">
                <label>Thời gian thanh toán: {{ date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])) }}</label>
            </div> 
            <hr class="green-divider">
            <div class="form-group" >
                <label>Kết quả: Giao dịch thành công!</label>
                <div class="centerr">
                <br>
                <a href="{{ route('home') }}" class="btn-back">Quay lại</a>
            </div> 
            </div>
        </div>
        <footer class="footer">
            <p>&copy; CNET ACADEMY <?php echo date('Y') ?></p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
