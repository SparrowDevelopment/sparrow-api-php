
### ach/advanced-echeck-sale.md: AdvancedECheck 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedECheck:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedECheck.isSuccess;    // 1
$resultAdvancedECheck.status;    // 200
$resultAdvancedECheck.textResponse;    // SUCCESS
$resultAdvancedECheck.transId;    // 11284981
$resultAdvancedECheck.xRef;    // 3923165741
$resultAdvancedECheck.authCode;    // 123456
$resultAdvancedECheck.type;    // sale
$resultAdvancedECheck.codeResponse;    // 100
$resultAdvancedECheck.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### ach/advanced-sale.md: AdvancedACH 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedACH:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedACH.isSuccess;    // 1
$resultAdvancedACH.status;    // 200
$resultAdvancedACH.textResponse;    // SUCCESS
$resultAdvancedACH.transId;    // 11284982
$resultAdvancedACH.xRef;    // 3923165760
$resultAdvancedACH.authCode;    // 123456
$resultAdvancedACH.type;    // sale
$resultAdvancedACH.codeResponse;    // 100
$resultAdvancedACH.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### ach/simple-ach.md: SimpleACH 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleACH:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleACH.isSuccess;    // 1
$resultSimpleACH.status;    // 200
$resultSimpleACH.textResponse;    // SUCCESS
$resultSimpleACH.transId;    // 11284983
$resultSimpleACH.xRef;    // 3923165784
$resultSimpleACH.authCode;    // 123456
$resultSimpleACH.type;    // sale
$resultSimpleACH.codeResponse;    // 100
$resultSimpleACH.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### ach/simple-echeck.md: SimpleECheck 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleECheck:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleECheck.isSuccess;    // 1
$resultSimpleECheck.status;    // 200
$resultSimpleECheck.textResponse;    // SUCCESS
$resultSimpleECheck.transId;    // 11284984
$resultSimpleECheck.xRef;    // 3923165804
$resultSimpleECheck.authCode;    // 123456
$resultSimpleECheck.type;    // sale
$resultSimpleECheck.codeResponse;    // 100
$resultSimpleECheck.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### airline-passenger-sale/passenger-sale.md: PassengerSale (FAIL)

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT PassengerSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultPassengerSale.status;    // 500
$resultPassengerSale.response;    // 3
$resultPassengerSale.textResponse;    // Operation type is not supported by payment processor
$resultPassengerSale.type;    // passengersale

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### balance-inquiry/check-balance.md: RetrieveCardBalance (FAIL)

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsRetrieveCardBalance = new RetrieveCardBalanceParams();
$paramsRetrieveCardBalance->cardNum = "4111111111111111";

$resultRetrieveCardBalance = self::$sparrow->RetrieveCardBalance($paramsRetrieveCardBalance)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT RetrieveCardBalance:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultRetrieveCardBalance.response;    // 3
$resultRetrieveCardBalance.textResponse;    // Required payment field cardexp is missing

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### cc-verification/card-verification.md: VerifyAccount 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsVerifyAccount = new VerifyAccountParams();
$paramsVerifyAccount->creditCard->cardNum = "4111111111111111";
$paramsVerifyAccount->creditCard->cardExp = new DateTime("2019-10-21");
$paramsVerifyAccount->amount = 9.99;

$resultVerifyAccount = self::$sparrow->VerifyAccount($paramsVerifyAccount)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT VerifyAccount:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultVerifyAccount.isSuccess;    // 1
$resultVerifyAccount.status;    // 200
$resultVerifyAccount.response;    // 1
$resultVerifyAccount.textResponse;    // SUCCESS
$resultVerifyAccount.transId;    // 11284985
$resultVerifyAccount.xRef;    // 3923165840
$resultVerifyAccount.authCode;    // 123456
$resultVerifyAccount.type;    // auth
$resultVerifyAccount.codeResponse;    // 100
$resultVerifyAccount.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### chargeback/mark-chargeback.md: MarkSuccessfulTransactionAsChargeback 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsMarkSuccessfulTransactionAsChargeback = new MarkSuccessfulTransactionAsChargebackParams();
$paramsMarkSuccessfulTransactionAsChargeback->transId = $resultSimpleSale->transId;
$paramsMarkSuccessfulTransactionAsChargeback->reason = "Testing for Success";

