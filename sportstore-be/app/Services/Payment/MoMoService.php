<?php

namespace App\Services\Payment;

use Illuminate\Support\Facades\Http;

class MoMoService
{
    private string $partnerCode;
    private string $accessKey;
    private string $secretKey;
    private string $endpoint;

    public function __construct()
    {
        $this->partnerCode = config('services.momo.partner_code');
        $this->accessKey = config('services.momo.access_key');
        $this->secretKey = config('services.momo.secret_key');
        $this->endpoint = config('services.momo.endpoint');
    }

    /**
     * Tạo yêu cầu thanh toán MoMo (Capture Wallet)
     */
    public function createPaymentUrl(string $orderCode, float $amount, string $orderInfo = 'Thanh toan don hang'): array
    {
        $amount = (int) $amount;
        $requestId = time() . "";
        $redirectUrl = config('services.momo.return_url', env('FRONTEND_URL') . '/payment/momo-return');
        $ipnUrl = env('APP_URL') . '/api/v1/payments/momo-ipn';
        $extraData = "";

        $rawHash = "accessKey=" . $this->accessKey .
            "&amount=" . $amount .
            "&extraData=" . $extraData .
            "&ipnUrl=" . $ipnUrl .
            "&orderId=" . $orderCode .
            "&orderInfo=" . $orderInfo .
            "&partnerCode=" . $this->partnerCode .
            "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId .
            "&requestType=captureWallet";

        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        $data = [
            'partnerCode' => $this->partnerCode,
            'partnerName' => 'SportStore',
            'storeId' => 'SportStore',
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderCode,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => 'captureWallet',
            'signature' => $signature
        ];

        $response = Http::post($this->endpoint, $data);

        return $response->json();
    }

    /**
     * Xác thực chữ ký phản hồi từ MoMo
     */
    public function verifySignature(array $data): bool
    {
        $signature = $data['signature'] ?? '';
        unset($data['signature']);
        
        // Sắp xếp các tham số theo thứ tự bảng chữ cái để tạo hash
        // Lưu ý: MoMo có cấu trúc hash phản hồi cụ thể, cần tuân thủ tài liệu
        $rawHash = "accessKey=" . $this->accessKey .
            "&amount=" . $data['amount'] .
            "&extraData=" . ($data['extraData'] ?? '') .
            "&message=" . ($data['message'] ?? '') .
            "&orderId=" . $data['orderId'] .
            "&orderInfo=" . ($data['orderInfo'] ?? '') .
            "&orderType=" . ($data['orderType'] ?? '') .
            "&partnerCode=" . $data['partnerCode'] .
            "&payType=" . ($data['payType'] ?? '') .
            "&requestId=" . $data['requestId'] .
            "&responseTime=" . ($data['responseTime'] ?? '') .
            "&resultCode=" . $data['resultCode'] .
            "&transId=" . ($data['transId'] ?? '');

        $calculatedSignature = hash_hmac("sha256", $rawHash, $this->secretKey);

        return $calculatedSignature === $signature;
    }
}
