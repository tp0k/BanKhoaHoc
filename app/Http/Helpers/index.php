<?php
// use Illuminate\Support\Facades\Crypt;
function encryptor($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC"; //Thuật toán mã hoá đối xứng đối với mật khẩu
    // khoá băm
    $secret_key = bin2hex(random_bytes(16)); // Độ dài 16 byte = 128 bit
    $secret_iv = bin2hex(random_bytes(8)); // Độ dài 8 byte = 64 bit

    //hash
    $key = hash('sha256', $secret_key);

    //iv - phương thức mã hóa AES-256-CBC dự kiến ​​​​16 byte - nếu không bạn sẽ nhận được cảnh báo
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //thực hiện mã hóa văn bản/chuỗi/số đã cho
    if ($action == 'encrypt') {
        // $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        // $output = base64_encode($output);
        $output = Crypt::encryptString($string, ['key' => $key, 'iv' => $iv]);
    } else if ($action == 'decrypt') {
        // giải mã văn bản/chuỗi/số đã cho
        // $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        $output = Crypt::decryptString($string, ['key' => $key, 'iv' => $iv]);
    }
    return $output;
}

function currentUserId()
{
    return encryptor('decrypt', request()->session()->get('userId'));
}

function fullAccess()
{
    return encryptor('decrypt', request()->session()->get('accessType'));
}

function currentUser()
{
    return encryptor('decrypt', request()->session()->get('roleIdentity'));
}