$resultMarkSuccessfulTransactionAsChargeback = self::$sparrow->MarkSuccessfulTransactionAsChargeback($paramsMarkSuccessfulTransactionAsChargeback)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleSale.isSuccess;    // 1
$resultSimpleSale.status;    // 200
$resultSimpleSale.response;    // 1
$resultSimpleSale.textResponse;    // SUCCESS
$resultSimpleSale.transId;    // 11284986
$resultSimpleSale.xRef;    // 3923165886
$resultSimpleSale.authCode;    // 123456
$resultSimpleSale.type;    // sale
$resultSimpleSale.codeResponse;    // 100
$resultSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT MarkSuccessfulTransactionAsChargeback:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultMarkSuccessfulTransactionAsChargeback.isSuccess;    // 1
$resultMarkSuccessfulTransactionAsChargeback.status;    // 200
$resultMarkSuccessfulTransactionAsChargeback.response;    // 1
$resultMarkSuccessfulTransactionAsChargeback.textResponse;    // Testing for Success
$resultMarkSuccessfulTransactionAsChargeback.transId;    // 11284986
$resultMarkSuccessfulTransactionAsChargeback.xRef;    // 3923165886
$resultMarkSuccessfulTransactionAsChargeback.authCode;    // 123456
$resultMarkSuccessfulTransactionAsChargeback.type;    // chargeback

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### creating-a-credit/simple-credit.md: SimpleCredit 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleCredit = new SimpleCreditParams();
$paramsSimpleCredit->creditCard->cardNum = "4111111111111111";
$paramsSimpleCredit->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleCredit->amount = 9.99;

$resultSimpleCredit = self::$sparrow->SimpleCredit($paramsSimpleCredit)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleCredit:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleCredit.isSuccess;    // 1
$resultSimpleCredit.status;    // 200
$resultSimpleCredit.response;    // 1
$resultSimpleCredit.textResponse;    // SUCCESS
$resultSimpleCredit.transId;    // 11284987
$resultSimpleCredit.xRef;    // 3923165988
$resultSimpleCredit.type;    // credit
$resultSimpleCredit.codeResponse;    // 100
$resultSimpleCredit.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### creating-a-sale/advanced-sale.md: AdvancedSale 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsAdvancedSale = new AdvancedSaleParams();
$paramsAdvancedSale->creditCard->cardNum = "4111111111111111";
$paramsAdvancedSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsAdvancedSale->amount = 9.99;

