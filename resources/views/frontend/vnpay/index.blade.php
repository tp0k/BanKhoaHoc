    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <meta name="description" content="">
            <meta name="author" content="">
            <title>VNPAY DEMO</title>
            <!-- Bootstrap core CSS -->
            <link href="{{asset('vnpay/bootstrap.min.css')}}" rel="stylesheet"/>
            <!-- Custom styles for this template -->
            <link href="{{asset('vnpay/jumbotron-narrow.css')}}" rel="stylesheet">  
            <script src="{{asset('vnpay/jquery-1.11.3.min.js')}}"></script>
        </head>

        <body>
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
            <h3>Tạo giao dịch mới</h3>
            <form action="{{route('payment.vnpay.submit')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount" name="amount" type="number" value="{{ $total_amount }}" readonly/>
                </div>
                <div class="form-group">
                    <label for="order_desc">Nội dung thanh toán</label>
                    <textarea class="form-control" id="order_desc" name="order_desc" cols="20" rows="2" placeholder="Nội dung thanh toán" required></textarea>
                </div>
                <div class="form-group" required>
                    <label for="bank_code">Ngân hàng</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="">Không chọn</option>
                        <option value="NCB">Ngân hàng NCB</option>
                        <option value="AGRIBANK">Ngân hàng Agribank</option>
                        <option value="SCB">Ngân hàng SCB</option>
                        <option value="SACOMBANK">Ngân hàng Sacombank</option>
                        <option value="SEABANK">Ngân hàng SeAbank</option>
                        <option value="EXIMBANK">Ngân hàng EximBank</option>
                        <option value="MSB">Ngân hàng MSB</option>
                        <option value="SHB">Ngân hàng SHB</option>
                        <option value="MBBANK">Ngân hàng MBBANK</option>
                        <option value="HDBANK">Ngân hàng HDBANK</option>
                        <option value="TPBANK">Ngân hàng TPBANK</option>
                        <option value="VPBANK">Ngân hàng VPBANK</option>
                        <option value="ABBANK">Ngân hàng ABBANK</option>
                        <option value="OCEANBANK">Ngân hàng OCEAN BANK</option>
                        <option value="NAMABANK">Ngân hàng Nam A Bank</option>
                        <option value="VIETABANK">Ngân hàng Viet A Bank</option>
                        <option value="BACABANK">Ngân hàng Bac A Bank</option>
                        <option value="DONGABANK">Ngân hàng Dong A Bank</option>
                        <option value="KIENLONGBANK">Ngân hàng KienlongBank</option>
                        <option value="VIETINBANK">Ngân hàng VietinBank</option>
                        <option value="VIETCOMBANK">Ngân hàng Vietcombank</option>
                        <option value="TECHCOMBANK">Ngân hàng Techcombank</option>
                        <option value="VIB">Ngân hàng VIB</option>
                        <option value="ACB">Ngân hàng ACB</option>
                        <option value="OCB">Ngân hàng OCB</option>
                        <option value="BIDV">Ngân hàng BIDV</option>
                        <option value="VISA">Thanh toán qua thẻ VISA/MASTER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" id="language" class="form-control">
                        <option value="vn">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="btnPopup">Xác nhận thanh toán</button>
                <button type="button" class="btn btn-primary" onclick="history.back()">Quay trở lại</button>
            </form>
                <p>
                    &nbsp;
                </p>
                <footer class="footer">
                    <p>&copy; VNPAY <?php echo date('Y')?></p>
                </footer>
            </div> 
            <link  rel="stylesheet" href="http://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css">
            <script src="http://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js">
                function pay() {
                window.location.href = "/vnpay_php/vnpay_pay.php";
                }
                function querydr() {
                window.location.href = "/vnpay_php/vnpay_querydr.php";
                }
                function refund() {
                window.location.href = "/vnpay_php/vnpay_refund.php";
                }
            </script>
        </body>
    </html>
