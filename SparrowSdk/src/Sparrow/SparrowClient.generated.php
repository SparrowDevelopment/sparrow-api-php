<?php
namespace Sparrow;

require_once "Helpers.php";

use DateTime;

// --- Enums ---

class AchAccountType{
    
    const CHECKING = "checking";
    const SAVINGS = "savings";
}


class AchAccountSubType{
    
    const BUSINESS = "business";
    const PERSONAL = "personal";
}


class StopOverCode{
    
    const SPACE = " ";
    const O = "O";
    const X = "X";
}


class AuthCharIndicator{
    
    const SPACE = " ";
    const A = "A";
    const E = "E";
    const F = "F";
    const I = "I";
    const C = "C";
    const K = "K";
    const M = "M";
    const N = "N";
    const P = "P";
    const R = "R";
    const S = "S";
    const T = "T";
    const U = "U";
    const V = "V";
    const W = "W";
}


class PayType{
    
    const CREDITCARD = "creditcard";
    const CHECK = "check";
    const ACH = "ach";
    const STARCARD = "starcard";
    const EWALLET = "ewallet";
}


class InvoiceStatus{
    
    const DRAFT = "draft";
    const ACTIVE = "active";
}


class InvoiceSource{
    
    const CHECKOUTAPI = "checkoutapi";
    const DATAVAULT = "datavault";
}


class OptAmountType{
    
    const TIP = "tip";
    const SURCHARGE = "surcharge";
}


class RetryType{
    
    const DAILY = "daily";
    const WEEKLY = "weekly";
    const MONTHLY = "monthly";
}


class NotifyPlanSummaryInterval{
    
    const DAILY = "daily";
    const WEEKLY = "weekly";
    const MONTHLY = "monthly";
    const QUATERLY = "quaterly";
}


class ScheduleType{
    
    const MONTHLY = "monthly";
    const CUSTOM = "custom";
    const ANNUAL = "annual";
}


class OperationType{
    
    const ADDSEQUENCE = "addsequence";
    const UPDATESEQUENCE = "updatesequence";
}


class ShipCarrier{
    
    const UPS = "ups";
    const FEDEX = "fedex";
    const DHL = "dhl";
    const USPS = "usps";
}



// --- Common Objects ---

class Address
{

    /**
     * Billing address. Should be from 1-200 alpha-numeric characters and can include # - : ;
     * @var string $address1
     */
    public $address1 = "";

    /**
     * Billing city, should be 1-50 alpha characters
     * @var string $city
     */
    public $city = "";

    /**
     * Billing state (2 character abbreviation)
     * @var string $state
     */
    public $state = "";

    /**
     * Billing postal code. If the country is US zip code format must be 5 digits or 9 digits. Example xxxxx, xxxxxxxxx or xxxxx-xxxx
     * @var string $zip
     */
    public $zip = "";

    /**
     * Billing country (ie. US)
     * @var string $country
     */
    public $country = "";

    /**
     * Billing address - line 2. Should be from 1-200 alpha-numeric characters and can include # - : ;
     * @var string $address2
     */
    public $address2 = "";
}
        
class ContactInfo
{
    public function __construct(){
        $this->address = new Address();
    }

    /**
     * Customer's first name
     * @var string $firstName
     */
    public $firstName;

    /**
     * Customer's last name
     * @var string $lastName
     */
    public $lastName;

    /**
     * Birthdate of the customer
     * @var DateTime $birthDate
     */
    public $birthDate = null;

    /**
     * Billing Company
     * @var string $company
     */
    public $company = "";

    /**
     * Address
     * @var Address $address
     */
    public $address = null;

    /**
     * Billing phone number, 10 digits
     * @var string $phone
     */
    public $phone = "";

    /**
     * Billing email address
     * @var string $email
     */
    public $email = "";
}
        
class ShippingAddress
{

    /**
     * Shipping address
     * @var string $shipAddress1
     */
    public $shipAddress1 = "";

    /**
     * Shipping city
     * @var string $shipCity
     */
    public $shipCity = "";

    /**
     * Shipping state, 2 character abbreviation
     * @var string $shipState
     */
    public $shipState = "";

    /**
     * Shipping postal code. If the country is US the zip code format must be: [5 digits: XXXXX] or [9 digits XXXXX-XXXX]
     * @var string $shipZip
     */
    public $shipZip = "";

    /**
     * Shipping country (ie. US)
     * @var string $shipCountry
     */
    public $shipCountry = "";

    /**
     * Shipping address - line 2
     * @var string $shipAddress2
     */
    public $shipAddress2 = "";
}
        
class ShippingContactInfo
{
    public function __construct(){
        $this->shippingAddress = new ShippingAddress();
    }

    /**
     * Shipping first name
     * @var string $shipFirstName
     */
    public $shipFirstName = "";

    /**
     * Shipping last name
     * @var string $shipLastName
     */
    public $shipLastName = "";

    /**
     * Shipping company
     * @var string $shipCompany
     */
    public $shipCompany = "";

    /**
     * Shipping Address
     * @var ShippingAddress $shippingAddress
     */
    public $shippingAddress = null;

    /**
     * Shipping phone number, 10 digits
     * @var string $shipPhone
     */
    public $shipPhone = "";

    /**
     * Shipping email
     * @var string $shipEmail
     */
    public $shipEmail = "";
}
        
class ClientAccount
{

    /**
     * Client user name. This field is required if the Client Service Portal is enabled and ‘password’ or ‘clientuseremail’ is specified
     * @var string $userName
     */
    public $userName = "";

    /**
     * Client user password. This field is required if the Client Service Portal is enabled and ‘username’ or ‘clientuseremail’ is specified
     * @var string $password
     */
    public $password = "";

    /**
     * Client user email. This field is required if the Client Service Portal is enabled and ‘password’ or ‘username’ is specified
     * @var string $clientUserEmail
     */
    public $clientUserEmail = "";
}
        
class Product
{

    /**
     * SKU number of the product being purchased (skunumber_1, skunumber_2, etc)
     * @var string $skuNumber
     */
    public $skuNumber = "";

    /**
     * Description of the product being purchased
     * @var string $description
     */
    public $description = "";

    /**
     * Price of the single unit of a product being purchased
     * @var float $amount
     */
    public $amount = null;

    /**
     * Number of units of a product being purchased
     * @var int $quantity
     */
    public $quantity = null;
}
        
class InvoiceProduct
{

    /**
     * SKU number of the product being purchased. Required if one of the following fields is specified: invoiceitemdescription_#, invoiceitemprice_#, invoiceitemquantity_#
     * @var string $invoiceItemSku
     */
    public $invoiceItemSku = "";

    /**
     * Description of the product being purchased. Field supports 3000 characters. Required if one of the following fields is specified: invoiceitemsku_#, invoiceitemprice_#, invoiceitemquantity_#
     * @var string $invoiceItemDescription
     */
    public $invoiceItemDescription = "";

    /**
     * Price of the single unit of a product being purchased. Required if one of the following fields is specified: invoiceitemsku_#, invoiceitemdescription_#, invoiceitemquantity_#
     * @var float $invoiceItemPrice
     */
    public $invoiceItemPrice = null;

    /**
     * Number of units of a product being purchased. Required if one of the following fields is specified: invoiceitemsku_#, invoiceitemdescription_#, invoiceitemprice_#
     * @var string $invoiceItemQuantity
     */
    public $invoiceItemQuantity = "";
}
        
class SequenceStep
{

    /**
     * The sequence number defines which set of payments should occur first, second third, etc; if multiple sequences are present
     * @var int $sequence
     */
    public $sequence;

    /**
     * Amount to be paid
     * @var float $amount
     */
    public $amount;

    /**
     * Specifies the type of payment schedule. Supported types are: every month of a specified date, every N days, every year on a specified date
     * @var string $scheduleType
     */
    public $scheduleType;

    /**
     * Day of the month for processing payments (scheduletype=monthly) or number of days between payments (scheduletype=custom)
     * @var int $scheduleDay
     */
    public $scheduleDay;

    /**
     * Positive number of charges or -1 if no limit
     * @var int $duration
     */
    public $duration;

    /**
     * Addsequence will add a new sequence, whereas Updatesequence will update an existing sequence
     * @var string $operationType
     */
    public $operationType;

    /**
     * External ID for the product
     * @var string $productId
     */
    public $productId = "";

    /**
     * Description of the sequence
     * @var string $description
     */
    public $description = "";

    /**
     * New number for the sequence
     * @var int $newSequence
     */
    public $newSequence = null;
}
        
class SequenceStepToDelete
{

    /**
     * Sequence to be deleted
     * @var int $sequence
     */
    public $sequence;
}
        
class OptionalAmount
{

    /**
     * Type of additional amount (Tip)
     * @var string $optAmountType
     */
    public $optAmountType = "";

    /**
     * Value of the additional amount (10.00)
     * @var float $optAmountValue
     */
    public $optAmountValue = null;

    /**
     * Percentage of additional amount (20)
     * @var string $optAmountPercentage
     */
    public $optAmountPercentage = "";
}
        
class BankAccount
{

    /**
     * Customers bank name
     * @var string $bankName
     */
    public $bankName;

    /**
     * Customers bank routing number
     * @var string $routing
     */
    public $routing;

    /**
     * Customers bank account number
     * @var string $account
     */
    public $account;

    /**
     * Customers type of bank account
     * @var string $achAccountType
     */
    public $achAccountType;

    /**
     * Customers type of bank account
     * @var string $achAccountSubType
     */
    public $achAccountSubType;
}
        
class CreditCard
{

    /**
     * Credit card number
     * @var string $cardNum
     */
    public $cardNum;

    /**
     * Credit card expiration (ie 0719 = 07/2019)
     * @var DateTime $cardExp
     */
    public $cardExp;

    /**
     * Card security code
     * @var string $cvv
     */
    public $cvv = "";
}
        
class Ewallet
{

    /**
     * eWallet account credentials (ie email address associated with the customers paypal account)
     * @var string $ewalletAccount
     */
    public $ewalletAccount;
}
        
class PaymentType
{
    public function __construct(){
        $this->contactInfo = new ContactInfo();
        $this->creditCard = new CreditCard();
        $this->bankAccount = new BankAccount();
        $this->ewallet = new Ewallet();
    }

    /**
     * Type of payment info
     * @var string $payType
     */
    public $payType = PayType::CREDITCARD;

    /**
     * Priority of the payment type among others when sending payment using the customertoken
     * @var int $payNo
     */
    public $payNo = null;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo = null;

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard = null;

    /**
     * Bank Account
     * @var BankAccount $bankAccount
     */
    public $bankAccount;

    /**
     * eWallet Account
     * @var Ewallet $ewallet
     */
    public $ewallet;
}
        
class PaymentTypeToUpdate
{
    public function __construct(){
        $this->paymentType = new PaymentType();
    }

    /**
     * Unique payment type identifier
     * @var string $token
     */
    public $token;

    /**
     * Payment Type
     * @var PaymentType $paymentType
     */
    public $paymentType = null;
}
        
class PaymentTypeToAdd
{
    public function __construct(){
        $this->paymentType = new PaymentType();
    }

    /**
     * Payment Type
     * @var PaymentType $paymentType
     */
    public $paymentType;
}
        
class PaymentTypeToDelete
{

    /**
     * Token of the payment type to be deleted
     * @var string $token
     */
    public $token;
}
        
class DefaultKeys
{

    /**
     * Merchant key of ACH account with which plan payments should be processed by default
     * @var string $defaultAchMKey
     */
    public $defaultAchMKey = "";

    /**
     * Merchant key of Credit Card account with which plan payments should be processed by default
     * @var string $defaultCreditCardMKey
     */
    public $defaultCreditCardMKey = "";

    /**
     * Merchant key of eCheck account with which plan payments should be processed by default
     * @var string $defaultEcheckMKey
     */
    public $defaultEcheckMKey = "";

    /**
     * Merchant key of Star Card account with which plan payments should be processed by default
     * @var string $defaultStartCardMKey
     */
    public $defaultStartCardMKey = "";

    /**
     * Merchant key of eWallet account with which plan payments should be processed by default
     * @var string $defaultEwalletMKey
     */
    public $defaultEwalletMKey = "";
}
        
class NotificationOptions
{

    /**
     * Sends notification emails to the client if failed payments occur
     * @var bool $notifyFailures
     */
    public $notifyFailures = null;

    /**
     * Specifies whether to notify customer about upcoming payment
     * @var bool $notifyUpcomingPayment
     */
    public $notifyUpcomingPayment = null;

    /**
     * Number of days before notification about upcoming payment should be sent to the client. This field is required if notifyupcomingpayment = true
     * @var int $notifyDaysBeforeUpcomingPayment
     */
    public $notifyDaysBeforeUpcomingPayment = null;

    /**
     * Specifies whether to send merchant a Summarized Plan Report
     * @var bool $notifyPlanSummary
     */
    public $notifyPlanSummary = null;

    /**
     * Interval of plan summary notifications. This field is required if notifyplansummary = true
     * @var string $notifyPlanSummaryInterval
     */
    public $notifyPlanSummaryInterval = NotifyPlanSummaryInterval::DAILY;

    /**
     * Multiple addresses are separated by comma. This field is required if notifyplansummary = true
     * @var string $notifyPlanSummaryEmails
     */
    public $notifyPlanSummaryEmails = "";

    /**
     * Specifies whether to send merchant a Daily Plan Processing Statistics Report
     * @var bool $notifyDailyStats
     */
    public $notifyDailyStats = null;

