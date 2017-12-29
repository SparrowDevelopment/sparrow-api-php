<?php
namespace SparrowSamples;

require_once "../vendor/autoload.php";
require_once "../src/Sparrow/SparrowClient.php";
require_once "SparrowResponseSamples.php";

use DateTime;
use Sparrow\SparrowClient;
use Sparrow\SparrowResponse;
use SparrowSamples\SparrowResponseSamples;


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

class SamplesGenerator
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
    
    public function __construct(){
        self::$sparrow_badApiKey = new SparrowClient("BAD_API_KEY");
        self::$sparrow_creditcard = new SparrowClient("CUK5YODHVAZHFBM6KESZO1J4");
        self::$sparrow_ach = new SparrowClient("RZOZ2AMMYF7GX2VF1L05WW1G");
        self::$sparrow_cash = new SparrowClient("23QFJBN8KME0FCTGBEASMLAF");
        self::$sparrow_starcard = new SparrowClient("PNk0xFNbn89ARFjA2Q1Q5tLVtoky5rrw");
        self::$sparrow_ewallet = new SparrowClient("1W53QL0TJLIERXHIQKRXJRTK");
    }
    
    public $log = '';
    
    private function Log(string $text)
    {
        $this->log = $this->log . $text;
        echo $text;
    }
    
    public function generate(){
        
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('ach/advanced-echeck-sale.md', 'AdvancedECheck', $resultAdvancedECheck->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultAdvancedECheck = self::$sparrow->AdvancedECheck($paramsAdvancedECheck)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedECheck,'$resultAdvancedECheck'));

            $this->Log(SparrowResponseSamples::ExitSample('ach/advanced-echeck-sale.md', 'AdvancedECheck', $resultAdvancedECheck->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('ach/advanced-sale.md', 'AdvancedACH', $resultAdvancedACH->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAdvancedACH = new AdvancedACHParams();
$paramsAdvancedACH->bankAccount->bankName = "First Test Bank";
$paramsAdvancedACH->bankAccount->routing = "110000000";
$paramsAdvancedACH->bankAccount->account = "1234567890123";
$paramsAdvancedACH->bankAccount->achAccountType = AchAccountType::CHECKING;
$paramsAdvancedACH->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
$paramsAdvancedACH->amount = 9.99;
$paramsAdvancedACH->contactInfo->firstName = "John";
$paramsAdvancedACH->contactInfo->lastName = "Doe";

$resultAdvancedACH = self::$sparrow->AdvancedACH($paramsAdvancedACH)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedACH,'$resultAdvancedACH'));

            $this->Log(SparrowResponseSamples::ExitSample('ach/advanced-sale.md', 'AdvancedACH', $resultAdvancedACH->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('ach/simple-ach.md', 'SimpleACH', $resultSimpleACH->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleACH = new SimpleACHParams();
$paramsSimpleACH->bankAccount->bankName = "First Test Bank";
$paramsSimpleACH->bankAccount->routing = "110000000";
$paramsSimpleACH->bankAccount->account = "1234567890123";
$paramsSimpleACH->bankAccount->achAccountType = AchAccountType::CHECKING;
$paramsSimpleACH->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
$paramsSimpleACH->amount = 9.99;
$paramsSimpleACH->contactInfo->firstName = "John";
$paramsSimpleACH->contactInfo->lastName = "Doe";

$resultSimpleACH = self::$sparrow->SimpleACH($paramsSimpleACH)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleACH,'$resultSimpleACH'));

            $this->Log(SparrowResponseSamples::ExitSample('ach/simple-ach.md', 'SimpleACH', $resultSimpleACH->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('ach/simple-echeck.md', 'SimpleECheck', $resultSimpleECheck->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultSimpleECheck = self::$sparrow->SimpleECheck($paramsSimpleECheck)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleECheck,'$resultSimpleECheck'));

            $this->Log(SparrowResponseSamples::ExitSample('ach/simple-echeck.md', 'SimpleECheck', $resultSimpleECheck->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('airline-passenger-sale/passenger-sale.md', 'PassengerSale', $resultPassengerSale->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultPassengerSale = self::$sparrow->PassengerSale($paramsPassengerSale)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultPassengerSale,'$resultPassengerSale'));

            $this->Log(SparrowResponseSamples::ExitSample('airline-passenger-sale/passenger-sale.md', 'PassengerSale', $resultPassengerSale->isSuccess));
        }
    
        if(!!true)
        {
        $paramsRetrieveCardBalance = new RetrieveCardBalanceParams();
        $paramsRetrieveCardBalance->cardNum = "4111111111111111";

        $resultRetrieveCardBalance = self::$sparrow_creditcard->RetrieveCardBalance($paramsRetrieveCardBalance)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('balance-inquiry/check-balance.md', 'RetrieveCardBalance', $resultRetrieveCardBalance->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsRetrieveCardBalance = new RetrieveCardBalanceParams();
$paramsRetrieveCardBalance->cardNum = "4111111111111111";

$resultRetrieveCardBalance = self::$sparrow->RetrieveCardBalance($paramsRetrieveCardBalance)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultRetrieveCardBalance,'$resultRetrieveCardBalance'));

            $this->Log(SparrowResponseSamples::ExitSample('balance-inquiry/check-balance.md', 'RetrieveCardBalance', $resultRetrieveCardBalance->isSuccess));
        }
    
        if(!!true)
        {
        $paramsVerifyAccount = new VerifyAccountParams();
        $paramsVerifyAccount->creditCard->cardNum = "4111111111111111";
        $paramsVerifyAccount->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsVerifyAccount->amount = 9.99;

        $resultVerifyAccount = self::$sparrow_creditcard->VerifyAccount($paramsVerifyAccount)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('cc-verification/card-verification.md', 'VerifyAccount', $resultVerifyAccount->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsVerifyAccount = new VerifyAccountParams();
$paramsVerifyAccount->creditCard->cardNum = "4111111111111111";
$paramsVerifyAccount->creditCard->cardExp = new DateTime("2019-10-21");
$paramsVerifyAccount->amount = 9.99;

$resultVerifyAccount = self::$sparrow->VerifyAccount($paramsVerifyAccount)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultVerifyAccount,'$resultVerifyAccount'));

            $this->Log(SparrowResponseSamples::ExitSample('cc-verification/card-verification.md', 'VerifyAccount', $resultVerifyAccount->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('chargeback/mark-chargeback.md', 'MarkSuccessfulTransactionAsChargeback', $resultMarkSuccessfulTransactionAsChargeback->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsMarkSuccessfulTransactionAsChargeback = new MarkSuccessfulTransactionAsChargebackParams();
$paramsMarkSuccessfulTransactionAsChargeback->transId = $resultSimpleSale->transId;
$paramsMarkSuccessfulTransactionAsChargeback->reason = "Testing for Success";

$resultMarkSuccessfulTransactionAsChargeback = self::$sparrow->MarkSuccessfulTransactionAsChargeback($paramsMarkSuccessfulTransactionAsChargeback)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleSale,'$resultSimpleSale'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultMarkSuccessfulTransactionAsChargeback,'$resultMarkSuccessfulTransactionAsChargeback'));

            $this->Log(SparrowResponseSamples::ExitSample('chargeback/mark-chargeback.md', 'MarkSuccessfulTransactionAsChargeback', $resultMarkSuccessfulTransactionAsChargeback->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleCredit = new SimpleCreditParams();
        $paramsSimpleCredit->creditCard->cardNum = "4111111111111111";
        $paramsSimpleCredit->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleCredit->amount = 9.99;

        $resultSimpleCredit = self::$sparrow_creditcard->SimpleCredit($paramsSimpleCredit)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('creating-a-credit/simple-credit.md', 'SimpleCredit', $resultSimpleCredit->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleCredit = new SimpleCreditParams();
$paramsSimpleCredit->creditCard->cardNum = "4111111111111111";
$paramsSimpleCredit->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleCredit->amount = 9.99;

$resultSimpleCredit = self::$sparrow->SimpleCredit($paramsSimpleCredit)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleCredit,'$resultSimpleCredit'));

            $this->Log(SparrowResponseSamples::ExitSample('creating-a-credit/simple-credit.md', 'SimpleCredit', $resultSimpleCredit->isSuccess));
        }
    
        if(!!true)
        {
        $paramsAdvancedSale = new AdvancedSaleParams();
        $paramsAdvancedSale->creditCard->cardNum = "4111111111111111";
        $paramsAdvancedSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsAdvancedSale->amount = 9.99;

        $resultAdvancedSale = self::$sparrow_creditcard->AdvancedSale($paramsAdvancedSale)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('creating-a-sale/advanced-sale.md', 'AdvancedSale', $resultAdvancedSale->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAdvancedSale = new AdvancedSaleParams();
$paramsAdvancedSale->creditCard->cardNum = "4111111111111111";
$paramsAdvancedSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsAdvancedSale->amount = 9.99;

$resultAdvancedSale = self::$sparrow->AdvancedSale($paramsAdvancedSale)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedSale,'$resultAdvancedSale'));

            $this->Log(SparrowResponseSamples::ExitSample('creating-a-sale/advanced-sale.md', 'AdvancedSale', $resultAdvancedSale->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('creating-a-sale/simple-sale.md', 'SimpleSale', $resultSimpleSale->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleSale,'$resultSimpleSale'));

            $this->Log(SparrowResponseSamples::ExitSample('creating-a-sale/simple-sale.md', 'SimpleSale', $resultSimpleSale->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/add-payment-type.md', 'AddPaymentTypesToCustomer', $resultAddPaymentTypesToCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

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

$resultAddPaymentTypesToCustomer = self::$sparrow->AddPaymentTypesToCustomer($paramsAddPaymentTypesToCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddPaymentTypesToCustomer,'$resultAddPaymentTypesToCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/add-payment-type.md', 'AddPaymentTypesToCustomer', $resultAddPaymentTypesToCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/adding-a-customer.md', 'AddCustomer', $resultAddCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/adding-a-customer.md', 'AddCustomer', $resultAddCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/delete-customer.md', 'DeleteDataVaultCustomer', $resultDeleteDataVaultCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsDeleteDataVaultCustomer = new DeleteDataVaultCustomerParams();
$paramsDeleteDataVaultCustomer->token = $resultAddCustomer->customerToken;

$resultDeleteDataVaultCustomer = self::$sparrow->DeleteDataVaultCustomer($paramsDeleteDataVaultCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultDeleteDataVaultCustomer,'$resultDeleteDataVaultCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/delete-customer.md', 'DeleteDataVaultCustomer', $resultDeleteDataVaultCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/delete-payment-type.md', 'DeletePaymentType', $resultDeletePaymentType->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsDeletePaymentType = new DeletePaymentTypeParams();
$paramsDeletePaymentType->token = $resultAddCustomer->customerToken;
$paramsDeletePaymentType->paymentTypeToDeletes[0] = new PaymentTypeToDelete();
$paramsDeletePaymentType->paymentTypeToDeletes[0]->token = $resultAddCustomer->paymentTokens[0];

$resultDeletePaymentType = self::$sparrow->DeletePaymentType($paramsDeletePaymentType)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultDeletePaymentType,'$resultDeletePaymentType'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/delete-payment-type.md', 'DeletePaymentType', $resultDeletePaymentType->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/get-customer.md', 'RetrieveCustomer', $resultRetrieveCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsRetrieveCustomer = new RetrieveCustomerParams();
$paramsRetrieveCustomer->token = $resultAddCustomer->customerToken;

$resultRetrieveCustomer = self::$sparrow->RetrieveCustomer($paramsRetrieveCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultRetrieveCustomer,'$resultRetrieveCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/get-customer.md', 'RetrieveCustomer', $resultRetrieveCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/get-payment-type.md', 'RetrievePaymentType', $resultRetrievePaymentType->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsRetrievePaymentType = new RetrievePaymentTypeParams();
$paramsRetrievePaymentType->token = $resultAddCustomer->paymentTokens[0];

$resultRetrievePaymentType = self::$sparrow->RetrievePaymentType($paramsRetrievePaymentType)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultRetrievePaymentType,'$resultRetrievePaymentType'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/get-payment-type.md', 'RetrievePaymentType', $resultRetrievePaymentType->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/update-payment-type.md', 'UpdateCustomer', $resultUpdateCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsUpdateCustomer = new UpdateCustomerParams();
$paramsUpdateCustomer->token = $resultAddCustomer->customerToken;

$resultUpdateCustomer = self::$sparrow->UpdateCustomer($paramsUpdateCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultUpdateCustomer,'$resultUpdateCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/update-payment-type.md', 'UpdateCustomer', $resultUpdateCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('datavault/update-payment-types.md', 'UpdatePaymentType', $resultUpdatePaymentType->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsUpdatePaymentType = new UpdatePaymentTypeParams();
$paramsUpdatePaymentType->token = $resultAddCustomer->customerToken;
$paramsUpdatePaymentType->paymentTypeToUpdates[0] = new PaymentTypeToUpdate();
$paramsUpdatePaymentType->paymentTypeToUpdates[0]->token = $resultAddCustomer->paymentTokens[0];
$paramsUpdatePaymentType->paymentTypeToUpdates[0]->paymentType->payType = PayType::CREDITCARD;
$paramsUpdatePaymentType->paymentTypeToUpdates[0]->paymentType->creditCard->cardNum = "4111111111111111";
$paramsUpdatePaymentType->paymentTypeToUpdates[0]->paymentType->creditCard->cardExp = new DateTime("2019-10-21");

$resultUpdatePaymentType = self::$sparrow->UpdatePaymentType($paramsUpdatePaymentType)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultUpdatePaymentType,'$resultUpdatePaymentType'));

            $this->Log(SparrowResponseSamples::ExitSample('datavault/update-payment-types.md', 'UpdatePaymentType', $resultUpdatePaymentType->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('decrypt-custom-field/decrypt.md', 'DecryptCustomFields', $resultDecryptCustomFields->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

$paramsDecryptCustomFields = new DecryptCustomFieldsParams();
$paramsDecryptCustomFields->fieldName = "customField1";
$paramsDecryptCustomFields->token = $resultAddCustomer->customerToken;

$resultDecryptCustomFields = self::$sparrow->DecryptCustomFields($paramsDecryptCustomFields)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultDecryptCustomFields,'$resultDecryptCustomFields'));

            $this->Log(SparrowResponseSamples::ExitSample('decrypt-custom-field/decrypt.md', 'DecryptCustomFields', $resultDecryptCustomFields->isSuccess));
        }
    
        if(!!true)
        {
        $paramsEWalletSimpleCredit = new EWalletSimpleCreditParams();
        $paramsEWalletSimpleCredit->ewallet->ewalletAccount = "user@example.com";
        $paramsEWalletSimpleCredit->amount = 9.99;

        $resultEWalletSimpleCredit = self::$sparrow_ewallet->EWalletSimpleCredit($paramsEWalletSimpleCredit)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('ewallet/ewallet-credit.md', 'EWalletSimpleCredit', $resultEWalletSimpleCredit->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsEWalletSimpleCredit = new EWalletSimpleCreditParams();
$paramsEWalletSimpleCredit->ewallet->ewalletAccount = "user@example.com";
$paramsEWalletSimpleCredit->amount = 9.99;

$resultEWalletSimpleCredit = self::$sparrow->EWalletSimpleCredit($paramsEWalletSimpleCredit)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultEWalletSimpleCredit,'$resultEWalletSimpleCredit'));

            $this->Log(SparrowResponseSamples::ExitSample('ewallet/ewallet-credit.md', 'EWalletSimpleCredit', $resultEWalletSimpleCredit->isSuccess));
        }
    
        if(!!true)
        {
        $paramsAdvancedFiservSale = new AdvancedFiservSaleParams();
        $paramsAdvancedFiservSale->creditCard->cardNum = "4111111111111111";
        $paramsAdvancedFiservSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsAdvancedFiservSale->amount = 9.99;

        $resultAdvancedFiservSale = self::$sparrow_creditcard->AdvancedFiservSale($paramsAdvancedFiservSale)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('fiserv/fiserv-advanced.md', 'AdvancedFiservSale', $resultAdvancedFiservSale->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAdvancedFiservSale = new AdvancedFiservSaleParams();
$paramsAdvancedFiservSale->creditCard->cardNum = "4111111111111111";
$paramsAdvancedFiservSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsAdvancedFiservSale->amount = 9.99;

$resultAdvancedFiservSale = self::$sparrow->AdvancedFiservSale($paramsAdvancedFiservSale)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedFiservSale,'$resultAdvancedFiservSale'));

            $this->Log(SparrowResponseSamples::ExitSample('fiserv/fiserv-advanced.md', 'AdvancedFiservSale', $resultAdvancedFiservSale->isSuccess));
        }
    
        if(!!true)
        {
        $paramsFiservSimpleSale = new FiservSimpleSaleParams();
        $paramsFiservSimpleSale->cardNum = "4111111111111111";
        $paramsFiservSimpleSale->cardExp = new DateTime("2019-10-21");
        $paramsFiservSimpleSale->amount = 9.99;

        $resultFiservSimpleSale = self::$sparrow_creditcard->FiservSimpleSale($paramsFiservSimpleSale)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('fiserv/fiserv-simple.md', 'FiservSimpleSale', $resultFiservSimpleSale->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsFiservSimpleSale = new FiservSimpleSaleParams();
$paramsFiservSimpleSale->cardNum = "4111111111111111";
$paramsFiservSimpleSale->cardExp = new DateTime("2019-10-21");
$paramsFiservSimpleSale->amount = 9.99;

$resultFiservSimpleSale = self::$sparrow->FiservSimpleSale($paramsFiservSimpleSale)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultFiservSimpleSale,'$resultFiservSimpleSale'));

            $this->Log(SparrowResponseSamples::ExitSample('fiserv/fiserv-simple.md', 'FiservSimpleSale', $resultFiservSimpleSale->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/cancel-inv-customer.md', 'CancelInvoiceByCustomer', $resultCancelInvoiceByCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsCancelInvoiceByCustomer = new CancelInvoiceByCustomerParams();
$paramsCancelInvoiceByCustomer->invoiceNumber = $resultCreateInvoice->invoiceNumber;
$paramsCancelInvoiceByCustomer->invoiceStatusReason = "Testing";

$resultCancelInvoiceByCustomer = self::$sparrow->CancelInvoiceByCustomer($paramsCancelInvoiceByCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCancelInvoiceByCustomer,'$resultCancelInvoiceByCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/cancel-inv-customer.md', 'CancelInvoiceByCustomer', $resultCancelInvoiceByCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/cancel-invoice.md', 'CancelInvoice', $resultCancelInvoice->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsCancelInvoice = new CancelInvoiceParams();
$paramsCancelInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;
$paramsCancelInvoice->invoiceStatusReason = "Testing";

$resultCancelInvoice = self::$sparrow->CancelInvoice($paramsCancelInvoice)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCancelInvoice,'$resultCancelInvoice'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/cancel-invoice.md', 'CancelInvoice', $resultCancelInvoice->isSuccess));
        }
    
        if(!!true)
        {
        $paramsCreateInvoice = new CreateInvoiceParams();
        $paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
        $paramsCreateInvoice->currency = "USD";
        $paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
        $paramsCreateInvoice->invoiceAmount = 10.00;

        $resultCreateInvoice = self::$sparrow_creditcard->CreateInvoice($paramsCreateInvoice)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/create-merchant-invoice.md', 'CreateInvoice', $resultCreateInvoice->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/create-merchant-invoice.md', 'CreateInvoice', $resultCreateInvoice->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/get-invoice.md', 'RetrieveInvoice', $resultRetrieveInvoice->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsRetrieveInvoice = new RetrieveInvoiceParams();
$paramsRetrieveInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;

$resultRetrieveInvoice = self::$sparrow->RetrieveInvoice($paramsRetrieveInvoice)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultRetrieveInvoice,'$resultRetrieveInvoice'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/get-invoice.md', 'RetrieveInvoice', $resultRetrieveInvoice->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/pay-inv-ach.md', 'PayInvoiceWithBankAccount', $resultPayInvoiceWithBankAccount->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsPayInvoiceWithBankAccount = new PayInvoiceWithBankAccountParams();
$paramsPayInvoiceWithBankAccount->invoiceNumber = $resultCreateInvoice->invoiceNumber;
$paramsPayInvoiceWithBankAccount->bankAccount->bankName = "First Test Bank";
$paramsPayInvoiceWithBankAccount->bankAccount->routing = "110000000";
$paramsPayInvoiceWithBankAccount->bankAccount->account = "1234567890123";
$paramsPayInvoiceWithBankAccount->bankAccount->achAccountType = AchAccountType::CHECKING;
$paramsPayInvoiceWithBankAccount->bankAccount->achAccountSubType = AchAccountSubType::PERSONAL;
$paramsPayInvoiceWithBankAccount->contactInfo->firstName = "John";
$paramsPayInvoiceWithBankAccount->contactInfo->lastName = "Doe";

$resultPayInvoiceWithBankAccount = self::$sparrow->PayInvoiceWithBankAccount($paramsPayInvoiceWithBankAccount)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultPayInvoiceWithBankAccount,'$resultPayInvoiceWithBankAccount'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/pay-inv-ach.md', 'PayInvoiceWithBankAccount', $resultPayInvoiceWithBankAccount->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/pay-inv-cc.md', 'PayInvoiceWithCreditCard', $resultPayInvoiceWithCreditCard->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsPayInvoiceWithCreditCard = new PayInvoiceWithCreditCardParams();
$paramsPayInvoiceWithCreditCard->invoiceNumber = $resultCreateInvoice->invoiceNumber;
$paramsPayInvoiceWithCreditCard->creditCard->cardNum = "4111111111111111";
$paramsPayInvoiceWithCreditCard->creditCard->cardExp = new DateTime("2019-10-21");

$resultPayInvoiceWithCreditCard = self::$sparrow->PayInvoiceWithCreditCard($paramsPayInvoiceWithCreditCard)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultPayInvoiceWithCreditCard,'$resultPayInvoiceWithCreditCard'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/pay-inv-cc.md', 'PayInvoiceWithCreditCard', $resultPayInvoiceWithCreditCard->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('invoicing/update-invoice.md', 'UpdateInvoice', $resultUpdateInvoice->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::DRAFT;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsUpdateInvoice = new UpdateInvoiceParams();
$paramsUpdateInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;
$paramsUpdateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;

$resultUpdateInvoice = self::$sparrow->UpdateInvoice($paramsUpdateInvoice)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreateInvoice,'$resultCreateInvoice'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultUpdateInvoice,'$resultUpdateInvoice'));

            $this->Log(SparrowResponseSamples::ExitSample('invoicing/update-invoice.md', 'UpdateInvoice', $resultUpdateInvoice->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('issuing-a-refund/Simple-refund.md', 'SimpleRefund', $resultSimpleRefund->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsSimpleRefund = new SimpleRefundParams();
$paramsSimpleRefund->transId = $resultSimpleSale->transId;
$paramsSimpleRefund->amount = 9.99;

$resultSimpleRefund = self::$sparrow->SimpleRefund($paramsSimpleRefund)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleSale,'$resultSimpleSale'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleRefund,'$resultSimpleRefund'));

            $this->Log(SparrowResponseSamples::ExitSample('issuing-a-refund/Simple-refund.md', 'SimpleRefund', $resultSimpleRefund->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('issuing-a-refund/advanced-refund.md', 'AdvancedRefund', $resultAdvancedRefund->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsAdvancedRefund = new AdvancedRefundParams();
$paramsAdvancedRefund->transId = $resultSimpleSale->transId;
$paramsAdvancedRefund->amount = 9.99;

$resultAdvancedRefund = self::$sparrow->AdvancedRefund($paramsAdvancedRefund)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleSale,'$resultSimpleSale'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedRefund,'$resultAdvancedRefund'));

            $this->Log(SparrowResponseSamples::ExitSample('issuing-a-refund/advanced-refund.md', 'AdvancedRefund', $resultAdvancedRefund->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsAdvancedVoid = new AdvancedVoidParams();
        $paramsAdvancedVoid->transId = $resultSimpleSale->transId;

        $resultAdvancedVoid = self::$sparrow_creditcard->AdvancedVoid($paramsAdvancedVoid)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('issuing-a-void/advanced-void.md', 'AdvancedVoid', $resultAdvancedVoid->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsAdvancedVoid = new AdvancedVoidParams();
$paramsAdvancedVoid->transId = $resultSimpleSale->transId;

$resultAdvancedVoid = self::$sparrow->AdvancedVoid($paramsAdvancedVoid)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleSale,'$resultSimpleSale'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedVoid,'$resultAdvancedVoid'));

            $this->Log(SparrowResponseSamples::ExitSample('issuing-a-void/advanced-void.md', 'AdvancedVoid', $resultAdvancedVoid->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleSale = new SimpleSaleParams();
        $paramsSimpleSale->creditCard->cardNum = "4111111111111111";
        $paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleSale->amount = 9.99;

        $resultSimpleSale = self::$sparrow_creditcard->SimpleSale($paramsSimpleSale)->wait();

        $paramsSimpleVoid = new SimpleVoidParams();
        $paramsSimpleVoid->transId = $resultSimpleSale->transId;

        $resultSimpleVoid = self::$sparrow_creditcard->SimpleVoid($paramsSimpleVoid)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('issuing-a-void/simple-void.md', 'SimpleVoid', $resultSimpleVoid->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsSimpleVoid = new SimpleVoidParams();
$paramsSimpleVoid->transId = $resultSimpleSale->transId;

$resultSimpleVoid = self::$sparrow->SimpleVoid($paramsSimpleVoid)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleSale,'$resultSimpleSale'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleVoid,'$resultSimpleVoid'));

            $this->Log(SparrowResponseSamples::ExitSample('issuing-a-void/simple-void.md', 'SimpleVoid', $resultSimpleVoid->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/assign-payment-plan.md', 'AssignPaymentPlanToCustomer', $resultAssignPaymentPlanToCustomer->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

$paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
$paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
$paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
$paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];

$resultAssignPaymentPlanToCustomer = self::$sparrow->AssignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAssignPaymentPlanToCustomer,'$resultAssignPaymentPlanToCustomer'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/assign-payment-plan.md', 'AssignPaymentPlanToCustomer', $resultAssignPaymentPlanToCustomer->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/cancel-plan-assignment.md', 'CancelPlanAssignment', $resultCancelPlanAssignment->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

$paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
$paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
$paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
$paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];

$resultAssignPaymentPlanToCustomer = self::$sparrow->AssignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();

$paramsCancelPlanAssignment = new CancelPlanAssignmentParams();
$paramsCancelPlanAssignment->assignmentToken = $resultAssignPaymentPlanToCustomer->assignmentToken;

$resultCancelPlanAssignment = self::$sparrow->CancelPlanAssignment($paramsCancelPlanAssignment)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAssignPaymentPlanToCustomer,'$resultAssignPaymentPlanToCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCancelPlanAssignment,'$resultCancelPlanAssignment'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/cancel-plan-assignment.md', 'CancelPlanAssignment', $resultCancelPlanAssignment->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/create-plan.md', 'CreatePaymentPlan', $resultCreatePaymentPlan->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/create-plan.md', 'CreatePaymentPlan', $resultCreatePaymentPlan->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/delete-plan.md', 'DeletePlan', $resultDeletePlan->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

$paramsDeletePlan = new DeletePlanParams();
$paramsDeletePlan->token = $resultCreatePaymentPlan->planToken;

$resultDeletePlan = self::$sparrow->DeletePlan($paramsDeletePlan)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultDeletePlan,'$resultDeletePlan'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/delete-plan.md', 'DeletePlan', $resultDeletePlan->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/delete-sequence.md', 'DeleteSequence', $resultDeleteSequence->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

$paramsDeleteSequence = new DeleteSequenceParams();
$paramsDeleteSequence->deleteSequenceStepss[0] = new SequenceStepToDelete();
$paramsDeleteSequence->deleteSequenceStepss[0]->sequence = 1;
$paramsDeleteSequence->token = $resultCreatePaymentPlan->planToken;

$resultDeleteSequence = self::$sparrow->DeleteSequence($paramsDeleteSequence)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultDeleteSequence,'$resultDeleteSequence'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/delete-sequence.md', 'DeleteSequence', $resultDeleteSequence->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/update-plan-assignment.md', 'UpdatePaymentPlanAssignment', $resultUpdatePaymentPlanAssignment->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAddCustomer = new AddCustomerParams();
$paramsAddCustomer->defaultContactInfo->firstName = "John";
$paramsAddCustomer->defaultContactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0] = new PaymentType();
$paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
$paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
$paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
$paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime("2019-10-21");

$resultAddCustomer = self::$sparrow->AddCustomer($paramsAddCustomer)->wait();

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

$paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
$paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
$paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
$paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];

$resultAssignPaymentPlanToCustomer = self::$sparrow->AssignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();

$paramsUpdatePaymentPlanAssignment = new UpdatePaymentPlanAssignmentParams();
$paramsUpdatePaymentPlanAssignment->assignmentToken = $resultAssignPaymentPlanToCustomer->assignmentToken;
$paramsUpdatePaymentPlanAssignment->startDate = new DateTime("2019-10-21");

$resultUpdatePaymentPlanAssignment = self::$sparrow->UpdatePaymentPlanAssignment($paramsUpdatePaymentPlanAssignment)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAssignPaymentPlanToCustomer,'$resultAssignPaymentPlanToCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAddCustomer,'$resultAddCustomer'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultUpdatePaymentPlanAssignment,'$resultUpdatePaymentPlanAssignment'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/update-plan-assignment.md', 'UpdatePaymentPlanAssignment', $resultUpdatePaymentPlanAssignment->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('payment-plans/update-plan.md', 'UpdatePaymentPlan', $resultUpdatePaymentPlan->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

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

$resultCreatePaymentPlan = self::$sparrow->CreatePaymentPlan($paramsCreatePaymentPlan)->wait();

$paramsUpdatePaymentPlan = new UpdatePaymentPlanParams();
$paramsUpdatePaymentPlan->token = $resultCreatePaymentPlan->planToken;
$paramsUpdatePaymentPlan->sequenceStepss[0] = new SequenceStep();
$paramsUpdatePaymentPlan->sequenceStepss[0]->sequence = 1;
$paramsUpdatePaymentPlan->sequenceStepss[0]->amount = 20.00;
$paramsUpdatePaymentPlan->sequenceStepss[0]->scheduleType = ScheduleType::MONTHLY;
$paramsUpdatePaymentPlan->sequenceStepss[0]->scheduleDay = 5;
$paramsUpdatePaymentPlan->sequenceStepss[0]->duration = 12;
$paramsUpdatePaymentPlan->sequenceStepss[0]->operationType = OperationType::UPDATESEQUENCE;

$resultUpdatePaymentPlan = self::$sparrow->UpdatePaymentPlan($paramsUpdatePaymentPlan)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultCreatePaymentPlan,'$resultCreatePaymentPlan'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultUpdatePaymentPlan,'$resultUpdatePaymentPlan'));

            $this->Log(SparrowResponseSamples::ExitSample('payment-plans/update-plan.md', 'UpdatePaymentPlan', $resultUpdatePaymentPlan->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleOfflineCapture = new SimpleOfflineCaptureParams();
        $paramsSimpleOfflineCapture->creditCard->cardNum = "4111111111111111";
        $paramsSimpleOfflineCapture->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleOfflineCapture->amount = 9.99;
        $paramsSimpleOfflineCapture->authCode = "123456";
        $paramsSimpleOfflineCapture->authDate = new DateTime("2019-10-21");

        $resultSimpleOfflineCapture = self::$sparrow_creditcard->SimpleOfflineCapture($paramsSimpleOfflineCapture)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('separate-auth-capture/Offline-Capture.md', 'SimpleOfflineCapture', $resultSimpleOfflineCapture->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleOfflineCapture = new SimpleOfflineCaptureParams();
$paramsSimpleOfflineCapture->creditCard->cardNum = "4111111111111111";
$paramsSimpleOfflineCapture->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleOfflineCapture->amount = 9.99;
$paramsSimpleOfflineCapture->authCode = "123456";
$paramsSimpleOfflineCapture->authDate = new DateTime("2019-10-21");

$resultSimpleOfflineCapture = self::$sparrow->SimpleOfflineCapture($paramsSimpleOfflineCapture)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleOfflineCapture,'$resultSimpleOfflineCapture'));

            $this->Log(SparrowResponseSamples::ExitSample('separate-auth-capture/Offline-Capture.md', 'SimpleOfflineCapture', $resultSimpleOfflineCapture->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('separate-auth-capture/advanced-capture.md', 'AdvancedCapture', $resultAdvancedCapture->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleAuthorization = new SimpleAuthorizationParams();
$paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
$paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleAuthorization->amount = 9.99;

$resultSimpleAuthorization = self::$sparrow->SimpleAuthorization($paramsSimpleAuthorization)->wait();

$paramsAdvancedCapture = new AdvancedCaptureParams();
$paramsAdvancedCapture->transId = $resultSimpleAuthorization->transId;
$paramsAdvancedCapture->amount = 9.99;

$resultAdvancedCapture = self::$sparrow->AdvancedCapture($paramsAdvancedCapture)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleAuthorization,'$resultSimpleAuthorization'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedCapture,'$resultAdvancedCapture'));

            $this->Log(SparrowResponseSamples::ExitSample('separate-auth-capture/advanced-capture.md', 'AdvancedCapture', $resultAdvancedCapture->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleAuthorization = new SimpleAuthorizationParams();
        $paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
        $paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
        $paramsSimpleAuthorization->amount = 9.99;

        $resultSimpleAuthorization = self::$sparrow_creditcard->SimpleAuthorization($paramsSimpleAuthorization)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('separate-auth-capture/simple-auth.md', 'SimpleAuthorization', $resultSimpleAuthorization->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleAuthorization = new SimpleAuthorizationParams();
$paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
$paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleAuthorization->amount = 9.99;

$resultSimpleAuthorization = self::$sparrow->SimpleAuthorization($paramsSimpleAuthorization)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleAuthorization,'$resultSimpleAuthorization'));

            $this->Log(SparrowResponseSamples::ExitSample('separate-auth-capture/simple-auth.md', 'SimpleAuthorization', $resultSimpleAuthorization->isSuccess));
        }
    
        if(!!true)
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


            $this->Log(SparrowResponseSamples::EnterSample('separate-auth-capture/simple-capture.md', 'SimpleCapture', $resultSimpleCapture->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleAuthorization = new SimpleAuthorizationParams();
$paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
$paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleAuthorization->amount = 9.99;

$resultSimpleAuthorization = self::$sparrow->SimpleAuthorization($paramsSimpleAuthorization)->wait();

$paramsSimpleCapture = new SimpleCaptureParams();
$paramsSimpleCapture->transId = $resultSimpleAuthorization->transId;
$paramsSimpleCapture->amount = 9.99;

$resultSimpleCapture = self::$sparrow->SimpleCapture($paramsSimpleCapture)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleAuthorization,'$resultSimpleAuthorization'));
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleCapture,'$resultSimpleCapture'));

            $this->Log(SparrowResponseSamples::ExitSample('separate-auth-capture/simple-capture.md', 'SimpleCapture', $resultSimpleCapture->isSuccess));
        }
    
        if(!!true)
        {
        $paramsAdvancedStarCard = new AdvancedStarCardParams();
        $paramsAdvancedStarCard->cardNum = "4111111111111111";
        $paramsAdvancedStarCard->cardExp = new DateTime("2019-10-21");
        $paramsAdvancedStarCard->amount = 9.99;
        $paramsAdvancedStarCard->CID = "12345678901";

        $resultAdvancedStarCard = self::$sparrow_starcard->AdvancedStarCard($paramsAdvancedStarCard)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('starcard/advanced-starcard.md', 'AdvancedStarCard', $resultAdvancedStarCard->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsAdvancedStarCard = new AdvancedStarCardParams();
$paramsAdvancedStarCard->cardNum = "4111111111111111";
$paramsAdvancedStarCard->cardExp = new DateTime("2019-10-21");
$paramsAdvancedStarCard->amount = 9.99;
$paramsAdvancedStarCard->CID = "12345678901";

$resultAdvancedStarCard = self::$sparrow->AdvancedStarCard($paramsAdvancedStarCard)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultAdvancedStarCard,'$resultAdvancedStarCard'));

            $this->Log(SparrowResponseSamples::ExitSample('starcard/advanced-starcard.md', 'AdvancedStarCard', $resultAdvancedStarCard->isSuccess));
        }
    
        if(!!true)
        {
        $paramsSimpleStarCard = new SimpleStarCardParams();
        $paramsSimpleStarCard->cardNum = "4111111111111111";
        $paramsSimpleStarCard->amount = 9.99;
        $paramsSimpleStarCard->CID = "12345678901";

        $resultSimpleStarCard = self::$sparrow_starcard->SimpleStarCard($paramsSimpleStarCard)->wait();


            $this->Log(SparrowResponseSamples::EnterSample('starcard/simple-starcard.md', 'SimpleStarCard', $resultSimpleStarCard->isSuccess));
            
            $this->Log(SparrowResponseSamples::CreateCodeSample(<<<'EOD'

$paramsSimpleStarCard = new SimpleStarCardParams();
$paramsSimpleStarCard->cardNum = "4111111111111111";
$paramsSimpleStarCard->amount = 9.99;
$paramsSimpleStarCard->CID = "12345678901";

$resultSimpleStarCard = self::$sparrow->SimpleStarCard($paramsSimpleStarCard)->wait();

EOD
));
            
            $this->Log(SparrowResponseSamples::CreateResponseDemo($resultSimpleStarCard,'$resultSimpleStarCard'));

            $this->Log(SparrowResponseSamples::ExitSample('starcard/simple-starcard.md', 'SimpleStarCard', $resultSimpleStarCard->isSuccess));
        }
    
    }
}
