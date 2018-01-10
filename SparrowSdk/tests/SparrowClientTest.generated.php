<?php
namespace SparrowTests;

require_once "../vendor/autoload.php";
require_once "../src/Sparrow/SparrowClient.php";

use DateTime;
use PHPUnit\Framework\TestCase;
use Sparrow\SparrowClient;
use Sparrow\SparrowResponse;

use Sparrow\AchAccountSubType;
use Sparrow\AchAccountType;
use Sparrow\AddCustomerParams;
use Sparrow\AddPaymentTypesToCustomerParams;
use Sparrow\AdvancedACHParams;
use Sparrow\AdvancedCaptureParams;
use Sparrow\AdvancedECheckParams;
use Sparrow\AdvancedFiservSaleParams;
use Sparrow\AdvancedRefundParams;
use Sparrow\AdvancedSaleParams;
use Sparrow\AdvancedStarCardParams;
use Sparrow\AdvancedVoidParams;
use Sparrow\AssignPaymentPlanToCustomerParams;
use Sparrow\AuthCharIndicator;
use Sparrow\CancelInvoiceByCustomerParams;
use Sparrow\CancelInvoiceParams;
use Sparrow\CancelPlanAssignmentParams;
use Sparrow\CreateInvoiceParams;
use Sparrow\CreatePaymentPlanParams;
use Sparrow\DecryptCustomFieldsParams;
use Sparrow\DeleteDataVaultCustomerParams;
use Sparrow\DeletePaymentTypeParams;
use Sparrow\DeletePlanParams;
use Sparrow\DeleteSequenceParams;
use Sparrow\EWalletSimpleCreditParams;
use Sparrow\FiservSimpleSaleParams;
use Sparrow\InvoiceStatus;
use Sparrow\MarkSuccessfulTransactionAsChargebackParams;
use Sparrow\OperationType;
use Sparrow\PassengerSaleParams;
use Sparrow\PayInvoiceWithBankAccountParams;
use Sparrow\PayInvoiceWithCreditCardParams;
use Sparrow\PayType;
use Sparrow\PaymentType;
use Sparrow\PaymentTypeToAdd;
use Sparrow\PaymentTypeToDelete;
use Sparrow\PaymentTypeToUpdate;
use Sparrow\RetrieveCardBalanceParams;
use Sparrow\RetrieveCustomerParams;
use Sparrow\RetrieveInvoiceParams;
use Sparrow\RetrievePaymentTypeParams;
use Sparrow\ScheduleType;
use Sparrow\SequenceStep;
use Sparrow\SequenceStepToDelete;
use Sparrow\SimpleACHParams;
use Sparrow\SimpleAuthorizationParams;
use Sparrow\SimpleCaptureParams;
use Sparrow\SimpleCreditParams;
use Sparrow\SimpleECheckParams;
use Sparrow\SimpleOfflineCaptureParams;
use Sparrow\SimpleRefundParams;
use Sparrow\SimpleSaleParams;
use Sparrow\SimpleStarCardParams;
use Sparrow\SimpleVoidParams;
use Sparrow\UpdateCustomerParams;
use Sparrow\UpdateInvoiceParams;
use Sparrow\UpdatePaymentPlanAssignmentParams;
use Sparrow\UpdatePaymentPlanParams;
use Sparrow\UpdatePaymentTypeParams;
use Sparrow\VerifyAccountParams;

class SparrowClientTest extends TestCase
{
    /**
     * @var SparrowClient $sparrow_badApiKey
     */
    private static $sparrow_badApiKey;

    /**
     * @var SparrowClient $sparrow_creditcard
     */
    private static $sparrow_creditcard;

    /**
     * @var SparrowClient $sparrow_ach
     */
    private static $sparrow_ach;

    /**
     * @var SparrowClient $sparrow_cash
     */
    private static $sparrow_cash;

    /**
     * @var SparrowClient $sparrow_starcard
     */
    private static $sparrow_starcard;

    /**
     * @var SparrowClient $sparrow_ewallet
     */
    private static $sparrow_ewallet;

    protected function setUp()
    {
        parent::setUp();
        self::$sparrow_badApiKey = new SparrowClient("BAD_API_KEY");
        self::$sparrow_creditcard = new SparrowClient("CUK5YODHVAZHFBM6KESZO1J4");
        self::$sparrow_ach = new SparrowClient("RZOZ2AMMYF7GX2VF1L05WW1G");
        self::$sparrow_cash = new SparrowClient("23QFJBN8KME0FCTGBEASMLAF");
        self::$sparrow_starcard = new SparrowClient("PNk0xFNbn89ARFjA2Q1Q5tLVtoky5rrw");
        self::$sparrow_ewallet = new SparrowClient("1W53QL0TJLIERXHIQKRXJRTK");
    }

    private static function createRawLog(SparrowResponse $response, string $instanceName = "RAW")
    {
        $title = str_replace("result", "", $instanceName);
        $requestString = implode("
", array_map(function ($k, $v) {
            return $k . " = " . $v;
        }, array_keys($response->rawRequest), $response->rawRequest));
        $responseString = implode("
", array_map(function ($k, $v) {
            return $k . " = " . $v;
        }, array_keys($response->rawResponse), $response->rawResponse));
        
        return <<<EOD
LOG $title
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
$requestString     
           
==> 

$responseString            
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