    /**
     * Multiple addresses are separated by comma. This field is required if notifydailystats = true
     * @var string $notifyDailyStatsEmails
     */
    public $notifyDailyStatsEmails = "";

    /**
     * Specifies whether to notify merchant about plan completion
     * @var bool $notifyPlanComplete
     */
    public $notifyPlanComplete = null;

    /**
     * Multiple addresses are separated by comma. This field is required if notifyplancomplete = true
     * @var string $notifyPlanCompleteEmails
     */
    public $notifyPlanCompleteEmails = "";

    /**
     * Specifies whether to notify merchant about failed payments
     * @var bool $notifyDecline
     */
    public $notifyDecline = null;

    /**
     * Multiple addresses are separated by comma. This field is required if notifydecline = true
     * @var string $notifyDeclineEmails
     */
    public $notifyDeclineEmails = "";

    /**
     * Specifies whether to transfer transaction file via ftp
     * @var bool $notifyViaFtp
     */
    public $notifyViaFtp = null;

    /**
     * FTP address on which transaction file is transferred. This field is required if notifyviaftp = true
     * @var bool $notifyViaFtpUrl
     */
    public $notifyViaFtpUrl = null;

    /**
     * Username to access FTP address. This field is required if notifyviaftp = true
     * @var string $notifyViaFtpUserName
     */
    public $notifyViaFtpUserName = "";

    /**
     * Password to access FTP address. This field is required if notifyviaftp = true
     * @var string $notifyViaFtpPassword
     */
    public $notifyViaFtpPassword = "";

    /**
     * Specifies whether to notify merchant about flagged for review payments
     * @var bool $notifyFlagged
     */
    public $notifyFlagged = null;

    /**
     * Multiple addresses are separated by comma. This field is required if notifyflagged = true
     * @var string $notifyFlaggedEmails
     */
    public $notifyFlaggedEmails = "";
}
        
class SendTransReceiptOptions
{

    /**
     * Send multiple transaction receipts to customers. Multiple email must be separated by commas.
     * @var string $sendTransReceiptToEmails
     */
    public $sendTransReceiptToEmails = "";

    /**
     * If true, this will send a transaction receipt to the billing email if present
     * @var bool $sendTransReceiptToBillEmail
     */
    public $sendTransReceiptToBillEmail = null;

    /**
     * If true, this will send a transaction receipt to the shipping email if present
     * @var bool $sendTransReceiptToShipEmail
     */
    public $sendTransReceiptToShipEmail = null;
}
        
class DriversLicense
{

    /**
     * Drivers license number, 1-50 alphanumeric characters
     * @var string $driverLicenseNumber
     */
    public $driverLicenseNumber = "";

    /**
     * Drivers license country
     * @var string $driverLicenseCountry
     */
    public $driverLicenseCountry = "";

    /**
     * Drivers license state
     * @var string $driverLicenseState
     */
    public $driverLicenseState = "";
}
        

// --- Param Objects ---

class AdvancedECheckParams
{
    public function __construct(){
        $this->bankAccount = new BankAccount();
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Bank Account
     * @var BankAccount $bankAccount
     */
    public $bankAccount;

    /**
     * Total amount to be charged
     * @var float $amount
     */
    public $amount;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo;

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;

    /**
     * Order Description
     * @var string $orderDesc
     */
    public $orderDesc = "";

    /**
     * Order ID
     * @var string $orderId
     */
    public $orderId = "";

    /**
     * If parameter 'saveclient' = true and the customer is identified as new, then a new Data Vault client will be created with payment/contact info from the transaction data and DV token will be generated. The payment transaction will be assigned to this new DV client.
     * @var bool $saveClient
     */
    public $saveClient = null;

    /**
     * If the parameter 'updateclient' = true and the DataVault finds the client according to customer identification rules, then the payment transaction will be assigned to the DataVault client and the DataVault client payment/contact info will be updated according to the transaction's data.
     * @var bool $updateClient
     */
    public $updateClient = null;

    /**
     * Additional Amount
     * @var OptionalAmount[] $optionalAmounts
     */
    public $optionalAmounts = [];

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;
}
        
class AdvancedACHParams
{
    public function __construct(){
        $this->bankAccount = new BankAccount();
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
        $this->driversLicense = new DriversLicense();
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Bank Account
     * @var BankAccount $bankAccount
     */
    public $bankAccount;

    /**
     * Total amount to be charged
     * @var float $amount
     */
    public $amount;

    /**
     * Order Description
     * @var string $orderDesc
     */
    public $orderDesc = "";

    /**
     * Order ID
     * @var string $orderId
     */
    public $orderId = "";

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo;

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;

    /**
     * If parameter 'saveclient' = true and the customer is identified as new, then a new Data Vault client will be created with payment/contact info from the transaction data and DV token will be generated. The payment transaction will be assigned to this new DV client.
     * @var bool $saveClient
     */
    public $saveClient = null;

    /**
     * If the parameter 'updateclient' = true and the DataVault finds the client according to customer identification rules, then the payment transaction will be assigned to the DataVault client and the DataVault client payment/contact info will be updated according to the transaction's data.
     * @var bool $updateClient
     */
    public $updateClient = null;

    /**
     * Additional Amount
     * @var OptionalAmount[] $optionalAmounts
     */
    public $optionalAmounts = [];

    /**
     * Check number. 1-15 alphanumeric characters
     * @var string $checkNumber
     */
    public $checkNumber = "";

    /**
     * Drivers License
     * @var DriversLicense $driversLicense
     */
    public $driversLicense = null;

    /**
     * This field is optional only for GETI ACH, for other processors can be ignored. From 1 to 50 characters.
     * @var string $courtesyCardId
     */
    public $courtesyCardId = "";

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;
}
        
class SimpleACHParams
{
    public function __construct(){
        $this->bankAccount = new BankAccount();
        $this->contactInfo = new ContactInfo();
    }

    /**
     * Bank Account
     * @var BankAccount $bankAccount
     */
    public $bankAccount;

    /**
     * Total amount to be charged
     * @var float $amount
     */
    public $amount;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo;
}
        
class SimpleECheckParams
{
    public function __construct(){
        $this->bankAccount = new BankAccount();
        $this->contactInfo = new ContactInfo();
    }

    /**
     * Bank Account
     * @var BankAccount $bankAccount
     */
    public $bankAccount;

    /**
     * Total amount to be charged
     * @var float $amount
     */
    public $amount;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo;
}
        
class PassengerSaleParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (ie. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * First and last name of the passenger, 1-20 characters
     * @var string $passengerName
     */
    public $passengerName;

    /**
     * 
     * @var string $stopOverCode
     */
    public $stopOverCode = StopOverCode::SPACE;

    /**
     * Airport Codes, 3 characters
     * @var string[] $airportCodes
     */
    public $airportCodes;

    /**
     * 2 characters
     * @var string[] $carrierCoupons
     */
    public $carrierCoupons = [];

    /**
     * 3 characters
     * @var string $airlineCodeNumber
     */
    public $airlineCodeNumber;

    /**
     * 10 characters
     * @var string $ticketNumber
     */
    public $ticketNumber;

    /**
     * 1 or 2 characters
     * @var string[] $classOfServiceCoupons
     */
    public $classOfServiceCoupons = [];

    /**
     * Departure date
     * @var DateTime[] $flightDateCoupons
     */
    public $flightDateCoupons;

    /**
     * Departure time
     * @var string[] $flightDepartureTimeCoupons
     */
    public $flightDepartureTimeCoupons;

    /**
     * 1 character
     * @var string $addressVerificationCode
     */
    public $addressVerificationCode = "";

    /**
     * 6 characters
     * @var string $approvalCode
     */
    public $approvalCode;

    /**
     * The field must be forwarded when sent from TSYS, or manually filled with zeros. 15 characters
     * @var string $transactionId
     */
    public $transactionId = "";

    /**
     * Used as Returned Authorization Characteristics Indicator. Must contain the value returned in authorization response (ic case of online auth)
     * @var string $authCharIndicator
     */
    public $authCharIndicator;

    /**
     * 12 characters
     * @var string $referenceNumber
     */
    public $referenceNumber = "";

    /**
     * 4 characters
     * @var string $validationCode
     */
    public $validationCode;

    /**
     * 2 characters
     * @var string $authResponseCode
     */
    public $authResponseCode;
}
        
class RetrieveCardBalanceParams
{

    /**
     * Credit card number
     * @var string $cardNum
     */
    public $cardNum;
}
        
class VerifyAccountParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged should be 0.00
     * @var float $amount
     */
    public $amount;

    /**
     * Billing postal code. If the country is US zip code format must be 5 digits or 9 digits. Example xxxxx, xxxxxxxxx or xxxxx-xxxx
     * @var string $zip
     */
    public $zip = "";
}
        
class MarkSuccessfulTransactionAsChargebackParams
{

    /**
     * Original payment gateway transaction ID
     * @var string $transId
     */
    public $transId;

    /**
     * Description of the reason for the chargeback
     * @var string $reason
     */
    public $reason;
}
        
class SimpleCreditParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;
}
        
class AdvancedSaleParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (ie. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * Code of the payment currency. If currency is not specified, the default currency (USD) is assumed.
     * @var string $currency
     */
    public $currency = "";

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo = null;

    /**
     * Product Being Purchased
     * @var Product[] $products
     */
    public $products = [];

    /**
     * Order Description
     * @var string $orderDesc
     */
    public $orderDesc = "";

    /**
     * Order ID
     * @var string $orderId
     */
    public $orderId = "";

    /**
     * IP address of the customer, can be used for fraud prevention in FBI Tools
     * @var string $cardIpAddress
     */
    public $cardIpAddress = "";

    /**
     * Total tax amount
     * @var float $tax
     */
    public $tax = null;

    /**
     * Total shipping amount
     * @var float $shipAmount
     */
    public $shipAmount = null;

    /**
     * Original Purchase Order
     * @var string $poNumber
     */
    public $poNumber = "";

    /**
     * Billing fax number
     * @var string $fax
     */
    public $fax = "";

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;

    /**
     * Additional Amount
     * @var OptionalAmount[] $optionalAmounts
     */
    public $optionalAmounts = [];

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;

    /**
     * Customer or customer payment info unique identifier.
     * @var string $token
     */
    public $token = "";

    /**
     * If parameter 'saveclient' = true and the customer is identified as new, then a new Data Vault client will be created with payment/contact info from the transaction data and DV token will be generated. The payment transaction will be assigned to this new DV client.
     * @var bool $saveClient
     */
    public $saveClient = null;

    /**
     * If the parameter 'updateclient' = true and the DataVault finds the client according to customer identification rules, then the payment transaction will be assigned to the DataVault client and the DataVault client payment/contact info will be updated according to the transaction's data.
     * @var bool $updateClient
     */
    public $updateClient = null;

    /**
     * Group ID of the Split Funding group. If groupid is defined for the transaction system splits it in accordance with group settings.
     * @var string $groupId
     */
    public $groupId = "";

    /**
     * For Chase Processor only. Indicator to process PIN-less debit transactions.
     * @var bool $pinlessDebitIndicator
     */
    public $pinlessDebitIndicator = null;

    /**
     * Overrides ‘Send Payment Descriptor’ account setting for the transaction.
     * @var bool $sendPaymentDesc
     */
    public $sendPaymentDesc = null;
}
        
class SimpleSaleParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;
}
        
class AddPaymentTypesToCustomerParams
{

    /**
     * Unique customer identifier
     * @var string $token
     */
    public $token;

    /**
     * Payment Type to Add
     * @var PaymentTypeToAdd[] $paymentTypeToAdds
     */
    public $paymentTypeToAdds;
}
        
class AddCustomerParams
{
    public function __construct(){
        $this->defaultContactInfo = new ContactInfo();
        $this->defaultAddress = new Address();
        $this->shippingContactInfo = new ShippingContactInfo();
        $this->clientAccount = new ClientAccount();
    }

    /**
     * Default Contact Info
     * @var ContactInfo $defaultContactInfo
     */
    public $defaultContactInfo;

    /**
     * External customer identifier
     * @var string $customerId
     */
    public $customerId = "";

    /**
     * Customer note
     * @var string $note
     */
    public $note = "";

    /**
     * Default Address
     * @var Address $defaultAddress
     */
    public $defaultAddress = null;

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;

    /**
     * Client Account
     * @var ClientAccount $clientAccount
     */
    public $clientAccount = null;

    /**
     * Payment Type
     * @var PaymentType[] $paymentTypes
     */
    public $paymentTypes;
}
        
class DeleteDataVaultCustomerParams
{

    /**
     * Unique customer identifier
     * @var string $token
     */
    public $token;
}
        
class DeletePaymentTypeParams
{

    /**
     * Unique customer identifier
     * @var string $token
     */
    public $token;

    /**
     * Payment Type to Delete
     * @var PaymentTypeToDelete[] $paymentTypeToDeletes
     */
    public $paymentTypeToDeletes;
}
        
class RetrieveCustomerParams
{

    /**
     * Unique customer identifier
     * @var string $token
     */
    public $token;
}
        
class RetrievePaymentTypeParams
{

    /**
     * Unique payment type identifier
     * @var string $token
     */
    public $token;
}
        
class UpdateCustomerParams
{
    public function __construct(){
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
        $this->clientAccount = new ClientAccount();
    }

    /**
     * Unique customer identifier
     * @var string $token
     */
    public $token;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo = null;

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;

    /**
     * Client Account
     * @var ClientAccount $clientAccount
     */
    public $clientAccount = null;
}
        
class UpdatePaymentTypeParams
{