$resultAdvancedSale = self::$sparrow->AdvancedSale($paramsAdvancedSale)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedSale.isSuccess;    // 1
$resultAdvancedSale.status;    // 200
$resultAdvancedSale.response;    // 1
$resultAdvancedSale.textResponse;    // SUCCESS
$resultAdvancedSale.transId;    // 11284988
$resultAdvancedSale.xRef;    // 3923166016
$resultAdvancedSale.authCode;    // 123456
$resultAdvancedSale.type;    // sale
$resultAdvancedSale.codeResponse;    // 100
$resultAdvancedSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### creating-a-sale/simple-sale.md: SimpleSale 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleSale.isSuccess;    // 1
$resultSimpleSale.status;    // 200
$resultSimpleSale.response;    // 1
$resultSimpleSale.textResponse;    // SUCCESS
$resultSimpleSale.transId;    // 11284989
$resultSimpleSale.xRef;    // 3923166057
$resultSimpleSale.authCode;    // 123456
$resultSimpleSale.type;    // sale
$resultSimpleSale.codeResponse;    // 100
$resultSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/add-payment-type.md: AddPaymentTypesToCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'UEON6IEAJI0L41TP' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // UEON6IEAJI0L41TP
$resultAddCustomer.p;    // 98GDPLFHEE51AUHX

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddPaymentTypesToCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddPaymentTypesToCustomer.isSuccess;    // 1
$resultAddPaymentTypesToCustomer.response;    // 1
$resultAddPaymentTypesToCustomer.textResponse;    // Customer with token 'UEON6IEAJI0L41TP' successfully updated
$resultAddPaymentTypesToCustomer.type;    // updatecustomer
$resultAddPaymentTypesToCustomer.customerToken;    // UEON6IEAJI0L41TP
$resultAddPaymentTypesToCustomer.p;    // 1ED1OV0K9FI7XAKX

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/adding-a-customer.md: AddCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'PE4WB9TIYLXCZXIV' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // PE4WB9TIYLXCZXIV
$resultAddCustomer.p;    // PTGX8RBJ9GJ1MM9Z

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/delete-customer.md: DeleteDataVaultCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'CVOXWSYCS003CW1M' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // CVOXWSYCS003CW1M
$resultAddCustomer.p;    // YYMNPGJYB4AIQJN3

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT DeleteDataVaultCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultDeleteDataVaultCustomer.isSuccess;    // 1
$resultDeleteDataVaultCustomer.response;    // 1
$resultDeleteDataVaultCustomer.textResponse;    // SUCCESS
$resultDeleteDataVaultCustomer.type;    // deletecustomer

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/delete-payment-type.md: DeletePaymentType 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'BC5Z67O9P8ODXDRQ' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // BC5Z67O9P8ODXDRQ
$resultAddCustomer.p;    // 5JMQNUZ8CVX4015M

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT DeletePaymentType:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultDeletePaymentType.isSuccess;    // 1
$resultDeletePaymentType.response;    // 1
$resultDeletePaymentType.textResponse;    // Customer with token 'BC5Z67O9P8ODXDRQ' successfully updated
$resultDeletePaymentType.type;    // updatecustomer
$resultDeletePaymentType.customerToken;    // BC5Z67O9P8ODXDRQ
$resultDeletePaymentType.p;    // 5JMQNUZ8CVX4015M

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/get-customer.md: RetrieveCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'L8BW1SYRFGI9C8V6' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // L8BW1SYRFGI9C8V6
$resultAddCustomer.p;    // Z26C9TLQN7XLKUJX

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT RetrieveCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultRetrieveCustomer.isSuccess;    // 1
$resultRetrieveCustomer.response;    // 1
$resultRetrieveCustomer.textResponse;    // Processed
$resultRetrieveCustomer.customerToken;    // L8BW1SYRFGI9C8V6
$resultRetrieveCustomer.firstName;    // John
$resultRetrieveCustomer.lastName;    // Doe

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/get-payment-type.md: RetrievePaymentType 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'DC1ZB5ZMV4LHLZ5D' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // DC1ZB5ZMV4LHLZ5D
$resultAddCustomer.p;    // 90F752M2WUI35NHV

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT RetrievePaymentType:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultRetrievePaymentType.isSuccess;    // 1
$resultRetrievePaymentType.response;    // 1
$resultRetrievePaymentType.textResponse;    // Processed
$resultRetrievePaymentType.customerToken;    // DC1ZB5ZMV4LHLZ5D
$resultRetrievePaymentType.firstName;    // John
$resultRetrievePaymentType.lastName;    // Doe
$resultRetrievePaymentType.payType;    // CreditCard
$resultRetrievePaymentType.payNo;    // 1
$resultRetrievePaymentType.cardExp;    // 1019
$resultRetrievePaymentType.account;    // 411111******1111
$resultRetrievePaymentType.token;    // 90F752M2WUI35NHV

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/update-payment-type.md: UpdateCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token '6V6AH643CTREHEEX' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // 6V6AH643CTREHEEX
$resultAddCustomer.p;    // BTLTOL2KZ8CRW6QI

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT UpdateCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultUpdateCustomer.isSuccess;    // 1
$resultUpdateCustomer.response;    // 1
$resultUpdateCustomer.textResponse;    // Customer with token '6V6AH643CTREHEEX' successfully updated
$resultUpdateCustomer.type;    // updatecustomer
$resultUpdateCustomer.customerToken;    // 6V6AH643CTREHEEX

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### datavault/update-payment-types.md: UpdatePaymentType 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token '4S0911NIPAIX47IN' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // 4S0911NIPAIX47IN
$resultAddCustomer.p;    // N6J9Y6I6LZW1RQWJ

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT UpdatePaymentType:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultUpdatePaymentType.isSuccess;    // 1
$resultUpdatePaymentType.response;    // 1
$resultUpdatePaymentType.textResponse;    // Customer with token '4S0911NIPAIX47IN' successfully updated
$resultUpdatePaymentType.type;    // updatecustomer
$resultUpdatePaymentType.customerToken;    // 4S0911NIPAIX47IN
$resultUpdatePaymentType.p;    // N6J9Y6I6LZW1RQWJ

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### decrypt-custom-field/decrypt.md: DecryptCustomFields (FAIL)

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'M69T61U6KD8O7V3D' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // M69T61U6KD8O7V3D
$resultAddCustomer.p;    // WX5U9OF7K3YBFW09

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT DecryptCustomFields:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultDecryptCustomFields.response;    // 3
$resultDecryptCustomFields.textResponse;    // Custom field 'customField1' not found.
$resultDecryptCustomFields.customerToken;    // M69T61U6KD8O7V3D
$resultDecryptCustomFields.token;    // M69T61U6KD8O7V3D

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### ewallet/ewallet-credit.md: EWalletSimpleCredit 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsEWalletSimpleCredit = new EWalletSimpleCreditParams();
$paramsEWalletSimpleCredit->ewallet->ewalletAccount = "user@example.com";
$paramsEWalletSimpleCredit->amount = 9.99;

