<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vnpay/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{ asset('vnpay/jumbotron-narrow.css') }}" rel="stylesheet">  
    <script src="{{ asset('vnpay/jquery-1.11.3.min.js') }}"></script>
</head>
<body>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">HOÁ ĐƠN VNPAY</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <label>{{ $vnpayData['vnp_TxnRef'] }}</label>
            </div>    
            <div class="form-group">
                <label>Số tiền:</label>
                <label>{{ number_format($vnpayData['vnp_Amount'] / 100, 0, ',', '.') }}</label>
            </div>  
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label>{{ $vnpayData['vnp_OrderInfo'] }}</label>
            </div> 
            <div class="form-group">
                <label>Mã khoá học đăng ký:</label>
                @if (isset($courseIDs))
                    <label>{{ implode(', ', $courseIDs) }}</label>
                @endif
            </div> 
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label>{{ $vnpayData['vnp_ResponseCode'] }}</label>
            </div> 
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label>{{ $vnpayData['vnp_TransactionNo'] }}</label>
            </div> 
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label>{{ $vnpayData['vnp_BankCode'] }}</label>
            </div> 
            <div class="form-group">
                <label>Thời gian thanh toán: {{ date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])) }}</label>
            </div> 
            <div class="form-group">
                <label>Kết quả: Giao dịch thành công!</label>
                <br>
                <a href="{{ route('home') }}">
                    <button>Quay lại</button>
                </a>
            </div> 
        </div>
        <p>&nbsp;</p>
        <footer class="footer">
            <p>&copy; CNET ACADEMY <?php echo date('Y') ?></p>
        </footer>
    </div>  
</body>
</html>