EOD;
    }
    

    public function testAdvancedECheck()
    {
        
        $paramsAdvancedECheck = new AdvancedECheckParams();
        $paramsAdvancedECheck->bankAccount->bankName = "First Test Bank";
        $paramsAdvancedECheck->bankAccount->routing = "110000000";
        $paramsAdvancedECheck->bankAccount->account = "1234567890123";
        $paramsAdvancedECheck->bankAccount->achAccountType = AchAccountType::CHECKING;
        $paramsAdvancedECheck->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
        $paramsAdvancedECheck->amount = 9.99;
        $paramsAdvancedECheck->contactInfo->firstName = "John";
        $paramsAdvancedECheck->contactInfo->lastName = "Doe";
        $paramsAdvancedECheck->contactInfo->company = "Sparrow One";
        $paramsAdvancedECheck->contactInfo->address->address1 = "16100 N 71st Street";
        $paramsAdvancedECheck->contactInfo->address->city = "Scottsdale";
        $paramsAdvancedECheck->contactInfo->address->state = "AZ";
        $paramsAdvancedECheck->contactInfo->address->zip = "85254";
        $paramsAdvancedECheck->contactInfo->address->country = "US";

        $resultAdvancedECheck = self::$sparrow_ach->AdvancedECheck($paramsAdvancedECheck)->wait();

        
        
        echo self::createRawLog($resultAdvancedECheck, "testAdvancedECheck \$resultAdvancedECheck");    

        $this->assertTrue($resultAdvancedECheck->isSuccess);
    }

    public function testAdvancedACH()
    {
        
        $paramsAdvancedACH = new AdvancedACHParams();
        $paramsAdvancedACH->bankAccount->bankName = "First Test Bank";
        $paramsAdvancedACH->bankAccount->routing = "110000000";
        $paramsAdvancedACH->bankAccount->account = "1234567890123";
        $paramsAdvancedACH->bankAccount->achAccountType = AchAccountType::CHECKING;
        $paramsAdvancedACH->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
        $paramsAdvancedACH->amount = 9.99;
        $paramsAdvancedACH->contactInfo->firstName = "John";
        $paramsAdvancedACH->contactInfo->lastName = "Doe";

        $resultAdvancedACH = self::$sparrow_ach->AdvancedACH($paramsAdvancedACH)->wait();

        
        
        echo self::createRawLog($resultAdvancedACH, "testAdvancedACH \$resultAdvancedACH");    

        $this->assertTrue($resultAdvancedACH->isSuccess);
    }

    public function testSimpleACH()
    {
        
        $paramsSimpleACH = new SimpleACHParams();
        $paramsSimpleACH->bankAccount->bankName = "First Test Bank";
        $paramsSimpleACH->bankAccount->routing = "110000000";
        $paramsSimpleACH->bankAccount->account = "1234567890123";
        $paramsSimpleACH->bankAccount->achAccountType = AchAccountType::CHECKING;
        $paramsSimpleACH->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
        $paramsSimpleACH->amount = 9.99;
        $paramsSimpleACH->contactInfo->firstName = "John";
        $paramsSimpleACH->contactInfo->lastName = "Doe";

        $resultSimpleACH = self::$sparrow_ach->SimpleACH($paramsSimpleACH)->wait();

        
        
        echo self::createRawLog($resultSimpleACH, "testSimpleACH \$resultSimpleACH");    

        $this->assertTrue($resultSimpleACH->isSuccess);
    }

    public function testSimpleECheck()
    {
        
        $paramsSimpleECheck = new SimpleECheckParams();
        $paramsSimpleECheck->bankAccount->bankName = "First Test Bank";
        $paramsSimpleECheck->bankAccount->routing = "110000000";
        $paramsSimpleECheck->bankAccount->account = "1234567890123";
        $paramsSimpleECheck->bankAccount->achAccountType = AchAccountType::CHECKING;
        $paramsSimpleECheck->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
        $paramsSimpleECheck->amount = 9.99;
        $paramsSimpleECheck->contactInfo->firstName = "John";
        $paramsSimpleECheck->contactInfo->lastName = "Doe";
        $paramsSimpleECheck->contactInfo->company = "Sparrow One";
        $paramsSimpleECheck->contactInfo->address->address1 = "16100 N 71st Street";
        $paramsSimpleECheck->contactInfo->address->city = "Scottsdale";
        $paramsSimpleECheck->contactInfo->address->state = "AZ";
        $paramsSimpleECheck->contactInfo->address->zip = "85254";
        $paramsSimpleECheck->contactInfo->address->country = "US";

        $resultSimpleECheck = self::$sparrow_ach->SimpleECheck($paramsSimpleECheck)->wait();

        
        
        echo self::createRawLog($resultSimpleECheck, "testSimpleECheck \$resultSimpleECheck");    

        $this->assertTrue($resultSimpleECheck->isSuccess);
    }

    public function testPassengerSale()
    {
        
        $paramsPassengerSale = new PassengerSaleParams();
        $paramsPassengerSale->creditCard->cardNum = "4111111111111111";
        $paramsPassengerSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsPassengerSale->amount = 9.99;
        $paramsPassengerSale->passengerName = "John Doe";
        $paramsPassengerSale->airportCodes[0] = "";
        $paramsPassengerSale->airlineCodeNumber = "AA0";
        $paramsPassengerSale->ticketNumber = "1234567890";
        $paramsPassengerSale->flightDateCoupons[0] = new DateTime("2019-10-21");
        $paramsPassengerSale->flightDepartureTimeCoupons[0] = "";
        $paramsPassengerSale->approvalCode = "123456";
        $paramsPassengerSale->authCharIndicator = AuthCharIndicator::A;
        $paramsPassengerSale->validationCode = "1234";
        $paramsPassengerSale->authResponseCode = "AB";

        $resultPassengerSale = self::$sparrow_creditcard->PassengerSale($paramsPassengerSale)->wait();

        
        
        echo self::createRawLog($resultPassengerSale, "testPassengerSale \$resultPassengerSale");    

        $this->assertTrue($resultPassengerSale->isSuccess);
    }

    public function testRetrieveCardBalance()
    {
        
        $paramsRetrieveCardBalance = new RetrieveCardBalanceParams();
        $paramsRetrieveCardBalance->cardNum = "4111111111111111";

        $resultRetrieveCardBalance = self::$sparrow_creditcard->RetrieveCardBalance($paramsRetrieveCardBalance)->wait();

        
        
        echo self::createRawLog($resultRetrieveCardBalance, "testRetrieveCardBalance \$resultRetrieveCardBalance");    

        $this->assertTrue($resultRetrieveCardBalance->isSuccess);
    }

    public function testVerifyAccount()
    {
        
        $paramsVerifyAccount = new VerifyAccountParams();
        $paramsVerifyAccount->creditCard->cardNum = "4111111111111111";
        $paramsVerifyAccount->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsVerifyAccount->amount = 9.99;

        $resultVerifyAccount = self::$sparrow_creditcard->VerifyAccount($paramsVerifyAccount)->wait();

        
        
        echo self::createRawLog($resultVerifyAccount, "testVerifyAccount \$resultVerifyAccount");    

        $this->assertTrue($resultVerifyAccount->isSuccess);
    }

    public function testMarkSuccessfulTransactionAsChargeback()
    {
        
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsMarkSuccessfulTransactionAsChargeback = new MarkSuccessfulTransactionAsChargebackParams();
        $paramsMarkSuccessfulTransactionAsChargeback->transId = $resultSimpleSale->transId;
        $paramsMarkSuccessfulTransactionAsChargeback->reason = "Testing for Success";

        $resultMarkSuccessfulTransactionAsChargeback = self::$sparrow_creditcard->MarkSuccessfulTransactionAsChargeback($paramsMarkSuccessfulTransactionAsChargeback)->wait();

        
        
        echo self::createRawLog($resultSimpleSale, "testMarkSuccessfulTransactionAsChargeback \$resultSimpleSale");
        echo self::createRawLog($resultMarkSuccessfulTransactionAsChargeback, "testMarkSuccessfulTransactionAsChargeback \$resultMarkSuccessfulTransactionAsChargeback");    

        $this->assertTrue($resultMarkSuccessfulTransactionAsChargeback->isSuccess);
    }

    public function testSimpleCredit()
    {
        
        $paramsSimpleCredit = new SimpleCreditParams();
        $paramsSimpleCredit->creditCard->cardNum = "4111111111111111";
        $paramsSimpleCredit->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleCredit->amount = 9.99;

        $resultSimpleCredit = self::$sparrow_creditcard->SimpleCredit($paramsSimpleCredit)->wait();

        
        
        echo self::createRawLog($resultSimpleCredit, "testSimpleCredit \$resultSimpleCredit");    

        $this->assertTrue($resultSimpleCredit->isSuccess);
    }

    public function testAdvancedSale()
    {
        
        $paramsAdvancedSale = new AdvancedSaleParams();
        $paramsAdvancedSale->creditCard->cardNum = "4111111111111111";
        $paramsAdvancedSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsAdvancedSale->amount = 9.99;

        $resultAdvancedSale = self::$sparrow_creditcard->AdvancedSale($paramsAdvancedSale)->wait();

        
        
        echo self::createRawLog($resultAdvancedSale, "testAdvancedSale \$resultAdvancedSale");    

        $this->assertTrue($resultAdvancedSale->isSuccess);
    }

    public function testSimpleSale()
    {
        
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        
        
        echo self::createRawLog($resultSimpleSale, "testSimpleSale \$resultSimpleSale");    

        $this->assertTrue($resultSimpleSale->isSuccess);
    }

    public function testAddPaymentTypesToCustomer()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsAddPaymentTypesToCustomer = new AddPaymentTypesToCustomerParams();
        $paramsAddPaymentTypesToCustomer->token = $resultAddCustomer->customerToken;
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0] = new PaymentTypeToAdd();
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->payType = PayType::CREDITCARD;
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->creditCard->cardNum = "4111111111111111";
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->bankAccount->bankName = "First Test Bank";
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->bankAccount->routing = "110000000";
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->bankAccount->account = "1234567890123";
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->bankAccount->achAccountType = AchAccountType::CHECKING;
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
        $paramsAddPaymentTypesToCustomer->paymentTypeToAdds[0]->paymentType->ewallet->ewalletAccount = "user@example.com";

        $resultAddPaymentTypesToCustomer = self::$sparrow_creditcard->AddPaymentTypesToCustomer($paramsAddPaymentTypesToCustomer)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testAddPaymentTypesToCustomer \$resultAddCustomer");
        echo self::createRawLog($resultAddPaymentTypesToCustomer, "testAddPaymentTypesToCustomer \$resultAddPaymentTypesToCustomer");    

        $this->assertTrue($resultAddPaymentTypesToCustomer->isSuccess);
    }

    public function testAddCustomer()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testAddCustomer \$resultAddCustomer");    

        $this->assertTrue($resultAddCustomer->isSuccess);
    }

    public function testDeleteDataVaultCustomer()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsDeleteDataVaultCustomer = new DeleteDataVaultCustomerParams();
        $paramsDeleteDataVaultCustomer->token = $resultAddCustomer->customerToken;

        $resultDeleteDataVaultCustomer = self::$sparrow_creditcard->DeleteDataVaultCustomer($paramsDeleteDataVaultCustomer)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testDeleteDataVaultCustomer \$resultAddCustomer");
        echo self::createRawLog($resultDeleteDataVaultCustomer, "testDeleteDataVaultCustomer \$resultDeleteDataVaultCustomer");    

        $this->assertTrue($resultDeleteDataVaultCustomer->isSuccess);
    }

    public function testDeletePaymentType()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsDeletePaymentType = new DeletePaymentTypeParams();
        $paramsDeletePaymentType->token = $resultAddCustomer->customerToken;
        $paramsDeletePaymentType->paymentTypeToDeletes[0] = new PaymentTypeToDelete();
        $paramsDeletePaymentType->paymentTypeToDeletes[0]->token = $resultAddCustomer->paymentTokens[0];

        $resultDeletePaymentType = self::$sparrow_creditcard->DeletePaymentType($paramsDeletePaymentType)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testDeletePaymentType \$resultAddCustomer");
        echo self::createRawLog($resultDeletePaymentType, "testDeletePaymentType \$resultDeletePaymentType");    

        $this->assertTrue($resultDeletePaymentType->isSuccess);
    }

    public function testRetrieveCustomer()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsRetrieveCustomer = new RetrieveCustomerParams();
        $paramsRetrieveCustomer->token = $resultAddCustomer->customerToken;

        $resultRetrieveCustomer = self::$sparrow_creditcard->RetrieveCustomer($paramsRetrieveCustomer)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testRetrieveCustomer \$resultAddCustomer");
        echo self::createRawLog($resultRetrieveCustomer, "testRetrieveCustomer \$resultRetrieveCustomer");    

        $this->assertTrue($resultRetrieveCustomer->isSuccess);
    }

    public function testRetrievePaymentType()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsRetrievePaymentType = new RetrievePaymentTypeParams();
        $paramsRetrievePaymentType->token = $resultAddCustomer->paymentTokens[0];

        $resultRetrievePaymentType = self::$sparrow_creditcard->RetrievePaymentType($paramsRetrievePaymentType)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testRetrievePaymentType \$resultAddCustomer");
        echo self::createRawLog($resultRetrievePaymentType, "testRetrievePaymentType \$resultRetrievePaymentType");    

        $this->assertTrue($resultRetrievePaymentType->isSuccess);
    }

    public function testUpdateCustomer()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsUpdateCustomer = new UpdateCustomerParams();
        $paramsUpdateCustomer->token = $resultAddCustomer->customerToken;

        $resultUpdateCustomer = self::$sparrow_creditcard->UpdateCustomer($paramsUpdateCustomer)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testUpdateCustomer \$resultAddCustomer");
        echo self::createRawLog($resultUpdateCustomer, "testUpdateCustomer \$resultUpdateCustomer");    

        $this->assertTrue($resultUpdateCustomer->isSuccess);
    }

    public function testUpdatePaymentType()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsUpdatePaymentType = new UpdatePaymentTypeParams();
        $paramsUpdatePaymentType->token = $resultAddCustomer->customerToken;
        $paramsUpdatePaymentType->paymentTypeToUpdates[0] = new PaymentTypeToUpdate();
        $paramsUpdatePaymentType->paymentTypeToUpdates[0]->token = $resultAddCustomer->paymentTokens[0];
        $paramsUpdatePaymentType->paymentTypeToUpdates[0]->paymentType->payType = PayType::CREDITCARD;
        $paramsUpdatePaymentType->paymentTypeToUpdates[0]->paymentType->creditCard->cardNum = "4111111111111111";
        $paramsUpdatePaymentType->paymentTypeToUpdates[0]->paymentType->creditCard->cardExp = new DateTime("2019-10-21");

        $resultUpdatePaymentType = self::$sparrow_creditcard->UpdatePaymentType($paramsUpdatePaymentType)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testUpdatePaymentType \$resultAddCustomer");
        echo self::createRawLog($resultUpdatePaymentType, "testUpdatePaymentType \$resultUpdatePaymentType");    

        $this->assertTrue($resultUpdatePaymentType->isSuccess);
    }

    public function testDecryptCustomFields()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsDecryptCustomFields = new DecryptCustomFieldsParams();
        $paramsDecryptCustomFields->fieldName = "customField1";
        $paramsDecryptCustomFields->token = $resultAddCustomer->customerToken;

        $resultDecryptCustomFields = self::$sparrow_creditcard->DecryptCustomFields($paramsDecryptCustomFields)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testDecryptCustomFields \$resultAddCustomer");
        echo self::createRawLog($resultDecryptCustomFields, "testDecryptCustomFields \$resultDecryptCustomFields");    

        $this->assertTrue($resultDecryptCustomFields->isSuccess);
    }

    public function testEWalletSimpleCredit()
    {
        
        $paramsEWalletSimpleCredit = new EWalletSimpleCreditParams();
        $paramsEWalletSimpleCredit->ewallet->ewalletAccount = "user@example.com";
        $paramsEWalletSimpleCredit->amount = 9.99;

        $resultEWalletSimpleCredit = self::$sparrow_ewallet->EWalletSimpleCredit($paramsEWalletSimpleCredit)->wait();

        
        
        echo self::createRawLog($resultEWalletSimpleCredit, "testEWalletSimpleCredit \$resultEWalletSimpleCredit");    

        $this->assertTrue($resultEWalletSimpleCredit->isSuccess);
    }

    public function testAdvancedFiservSale()
    {
        
        $paramsAdvancedFiservSale = new AdvancedFiservSaleParams();
        $paramsAdvancedFiservSale->creditCard->cardNum = "4111111111111111";
        $paramsAdvancedFiservSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsAdvancedFiservSale->amount = 9.99;

        $resultAdvancedFiservSale = self::$sparrow_creditcard->AdvancedFiservSale($paramsAdvancedFiservSale)->wait();

        
        
        echo self::createRawLog($resultAdvancedFiservSale, "testAdvancedFiservSale \$resultAdvancedFiservSale");    

        $this->assertTrue($resultAdvancedFiservSale->isSuccess);
    }

    public function testFiservSimpleSale()
    {
        
        $paramsFiservSimpleSale = new FiservSimpleSaleParams();
        $paramsFiservSimpleSale->cardNum = "4111111111111111";
        $paramsFiservSimpleSale->cardExp = new DateTime("2019-10-21");
        $paramsFiservSimpleSale->amount = 9.99;

        $resultFiservSimpleSale = self::$sparrow_creditcard->FiservSimpleSale($paramsFiservSimpleSale)->wait();

        
        
        echo self::createRawLog($resultFiservSimpleSale, "testFiservSimpleSale \$resultFiservSimpleSale");    

        $this->assertTrue($resultFiservSimpleSale->isSuccess);
    }

    public function testCancelInvoiceByCustomer()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();

        $paramsCancelInvoiceByCustomer = new CancelInvoiceByCustomerParams();
        $paramsCancelInvoiceByCustomer->invoiceNumber = $resultCreateInvoice->invoiceNumber;
        $paramsCancelInvoiceByCustomer->invoiceStatusReason = "Testing";

        $resultCancelInvoiceByCustomer = self::$sparrow_creditcard->CancelInvoiceByCustomer($paramsCancelInvoiceByCustomer)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testCancelInvoiceByCustomer \$resultCreateInvoice");
        echo self::createRawLog($resultCancelInvoiceByCustomer, "testCancelInvoiceByCustomer \$resultCancelInvoiceByCustomer");    

        $this->assertTrue($resultCancelInvoiceByCustomer->isSuccess);
    }

    public function testCancelInvoice()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();

        $paramsCancelInvoice = new CancelInvoiceParams();
        $paramsCancelInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;
        $paramsCancelInvoice->invoiceStatusReason = "Testing";

        $resultCancelInvoice = self::$sparrow_creditcard->CancelInvoice($paramsCancelInvoice)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testCancelInvoice \$resultCreateInvoice");
        echo self::createRawLog($resultCancelInvoice, "testCancelInvoice \$resultCancelInvoice");    

        $this->assertTrue($resultCancelInvoice->isSuccess);
    }

    public function testCreateInvoice()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testCreateInvoice \$resultCreateInvoice");    

        $this->assertTrue($resultCreateInvoice->isSuccess);
    }

    public function testRetrieveInvoice()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();

        $paramsRetrieveInvoice = new RetrieveInvoiceParams();
        $paramsRetrieveInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;

        $resultRetrieveInvoice = self::$sparrow_creditcard->RetrieveInvoice($paramsRetrieveInvoice)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testRetrieveInvoice \$resultCreateInvoice");
        echo self::createRawLog($resultRetrieveInvoice, "testRetrieveInvoice \$resultRetrieveInvoice");    

        $this->assertTrue($resultRetrieveInvoice->isSuccess);
    }

    public function testPayInvoiceWithBankAccount()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_ach->CreateInvoice($paramsCreateInvoice)->wait();

        $paramsPayInvoiceWithBankAccount = new PayInvoiceWithBankAccountParams();
        $paramsPayInvoiceWithBankAccount->invoiceNumber = $resultCreateInvoice->invoiceNumber;
        $paramsPayInvoiceWithBankAccount->bankAccount->bankName = "First Test Bank";
        $paramsPayInvoiceWithBankAccount->bankAccount->routing = "110000000";
        $paramsPayInvoiceWithBankAccount->bankAccount->account = "1234567890123";
        $paramsPayInvoiceWithBankAccount->bankAccount->achAccountType = AchAccountType::CHECKING;
        $paramsPayInvoiceWithBankAccount->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
        $paramsPayInvoiceWithBankAccount->contactInfo->firstName = "John";
        $paramsPayInvoiceWithBankAccount->contactInfo->lastName = "Doe";

        $resultPayInvoiceWithBankAccount = self::$sparrow_ach->PayInvoiceWithBankAccount($paramsPayInvoiceWithBankAccount)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testPayInvoiceWithBankAccount \$resultCreateInvoice");
        echo self::createRawLog($resultPayInvoiceWithBankAccount, "testPayInvoiceWithBankAccount \$resultPayInvoiceWithBankAccount");    

        $this->assertTrue($resultPayInvoiceWithBankAccount->isSuccess);
    }

    public function testPayInvoiceWithCreditCard()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();

        $paramsPayInvoiceWithCreditCard = new PayInvoiceWithCreditCardParams();
        $paramsPayInvoiceWithCreditCard->invoiceNumber = $resultCreateInvoice->invoiceNumber;
        $paramsPayInvoiceWithCreditCard->creditCard->cardNum = "4111111111111111";
        $paramsPayInvoiceWithCreditCard->creditCard->cardExp = new DateTime("2019-10-21");

        $resultPayInvoiceWithCreditCard = self::$sparrow_creditcard->PayInvoiceWithCreditCard($paramsPayInvoiceWithCreditCard)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testPayInvoiceWithCreditCard \$resultCreateInvoice");
        echo self::createRawLog($resultPayInvoiceWithCreditCard, "testPayInvoiceWithCreditCard \$resultPayInvoiceWithCreditCard");    

        $this->assertTrue($resultPayInvoiceWithCreditCard->isSuccess);
    }

    public function testUpdateInvoice()
    {
        
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::DRAFT;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();

        $paramsUpdateInvoice = new UpdateInvoiceParams();
        $paramsUpdateInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;
        $paramsUpdateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;

        $resultUpdateInvoice = self::$sparrow_creditcard->UpdateInvoice($paramsUpdateInvoice)->wait();

        
        
        echo self::createRawLog($resultCreateInvoice, "testUpdateInvoice \$resultCreateInvoice");
        echo self::createRawLog($resultUpdateInvoice, "testUpdateInvoice \$resultUpdateInvoice");    

        $this->assertTrue($resultUpdateInvoice->isSuccess);
    }

    public function testSimpleRefund()
    {
        
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsSimpleRefund = new SimpleRefundParams();
        $paramsSimpleRefund->transId = $resultSimpleSale->transId;
        $paramsSimpleRefund->amount = 9.99;

        $resultSimpleRefund = self::$sparrow_creditcard->SimpleRefund($paramsSimpleRefund)->wait();

        
        
        echo self::createRawLog($resultSimpleSale, "testSimpleRefund \$resultSimpleSale");
        echo self::createRawLog($resultSimpleRefund, "testSimpleRefund \$resultSimpleRefund");    

        $this->assertTrue($resultSimpleRefund->isSuccess);
    }

    public function testAdvancedRefund()
    {
        
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsAdvancedRefund = new AdvancedRefundParams();
        $paramsAdvancedRefund->transId = $resultSimpleSale->transId;
        $paramsAdvancedRefund->amount = 9.99;

        $resultAdvancedRefund = self::$sparrow_creditcard->AdvancedRefund($paramsAdvancedRefund)->wait();

        
        
        echo self::createRawLog($resultSimpleSale, "testAdvancedRefund \$resultSimpleSale");
        echo self::createRawLog($resultAdvancedRefund, "testAdvancedRefund \$resultAdvancedRefund");    

        $this->assertTrue($resultAdvancedRefund->isSuccess);
    }

    public function testAdvancedVoid()
    {
        
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsAdvancedVoid = new AdvancedVoidParams();
        $paramsAdvancedVoid->transId = $resultSimpleSale->transId;

        $resultAdvancedVoid = self::$sparrow_creditcard->AdvancedVoid($paramsAdvancedVoid)->wait();

        
        
        echo self::createRawLog($resultSimpleSale, "testAdvancedVoid \$resultSimpleSale");
        echo self::createRawLog($resultAdvancedVoid, "testAdvancedVoid \$resultAdvancedVoid");    

        $this->assertTrue($resultAdvancedVoid->isSuccess);
    }

    public function testSimpleVoid()
    {
        
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsSimpleVoid = new SimpleVoidParams();
        $paramsSimpleVoid->transId = $resultSimpleSale->transId;

        $resultSimpleVoid = self::$sparrow_creditcard->SimpleVoid($paramsSimpleVoid)->wait();

        
        
        echo self::createRawLog($resultSimpleSale, "testSimpleVoid \$resultSimpleSale");
        echo self::createRawLog($resultSimpleVoid, "testSimpleVoid \$resultSimpleVoid");    

        $this->assertTrue($resultSimpleVoid->isSuccess);
    }

    public function testAssignPaymentPlanToCustomer()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 9.99;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        $paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
        $paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
        $paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
        $paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];

        $resultAssignPaymentPlanToCustomer = self::$sparrow_creditcard->AssignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();

        
        
        echo self::createRawLog($resultAddCustomer, "testAssignPaymentPlanToCustomer \$resultAddCustomer");
        echo self::createRawLog($resultCreatePaymentPlan, "testAssignPaymentPlanToCustomer \$resultCreatePaymentPlan");
        echo self::createRawLog($resultAssignPaymentPlanToCustomer, "testAssignPaymentPlanToCustomer \$resultAssignPaymentPlanToCustomer");    

        $this->assertTrue($resultAssignPaymentPlanToCustomer->isSuccess);
    }

    public function testCancelPlanAssignment()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 9.99;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        $paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
        $paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
        $paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
        $paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];

        $resultAssignPaymentPlanToCustomer = self::$sparrow_creditcard->AssignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();

        $paramsCancelPlanAssignment = new CancelPlanAssignmentParams();
        $paramsCancelPlanAssignment->assignmentToken = $resultAssignPaymentPlanToCustomer->assignmentToken;

        $resultCancelPlanAssignment = self::$sparrow_creditcard->CancelPlanAssignment($paramsCancelPlanAssignment)->wait();

        
        
        echo self::createRawLog($resultAssignPaymentPlanToCustomer, "testCancelPlanAssignment \$resultAssignPaymentPlanToCustomer");
        echo self::createRawLog($resultAddCustomer, "testCancelPlanAssignment \$resultAddCustomer");
        echo self::createRawLog($resultCreatePaymentPlan, "testCancelPlanAssignment \$resultCreatePaymentPlan");
        echo self::createRawLog($resultCancelPlanAssignment, "testCancelPlanAssignment \$resultCancelPlanAssignment");    

        $this->assertTrue($resultCancelPlanAssignment->isSuccess);
    }

    public function testCreatePaymentPlan()
    {
        
        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 9.99;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        
        
        echo self::createRawLog($resultCreatePaymentPlan, "testCreatePaymentPlan \$resultCreatePaymentPlan");    

        $this->assertTrue($resultCreatePaymentPlan->isSuccess);
    }

    public function testDeletePlan()
    {
        
        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 9.99;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        $paramsDeletePlan = new DeletePlanParams();
        $paramsDeletePlan->token = $resultCreatePaymentPlan->planToken;

        $resultDeletePlan = self::$sparrow_creditcard->DeletePlan($paramsDeletePlan)->wait();

        
        
        echo self::createRawLog($resultCreatePaymentPlan, "testDeletePlan \$resultCreatePaymentPlan");
        echo self::createRawLog($resultDeletePlan, "testDeletePlan \$resultDeletePlan");    

        $this->assertTrue($resultDeletePlan->isSuccess);
    }

    public function testDeleteSequence()
    {
        
        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 9.99;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        $paramsDeleteSequence = new DeleteSequenceParams();
        $paramsDeleteSequence->deleteSequenceStepss[0] = new SequenceStepToDelete();
        $paramsDeleteSequence->deleteSequenceStepss[0]->sequence = 1;
        $paramsDeleteSequence->token = $resultCreatePaymentPlan->planToken;

        $resultDeleteSequence = self::$sparrow_creditcard->DeleteSequence($paramsDeleteSequence)->wait();

        
        
        echo self::createRawLog($resultCreatePaymentPlan, "testDeleteSequence \$resultCreatePaymentPlan");
        echo self::createRawLog($resultDeleteSequence, "testDeleteSequence \$resultDeleteSequence");    

        $this->assertTrue($resultDeleteSequence->isSuccess);
    }

    public function testUpdatePaymentPlanAssignment()
    {
        
        $paramsAddCustomer = new AddCustomerParams();
        $paramsAddCustomer->defaultContactInfo->firstName = "John";
        $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0] = new PaymentType();
        $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
        $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
        $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
        $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

        $resultAddCustomer = self::$sparrow_creditcard->AddCustomer($paramsAddCustomer)->wait();

        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 9.99;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        $paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
        $paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
        $paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
        $paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];

        $resultAssignPaymentPlanToCustomer = self::$sparrow_creditcard->AssignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();

        $paramsUpdatePaymentPlanAssignment = new UpdatePaymentPlanAssignmentParams();
        $paramsUpdatePaymentPlanAssignment->assignmentToken = $resultAssignPaymentPlanToCustomer->assignmentToken;
        $paramsUpdatePaymentPlanAssignment->startDate = new DateTime("2019-10-21");

        $resultUpdatePaymentPlanAssignment = self::$sparrow_creditcard->UpdatePaymentPlanAssignment($paramsUpdatePaymentPlanAssignment)->wait();

        
        
        echo self::createRawLog($resultAssignPaymentPlanToCustomer, "testUpdatePaymentPlanAssignment \$resultAssignPaymentPlanToCustomer");
        echo self::createRawLog($resultAddCustomer, "testUpdatePaymentPlanAssignment \$resultAddCustomer");
        echo self::createRawLog($resultCreatePaymentPlan, "testUpdatePaymentPlanAssignment \$resultCreatePaymentPlan");
        echo self::createRawLog($resultUpdatePaymentPlanAssignment, "testUpdatePaymentPlanAssignment \$resultUpdatePaymentPlanAssignment");    

        $this->assertTrue($resultUpdatePaymentPlanAssignment->isSuccess);
    }

    public function testUpdatePaymentPlan()
    {
        
        $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
        $paramsCreatePaymentPlan->planName = "PaymentPlan1";
        $paramsCreatePaymentPlan->planDesc = "1st Payment Plan";
        $paramsCreatePaymentPlan->startDate = new DateTime("2019-10-21");
        $paramsCreatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsCreatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsCreatePaymentPlan->sequenceStepss[0]->amount = 10.00;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsCreatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsCreatePaymentPlan->sequenceStepss[0]->duration = 12;

        $resultCreatePaymentPlan = self::$sparrow_creditcard->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

        $paramsUpdatePaymentPlan = new UpdatePaymentPlanParams();
        $paramsUpdatePaymentPlan->token = $resultCreatePaymentPlan->planToken;
        $paramsUpdatePaymentPlan->sequenceStepss[0] = new SequenceStep();
        $paramsUpdatePaymentPlan->sequenceStepss[0]->sequence = 1;
        $paramsUpdatePaymentPlan->sequenceStepss[0]->amount = 20.00;
        $paramsUpdatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
        $paramsUpdatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
        $paramsUpdatePaymentPlan->sequenceStepss[0]->duration = 12;
        $paramsUpdatePaymentPlan->sequenceStepss[0]->operationType = OperationType::UPDATESEQUENCE;

        $resultUpdatePaymentPlan = self::$sparrow_creditcard->UpdatePaymentPlan($paramsUpdatePaymentPlan)->wait();

        
        
        echo self::createRawLog($resultCreatePaymentPlan, "testUpdatePaymentPlan \$resultCreatePaymentPlan");
        echo self::createRawLog($resultUpdatePaymentPlan, "testUpdatePaymentPlan \$resultUpdatePaymentPlan");    

        $this->assertTrue($resultUpdatePaymentPlan->isSuccess);
    }

    public function testSimpleOfflineCapture()
    {
        
        $paramsSimpleOfflineCapture = new SimpleOfflineCaptureParams();
        $paramsSimpleOfflineCapture->creditCard->cardNum = "4111111111111111";
        $paramsSimpleOfflineCapture->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleOfflineCapture->amount = 9.99;
        $paramsSimpleOfflineCapture->authCode = "123456";
        $paramsSimpleOfflineCapture->authDate = new DateTime("2019-10-21");

        $resultSimpleOfflineCapture = self::$sparrow_creditcard->SimpleOfflineCapture($paramsSimpleOfflineCapture)->wait();

        
        
        echo self::createRawLog($resultSimpleOfflineCapture, "testSimpleOfflineCapture \$resultSimpleOfflineCapture");    

        $this->assertTrue($resultSimpleOfflineCapture->isSuccess);
    }

    public function testAdvancedCapture()
    {
        
        $paramsSimpleAuthorization = new SimpleAuthorizationParams();
        $paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
        $paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleAuthorization->amount = 9.99;

        $resultSimpleAuthorization = self::$sparrow_creditcard->SimpleAuthorization($paramsSimpleAuthorization)->wait();

        $paramsAdvancedCapture = new AdvancedCaptureParams();
        $paramsAdvancedCapture->transId = $resultSimpleAuthorization->transId;
        $paramsAdvancedCapture->amount = 9.99;

        $resultAdvancedCapture = self::$sparrow_creditcard->AdvancedCapture($paramsAdvancedCapture)->wait();

        
        
        echo self::createRawLog($resultSimpleAuthorization, "testAdvancedCapture \$resultSimpleAuthorization");
        echo self::createRawLog($resultAdvancedCapture, "testAdvancedCapture \$resultAdvancedCapture");    

        $this->assertTrue($resultAdvancedCapture->isSuccess);
    }

    public function testSimpleAuthorization()
    {
        
        $paramsSimpleAuthorization = new SimpleAuthorizationParams();
        $paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
        $paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleAuthorization->amount = 9.99;

        $resultSimpleAuthorization = self::$sparrow_creditcard->SimpleAuthorization($paramsSimpleAuthorization)->wait();

        
        
        echo self::createRawLog($resultSimpleAuthorization, "testSimpleAuthorization \$resultSimpleAuthorization");    

        $this->assertTrue($resultSimpleAuthorization->isSuccess);
    }

    public function testSimpleCapture()
    {
        
        $paramsSimpleAuthorization = new SimpleAuthorizationParams();
        $paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
        $paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleAuthorization->amount = 9.99;

        $resultSimpleAuthorization = self::$sparrow_creditcard->SimpleAuthorization($paramsSimpleAuthorization)->wait();

        $paramsSimpleCapture = new SimpleCaptureParams();
        $paramsSimpleCapture->transId = $resultSimpleAuthorization->transId;
        $paramsSimpleCapture->amount = 9.99;

        $resultSimpleCapture = self::$sparrow_creditcard->SimpleCapture($paramsSimpleCapture)->wait();

        
        
        echo self::createRawLog($resultSimpleAuthorization, "testSimpleCapture \$resultSimpleAuthorization");
        echo self::createRawLog($resultSimpleCapture, "testSimpleCapture \$resultSimpleCapture");    

        $this->assertTrue($resultSimpleCapture->isSuccess);
    }

    public function testAdvancedStarCard()
    {
        
        $paramsAdvancedStarCard = new AdvancedStarCardParams();
        $paramsAdvancedStarCard->cardNum = "4111111111111111";
        $paramsAdvancedStarCard->cardExp = new DateTime("2019-10-21");
        $paramsAdvancedStarCard->amount = 9.99;
        $paramsAdvancedStarCard->CID = "12345678901";

        $resultAdvancedStarCard = self::$sparrow_starcard->AdvancedStarCard($paramsAdvancedStarCard)->wait();

        
        
        echo self::createRawLog($resultAdvancedStarCard, "testAdvancedStarCard \$resultAdvancedStarCard");    

        $this->assertTrue($resultAdvancedStarCard->isSuccess);
    }

    public function testSimpleStarCard()
    {
        
        $paramsSimpleStarCard = new SimpleStarCardParams();
        $paramsSimpleStarCard->cardNum = "4111111111111111";
        $paramsSimpleStarCard->amount = 9.99;
        $paramsSimpleStarCard->CID = "12345678901";

        $resultSimpleStarCard = self::$sparrow_starcard->SimpleStarCard($paramsSimpleStarCard)->wait();

        
        
        echo self::createRawLog($resultSimpleStarCard, "testSimpleStarCard \$resultSimpleStarCard");    

        $this->assertTrue($resultSimpleStarCard->isSuccess);
    }

}