$resultEWalletSimpleCredit = self::$sparrow->EWalletSimpleCredit($paramsEWalletSimpleCredit)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT EWalletSimpleCredit:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultEWalletSimpleCredit.isSuccess;    // 1
$resultEWalletSimpleCredit.status;    // 200
$resultEWalletSimpleCredit.response;    // 1
$resultEWalletSimpleCredit.textResponse;    // Successful: SUCCESS
$resultEWalletSimpleCredit.transId;    // 11284992
$resultEWalletSimpleCredit.xRef;    // Y5JESRJ5MU3XE
$resultEWalletSimpleCredit.type;    // credit
$resultEWalletSimpleCredit.codeDescription;    // SUCCESS

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### fiserv/fiserv-advanced.md: AdvancedFiservSale 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsAdvancedFiservSale = new AdvancedFiservSaleParams();
$paramsAdvancedFiservSale->creditCard->cardNum = "4111111111111111";
$paramsAdvancedFiservSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsAdvancedFiservSale->amount = 9.99;

$resultAdvancedFiservSale = self::$sparrow->AdvancedFiservSale($paramsAdvancedFiservSale)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedFiservSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedFiservSale.isSuccess;    // 1
$resultAdvancedFiservSale.status;    // 200
$resultAdvancedFiservSale.response;    // 1
$resultAdvancedFiservSale.textResponse;    // SUCCESS
$resultAdvancedFiservSale.transId;    // 11284994
$resultAdvancedFiservSale.xRef;    // 3923166531
$resultAdvancedFiservSale.authCode;    // 123456
$resultAdvancedFiservSale.type;    // sale
$resultAdvancedFiservSale.codeResponse;    // 100
$resultAdvancedFiservSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### fiserv/fiserv-simple.md: FiservSimpleSale 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsFiservSimpleSale = new FiservSimpleSaleParams();
$paramsFiservSimpleSale->cardNum = "4111111111111111";
$paramsFiservSimpleSale->cardExp = new DateTime("2019-10-21");
$paramsFiservSimpleSale->amount = 9.99;

$resultFiservSimpleSale = self::$sparrow->FiservSimpleSale($paramsFiservSimpleSale)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT FiservSimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultFiservSimpleSale.isSuccess;    // 1
$resultFiservSimpleSale.status;    // 200
$resultFiservSimpleSale.response;    // 1
$resultFiservSimpleSale.textResponse;    // SUCCESS
$resultFiservSimpleSale.transId;    // 11284996
$resultFiservSimpleSale.xRef;    // 3923166556
$resultFiservSimpleSale.authCode;    // 123456
$resultFiservSimpleSale.type;    // sale
$resultFiservSimpleSale.codeResponse;    // 100
$resultFiservSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/cancel-inv-customer.md: CancelInvoiceByCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40001

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CancelInvoiceByCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCancelInvoiceByCustomer.isSuccess;    // 1
$resultCancelInvoiceByCustomer.textResponse;    // invoice has been successfully canceled
$resultCancelInvoiceByCustomer.invoiceNumber;    // Inv-40001

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/cancel-invoice.md: CancelInvoice 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40002

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CancelInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCancelInvoice.isSuccess;    // 1
$resultCancelInvoice.textResponse;    // invoice has been successfully canceled
$resultCancelInvoice.invoiceNumber;    // Inv-40002

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/create-merchant-invoice.md: CreateInvoice 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40003

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/get-invoice.md: RetrieveInvoice 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsCreateInvoice = new CreateInvoiceParams();
$paramsCreateInvoice->invoiceDate = new DateTime("2019-10-21");
$paramsCreateInvoice->currency = "USD";
$paramsCreateInvoice->invoiceStatus = InvoiceStatus::ACTIVE;
$paramsCreateInvoice->invoiceAmount = 10.00;

$resultCreateInvoice = self::$sparrow->CreateInvoice($paramsCreateInvoice)->wait();

$paramsRetrieveInvoice = new RetrieveInvoiceParams();
$paramsRetrieveInvoice->invoiceNumber = $resultCreateInvoice->invoiceNumber;

