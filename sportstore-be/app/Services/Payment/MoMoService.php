<?php

namespace App\Services\Payment;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MoMoService
{
    private string $partnerCode;
    private string $accessKey;
    private string $secretKey;
    private string $endpoint;

    public function __construct()
    {
        $this->partnerCode = trim(config('services.momo.partner_code', ''));
        $this->accessKey = trim(config('services.momo.access_key', ''));
        $this->secretKey = trim(config('services.momo.secret_key', ''));
        $this->endpoint = trim(config('services.momo.endpoint', 'https://test-payment.momo.vn/v2/gateway/api/create'));
    }

    /**
     * Tạo yêu cầu thanh toán MoMo (Capture Wallet)
     */
    public function createPaymentUrl(string $orderCode, float $amount, string $orderInfo = 'Thanh toan don hang'): array
    {
        $requestId = time() . "";
        $momoOrderId = $orderCode . "_" . time(); 
        $redirectUrl = config('services.momo.return_url', env('FRONTEND_URL') . '/payment/momo-return');
        $ipnUrl = env('APP_URL') . '/api/v1/payments/momo-ipn';
        $extraData = "";
        $orderInfo = "Thanh toan don hang " . $orderCode;

        $rawHash = "accessKey=" . $this->accessKey .
            "&amount=" . $amount .
            "&extraData=" . $extraData .
            "&ipnUrl=" . $ipnUrl .
            "&orderId=" . $momoOrderId .
            "&orderInfo=" . $orderInfo .
            "&partnerCode=" . $this->partnerCode .
            "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId .
            "&requestType=captureWallet";

        Log::info("MoMo Final Raw Hash: " . $rawHash);
        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        $data = [
            'partnerCode' => $this->partnerCode,
            'partnerName' => 'SportStore',
            'storeId'     => 'SportStore',
            'requestId'   => $requestId,
            'amount'      => $amount,
            'orderId'     => $momoOrderId,
            'orderInfo'   => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl'      => $ipnUrl,
            'lang'        => 'vi',
            'extraData'   => $extraData,
            'requestType' => 'captureWallet',
            'signature'   => $signature
        ];

        Log::info("MoMo Final Data Post: " . json_encode($data));
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->endpoint, $data);

        $result = $response->json();
        Log::info("MoMo Response: " . json_encode($result));

        return $result;
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