    /**
     * Unique customer identifier
     * @var string $token
     */
    public $token;

    /**
     * Payment Type to Update
     * @var PaymentTypeToUpdate[] $paymentTypeToUpdates
     */
    public $paymentTypeToUpdates;
}
        
class DecryptCustomFieldsParams
{

    /**
     * Custom field name
     * @var string $fieldName
     */
    public $fieldName;

    /**
     * This is a unique Data Vault customer identifier or Data Vault payment type identifier
     * @var string $token
     */
    public $token;
}
        
class EWalletSimpleCreditParams
{
    public function __construct(){
        $this->ewallet = new Ewallet();
    }

    /**
     * eWallet Account
     * @var Ewallet $ewallet
     */
    public $ewallet;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * Code of the payment currency. If not currency is specified, the default is USD
     * @var string $currency
     */
    public $currency = "";
}
        
class AdvancedFiservSaleParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (ie. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * Code of the payment currency. If currency is not specified, the default currency (USD) is assumed.
     * @var string $currency
     */
    public $currency = "";

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo = null;

    /**
     * Product Being Purchased
     * @var Product[] $products
     */
    public $products = [];

    /**
     * Order Description
     * @var string $orderDesc
     */
    public $orderDesc = "";

    /**
     * Order ID
     * @var string $orderId
     */
    public $orderId = "";

    /**
     * IP address of the customer, can be used for fraud prevention in FBI Tools
     * @var string $cardIpAddress
     */
    public $cardIpAddress = "";

    /**
     * Total tax amount
     * @var float $tax
     */
    public $tax = null;

    /**
     * Total shipping amount
     * @var float $shipAmount
     */
    public $shipAmount = null;

    /**
     * Original Purchase Order
     * @var string $poNumber
     */
    public $poNumber = "";

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;
}
        
class FiservSimpleSaleParams
{

    /**
     * Credit card number
     * @var string $cardNum
     */
    public $cardNum;

    /**
     * Credit card expiration (ie. 0711 = 7/2011)
     * @var DateTime $cardExp
     */
    public $cardExp;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;
}
        
class CancelInvoiceByCustomerParams
{

    /**
     * Unique invoice identifier
     * @var string $invoiceNumber
     */
    public $invoiceNumber;

    /**
     * The reason of canceling the invoice
     * @var string $invoiceStatusReason
     */
    public $invoiceStatusReason;
}
        
class CancelInvoiceParams
{

    /**
     * Unique invoice identifier
     * @var string $invoiceNumber
     */
    public $invoiceNumber;

    /**
     * The reason of canceling the invoice
     * @var string $invoiceStatusReason
     */
    public $invoiceStatusReason;
}
        
class CreateInvoiceParams
{

    /**
     * Unique data vault client identifier
     * @var string $customerToken
     */
    public $customerToken = "";

    /**
     * The date of the invoice
     * @var DateTime $invoiceDate
     */
    public $invoiceDate;

    /**
     * Code of the payment currency
     * @var string $currency
     */
    public $currency;

    /**
     * The status of the invoice. Only active invoices can be paid
     * @var string $invoiceStatus
     */
    public $invoiceStatus;

    /**
     * The source of the invoice. If not specified, the default value is DataVault
     * @var string $invoiceSource
     */
    public $invoiceSource = InvoiceSource::CHECKOUTAPI;

    /**
     * Total amount of invoice (i.e. 10.00). Required if product list is not specified
     * @var float $invoiceAmount
     */
    public $invoiceAmount;

    /**
     * Product Being Purchased
     * @var InvoiceProduct[] $invoiceProducts
     */
    public $invoiceProducts = [];

    /**
     * If Invoice status is 'Active' email with Pay Invoice URL will be sent to specified email.
     * @var string $sendPaymentLinkEmail
     */
    public $sendPaymentLinkEmail = "";
}
        
class RetrieveInvoiceParams
{

    /**
     * Unique invoice identifier
     * @var string $invoiceNumber
     */
    public $invoiceNumber;
}
        
class PayInvoiceWithBankAccountParams
{
    public function __construct(){
        $this->bankAccount = new BankAccount();
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
    }

    /**
     * Unique invoice identifier
     * @var string $invoiceNumber
     */
    public $invoiceNumber;

    /**
     * Bank Account
     * @var BankAccount $bankAccount
     */
    public $bankAccount;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo;

    /**
     * Billing fax number
     * @var string $fax
     */
    public $fax = "";

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;
}
        
class PayInvoiceWithCreditCardParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
    }

    /**
     * Unique invoice identifier
     * @var string $invoiceNumber
     */
    public $invoiceNumber;

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo = null;

    /**
     * Billing fax number
     * @var string $fax
     */
    public $fax = "";

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;
}
        
class UpdateInvoiceParams
{

    /**
     * Unique invoice identifier
     * @var string $invoiceNumber
     */
    public $invoiceNumber;

    /**
     * Unique data vault client identifier
     * @var string $customerToken
     */
    public $customerToken = "";

    /**
     * The date of the invoice
     * @var DateTime $invoiceDate
     */
    public $invoiceDate = null;

    /**
     * Code of the payment currency
     * @var string $currency
     */
    public $currency = "";

    /**
     * The status of the invoice. Only active invoices can be paid
     * @var string $invoiceStatus
     */
    public $invoiceStatus = InvoiceStatus::DRAFT;

    /**
     * The source of the invoice. If not specified, the default value is DataVault
     * @var string $invoiceSource
     */
    public $invoiceSource = InvoiceSource::CHECKOUTAPI;

    /**
     * Total amount of invoice (i.e. 10.00). Required if product list is not specified
     * @var float $invoiceAmount
     */
    public $invoiceAmount = null;

    /**
     * Product Being Purchased
     * @var InvoiceProduct[] $invoiceProducts
     */
    public $invoiceProducts = [];

    /**
     * If Invoice status is 'Active' email with Pay Invoice URL will be sent to specified email.
     * @var string $sendPaymentLinkEmail
     */
    public $sendPaymentLinkEmail = "";
}
        
class SimpleRefundParams
{

    /**
     * Original payment gateway transaction ID
     * @var string $transId
     */
    public $transId;

    /**
     * Total amount to be refunded
     * @var float $amount
     */
    public $amount;
}
        
class AdvancedRefundParams
{
    public function __construct(){
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Original payment gateway transaction ID
     * @var string $transId
     */
    public $transId;

    /**
     * Total amount to be refunded
     * @var float $amount
     */
    public $amount;

    /**
     * Additional Amount
     * @var OptionalAmount[] $optionalAmounts
     */
    public $optionalAmounts = [];

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;
}
        
class AdvancedVoidParams
{
    public function __construct(){
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Original payment gateway transaction ID
     * @var string $transId
     */
    public $transId;

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;
}
        
class SimpleVoidParams
{

    /**
     * Original payment gateway transaction ID
     * @var string $transId
     */
    public $transId;
}
        
class AssignPaymentPlanToCustomerParams
{
    public function __construct(){
        $this->notificationOptions = new NotificationOptions();
    }

    /**
     * Customer unique identifier
     * @var string $customerToken
     */
    public $customerToken;

    /**
     * Recurring payment plan unique identifier; used when assigning existing plan to the customer
     * @var string $planToken
     */
    public $planToken;

    /**
     * Token of the customer’s payment type, if they have multiple
     * @var string $paymentToken
     */
    public $paymentToken;

    /**
     * Day of the first payment of the plan; if not present the plan’s start date (if it exists) is used.
     * @var DateTime $startDate
     */
    public $startDate = null;

    /**
     * External ID for the product
     * @var string $productId
     */
    public $productId = "";

    /**
     * Description of plan assignment
     * @var string $description
     */
    public $description = "";

    /**
     * Amount purchased. This field is required for layaway plan assignment and ignored otherwise
     * @var float $amount
     */
    public $amount = null;

    /**
     * Notification Options
     * @var NotificationOptions $notificationOptions
     */
    public $notificationOptions = null;

    /**
     * Specifies whether to reprocess failed transactions for this plan
     * @var bool $useRecycling
     */
    public $useRecycling = null;

    /**
     * Number of times to retry each failed transaction. This field is required if transaction recycling is activated, and ignored otherwise
     * @var int $retryCount
     */
    public $retryCount = null;

    /**
     * Specifies the type of retry schedule. Supported types are: every month of a specified date, every N days, every year on a specified date
     * @var string $retryType
     */
    public $retryType = RetryType::DAILY;

    /**
     * Number of days between retry attempts. This field is required if retrytype=daily
     * @var int $retryPeriod
     */
    public $retryPeriod = null;

    /**
     * This field is required if retrytype=weekly (monday, tuesday etc.)
     * @var string $retryDayOfWeek
     */
    public $retryDayOfWeek = "";

    /**
     * First date of retry schedule. This field is required if retrytype=monthly
     * @var int $retryFirstDayOfMonth
     */
    public $retryFirstDayOfMonth = null;

    /**
     * Second date of retry schedule. This field is required if retrytype=monthly
     * @var int $retrySecondDayOfMonth
     */
    public $retrySecondDayOfMonth = null;

    /**
     * Specifies whether to add prorated payment in this plan
     * @var bool $proratedPayment
     */
    public $proratedPayment = null;

    /**
     * Merchant key of account with which plan payments should be processed by default. This account must be of the same type as selected customer’s payment type
     * @var string $routingKey
     */
    public $routingKey = "";
}
        
class CancelPlanAssignmentParams
{

    /**
     * Unique identifier of payment plan assignment
     * @var string $assignmentToken
     */
    public $assignmentToken;
}
        
class CreatePaymentPlanParams
{
    public function __construct(){
        $this->defaultKeys = new DefaultKeys();
        $this->notificationOptions = new NotificationOptions();
    }

    /**
     * Payment plan name
     * @var string $planName
     */
    public $planName;

    /**
     * Payment plan description
     * @var string $planDesc
     */
    public $planDesc;

    /**
     * Starting day of the plan
     * @var DateTime $startDate
     */
    public $startDate;

    /**
     * Default Keys
     * @var DefaultKeys $defaultKeys
     */
    public $defaultKeys = null;

    /**
     * If “true” this will set the payment plan to pending until it is reviewed by the merchant admin
     * @var bool $reviewOnAssignment
     */
    public $reviewOnAssignment = null;

    /**
     * Specifies if new payments should be processed immediately or end of day
     * @var bool $processImmediately
     */
    public $processImmediately = null;

    /**
     * Specifies whether to override sender email for customers notifications
     * @var bool $overrideSender
     */
    public $overrideSender = null;

    /**
     * Sender email. This field is required if overridesender = true
     * @var string $senderEmail
     */
    public $senderEmail = "";

    /**
     * Notification Options
     * @var NotificationOptions $notificationOptions
     */
    public $notificationOptions = null;

    /**
     * Payment Sequence Step
     * @var SequenceStep[] $sequenceStepss
     */
    public $sequenceStepss;

    /**
     * Specifies whether to reprocess failed transactions for this plan
     * @var bool $useRecycling
     */
    public $useRecycling = null;

    /**
     * Number of times to retry each failed transaction. This field is required if transaction recycling is activated, and ignored otherwise
     * @var int $retryCount
     */
    public $retryCount = null;

    /**
     * Specifies the type of retry schedule. Supported types are: every month of a specified date, every N days, every year on a specified date
     * @var string $retryType
     */
    public $retryType = RetryType::DAILY;

    /**
     * Number of days between retry attempts. This field is required if retrytype=daily
     * @var int $retryPeriod
     */
    public $retryPeriod = null;

    /**
     * This field is required if retrytype=weekly (monday, tuesday etc.)
     * @var string $retryDayOfWeek
     */
    public $retryDayOfWeek = "";

    /**
     * First date of retry schedule. This field is required if retrytype=monthly
     * @var int $retryFirstDayOfMonth
     */
    public $retryFirstDayOfMonth = null;

    /**
     * Second date of retry schedule. This field is required if retrytype=monthly
     * @var int $retrySecondDayOfMonth
     */
    public $retrySecondDayOfMonth = null;

    /**
     * Creates username and password for Client Portal automatically when plan is assigned to the client
     * @var bool $autoCreateClientAccounts
     */
    public $autoCreateClientAccounts = null;
}
        
class DeletePlanParams
{

    /**
     * Payment plan unique identifier
     * @var string $token
     */
    public $token;

    /**
     * Specifies whether to cancel pending payments caused by assignments of this plan. Default value is false
     * @var bool $cancelPayments
     */
    public $cancelPayments = null;
}
        
class DeleteSequenceParams
{

    /**
     * Sequence Step to Delete
     * @var SequenceStepToDelete[] $deleteSequenceStepss
     */
    public $deleteSequenceStepss;

    /**
     * Unique payment plan identifier
     * @var string $token
     */
    public $token;
}
        
class UpdatePaymentPlanAssignmentParams
{
    public function __construct(){
        $this->notificationOptions = new NotificationOptions();
    }

    /**
     * Unique identifier of payment plan assignment
     * @var string $assignmentToken
     */
    public $assignmentToken;

    /**
     * Token of the customer’s payment type, if they have multiple
     * @var string $paymentToken
     */
    public $paymentToken = "";

    /**
     * Day of the first payment of the plan; if not present the plan’s start date (if it exists) is used.
     * @var DateTime $startDate
     */
    public $startDate = null;

    /**
     * External ID for the product
     * @var string $productId
     */
    public $productId = "";

    /**
     * Description of plan assignment
     * @var string $description
     */
    public $description = "";

    /**
     * Notification Options
     * @var NotificationOptions $notificationOptions
     */
    public $notificationOptions = null;