$resultRetrieveInvoice = self::$sparrow->RetrieveInvoice($paramsRetrieveInvoice)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40004

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT RetrieveInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultRetrieveInvoice.isSuccess;    // 1
$resultRetrieveInvoice.textResponse;    // Success
$resultRetrieveInvoice.invoiceNumber;    // Inv-40004
$resultRetrieveInvoice.invoiceAmount;    // 10.0000
$resultRetrieveInvoice.currency;    // USD
$resultRetrieveInvoice.invoiceDate;    // 10/21/2019
$resultRetrieveInvoice.invoiceStatus;    // Active
$resultRetrieveInvoice.invoicePaymentLink;    // https://secure.sparrowone.com/Payments/Payment.aspx?token=068A72B58B9B2DDA

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/pay-inv-ach.md: PayInvoiceWithBankAccount 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40005

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT PayInvoiceWithBankAccount:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultPayInvoiceWithBankAccount.isSuccess;    // 1
$resultPayInvoiceWithBankAccount.textResponse;    // Invoice has been successfully paid
$resultPayInvoiceWithBankAccount.transId;    // 11284998
$resultPayInvoiceWithBankAccount.invoiceNumber;    // Inv-40005

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/pay-inv-cc.md: PayInvoiceWithCreditCard 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40006

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT PayInvoiceWithCreditCard:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultPayInvoiceWithCreditCard.isSuccess;    // 1
$resultPayInvoiceWithCreditCard.textResponse;    // Invoice has been successfully paid
$resultPayInvoiceWithCreditCard.transId;    // 11284999
$resultPayInvoiceWithCreditCard.invoiceNumber;    // Inv-40006

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### invoicing/update-invoice.md: UpdateInvoice 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreateInvoice.isSuccess;    // 1
$resultCreateInvoice.textResponse;    // invoice has been successfully created
$resultCreateInvoice.invoiceNumber;    // Inv-40007

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT UpdateInvoice:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultUpdateInvoice.isSuccess;    // 1
$resultUpdateInvoice.textResponse;    // Invoice has been successfully updated
$resultUpdateInvoice.invoiceNumber;    // Inv-40007

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### issuing-a-refund/Simple-refund.md: SimpleRefund 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsSimpleRefund = new SimpleRefundParams();
$paramsSimpleRefund->transId = $resultSimpleSale->transId;
$paramsSimpleRefund->amount = 9.99;

$resultSimpleRefund = self::$sparrow->SimpleRefund($paramsSimpleRefund)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleSale.isSuccess;    // 1
$resultSimpleSale.status;    // 200
$resultSimpleSale.response;    // 1
$resultSimpleSale.textResponse;    // SUCCESS
$resultSimpleSale.transId;    // 11285000
$resultSimpleSale.xRef;    // 3923166758
$resultSimpleSale.authCode;    // 123456
$resultSimpleSale.type;    // sale
$resultSimpleSale.codeResponse;    // 100
$resultSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleRefund:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleRefund.isSuccess;    // 1
$resultSimpleRefund.status;    // 200
$resultSimpleRefund.response;    // 1
$resultSimpleRefund.textResponse;    // SUCCESS
$resultSimpleRefund.transId;    // 11285000
$resultSimpleRefund.xRef;    // 3923166758
$resultSimpleRefund.authCode;    // 123456
$resultSimpleRefund.type;    // refund
$resultSimpleRefund.codeResponse;    // 100
$resultSimpleRefund.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### issuing-a-refund/advanced-refund.md: AdvancedRefund (FAIL)

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsAdvancedRefund = new AdvancedRefundParams();
$paramsAdvancedRefund->transId = $resultSimpleSale->transId;
$paramsAdvancedRefund->amount = 9.99;

$resultAdvancedRefund = self::$sparrow->AdvancedRefund($paramsAdvancedRefund)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleSale.isSuccess;    // 1
$resultSimpleSale.status;    // 200
$resultSimpleSale.response;    // 1
$resultSimpleSale.textResponse;    // SUCCESS
$resultSimpleSale.transId;    // 11285003
$resultSimpleSale.xRef;    // 3923166850
$resultSimpleSale.authCode;    // 123456
$resultSimpleSale.type;    // sale
$resultSimpleSale.codeResponse;    // 100
$resultSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedRefund:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedRefund.status;    // 300
$resultAdvancedRefund.response;    // 3
$resultAdvancedRefund.textResponse;    // Flagged for Review by Velocity and Duplicates Policy (Duplicate Transactions Rule). Original Transaction ID: 11285000
$resultAdvancedRefund.transId;    // 11285003
$resultAdvancedRefund.xRef;    // 3923166850
$resultAdvancedRefund.authCode;    // 123456
$resultAdvancedRefund.type;    // refund
$resultAdvancedRefund.origTransId;    // 11285000
$resultAdvancedRefund.origResponse;    // 1
$resultAdvancedRefund.origTextResponse;    // SUCCESS

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### issuing-a-void/advanced-void.md: AdvancedVoid 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsAdvancedVoid = new AdvancedVoidParams();
$paramsAdvancedVoid->transId = $resultSimpleSale->transId;

