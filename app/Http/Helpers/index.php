<?php
use Illuminate\Support\Facades\Crypt;
function encryptor($action, $string)
{
    try {
        if ($action == 'encrypt') {
            // Mã hóa văn bản/chuỗi/số đã cho
            return Crypt::encryptString($string);
        } else if ($action == 'decrypt') {
            // Giải mã văn bản/chuỗi/số đã cho
            return Crypt::decryptString($string);
        }
    } catch (DecryptException $e) {
        // Xử lý ngoại lệ khi giải mã thất bại
        // Có thể ghi log hoặc trả về một giá trị mặc định
        return 'Lỗi giải mã: ' . $e->getMessage();
    }

    return 'Lỗi: Hành động không hợp lệ';
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