    /**
     * Specifies whether to reprocess failed transactions for this plan
     * @var bool $useRecycling
     */
    public $useRecycling = null;

    /**
     * Number of times to retry each failed transaction. This field is required if transaction recycling is activated, and ignored otherwise
     * @var int $retryCount
     */
    public $retryCount = null;

    /**
     * Specifies the type of retry schedule. Supported types are: every month of a specified date, every N days, every year on a specified date
     * @var string $retryType
     */
    public $retryType = RetryType::DAILY;

    /**
     * Number of days between retry attempts. This field is required if retrytype=daily
     * @var int $retryPeriod
     */
    public $retryPeriod = null;

    /**
     * This field is required if retrytype=weekly (monday, tuesday etc.)
     * @var string $retryDayOfWeek
     */
    public $retryDayOfWeek = "";

    /**
     * First date of retry schedule. This field is required if retrytype=monthly
     * @var int $retryFirstDayOfMonth
     */
    public $retryFirstDayOfMonth = null;

    /**
     * Second date of retry schedule. This field is required if retrytype=monthly
     * @var int $retrySecondDayOfMonth
     */
    public $retrySecondDayOfMonth = null;

    /**
     * Specifies whether to add prorated payment in this plan
     * @var bool $proratedPayment
     */
    public $proratedPayment = null;

    /**
     * Merchant key of account with which plan payments should be processed by default. This account must be of the same type as selected customer’s payment type
     * @var string $routingKey
     */
    public $routingKey = "";
}
        
class UpdatePaymentPlanParams
{
    public function __construct(){
        $this->defaultKeys = new DefaultKeys();
        $this->notificationOptions = new NotificationOptions();
    }

    /**
     * Unique payment plan identifier
     * @var string $token
     */
    public $token;

    /**
     * Payment plan name
     * @var string $planName
     */
    public $planName = "";

    /**
     * Payment plan description
     * @var string $planDesc
     */
    public $planDesc = "";

    /**
     * Starting day of the plan
     * @var DateTime $startDate
     */
    public $startDate = null;

    /**
     * Default Keys
     * @var DefaultKeys $defaultKeys
     */
    public $defaultKeys = null;

    /**
     * Specifies whether to reprocess failed transactions in this plan
     * @var bool $useRecycling
     */
    public $useRecycling = null;

    /**
     * Notification Options
     * @var NotificationOptions $notificationOptions
     */
    public $notificationOptions = null;

    /**
     * Number of times to retry each failed transaction. This field is required if transaction recycling is activated, and ignored otherwise
     * @var int $retryCount
     */
    public $retryCount = null;

    /**
     * Specifies the type of retry schedule
     * @var string $retryType
     */
    public $retryType = RetryType::DAILY;

    /**
     * Number of days between retry attempts. This field is required if retrytype=daily
     * @var int $retryPeriod
     */
    public $retryPeriod = null;

    /**
     * This field is required if retrytype=weekly (monday, tuesday etc.)
     * @var string $retryDayOfWeek
     */
    public $retryDayOfWeek = "";

    /**
     * First date of retry schedule. This field is required if retrytype=monthly
     * @var int $retryFirstDayOfMonth
     */
    public $retryFirstDayOfMonth = null;

    /**
     * Second date of retry schedule. This field is required if retrytype=monthly
     * @var int $retrySecondDayOfMonth
     */
    public $retrySecondDayOfMonth = null;

    /**
     * Creates username and password for Client Portal automatically when plan is assigned to the client
     * @var bool $autoCreateClientAccounts
     */
    public $autoCreateClientAccounts = null;

    /**
     * If “true” this will set the payment plan to pending until it is reviewed by the merchant admin
     * @var bool $reviewOnAssignment
     */
    public $reviewOnAssignment = null;

    /**
     * Specifies if new payments should be processed immediately or end of day
     * @var bool $processImmediately
     */
    public $processImmediately = null;

    /**
     * Specifies whether to override sender email for customers notifications
     * @var bool $overrideSender
     */
    public $overrideSender = null;

    /**
     * Sender email. This field is required if overridesender = true
     * @var string $senderEmail
     */
    public $senderEmail = "";

    /**
     * Payment Sequence Step
     * @var SequenceStep[] $sequenceStepss
     */
    public $sequenceStepss;
}
        
class SimpleOfflineCaptureParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * Auth code received from the issuer
     * @var string $authCode
     */
    public $authCode;

    /**
     * Date that auth code was obtained, required for Chase only
     * @var DateTime $authDate
     */
    public $authDate;
}
        
class AdvancedCaptureParams
{
    public function __construct(){
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Original Payment Gateway Transaction ID
     * @var string $transId
     */
    public $transId;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;

    /**
     * Shipping Tracking Number
     * @var string $shipTrackNum
     */
    public $shipTrackNum = "";

    /**
     * Shipping Carrier
     * @var string $shipCarrier
     */
    public $shipCarrier = ShipCarrier::UPS;

    /**
     * Order ID
     * @var string $orderId
     */
    public $orderId = "";

    /**
     * Additional Amount
     * @var OptionalAmount[] $optionalAmounts
     */
    public $optionalAmounts = [];
}
        
class SimpleAuthorizationParams
{
    public function __construct(){
        $this->creditCard = new CreditCard();
    }

    /**
     * Credit Card
     * @var CreditCard $creditCard
     */
    public $creditCard;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;
}
        
class SimpleCaptureParams
{
    public function __construct(){
        $this->sendTransReceiptOptions = new SendTransReceiptOptions();
    }

    /**
     * Original Payment Gateway Transaction ID
     * @var string $transId
     */
    public $transId;

    /**
     * Total amount to be charged (i.e. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * Send Transfer Receipt Options
     * @var SendTransReceiptOptions $sendTransReceiptOptions
     */
    public $sendTransReceiptOptions = null;
}
        
class AdvancedStarCardParams
{
    public function __construct(){
        $this->contactInfo = new ContactInfo();
        $this->shippingContactInfo = new ShippingContactInfo();
    }

    /**
     * Credit card number
     * @var string $cardNum
     */
    public $cardNum;

    /**
     * Credit card expiration (ie. 0719 = 7/2019
     * @var DateTime $cardExp
     */
    public $cardExp;

    /**
     * Total amount to be charged (ie. 10.00)
     * @var float $amount
     */
    public $amount;

    /**
     * 11 digit numerical code
     * @var string $cid
     */
    public $cid;

    /**
     * Code of the payment currency. If currency is not specified, the default currency (USD) is assumed.
     * @var string $currency
     */
    public $currency = "";

    /**
     * Contact Info
     * @var ContactInfo $contactInfo
     */
    public $contactInfo = null;

    /**
     * Product Being Purchased
     * @var Product[] $products
     */
    public $products = [];

    /**
     * Order Description
     * @var string $orderDesc
     */
    public $orderDesc = "";

    /**
     * Order ID
     * @var string $orderId
     */
    public $orderId = "";

    /**
     * IP address of the customer, can be used for fraud prevention in FBI Tools
     * @var string $cardIpAddress
     */
    public $cardIpAddress = "";

    /**
     * Total tax amount
     * @var float $tax
     */
    public $tax = null;

    /**
     * Total shipping amount
     * @var float $shipAmount
     */
    public $shipAmount = null;

    /**
     * Original Purchase Order
     * @var string $poNumber
     */
    public $poNumber = "";

    /**
     * Billing fax number
     * @var string $fax
     */
    public $fax = "";

    /**
     * Shipping Contact Info
     * @var ShippingContactInfo $shippingContactInfo
     */
    public $shippingContactInfo = null;
}
        
class SimpleStarCardParams
{

    /**
     * Card number
     * @var string $cardNum
     */
    public $cardNum;

    /**
     * Total amount to be refunded
     * @var float $amount
     */
    public $amount;

    /**
     * 11 digit numerical code
     * @var string $cid
     */
    public $cid;
}
        

trait SparrowClientGenerated {

    // --- Endpoints ---
    
    public function advancedECheck(AdvancedECheckParams $params)
    {
        $data = [];
        
        if($params->orderDesc){ $data["orderdesc"] = $params->orderDesc; }
        $data["transtype"] = "sale";
        if($params->updateClient){ $data["updateclient"] = $params->updateClient == true ? "true" : "false"; }
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->saveClient){ $data["saveclient"] = $params->saveClient == true ? "true" : "false"; }
        if($params->orderId){ $data["orderid"] = $params->orderId; }
        $data["mkey"] = $this->apiKey;
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // bankAccount
        $data["bankname"] = $params->bankAccount->bankName;
        $data["routing"] = $params->bankAccount->routing;
        $data["account"] = $params->bankAccount->account;
        $data["achaccounttype"] = $params->bankAccount->achAccountType;
        $data["achaccountsubtype"] = $params->bankAccount->achAccountSubType;
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        // optionalAmounts
        foreach ($params->optionalAmounts as $i => $x){
            if($x->optAmountType){ $data["optamounttype" . "_" . ($i + 1)] = $x->optAmountType; }
            if($x->optAmountValue){ $data["optamountvalue" . "_" . ($i + 1)] = sprintf("%.2f", $x->optAmountValue); }
            if($x->optAmountPercentage){ $data["optamountpercentage" . "_" . ($i + 1)] = $x->optAmountPercentage; }
        }
        
        return $this->makeRequest($data);
    }

    public function advancedACH(AdvancedACHParams $params)
    {
        $data = [];
        
        $data["transtype"] = "sale";
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->orderDesc){ $data["orderdesc"] = $params->orderDesc; }
        if($params->orderId){ $data["orderid"] = $params->orderId; }
        $data["mkey"] = $this->apiKey;
        if($params->saveClient){ $data["saveclient"] = $params->saveClient == true ? "true" : "false"; }
        if($params->updateClient){ $data["updateclient"] = $params->updateClient == true ? "true" : "false"; }
        if($params->courtesyCardId){ $data["courtesycardid"] = $params->courtesyCardId; }
        if($params->checkNumber){ $data["checknumber"] = $params->checkNumber; }
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // bankAccount
        $data["bankname"] = $params->bankAccount->bankName;
        $data["routing"] = $params->bankAccount->routing;
        $data["account"] = $params->bankAccount->account;
        $data["achaccounttype"] = $params->bankAccount->achAccountType;
        $data["achaccountsubtype"] = $params->bankAccount->achAccountSubType;
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        // driversLicense
        if($params->driversLicense->driverLicenseNumber){ $data["driverlicensenumber"] = $params->driversLicense->driverLicenseNumber; }
        if($params->driversLicense->driverLicenseCountry){ $data["driverlicensecountry"] = $params->driversLicense->driverLicenseCountry; }
        if($params->driversLicense->driverLicenseState){ $data["driverlicensestate"] = $params->driversLicense->driverLicenseState; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // optionalAmounts
        foreach ($params->optionalAmounts as $i => $x){
            if($x->optAmountType){ $data["optamounttype" . "_" . ($i + 1)] = $x->optAmountType; }
            if($x->optAmountValue){ $data["optamountvalue" . "_" . ($i + 1)] = sprintf("%.2f", $x->optAmountValue); }
            if($x->optAmountPercentage){ $data["optamountpercentage" . "_" . ($i + 1)] = $x->optAmountPercentage; }
        }
        
        return $this->makeRequest($data);
    }

    public function simpleACH(SimpleACHParams $params)
    {
        $data = [];
        
        $data["transtype"] = "sale";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // bankAccount
        $data["bankname"] = $params->bankAccount->bankName;
        $data["routing"] = $params->bankAccount->routing;
        $data["account"] = $params->bankAccount->account;
        $data["achaccounttype"] = $params->bankAccount->achAccountType;
        $data["achaccountsubtype"] = $params->bankAccount->achAccountSubType;
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        return $this->makeRequest($data);
    }

    public function simpleECheck(SimpleECheckParams $params)
    {
        $data = [];
        
        $data["transtype"] = "sale";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // bankAccount
        $data["bankname"] = $params->bankAccount->bankName;
        $data["routing"] = $params->bankAccount->routing;
        $data["account"] = $params->bankAccount->account;
        $data["achaccounttype"] = $params->bankAccount->achAccountType;
        $data["achaccountsubtype"] = $params->bankAccount->achAccountSubType;
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        return $this->makeRequest($data);
    }

    public function passengerSale(PassengerSaleParams $params)
    {
        $data = [];
        
        $data["transtype"] = "passengersale";
        $data["authresponsecode"] = $params->authResponseCode;
        $data["validationcode"] = $params->validationCode;
        $data["amount"] = sprintf("%.2f", $params->amount);
        $data["passengername"] = $params->passengerName;
        if($params->stopOverCode){ $data["stopovercode"] = $params->stopOverCode; }
        if($params->referenceNumber){ $data["referencenumber"] = $params->referenceNumber; }
        $data["authcharindicator"] = $params->authCharIndicator;
        $data["airlinecodenumber"] = $params->airlineCodeNumber;
        $data["ticketnumber"] = $params->ticketNumber;
        $data["mkey"] = $this->apiKey;
        if($params->transactionId){ $data["transactionid"] = $params->transactionId; }
        $data["approvalcode"] = $params->approvalCode;
        if($params->addressVerificationCode){ $data["addressverificationcode"] = $params->addressVerificationCode; }
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        // flightDepartureTimeCoupons
        foreach ($params->flightDepartureTimeCoupons as $i => $x){
            $data["flightdeparturetimecoupon" . "_" . ($i + 1)] = $x;
        }
    
        
        // flightDateCoupons
        foreach ($params->flightDateCoupons as $i => $x){
            $data["flightdatecoupon" . "_" . ($i + 1)] = $x;
        }
    
        
        // carrierCoupons
        foreach ($params->carrierCoupons as $i => $x){
            if($x){ $data["carriercoupon" . "_" . ($i + 1)] = $x; }
        }
    
        
        // airportCodes
        foreach ($params->airportCodes as $i => $x){
            $data["airportcode" . "_" . ($i + 1)] = $x;
        }
    
        
        // classOfServiceCoupons
        foreach ($params->classOfServiceCoupons as $i => $x){
            if($x){ $data["classofservicecoupon" . "_" . ($i + 1)] = $x; }
        }
    
        
        return $this->makeRequest($data);
    }