$resultAdvancedVoid = self::$sparrow->AdvancedVoid($paramsAdvancedVoid)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleSale.isSuccess;    // 1
$resultSimpleSale.status;    // 200
$resultSimpleSale.response;    // 1
$resultSimpleSale.textResponse;    // SUCCESS
$resultSimpleSale.transId;    // 11285004
$resultSimpleSale.xRef;    // 3923166885
$resultSimpleSale.authCode;    // 123456
$resultSimpleSale.type;    // sale
$resultSimpleSale.codeResponse;    // 100
$resultSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedVoid:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedVoid.isSuccess;    // 1
$resultAdvancedVoid.status;    // 200
$resultAdvancedVoid.response;    // 1
$resultAdvancedVoid.textResponse;    // Transaction Void Successful
$resultAdvancedVoid.transId;    // 11285004
$resultAdvancedVoid.xRef;    // 3923166885
$resultAdvancedVoid.authCode;    // 123456
$resultAdvancedVoid.type;    // void
$resultAdvancedVoid.codeResponse;    // 100
$resultAdvancedVoid.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### issuing-a-void/simple-void.md: SimpleVoid 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleSale = new SimpleSaleParams();
$paramsSimpleSale->creditCard->cardNum = "4111111111111111";
$paramsSimpleSale->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleSale->amount = 9.99;

$resultSimpleSale = self::$sparrow->SimpleSale($paramsSimpleSale)->wait();

$paramsSimpleVoid = new SimpleVoidParams();
$paramsSimpleVoid->transId = $resultSimpleSale->transId;

$resultSimpleVoid = self::$sparrow->SimpleVoid($paramsSimpleVoid)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleSale:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleSale.isSuccess;    // 1
$resultSimpleSale.status;    // 200
$resultSimpleSale.response;    // 1
$resultSimpleSale.textResponse;    // SUCCESS
$resultSimpleSale.transId;    // 11285005
$resultSimpleSale.xRef;    // 3923166943
$resultSimpleSale.authCode;    // 123456
$resultSimpleSale.type;    // sale
$resultSimpleSale.codeResponse;    // 100
$resultSimpleSale.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleVoid:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleVoid.isSuccess;    // 1
$resultSimpleVoid.status;    // 200
$resultSimpleVoid.response;    // 1
$resultSimpleVoid.textResponse;    // Transaction Void Successful
$resultSimpleVoid.transId;    // 11285005
$resultSimpleVoid.xRef;    // 3923166943
$resultSimpleVoid.authCode;    // 123456
$resultSimpleVoid.type;    // void
$resultSimpleVoid.codeResponse;    // 100
$resultSimpleVoid.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/assign-payment-plan.md: AssignPaymentPlanToCustomer 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'M8A8K5F8GJIWYU9R' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // M8A8K5F8GJIWYU9R
$resultAddCustomer.p;    // 38FWR7OMZMG7POS2

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // DYIC0DZC1VZ3ADEM

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AssignPaymentPlanToCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAssignPaymentPlanToCustomer.isSuccess;    // 1
$resultAssignPaymentPlanToCustomer.response;    // 1
$resultAssignPaymentPlanToCustomer.textResponse;    // Success
$resultAssignPaymentPlanToCustomer.type;    // assignplan
$resultAssignPaymentPlanToCustomer.assignmentToken;    // WAI93BPANGWL3WJG

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/cancel-plan-assignment.md: CancelPlanAssignment 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AssignPaymentPlanToCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAssignPaymentPlanToCustomer.isSuccess;    // 1
$resultAssignPaymentPlanToCustomer.response;    // 1
$resultAssignPaymentPlanToCustomer.textResponse;    // Success
$resultAssignPaymentPlanToCustomer.type;    // assignplan
$resultAssignPaymentPlanToCustomer.assignmentToken;    // VVV129I7WJ9IFVWF

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'W25KLGC8CR8DPWV9' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // W25KLGC8CR8DPWV9
$resultAddCustomer.p;    // 8D91I61K49JSON9Q

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // B1IENEHPUYI7YIT2

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CancelPlanAssignment:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCancelPlanAssignment.isSuccess;    // 1
$resultCancelPlanAssignment.response;    // 1
$resultCancelPlanAssignment.textResponse;    // Success
$resultCancelPlanAssignment.type;    // cancelassignment

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/create-plan.md: CreatePaymentPlan 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // 1PAXMAY2TEILKDSC

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/delete-plan.md: DeletePlan 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // 9056DMDZBUPL6TTZ

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT DeletePlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultDeletePlan.isSuccess;    // 1
$resultDeletePlan.response;    // 1
$resultDeletePlan.textResponse;    // SUCCESS
$resultDeletePlan.type;    // deleteplan

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/delete-sequence.md: DeleteSequence 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // RRR4A4H85CE86SFI

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT DeleteSequence:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultDeleteSequence.isSuccess;    // 1
$resultDeleteSequence.response;    // 1
$resultDeleteSequence.textResponse;    // SUCCESS
$resultDeleteSequence.type;    // updateplan

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/update-plan-assignment.md: UpdatePaymentPlanAssignment 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AssignPaymentPlanToCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAssignPaymentPlanToCustomer.isSuccess;    // 1
$resultAssignPaymentPlanToCustomer.response;    // 1
$resultAssignPaymentPlanToCustomer.textResponse;    // Success
$resultAssignPaymentPlanToCustomer.type;    // assignplan
$resultAssignPaymentPlanToCustomer.assignmentToken;    // FF4XM5XOBS3TVT9B

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AddCustomer:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAddCustomer.isSuccess;    // 1
$resultAddCustomer.response;    // 1
$resultAddCustomer.textResponse;    // Customer with token 'DA5XFNOR32OE2RMF' successfully created
$resultAddCustomer.type;    // addcustomer
$resultAddCustomer.customerToken;    // DA5XFNOR32OE2RMF
$resultAddCustomer.p;    // W4TNWV3BCQVJ65ER

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // NETYSCNIR50HT6AD

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT UpdatePaymentPlanAssignment:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultUpdatePaymentPlanAssignment.isSuccess;    // 1
$resultUpdatePaymentPlanAssignment.response;    // 1
$resultUpdatePaymentPlanAssignment.textResponse;    // Success
$resultUpdatePaymentPlanAssignment.type;    // updateassignment
$resultUpdatePaymentPlanAssignment.assignmentToken;    // FF4XM5XOBS3TVT9B

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### payment-plans/update-plan.md: UpdatePaymentPlan 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT CreatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultCreatePaymentPlan.isSuccess;    // 1
$resultCreatePaymentPlan.response;    // 1
$resultCreatePaymentPlan.textResponse;    // SUCCESS
$resultCreatePaymentPlan.type;    // addplan
$resultCreatePaymentPlan.planToken;    // 2CYQTFQRH3UZ1FV7

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT UpdatePaymentPlan:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultUpdatePaymentPlan.isSuccess;    // 1
$resultUpdatePaymentPlan.response;    // 1
$resultUpdatePaymentPlan.textResponse;    // SUCCESS
$resultUpdatePaymentPlan.type;    // updateplan

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### separate-auth-capture/Offline-Capture.md: SimpleOfflineCapture 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleOfflineCapture = new SimpleOfflineCaptureParams();
$paramsSimpleOfflineCapture->creditCard->cardNum = "4111111111111111";
$paramsSimpleOfflineCapture->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleOfflineCapture->amount = 9.99;
$paramsSimpleOfflineCapture->authCode = "123456";
$paramsSimpleOfflineCapture->authDate = new DateTime("2019-10-21");

