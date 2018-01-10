<?php
namespace Sparrow;

class SparrowResponse
{

    public function __construct(array $values, array $request)
    {
        $values_lower = [];
        foreach ($values as $key => $value) {
            $values_lower[strtolower($key)] = $value;
        }
        
        $this->rawRequest = $request;
        $this->rawResponse = $values;
        $this->status = $this->getIntOrZero($values_lower, "status");
        $this->response = $this->getIntOrZero($values_lower, "response");
        $this->textResponse = $this->getStringOrEmpty($values_lower, "textresponse");
        $this->transId = $this->getStringOrEmpty($values_lower, "transid");
        $this->xRef = $this->getStringOrEmpty($values_lower, "xref");
        $this->authCode = $this->getStringOrEmpty($values_lower, "authcode");
        $this->orderId = $this->getStringOrEmpty($values_lower, "orderid");
        $this->type = $this->getStringOrEmpty($values_lower, "type");
        $this->avsResponse = $this->getStringOrEmpty($values_lower, "avsresponse");
        $this->cvvResponse = $this->getStringOrEmpty($values_lower, "cvvresponse");
        $this->codeResponse = $this->getIntOrZero($values_lower, "coderesponse");
        $this->codeDescription = $this->getStringOrEmpty($values_lower, "codedescription");
        $this->customerToken = $this->getStringOrEmpty($values_lower, "customertoken");
        $this->planToken = $this->getStringOrEmpty($values_lower, "plantoken");
        $this->invoiceNumber = $this->getStringOrEmpty($values_lower, "invoicenumber");
        $this->assignmentToken = $this->getStringOrEmpty($values_lower, "assignmenttoken");
        $this->paymentTokens = $this->getStringArray($values_lower, "paymenttoken");
        $this->customerStatus = $this->getStringOrEmpty($values, "CustomerStatus");
        $this->firstName = $this->getStringOrEmpty($values, "firstname");
        $this->lastName = $this->getStringOrEmpty($values, "lastname");
        $this->payType = $this->getStringOrEmpty($values, "paytype");
        $this->payNo = $this->getStringOrEmpty($values, "payno");
        $this->cardExp = $this->getStringOrEmpty($values, "cardexp");
        $this->account = $this->getStringOrEmpty($values, "account");
        $this->useAccountUpdater = $this->getStringOrEmpty($values, "useAccountUpdater");
        $this->token = $this->getStringOrEmpty($values, "token");
        $this->customField1 = $this->getStringOrEmpty($values, "customField1");
        $this->invoiceAmount = $this->getStringOrEmpty($values, "invoiceamount");
        $this->currency = $this->getStringOrEmpty($values, "currency");
        $this->invoiceDate = $this->getStringOrEmpty($values, "invoicedate");
        $this->invoiceStatus = $this->getStringOrEmpty($values, "invoicestatus");
        $this->invoicePaymentLink = $this->getStringOrEmpty($values, "invoicepaymentlink");
        $this->origTransId = $this->getStringOrEmpty($values, "origtransid");
        $this->origResponse = $this->getStringOrEmpty($values, "origresponse");
        $this->origTextResponse = $this->getStringOrEmpty($values, "origtextresponse");
        $this->errorCode = $this->getIntOrZero($values_lower, "errorcode");
        $this->isSuccess = $this->status == 200 || $this->response == 1 || strpos(strtolower($this->textResponse), "success") !== false;
    }

    public $isSuccess;

    public $status;

    public $response;

    public $textResponse;

    public $transId;

    public $xRef;

    public $authCode;

    public $orderId;

    public $type;

    public $avsResponse;

    public $cvvResponse;

    public $codeResponse;

    public $codeDescription;

    public $customerToken;

    public $planToken;

    public $invoiceNumber;

    public $assignmentToken;

    public $paymentTokens;

    public $customerStatus;

    public $firstName;

    public $lastName;

    public $payType;

    public $payNo;

    public $cardExp;

    public $account;

    public $useAccountUpdater;

    public $token;

    public $customField1;

    public $invoiceAmount;

    public $currency;

    public $invoiceDate;

    public $invoiceStatus;

    public $invoicePaymentLink;

    public $origTransId;

    public $origResponse;

    public $origTextResponse;

    public $errorCode;

    public $rawResponse;

    public $rawRequest;

    private function tryGetValue($array, $key)
    {
        return (array_key_exists($key, $array)) ? $array[$key] : null;
    }

    private function getStringOrEmpty(array $values, string $key)
    {
        if ($value = $this->tryGetValue($values, strtolower($key))) {
            return str_replace("+", " ", urldecode($value));
        }
        
        return "";
    }

    private function getIntOrZero(array $values, string $key)
    {
        if ($value = $this->tryGetValue($values, strtolower($key))) {
            return intval($value);
        }
        
        return 0;
    }

    private function getStringArray(array $values, string $key)
    {
        $items = [];
        $i = 1;
        
        while ($value = $this->tryGetValue($values, strtolower($key) . "_" . $i)) {
            array_push($items, str_replace("+", " ", urldecode($value)));
            $i = $i + 1;
        }
        
        return $items;
    }
}