    public function retrieveCardBalance(RetrieveCardBalanceParams $params)
    {
        $data = [];
        
        $data["transtype"] = "balanceinquire";
        $data["mkey"] = $this->apiKey;
        $data["cardnum"] = $params->cardNum;
        
        return $this->makeRequest($data);
    }

    public function verifyAccount(VerifyAccountParams $params)
    {
        $data = [];
        
        $data["transtype"] = "auth";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->zip){ $data["zip"] = $params->zip; }
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        return $this->makeRequest($data);
    }

    public function markSuccessfulTransactionAsChargeback(MarkSuccessfulTransactionAsChargebackParams $params)
    {
        $data = [];
        
        $data["transtype"] = "chargeback";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        $data["reason"] = $params->reason;
        
        return $this->makeRequest($data);
    }

    public function simpleCredit(SimpleCreditParams $params)
    {
        $data = [];
        
        $data["transtype"] = "credit";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        return $this->makeRequest($data);
    }

    public function advancedSale(AdvancedSaleParams $params)
    {
        $data = [];
        
        if($params->shipAmount){ $data["shipamount"] = sprintf("%.2f", $params->shipAmount); }
        $data["transtype"] = "sale";
        if($params->pinlessDebitIndicator){ $data["pinlessdebitindicator"] = $params->pinlessDebitIndicator == true ? "true" : "false"; }
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->currency){ $data["currency"] = $params->currency; }
        if($params->groupId){ $data["groupid"] = $params->groupId; }
        if($params->updateClient){ $data["updateclient"] = $params->updateClient == true ? "true" : "false"; }
        if($params->orderDesc){ $data["orderdesc"] = $params->orderDesc; }
        if($params->orderId){ $data["orderid"] = $params->orderId; }
        if($params->cardIpAddress){ $data["cardipaddress"] = $params->cardIpAddress; }
        if($params->tax){ $data["tax"] = sprintf("%.2f", $params->tax); }
        $data["mkey"] = $this->apiKey;
        if($params->poNumber){ $data["ponumber"] = $params->poNumber; }
        if($params->fax){ $data["fax"] = $params->fax; }
        if($params->saveClient){ $data["saveclient"] = $params->saveClient == true ? "true" : "false"; }
        if($params->token){ $data["token"] = $params->token; }
        if($params->sendPaymentDesc){ $data["sendpaymentdesc"] = $params->sendPaymentDesc == true ? "true" : "false"; }
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        // optionalAmounts
        foreach ($params->optionalAmounts as $i => $x){
            if($x->optAmountType){ $data["optamounttype" . "_" . ($i + 1)] = $x->optAmountType; }
            if($x->optAmountValue){ $data["optamountvalue" . "_" . ($i + 1)] = sprintf("%.2f", $x->optAmountValue); }
            if($x->optAmountPercentage){ $data["optamountpercentage" . "_" . ($i + 1)] = $x->optAmountPercentage; }
        }
        
        // products
        foreach ($params->products as $i => $x){
            if($x->skuNumber){ $data["skunumber" . "_" . ($i + 1)] = $x->skuNumber; }
            if($x->description){ $data["description" . "_" . ($i + 1)] = $x->description; }
            if($x->amount){ $data["amount" . "_" . ($i + 1)] = sprintf("%.2f", $x->amount); }
            if($x->quantity){ $data["quantity" . "_" . ($i + 1)] = "" . $x->quantity; }
        }
        