$resultSimpleOfflineCapture = self::$sparrow->SimpleOfflineCapture($paramsSimpleOfflineCapture)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleOfflineCapture:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleOfflineCapture.isSuccess;    // 1
$resultSimpleOfflineCapture.status;    // 200
$resultSimpleOfflineCapture.response;    // 1
$resultSimpleOfflineCapture.textResponse;    // SUCCESS
$resultSimpleOfflineCapture.transId;    // 11285010
$resultSimpleOfflineCapture.xRef;    // 3923167199
$resultSimpleOfflineCapture.authCode;    // 123456
$resultSimpleOfflineCapture.type;    // offline
$resultSimpleOfflineCapture.codeResponse;    // 100
$resultSimpleOfflineCapture.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### separate-auth-capture/advanced-capture.md: AdvancedCapture 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleAuthorization = new SimpleAuthorizationParams();
$paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
$paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleAuthorization->amount = 9.99;

$resultSimpleAuthorization = self::$sparrow->SimpleAuthorization($paramsSimpleAuthorization)->wait();

$paramsAdvancedCapture = new AdvancedCaptureParams();
$paramsAdvancedCapture->transId = $resultSimpleAuthorization->transId;
$paramsAdvancedCapture->amount = 9.99;

$resultAdvancedCapture = self::$sparrow->AdvancedCapture($paramsAdvancedCapture)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleAuthorization:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleAuthorization.isSuccess;    // 1
$resultSimpleAuthorization.status;    // 200
$resultSimpleAuthorization.response;    // 1
$resultSimpleAuthorization.textResponse;    // SUCCESS
$resultSimpleAuthorization.transId;    // 11285011
$resultSimpleAuthorization.xRef;    // 3923167234
$resultSimpleAuthorization.authCode;    // 123456
$resultSimpleAuthorization.type;    // auth
$resultSimpleAuthorization.codeResponse;    // 100
$resultSimpleAuthorization.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedCapture:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedCapture.isSuccess;    // 1
$resultAdvancedCapture.status;    // 200
$resultAdvancedCapture.response;    // 1
$resultAdvancedCapture.textResponse;    // SUCCESS
$resultAdvancedCapture.transId;    // 11285011
$resultAdvancedCapture.xRef;    // 3923167234
$resultAdvancedCapture.authCode;    // 123456
$resultAdvancedCapture.type;    // capture
$resultAdvancedCapture.codeResponse;    // 100
$resultAdvancedCapture.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### separate-auth-capture/simple-auth.md: SimpleAuthorization 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleAuthorization = new SimpleAuthorizationParams();
$paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
$paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleAuthorization->amount = 9.99;

$resultSimpleAuthorization = self::$sparrow->SimpleAuthorization($paramsSimpleAuthorization)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleAuthorization:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleAuthorization.isSuccess;    // 1
$resultSimpleAuthorization.status;    // 200
$resultSimpleAuthorization.response;    // 1
$resultSimpleAuthorization.textResponse;    // SUCCESS
$resultSimpleAuthorization.transId;    // 11285012
$resultSimpleAuthorization.xRef;    // 3923167317
$resultSimpleAuthorization.authCode;    // 123456
$resultSimpleAuthorization.type;    // auth
$resultSimpleAuthorization.codeResponse;    // 100
$resultSimpleAuthorization.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### separate-auth-capture/simple-capture.md: SimpleCapture 

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleAuthorization = new SimpleAuthorizationParams();
$paramsSimpleAuthorization->creditCard->cardNum = "4111111111111111";
$paramsSimpleAuthorization->creditCard->cardExp = new DateTime("2019-10-21");
$paramsSimpleAuthorization->amount = 9.99;

$resultSimpleAuthorization = self::$sparrow->SimpleAuthorization($paramsSimpleAuthorization)->wait();

$paramsSimpleCapture = new SimpleCaptureParams();
$paramsSimpleCapture->transId = $resultSimpleAuthorization->transId;
$paramsSimpleCapture->amount = 9.99;

$resultSimpleCapture = self::$sparrow->SimpleCapture($paramsSimpleCapture)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleAuthorization:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleAuthorization.isSuccess;    // 1
$resultSimpleAuthorization.status;    // 200
$resultSimpleAuthorization.response;    // 1
$resultSimpleAuthorization.textResponse;    // SUCCESS
$resultSimpleAuthorization.transId;    // 11285013
$resultSimpleAuthorization.xRef;    // 3923167338
$resultSimpleAuthorization.authCode;    // 123456
$resultSimpleAuthorization.type;    // auth
$resultSimpleAuthorization.codeResponse;    // 100
$resultSimpleAuthorization.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleCapture:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleCapture.isSuccess;    // 1
$resultSimpleCapture.status;    // 200
$resultSimpleCapture.response;    // 1
$resultSimpleCapture.textResponse;    // SUCCESS
$resultSimpleCapture.transId;    // 11285013
$resultSimpleCapture.xRef;    // 3923167338
$resultSimpleCapture.authCode;    // 123456
$resultSimpleCapture.type;    // capture
$resultSimpleCapture.codeResponse;    // 100
$resultSimpleCapture.codeDescription;    // Transaction was Approved

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### starcard/advanced-starcard.md: AdvancedStarCard (FAIL)

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsAdvancedStarCard = new AdvancedStarCardParams();
$paramsAdvancedStarCard->cardNum = "4111111111111111";
$paramsAdvancedStarCard->cardExp = new DateTime("2019-10-21");
$paramsAdvancedStarCard->amount = 9.99;
$paramsAdvancedStarCard->CID = "12345678901";

$resultAdvancedStarCard = self::$sparrow->AdvancedStarCard($paramsAdvancedStarCard)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT AdvancedStarCard:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultAdvancedStarCard.status;    // 401
$resultAdvancedStarCard.textResponse;    // System Error: Reason Code: 000 Empty CID field/No CID provided, unable to verify transaction
$resultAdvancedStarCard.transId;    // 11285015
$resultAdvancedStarCard.type;    // sale
$resultAdvancedStarCard.codeDescription;    // Error

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

### starcard/simple-starcard.md: SimpleStarCard (FAIL)

CODE: 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$paramsSimpleStarCard = new SimpleStarCardParams();
$paramsSimpleStarCard->cardNum = "4111111111111111";
$paramsSimpleStarCard->amount = 9.99;
$paramsSimpleStarCard->CID = "12345678901";

$resultSimpleStarCard = self::$sparrow->SimpleStarCard($paramsSimpleStarCard)->wait();
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

RESULT SimpleStarCard:

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$resultSimpleStarCard.status;    // 401
$resultSimpleStarCard.textResponse;    // System Error: Reason Code: 000 Empty CID field/No CID provided, unable to verify transaction
$resultSimpleStarCard.transId;    // 11285016
$resultSimpleStarCard.type;    // sale
$resultSimpleStarCard.codeDescription;    // Error

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