        return $this->makeRequest($data);
    }

    public function simpleSale(SimpleSaleParams $params)
    {
        $data = [];
        
        $data["transtype"] = "sale";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        return $this->makeRequest($data);
    }

    public function addPaymentTypesToCustomer(AddPaymentTypesToCustomerParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "updatecustomer";
        $data["token"] = $params->token;
        
        // paymentTypeToAdds
        foreach ($params->paymentTypeToAdds as $i => $x){
            $data["operationtype" . "_" . ($i + 1)] = "addpaytype";
            
        // paymentType
        if($x->paymentType->payType){ $data["paytype" . "_" . ($i + 1)] = $x->paymentType->payType; }
        if($x->paymentType->payNo){ $data["payno" . "_" . ($i + 1)] = "" . $x->paymentType->payNo; }
        
        // contactInfo
        $data["firstname" . "_" . ($i + 1)] = $x->paymentType->contactInfo->firstName;
        $data["lastname" . "_" . ($i + 1)] = $x->paymentType->contactInfo->lastName;
        if($x->paymentType->contactInfo->company){ $data["company" . "_" . ($i + 1)] = $x->paymentType->contactInfo->company; }
        
        // address
        if($x->paymentType->contactInfo->address->address1){ $data["address1" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->address1; }
        if($x->paymentType->contactInfo->address->city){ $data["city" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->city; }
        if($x->paymentType->contactInfo->address->state){ $data["state" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->state; }
        if($x->paymentType->contactInfo->address->zip){ $data["zip" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->zip; }
        if($x->paymentType->contactInfo->address->country){ $data["country" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->country; }
        if($x->paymentType->contactInfo->address->address2){ $data["address2" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->address2; }
        if($x->paymentType->contactInfo->phone){ $data["phone" . "_" . ($i + 1)] = $x->paymentType->contactInfo->phone; }
        if($x->paymentType->contactInfo->email){ $data["email" . "_" . ($i + 1)] = $x->paymentType->contactInfo->email; }
        
        // creditCard
        $data["cardnum" . "_" . ($i + 1)] = $x->paymentType->creditCard->cardNum;
        $data["cardexp" . "_" . ($i + 1)] = date_format($x->paymentType->creditCard->cardExp,"my");
        if($x->paymentType->creditCard->cvv){ $data["cvv" . "_" . ($i + 1)] = $x->paymentType->creditCard->cvv; }
        
        // bankAccount
        $data["bankname" . "_" . ($i + 1)] = $x->paymentType->bankAccount->bankName;
        $data["routing" . "_" . ($i + 1)] = $x->paymentType->bankAccount->routing;
        $data["account" . "_" . ($i + 1)] = $x->paymentType->bankAccount->account;
        $data["achaccounttype" . "_" . ($i + 1)] = $x->paymentType->bankAccount->achAccountType;
        $data["achaccountsubtype" . "_" . ($i + 1)] = $x->paymentType->bankAccount->achAccountSubType;
        
        // ewallet
        $data["ewalletaccount" . "_" . ($i + 1)] = $x->paymentType->ewallet->ewalletAccount;
        $data["ewallettype" . "_" . ($i + 1)] = "paypal";
        }
        
        return $this->makeRequest($data);
    }

    public function addCustomer(AddCustomerParams $params)
    {
        $data = [];
        
        $data["transtype"] = "addcustomer";
        $data["mkey"] = $this->apiKey;
        if($params->customerId){ $data["customerid"] = $params->customerId; }
        if($params->note){ $data["note"] = $params->note; }
        
        // defaultContactInfo
        $data["firstname"] = $params->defaultContactInfo->firstName;
        $data["lastname"] = $params->defaultContactInfo->lastName;
        if($params->defaultContactInfo->birthDate){ $data["birthdate"] = date_format($params->defaultContactInfo->birthDate,"m/d/y"); }
        if($params->defaultContactInfo->company){ $data["company"] = $params->defaultContactInfo->company; }
        if($params->defaultContactInfo->phone){ $data["phone"] = $params->defaultContactInfo->phone; }
        if($params->defaultContactInfo->email){ $data["email"] = $params->defaultContactInfo->email; }
        
        // address
        if($params->defaultContactInfo->address->address1){ $data["address1"] = $params->defaultContactInfo->address->address1; }
        if($params->defaultContactInfo->address->city){ $data["city"] = $params->defaultContactInfo->address->city; }
        if($params->defaultContactInfo->address->state){ $data["state"] = $params->defaultContactInfo->address->state; }
        if($params->defaultContactInfo->address->zip){ $data["zip"] = $params->defaultContactInfo->address->zip; }
        if($params->defaultContactInfo->address->country){ $data["country"] = $params->defaultContactInfo->address->country; }
        if($params->defaultContactInfo->address->address2){ $data["address2"] = $params->defaultContactInfo->address->address2; }
        
        // defaultAddress
        if($params->defaultAddress->address1){ $data["address1"] = $params->defaultAddress->address1; }
        if($params->defaultAddress->city){ $data["city"] = $params->defaultAddress->city; }
        if($params->defaultAddress->state){ $data["state"] = $params->defaultAddress->state; }
        if($params->defaultAddress->zip){ $data["zip"] = $params->defaultAddress->zip; }
        if($params->defaultAddress->country){ $data["country"] = $params->defaultAddress->country; }
        if($params->defaultAddress->address2){ $data["address2"] = $params->defaultAddress->address2; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // clientAccount
        if($params->clientAccount->userName){ $data["username"] = $params->clientAccount->userName; }
        if($params->clientAccount->password){ $data["password"] = $params->clientAccount->password; }
        if($params->clientAccount->clientUserEmail){ $data["clientuseremail"] = $params->clientAccount->clientUserEmail; }
        
        // paymentTypes
        foreach ($params->paymentTypes as $i => $x){
            if($x->payType){ $data["paytype" . "_" . ($i + 1)] = $x->payType; }
            if($x->payNo){ $data["payno" . "_" . ($i + 1)] = "" . $x->payNo; }
            
        // contactInfo
        $data["firstname" . "_" . ($i + 1)] = $x->contactInfo->firstName;
        $data["lastname" . "_" . ($i + 1)] = $x->contactInfo->lastName;
        if($x->contactInfo->company){ $data["company" . "_" . ($i + 1)] = $x->contactInfo->company; }
        
        // address
        if($x->contactInfo->address->address1){ $data["address1" . "_" . ($i + 1)] = $x->contactInfo->address->address1; }
        if($x->contactInfo->address->city){ $data["city" . "_" . ($i + 1)] = $x->contactInfo->address->city; }
        if($x->contactInfo->address->state){ $data["state" . "_" . ($i + 1)] = $x->contactInfo->address->state; }
        if($x->contactInfo->address->zip){ $data["zip" . "_" . ($i + 1)] = $x->contactInfo->address->zip; }
        if($x->contactInfo->address->country){ $data["country" . "_" . ($i + 1)] = $x->contactInfo->address->country; }
        if($x->contactInfo->address->address2){ $data["address2" . "_" . ($i + 1)] = $x->contactInfo->address->address2; }
        if($x->contactInfo->phone){ $data["phone" . "_" . ($i + 1)] = $x->contactInfo->phone; }
        if($x->contactInfo->email){ $data["email" . "_" . ($i + 1)] = $x->contactInfo->email; }
            
        // creditCard
        $data["cardnum" . "_" . ($i + 1)] = $x->creditCard->cardNum;
        $data["cardexp" . "_" . ($i + 1)] = date_format($x->creditCard->cardExp,"my");
        if($x->creditCard->cvv){ $data["cvv" . "_" . ($i + 1)] = $x->creditCard->cvv; }
            
        // bankAccount
        $data["bankname" . "_" . ($i + 1)] = $x->bankAccount->bankName;
        $data["routing" . "_" . ($i + 1)] = $x->bankAccount->routing;
        $data["account" . "_" . ($i + 1)] = $x->bankAccount->account;
        $data["achaccounttype" . "_" . ($i + 1)] = $x->bankAccount->achAccountType;
        $data["achaccountsubtype" . "_" . ($i + 1)] = $x->bankAccount->achAccountSubType;
            
        // ewallet
        $data["ewalletaccount" . "_" . ($i + 1)] = $x->ewallet->ewalletAccount;
        $data["ewallettype" . "_" . ($i + 1)] = "paypal";
        }
        
        return $this->makeRequest($data);
    }

    public function deleteDataVaultCustomer(DeleteDataVaultCustomerParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "deletecustomer";
        $data["token"] = $params->token;
        
        return $this->makeRequest($data);
    }

    public function deletePaymentType(DeletePaymentTypeParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "updatecustomer";
        $data["token"] = $params->token;
        
        // paymentTypeToDeletes
        foreach ($params->paymentTypeToDeletes as $i => $x){
            $data["operationtype" . "_" . ($i + 1)] = "deletepaytype";
            $data["token" . "_" . ($i + 1)] = $x->token;
        }
        
        return $this->makeRequest($data);
    }

    public function retrieveCustomer(RetrieveCustomerParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "getcustomer";
        $data["token"] = $params->token;
        
        return $this->makeRequest($data);
    }

    public function retrievePaymentType(RetrievePaymentTypeParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "getcustomer";
        $data["token"] = $params->token;
        
        return $this->makeRequest($data);
    }

    public function updateCustomer(UpdateCustomerParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "updatecustomer";
        $data["token"] = $params->token;
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // clientAccount
        if($params->clientAccount->userName){ $data["username"] = $params->clientAccount->userName; }
        if($params->clientAccount->password){ $data["password"] = $params->clientAccount->password; }
        if($params->clientAccount->clientUserEmail){ $data["clientuseremail"] = $params->clientAccount->clientUserEmail; }
        
        return $this->makeRequest($data);
    }

    public function updatePaymentType(UpdatePaymentTypeParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "updatecustomer";
        $data["token"] = $params->token;
        
        // paymentTypeToUpdates
        foreach ($params->paymentTypeToUpdates as $i => $x){
            $data["operationtype" . "_" . ($i + 1)] = "updatepaytype";
            $data["token" . "_" . ($i + 1)] = $x->token;
            
        // paymentType
        if($x->paymentType->payType){ $data["paytype" . "_" . ($i + 1)] = $x->paymentType->payType; }
        if($x->paymentType->payNo){ $data["payno" . "_" . ($i + 1)] = "" . $x->paymentType->payNo; }
        
        // contactInfo
        $data["firstname" . "_" . ($i + 1)] = $x->paymentType->contactInfo->firstName;
        $data["lastname" . "_" . ($i + 1)] = $x->paymentType->contactInfo->lastName;
        if($x->paymentType->contactInfo->company){ $data["company" . "_" . ($i + 1)] = $x->paymentType->contactInfo->company; }
        
        // address
        if($x->paymentType->contactInfo->address->address1){ $data["address1" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->address1; }
        if($x->paymentType->contactInfo->address->city){ $data["city" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->city; }
        if($x->paymentType->contactInfo->address->state){ $data["state" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->state; }
        if($x->paymentType->contactInfo->address->zip){ $data["zip" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->zip; }
        if($x->paymentType->contactInfo->address->country){ $data["country" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->country; }
        if($x->paymentType->contactInfo->address->address2){ $data["address2" . "_" . ($i + 1)] = $x->paymentType->contactInfo->address->address2; }
        if($x->paymentType->contactInfo->phone){ $data["phone" . "_" . ($i + 1)] = $x->paymentType->contactInfo->phone; }
        if($x->paymentType->contactInfo->email){ $data["email" . "_" . ($i + 1)] = $x->paymentType->contactInfo->email; }
        
        // creditCard
        $data["cardnum" . "_" . ($i + 1)] = $x->paymentType->creditCard->cardNum;
        $data["cardexp" . "_" . ($i + 1)] = date_format($x->paymentType->creditCard->cardExp,"my");
        if($x->paymentType->creditCard->cvv){ $data["cvv" . "_" . ($i + 1)] = $x->paymentType->creditCard->cvv; }
        
        // bankAccount
        $data["bankname" . "_" . ($i + 1)] = $x->paymentType->bankAccount->bankName;
        $data["routing" . "_" . ($i + 1)] = $x->paymentType->bankAccount->routing;
        $data["account" . "_" . ($i + 1)] = $x->paymentType->bankAccount->account;
        $data["achaccounttype" . "_" . ($i + 1)] = $x->paymentType->bankAccount->achAccountType;
        $data["achaccountsubtype" . "_" . ($i + 1)] = $x->paymentType->bankAccount->achAccountSubType;
        
        // ewallet
        $data["ewalletaccount" . "_" . ($i + 1)] = $x->paymentType->ewallet->ewalletAccount;
        $data["ewallettype" . "_" . ($i + 1)] = "paypal";
        }
        
        return $this->makeRequest($data);
    }

    public function decryptCustomFields(DecryptCustomFieldsParams $params)
    {
        $data = [];
        
        $data["transtype"] = "decrypt";
        $data["mkey"] = $this->apiKey;
        $data["fieldname"] = $params->fieldName;
        $data["token"] = $params->token;
        
        return $this->makeRequest($data);
    }

    public function eWalletSimpleCredit(EWalletSimpleCreditParams $params)
    {
        $data = [];
        
        $data["transtype"] = "credit";
        $data["mkey"] = $this->apiKey;
        $data["ewallet"] = "paypal";
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->currency){ $data["currency"] = $params->currency; }
        
        // ewallet
        $data["ewalletaccount"] = $params->ewallet->ewalletAccount;
        
        return $this->makeRequest($data);
    }

    public function advancedFiservSale(AdvancedFiservSaleParams $params)
    {
        $data = [];
        
        if($params->orderDesc){ $data["orderdesc"] = $params->orderDesc; }
        $data["transtype"] = "sale";
        if($params->poNumber){ $data["ponumber"] = $params->poNumber; }
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->currency){ $data["currency"] = $params->currency; }
        if($params->shipAmount){ $data["shipamount"] = sprintf("%.2f", $params->shipAmount); }
        if($params->tax){ $data["tax"] = sprintf("%.2f", $params->tax); }
        $data["mkey"] = $this->apiKey;
        if($params->orderId){ $data["orderid"] = $params->orderId; }
        if($params->cardIpAddress){ $data["cardipaddress"] = $params->cardIpAddress; }
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // products
        foreach ($params->products as $i => $x){
            if($x->skuNumber){ $data["skunumber" . "_" . ($i + 1)] = $x->skuNumber; }
            if($x->description){ $data["description" . "_" . ($i + 1)] = $x->description; }
            if($x->amount){ $data["amount" . "_" . ($i + 1)] = sprintf("%.2f", $x->amount); }
            if($x->quantity){ $data["quantity" . "_" . ($i + 1)] = "" . $x->quantity; }
        }
        
        return $this->makeRequest($data);
    }

    public function fiservSimpleSale(FiservSimpleSaleParams $params)
    {
        $data = [];
        
        $data["transtype"] = "sale";
        $data["mkey"] = $this->apiKey;
        $data["cardnum"] = $params->cardNum;
        $data["cardexp"] = date_format($params->cardExp,"my");
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        return $this->makeRequest($data);
    }

    public function cancelInvoiceByCustomer(CancelInvoiceByCustomerParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "cancelinvoicebycustomer";
        $data["invoicenumber"] = $params->invoiceNumber;
        $data["invoicestatusreason"] = $params->invoiceStatusReason;
        
        return $this->makeRequest($data);
    }

    public function cancelInvoice(CancelInvoiceParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "cancelinvoice";
        $data["invoicenumber"] = $params->invoiceNumber;
        $data["invoicestatusreason"] = $params->invoiceStatusReason;
        
        return $this->makeRequest($data);
    }

    public function createInvoice(CreateInvoiceParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "createmerchantinvoice";
        if($params->customerToken){ $data["customertoken"] = $params->customerToken; }
        $data["invoicedate"] = date_format($params->invoiceDate,"m/d/y");
        $data["currency"] = $params->currency;
        $data["invoicestatus"] = $params->invoiceStatus;
        if($params->invoiceSource){ $data["invoicesource"] = $params->invoiceSource; }
        $data["invoiceamount"] = sprintf("%.2f", $params->invoiceAmount);
        if($params->sendPaymentLinkEmail){ $data["sendpaymentlinkemail"] = $params->sendPaymentLinkEmail; }
        
        // invoiceProducts
        foreach ($params->invoiceProducts as $i => $x){
            if($x->invoiceItemSku){ $data["invoiceitemsku" . "_" . ($i + 1)] = $x->invoiceItemSku; }
            if($x->invoiceItemDescription){ $data["invoiceitemdescription" . "_" . ($i + 1)] = $x->invoiceItemDescription; }
            if($x->invoiceItemPrice){ $data["invoiceitemprice" . "_" . ($i + 1)] = sprintf("%.2f", $x->invoiceItemPrice); }
            if($x->invoiceItemQuantity){ $data["invoiceitemquantity" . "_" . ($i + 1)] = $x->invoiceItemQuantity; }
        }
        
        return $this->makeRequest($data);
    }

    public function retrieveInvoice(RetrieveInvoiceParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "getinvoice";
        $data["invoicenumber"] = $params->invoiceNumber;
        
        return $this->makeRequest($data);
    }

    public function payInvoiceWithBankAccount(PayInvoiceWithBankAccountParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "payinvoice";
        $data["invoicenumber"] = $params->invoiceNumber;
        if($params->fax){ $data["fax"] = $params->fax; }
        
        // bankAccount
        $data["bankname"] = $params->bankAccount->bankName;
        $data["routing"] = $params->bankAccount->routing;
        $data["account"] = $params->bankAccount->account;
        $data["achaccounttype"] = $params->bankAccount->achAccountType;
        $data["achaccountsubtype"] = $params->bankAccount->achAccountSubType;
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        return $this->makeRequest($data);
    }

    public function payInvoiceWithCreditCard(PayInvoiceWithCreditCardParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "payinvoice";
        $data["invoicenumber"] = $params->invoiceNumber;
        if($params->fax){ $data["fax"] = $params->fax; }
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        return $this->makeRequest($data);
    }

    public function updateInvoice(UpdateInvoiceParams $params)
    {
        $data = [];
        
        if($params->currency){ $data["currency"] = $params->currency; }
        $data["mkey"] = $this->apiKey;
        $data["invoicenumber"] = $params->invoiceNumber;
        if($params->customerToken){ $data["customertoken"] = $params->customerToken; }
        if($params->invoiceDate){ $data["invoicedate"] = date_format($params->invoiceDate,"m/d/y"); }
        $data["transtype"] = "updateinvoice";
        if($params->invoiceStatus){ $data["invoicestatus"] = $params->invoiceStatus; }
        if($params->invoiceSource){ $data["invoicesource"] = $params->invoiceSource; }
        if($params->invoiceAmount){ $data["invoiceamount"] = sprintf("%.2f", $params->invoiceAmount); }
        if($params->sendPaymentLinkEmail){ $data["sendpaymentlinkemail"] = $params->sendPaymentLinkEmail; }
        
        // invoiceProducts
        foreach ($params->invoiceProducts as $i => $x){
            if($x->invoiceItemSku){ $data["invoiceitemsku" . "_" . ($i + 1)] = $x->invoiceItemSku; }
            if($x->invoiceItemDescription){ $data["invoiceitemdescription" . "_" . ($i + 1)] = $x->invoiceItemDescription; }
            if($x->invoiceItemPrice){ $data["invoiceitemprice" . "_" . ($i + 1)] = sprintf("%.2f", $x->invoiceItemPrice); }
            if($x->invoiceItemQuantity){ $data["invoiceitemquantity" . "_" . ($i + 1)] = $x->invoiceItemQuantity; }
        }
        
        return $this->makeRequest($data);
    }

    public function simpleRefund(SimpleRefundParams $params)
    {
        $data = [];
        
        $data["transtype"] = "refund";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        return $this->makeRequest($data);
    }

    public function advancedRefund(AdvancedRefundParams $params)
    {
        $data = [];
        
        $data["transtype"] = "refund";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        // optionalAmounts
        foreach ($params->optionalAmounts as $i => $x){
            if($x->optAmountType){ $data["optamounttype" . "_" . ($i + 1)] = $x->optAmountType; }
            if($x->optAmountValue){ $data["optamountvalue" . "_" . ($i + 1)] = sprintf("%.2f", $x->optAmountValue); }
            if($x->optAmountPercentage){ $data["optamountpercentage" . "_" . ($i + 1)] = $x->optAmountPercentage; }
        }
        
        return $this->makeRequest($data);
    }

    public function advancedVoid(AdvancedVoidParams $params)
    {
        $data = [];
        
        $data["transtype"] = "void";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        return $this->makeRequest($data);
    }

    public function simpleVoid(SimpleVoidParams $params)
    {
        $data = [];
        
        $data["transtype"] = "void";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        
        return $this->makeRequest($data);
    }

    public function assignPaymentPlanToCustomer(AssignPaymentPlanToCustomerParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        if($params->routingKey){ $data["routingkey"] = $params->routingKey; }
        $data["customertoken"] = $params->customerToken;
        $data["plantoken"] = $params->planToken;
        $data["paymenttoken"] = $params->paymentToken;
        if($params->startDate){ $data["startdate"] = date_format($params->startDate,"m/d/y"); }
        if($params->productId){ $data["productid"] = $params->productId; }
        if($params->description){ $data["description"] = $params->description; }
        if($params->amount){ $data["amount"] = sprintf("%.2f", $params->amount); }
        $data["transtype"] = "assignplan";
        if($params->useRecycling){ $data["userecycling"] = $params->useRecycling == true ? "true" : "false"; }
        if($params->retryCount){ $data["retrycount"] = "" . $params->retryCount; }
        if($params->retryType){ $data["retrytype"] = $params->retryType; }
        if($params->retryPeriod){ $data["retryperiod"] = "" . $params->retryPeriod; }
        if($params->retryDayOfWeek){ $data["retrydayofweek"] = $params->retryDayOfWeek; }
        if($params->retryFirstDayOfMonth){ $data["retryfirstdayofmonth"] = "" . $params->retryFirstDayOfMonth; }
        if($params->retrySecondDayOfMonth){ $data["retryseconddayofmonth"] = "" . $params->retrySecondDayOfMonth; }
        if($params->proratedPayment){ $data["proratedpayment"] = $params->proratedPayment == true ? "true" : "false"; }
        
        // notificationOptions
        if($params->notificationOptions->notifyPlanCompleteEmails){ $data["notifyplancompleteemails"] = $params->notificationOptions->notifyPlanCompleteEmails; }
        if($params->notificationOptions->notifyFailures){ $data["notifyfailures"] = $params->notificationOptions->notifyFailures == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDaysBeforeUpcomingPayment){ $data["notifydaysbeforeupcomingpayment"] = "" . $params->notificationOptions->notifyDaysBeforeUpcomingPayment; }
        if($params->notificationOptions->notifyPlanSummary){ $data["notifyplansummary"] = $params->notificationOptions->notifyPlanSummary == true ? "true" : "false"; }
        if($params->notificationOptions->notifyPlanSummaryInterval){ $data["notifyplansummaryinterval"] = $params->notificationOptions->notifyPlanSummaryInterval; }
        if($params->notificationOptions->notifyPlanSummaryEmails){ $data["notifyplansummaryemails"] = $params->notificationOptions->notifyPlanSummaryEmails; }
        if($params->notificationOptions->notifyDailyStats){ $data["notifydailystats"] = $params->notificationOptions->notifyDailyStats == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDailyStatsEmails){ $data["notifydailystatsemails"] = $params->notificationOptions->notifyDailyStatsEmails; }
        if($params->notificationOptions->notifyPlanComplete){ $data["notifyplancomplete"] = $params->notificationOptions->notifyPlanComplete == true ? "true" : "false"; }
        if($params->notificationOptions->notifyUpcomingPayment){ $data["notifyupcomingpayment"] = $params->notificationOptions->notifyUpcomingPayment == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDecline){ $data["notifydecline"] = $params->notificationOptions->notifyDecline == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDeclineEmails){ $data["notifydeclineemails"] = $params->notificationOptions->notifyDeclineEmails; }
        if($params->notificationOptions->notifyViaFtp){ $data["notifyviaftp"] = $params->notificationOptions->notifyViaFtp == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUrl){ $data["notifyviaftpurl"] = $params->notificationOptions->notifyViaFtpUrl == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUserName){ $data["notifyviaftpusername"] = $params->notificationOptions->notifyViaFtpUserName; }
        if($params->notificationOptions->notifyViaFtpPassword){ $data["notifyviaftppassword"] = $params->notificationOptions->notifyViaFtpPassword; }
        if($params->notificationOptions->notifyFlagged){ $data["notifyflagged"] = $params->notificationOptions->notifyFlagged == true ? "true" : "false"; }
        if($params->notificationOptions->notifyFlaggedEmails){ $data["notifyflaggedemails"] = $params->notificationOptions->notifyFlaggedEmails; }
        
        return $this->makeRequest($data);
    }

    public function cancelPlanAssignment(CancelPlanAssignmentParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "cancelassignment";
        $data["assignmenttoken"] = $params->assignmentToken;
        
        return $this->makeRequest($data);
    }

    public function createPaymentPlan(CreatePaymentPlanParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        if($params->autoCreateClientAccounts){ $data["autocreateclientaccounts"] = $params->autoCreateClientAccounts == true ? "true" : "false"; }
        $data["planname"] = $params->planName;
        $data["plandesc"] = $params->planDesc;
        $data["startdate"] = date_format($params->startDate,"m/d/y");
        if($params->retrySecondDayOfMonth){ $data["retryseconddayofmonth"] = "" . $params->retrySecondDayOfMonth; }
        if($params->reviewOnAssignment){ $data["reviewonassignment"] = $params->reviewOnAssignment == true ? "true" : "false"; }
        if($params->processImmediately){ $data["processimmediately"] = $params->processImmediately == true ? "true" : "false"; }
        if($params->overrideSender){ $data["overridesender"] = $params->overrideSender == true ? "true" : "false"; }
        if($params->senderEmail){ $data["senderemail"] = $params->senderEmail; }
        $data["transtype"] = "addplan";
        if($params->retryFirstDayOfMonth){ $data["retryfirstdayofmonth"] = "" . $params->retryFirstDayOfMonth; }
        if($params->useRecycling){ $data["userecycling"] = $params->useRecycling == true ? "true" : "false"; }
        if($params->retryCount){ $data["retrycount"] = "" . $params->retryCount; }
        if($params->retryType){ $data["retrytype"] = $params->retryType; }
        if($params->retryPeriod){ $data["retryperiod"] = "" . $params->retryPeriod; }
        if($params->retryDayOfWeek){ $data["retrydayofweek"] = $params->retryDayOfWeek; }
        
        // defaultKeys
        if($params->defaultKeys->defaultAchMKey){ $data["defaultachmkey"] = $params->defaultKeys->defaultAchMKey; }
        if($params->defaultKeys->defaultCreditCardMKey){ $data["defaultcreditcardmkey"] = $params->defaultKeys->defaultCreditCardMKey; }
        if($params->defaultKeys->defaultEcheckMKey){ $data["defaultecheckmkey"] = $params->defaultKeys->defaultEcheckMKey; }
        if($params->defaultKeys->defaultStartCardMKey){ $data["defaultstartcardmkey"] = $params->defaultKeys->defaultStartCardMKey; }
        if($params->defaultKeys->defaultEwalletMKey){ $data["defaultewalletmkey"] = $params->defaultKeys->defaultEwalletMKey; }
        
        // notificationOptions
        if($params->notificationOptions->notifyPlanCompleteEmails){ $data["notifyplancompleteemails"] = $params->notificationOptions->notifyPlanCompleteEmails; }
        if($params->notificationOptions->notifyFailures){ $data["notifyfailures"] = $params->notificationOptions->notifyFailures == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDaysBeforeUpcomingPayment){ $data["notifydaysbeforeupcomingpayment"] = "" . $params->notificationOptions->notifyDaysBeforeUpcomingPayment; }
        if($params->notificationOptions->notifyPlanSummary){ $data["notifyplansummary"] = $params->notificationOptions->notifyPlanSummary == true ? "true" : "false"; }
        if($params->notificationOptions->notifyPlanSummaryInterval){ $data["notifyplansummaryinterval"] = $params->notificationOptions->notifyPlanSummaryInterval; }
        if($params->notificationOptions->notifyPlanSummaryEmails){ $data["notifyplansummaryemails"] = $params->notificationOptions->notifyPlanSummaryEmails; }
        if($params->notificationOptions->notifyDailyStats){ $data["notifydailystats"] = $params->notificationOptions->notifyDailyStats == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDailyStatsEmails){ $data["notifydailystatsemails"] = $params->notificationOptions->notifyDailyStatsEmails; }
        if($params->notificationOptions->notifyPlanComplete){ $data["notifyplancomplete"] = $params->notificationOptions->notifyPlanComplete == true ? "true" : "false"; }
        if($params->notificationOptions->notifyUpcomingPayment){ $data["notifyupcomingpayment"] = $params->notificationOptions->notifyUpcomingPayment == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDecline){ $data["notifydecline"] = $params->notificationOptions->notifyDecline == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDeclineEmails){ $data["notifydeclineemails"] = $params->notificationOptions->notifyDeclineEmails; }
        if($params->notificationOptions->notifyViaFtp){ $data["notifyviaftp"] = $params->notificationOptions->notifyViaFtp == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUrl){ $data["notifyviaftpurl"] = $params->notificationOptions->notifyViaFtpUrl == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUserName){ $data["notifyviaftpusername"] = $params->notificationOptions->notifyViaFtpUserName; }
        if($params->notificationOptions->notifyViaFtpPassword){ $data["notifyviaftppassword"] = $params->notificationOptions->notifyViaFtpPassword; }
        if($params->notificationOptions->notifyFlagged){ $data["notifyflagged"] = $params->notificationOptions->notifyFlagged == true ? "true" : "false"; }
        if($params->notificationOptions->notifyFlaggedEmails){ $data["notifyflaggedemails"] = $params->notificationOptions->notifyFlaggedEmails; }
        
        // sequenceStepss
        foreach ($params->sequenceStepss as $i => $x){
            $data["sequence" . "_" . ($i + 1)] = "" . $x->sequence;
            $data["amount" . "_" . ($i + 1)] = sprintf("%.2f", $x->amount);
            $data["scheduletype" . "_" . ($i + 1)] = $x->scheduleType;
            $data["scheduleday" . "_" . ($i + 1)] = "" . $x->scheduleDay;
            $data["duration" . "_" . ($i + 1)] = "" . $x->duration;
            $data["operationtype" . "_" . ($i + 1)] = $x->operationType;
            if($x->productId){ $data["productid" . "_" . ($i + 1)] = $x->productId; }
            if($x->description){ $data["description" . "_" . ($i + 1)] = $x->description; }
            if($x->newSequence){ $data["newsequence" . "_" . ($i + 1)] = "" . $x->newSequence; }
        }
        
        return $this->makeRequest($data);
    }

    public function deletePlan(DeletePlanParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "deleteplan";
        $data["token"] = $params->token;
        if($params->cancelPayments){ $data["cancelpayments"] = $params->cancelPayments == true ? "true" : "false"; }
        
        return $this->makeRequest($data);
    }

    public function deleteSequence(DeleteSequenceParams $params)
    {
        $data = [];
        
        $data["mkey"] = $this->apiKey;
        $data["transtype"] = "updateplan";
        $data["token"] = $params->token;
        
        // deleteSequenceStepss
        foreach ($params->deleteSequenceStepss as $i => $x){
            $data["operationtype" . "_" . ($i + 1)] = "deletesequence";
            $data["sequence" . "_" . ($i + 1)] = "" . $x->sequence;
        }
        
        return $this->makeRequest($data);
    }

    public function updatePaymentPlanAssignment(UpdatePaymentPlanAssignmentParams $params)
    {
        $data = [];
        
        if($params->useRecycling){ $data["userecycling"] = $params->useRecycling == true ? "true" : "false"; }
        $data["mkey"] = $this->apiKey;
        $data["assignmenttoken"] = $params->assignmentToken;
        if($params->paymentToken){ $data["paymenttoken"] = $params->paymentToken; }
        if($params->startDate){ $data["startdate"] = date_format($params->startDate,"m/d/y"); }
        if($params->productId){ $data["productid"] = $params->productId; }
        if($params->description){ $data["description"] = $params->description; }
        if($params->proratedPayment){ $data["proratedpayment"] = $params->proratedPayment == true ? "true" : "false"; }
        $data["transtype"] = "updateassignment";
        if($params->retryCount){ $data["retrycount"] = "" . $params->retryCount; }
        if($params->retryType){ $data["retrytype"] = $params->retryType; }
        if($params->retryPeriod){ $data["retryperiod"] = "" . $params->retryPeriod; }
        if($params->retryDayOfWeek){ $data["retrydayofweek"] = $params->retryDayOfWeek; }
        if($params->retryFirstDayOfMonth){ $data["retryfirstdayofmonth"] = "" . $params->retryFirstDayOfMonth; }
        if($params->retrySecondDayOfMonth){ $data["retryseconddayofmonth"] = "" . $params->retrySecondDayOfMonth; }
        if($params->routingKey){ $data["routingkey"] = $params->routingKey; }
        
        // notificationOptions
        if($params->notificationOptions->notifyPlanCompleteEmails){ $data["notifyplancompleteemails"] = $params->notificationOptions->notifyPlanCompleteEmails; }
        if($params->notificationOptions->notifyFailures){ $data["notifyfailures"] = $params->notificationOptions->notifyFailures == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDaysBeforeUpcomingPayment){ $data["notifydaysbeforeupcomingpayment"] = "" . $params->notificationOptions->notifyDaysBeforeUpcomingPayment; }
        if($params->notificationOptions->notifyPlanSummary){ $data["notifyplansummary"] = $params->notificationOptions->notifyPlanSummary == true ? "true" : "false"; }
        if($params->notificationOptions->notifyPlanSummaryInterval){ $data["notifyplansummaryinterval"] = $params->notificationOptions->notifyPlanSummaryInterval; }
        if($params->notificationOptions->notifyPlanSummaryEmails){ $data["notifyplansummaryemails"] = $params->notificationOptions->notifyPlanSummaryEmails; }
        if($params->notificationOptions->notifyDailyStats){ $data["notifydailystats"] = $params->notificationOptions->notifyDailyStats == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDailyStatsEmails){ $data["notifydailystatsemails"] = $params->notificationOptions->notifyDailyStatsEmails; }
        if($params->notificationOptions->notifyPlanComplete){ $data["notifyplancomplete"] = $params->notificationOptions->notifyPlanComplete == true ? "true" : "false"; }
        if($params->notificationOptions->notifyUpcomingPayment){ $data["notifyupcomingpayment"] = $params->notificationOptions->notifyUpcomingPayment == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDecline){ $data["notifydecline"] = $params->notificationOptions->notifyDecline == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDeclineEmails){ $data["notifydeclineemails"] = $params->notificationOptions->notifyDeclineEmails; }
        if($params->notificationOptions->notifyViaFtp){ $data["notifyviaftp"] = $params->notificationOptions->notifyViaFtp == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUrl){ $data["notifyviaftpurl"] = $params->notificationOptions->notifyViaFtpUrl == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUserName){ $data["notifyviaftpusername"] = $params->notificationOptions->notifyViaFtpUserName; }
        if($params->notificationOptions->notifyViaFtpPassword){ $data["notifyviaftppassword"] = $params->notificationOptions->notifyViaFtpPassword; }
        if($params->notificationOptions->notifyFlagged){ $data["notifyflagged"] = $params->notificationOptions->notifyFlagged == true ? "true" : "false"; }
        if($params->notificationOptions->notifyFlaggedEmails){ $data["notifyflaggedemails"] = $params->notificationOptions->notifyFlaggedEmails; }
        
        return $this->makeRequest($data);
    }

    public function updatePaymentPlan(UpdatePaymentPlanParams $params)
    {
        $data = [];
        
        if($params->retryType){ $data["retrytype"] = $params->retryType; }
        $data["mkey"] = $this->apiKey;
        $data["token"] = $params->token;
        if($params->planName){ $data["planname"] = $params->planName; }
        if($params->planDesc){ $data["plandesc"] = $params->planDesc; }
        if($params->startDate){ $data["startdate"] = date_format($params->startDate,"m/d/y"); }
        if($params->senderEmail){ $data["senderemail"] = $params->senderEmail; }
        if($params->useRecycling){ $data["userecycling"] = $params->useRecycling == true ? "true" : "false"; }
        if($params->overrideSender){ $data["overridesender"] = $params->overrideSender == true ? "true" : "false"; }
        if($params->retryCount){ $data["retrycount"] = "" . $params->retryCount; }
        $data["transtype"] = "updateplan";
        if($params->retryPeriod){ $data["retryperiod"] = "" . $params->retryPeriod; }
        if($params->retryDayOfWeek){ $data["retrydayofweek"] = $params->retryDayOfWeek; }
        if($params->retryFirstDayOfMonth){ $data["retryfirstdayofmonth"] = "" . $params->retryFirstDayOfMonth; }
        if($params->retrySecondDayOfMonth){ $data["retryseconddayofmonth"] = "" . $params->retrySecondDayOfMonth; }
        if($params->autoCreateClientAccounts){ $data["autocreateclientaccounts"] = $params->autoCreateClientAccounts == true ? "true" : "false"; }
        if($params->reviewOnAssignment){ $data["reviewonassignment"] = $params->reviewOnAssignment == true ? "true" : "false"; }
        if($params->processImmediately){ $data["processimmediately"] = $params->processImmediately == true ? "true" : "false"; }
        
        // notificationOptions
        if($params->notificationOptions->notifyPlanCompleteEmails){ $data["notifyplancompleteemails"] = $params->notificationOptions->notifyPlanCompleteEmails; }
        if($params->notificationOptions->notifyFailures){ $data["notifyfailures"] = $params->notificationOptions->notifyFailures == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDaysBeforeUpcomingPayment){ $data["notifydaysbeforeupcomingpayment"] = "" . $params->notificationOptions->notifyDaysBeforeUpcomingPayment; }
        if($params->notificationOptions->notifyPlanSummary){ $data["notifyplansummary"] = $params->notificationOptions->notifyPlanSummary == true ? "true" : "false"; }
        if($params->notificationOptions->notifyPlanSummaryInterval){ $data["notifyplansummaryinterval"] = $params->notificationOptions->notifyPlanSummaryInterval; }
        if($params->notificationOptions->notifyPlanSummaryEmails){ $data["notifyplansummaryemails"] = $params->notificationOptions->notifyPlanSummaryEmails; }
        if($params->notificationOptions->notifyDailyStats){ $data["notifydailystats"] = $params->notificationOptions->notifyDailyStats == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDailyStatsEmails){ $data["notifydailystatsemails"] = $params->notificationOptions->notifyDailyStatsEmails; }
        if($params->notificationOptions->notifyPlanComplete){ $data["notifyplancomplete"] = $params->notificationOptions->notifyPlanComplete == true ? "true" : "false"; }
        if($params->notificationOptions->notifyUpcomingPayment){ $data["notifyupcomingpayment"] = $params->notificationOptions->notifyUpcomingPayment == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDecline){ $data["notifydecline"] = $params->notificationOptions->notifyDecline == true ? "true" : "false"; }
        if($params->notificationOptions->notifyDeclineEmails){ $data["notifydeclineemails"] = $params->notificationOptions->notifyDeclineEmails; }
        if($params->notificationOptions->notifyViaFtp){ $data["notifyviaftp"] = $params->notificationOptions->notifyViaFtp == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUrl){ $data["notifyviaftpurl"] = $params->notificationOptions->notifyViaFtpUrl == true ? "true" : "false"; }
        if($params->notificationOptions->notifyViaFtpUserName){ $data["notifyviaftpusername"] = $params->notificationOptions->notifyViaFtpUserName; }
        if($params->notificationOptions->notifyViaFtpPassword){ $data["notifyviaftppassword"] = $params->notificationOptions->notifyViaFtpPassword; }
        if($params->notificationOptions->notifyFlagged){ $data["notifyflagged"] = $params->notificationOptions->notifyFlagged == true ? "true" : "false"; }
        if($params->notificationOptions->notifyFlaggedEmails){ $data["notifyflaggedemails"] = $params->notificationOptions->notifyFlaggedEmails; }
        
        // defaultKeys
        if($params->defaultKeys->defaultAchMKey){ $data["defaultachmkey"] = $params->defaultKeys->defaultAchMKey; }
        if($params->defaultKeys->defaultCreditCardMKey){ $data["defaultcreditcardmkey"] = $params->defaultKeys->defaultCreditCardMKey; }
        if($params->defaultKeys->defaultEcheckMKey){ $data["defaultecheckmkey"] = $params->defaultKeys->defaultEcheckMKey; }
        if($params->defaultKeys->defaultStartCardMKey){ $data["defaultstartcardmkey"] = $params->defaultKeys->defaultStartCardMKey; }
        if($params->defaultKeys->defaultEwalletMKey){ $data["defaultewalletmkey"] = $params->defaultKeys->defaultEwalletMKey; }
        
        // sequenceStepss
        foreach ($params->sequenceStepss as $i => $x){
            $data["sequence" . "_" . ($i + 1)] = "" . $x->sequence;
            $data["amount" . "_" . ($i + 1)] = sprintf("%.2f", $x->amount);
            $data["scheduletype" . "_" . ($i + 1)] = $x->scheduleType;
            $data["scheduleday" . "_" . ($i + 1)] = "" . $x->scheduleDay;
            $data["duration" . "_" . ($i + 1)] = "" . $x->duration;
            $data["operationtype" . "_" . ($i + 1)] = $x->operationType;
            if($x->productId){ $data["productid" . "_" . ($i + 1)] = $x->productId; }
            if($x->description){ $data["description" . "_" . ($i + 1)] = $x->description; }
            if($x->newSequence){ $data["newsequence" . "_" . ($i + 1)] = "" . $x->newSequence; }
        }
        
        return $this->makeRequest($data);
    }

    public function simpleOfflineCapture(SimpleOfflineCaptureParams $params)
    {
        $data = [];
        
        $data["transtype"] = "offline";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        $data["authcode"] = $params->authCode;
        $data["authdate"] = date_format($params->authDate,"m/d/y");
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        return $this->makeRequest($data);
    }

    public function advancedCapture(AdvancedCaptureParams $params)
    {
        $data = [];
        
        $data["transtype"] = "capture";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        $data["amount"] = sprintf("%.2f", $params->amount);
        if($params->shipTrackNum){ $data["shiptracknum"] = $params->shipTrackNum; }
        if($params->shipCarrier){ $data["shipcarrier"] = $params->shipCarrier; }
        if($params->orderId){ $data["orderid"] = $params->orderId; }
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        // optionalAmounts
        foreach ($params->optionalAmounts as $i => $x){
            if($x->optAmountType){ $data["optamounttype" . "_" . ($i + 1)] = $x->optAmountType; }
            if($x->optAmountValue){ $data["optamountvalue" . "_" . ($i + 1)] = sprintf("%.2f", $x->optAmountValue); }
            if($x->optAmountPercentage){ $data["optamountpercentage" . "_" . ($i + 1)] = $x->optAmountPercentage; }
        }
        
        return $this->makeRequest($data);
    }

    public function simpleAuthorization(SimpleAuthorizationParams $params)
    {
        $data = [];
        
        $data["transtype"] = "auth";
        $data["mkey"] = $this->apiKey;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // creditCard
        $data["cardnum"] = $params->creditCard->cardNum;
        $data["cardexp"] = date_format($params->creditCard->cardExp,"my");
        if($params->creditCard->cvv){ $data["cvv"] = $params->creditCard->cvv; }
        
        return $this->makeRequest($data);
    }

    public function simpleCapture(SimpleCaptureParams $params)
    {
        $data = [];
        
        $data["transtype"] = "capture";
        $data["mkey"] = $this->apiKey;
        $data["transid"] = $params->transId;
        $data["amount"] = sprintf("%.2f", $params->amount);
        
        // sendTransReceiptOptions
        if($params->sendTransReceiptOptions->sendTransReceiptToEmails){ $data["sendtransreceipttoemails"] = $params->sendTransReceiptOptions->sendTransReceiptToEmails; }
        if($params->sendTransReceiptOptions->sendTransReceiptToBillEmail){ $data["sendtransreceipttobillemail"] = $params->sendTransReceiptOptions->sendTransReceiptToBillEmail == true ? "true" : "false"; }
        if($params->sendTransReceiptOptions->sendTransReceiptToShipEmail){ $data["sendtransreceipttoshipemail"] = $params->sendTransReceiptOptions->sendTransReceiptToShipEmail == true ? "true" : "false"; }
        
        return $this->makeRequest($data);
    }

    public function advancedStarCard(AdvancedStarCardParams $params)
    {
        $data = [];
        
        if($params->orderDesc){ $data["orderdesc"] = $params->orderDesc; }
        $data["transtype"] = "sale";
        $data["cardexp"] = date_format($params->cardExp,"my");
        $data["amount"] = sprintf("%.2f", $params->amount);
        $data["cid"] = $params->cid;
        if($params->currency){ $data["currency"] = $params->currency; }
        $data["mkey"] = $this->apiKey;
        $data["cardnum"] = $params->cardNum;
        if($params->orderId){ $data["orderid"] = $params->orderId; }
        if($params->cardIpAddress){ $data["cardipaddress"] = $params->cardIpAddress; }
        if($params->tax){ $data["tax"] = sprintf("%.2f", $params->tax); }
        if($params->shipAmount){ $data["shipamount"] = sprintf("%.2f", $params->shipAmount); }
        if($params->poNumber){ $data["ponumber"] = $params->poNumber; }
        if($params->fax){ $data["fax"] = $params->fax; }
        
        // shippingContactInfo
        if($params->shippingContactInfo->shipFirstName){ $data["shipfirstname"] = $params->shippingContactInfo->shipFirstName; }
        if($params->shippingContactInfo->shipLastName){ $data["shiplastname"] = $params->shippingContactInfo->shipLastName; }
        if($params->shippingContactInfo->shipCompany){ $data["shipcompany"] = $params->shippingContactInfo->shipCompany; }
        if($params->shippingContactInfo->shipPhone){ $data["shipphone"] = $params->shippingContactInfo->shipPhone; }
        if($params->shippingContactInfo->shipEmail){ $data["shipemail"] = $params->shippingContactInfo->shipEmail; }
        
        // shippingAddress
        if($params->shippingContactInfo->shippingAddress->shipAddress1){ $data["shipaddress1"] = $params->shippingContactInfo->shippingAddress->shipAddress1; }
        if($params->shippingContactInfo->shippingAddress->shipCity){ $data["shipcity"] = $params->shippingContactInfo->shippingAddress->shipCity; }
        if($params->shippingContactInfo->shippingAddress->shipState){ $data["shipstate"] = $params->shippingContactInfo->shippingAddress->shipState; }
        if($params->shippingContactInfo->shippingAddress->shipZip){ $data["shipzip"] = $params->shippingContactInfo->shippingAddress->shipZip; }
        if($params->shippingContactInfo->shippingAddress->shipCountry){ $data["shipcountry"] = $params->shippingContactInfo->shippingAddress->shipCountry; }
        if($params->shippingContactInfo->shippingAddress->shipAddress2){ $data["shipaddress2"] = $params->shippingContactInfo->shippingAddress->shipAddress2; }
        
        // contactInfo
        $data["firstname"] = $params->contactInfo->firstName;
        $data["lastname"] = $params->contactInfo->lastName;
        if($params->contactInfo->birthDate){ $data["birthdate"] = date_format($params->contactInfo->birthDate,"m/d/y"); }
        if($params->contactInfo->company){ $data["company"] = $params->contactInfo->company; }
        if($params->contactInfo->phone){ $data["phone"] = $params->contactInfo->phone; }
        if($params->contactInfo->email){ $data["email"] = $params->contactInfo->email; }
        
        // address
        if($params->contactInfo->address->address1){ $data["address1"] = $params->contactInfo->address->address1; }
        if($params->contactInfo->address->city){ $data["city"] = $params->contactInfo->address->city; }
        if($params->contactInfo->address->state){ $data["state"] = $params->contactInfo->address->state; }
        if($params->contactInfo->address->zip){ $data["zip"] = $params->contactInfo->address->zip; }
        if($params->contactInfo->address->country){ $data["country"] = $params->contactInfo->address->country; }
        if($params->contactInfo->address->address2){ $data["address2"] = $params->contactInfo->address->address2; }
        
        // products
        foreach ($params->products as $i => $x){
            if($x->skuNumber){ $data["skunumber" . "_" . ($i + 1)] = $x->skuNumber; }
            if($x->description){ $data["description" . "_" . ($i + 1)] = $x->description; }
            if($x->amount){ $data["amount" . "_" . ($i + 1)] = sprintf("%.2f", $x->amount); }
            if($x->quantity){ $data["quantity" . "_" . ($i + 1)] = "" . $x->quantity; }
        }
        
        return $this->makeRequest($data);
    }

    public function simpleStarCard(SimpleStarCardParams $params)
    {
        $data = [];
        
        $data["transtype"] = "sale";
        $data["mkey"] = $this->apiKey;
        $data["cardnum"] = $params->cardNum;
        $data["amount"] = sprintf("%.2f", $params->amount);
        $data["cid"] = $params->cid;
        
        return $this->makeRequest($data);
    }

}
