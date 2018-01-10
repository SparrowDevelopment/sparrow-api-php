<?php
require_once "../vendor/autoload.php";
require_once "./Sparrow/SparrowClient.php";

use GuzzleHttp\Promise\Promise;
use Sparrow\SparrowClient;
use Sparrow\AddCustomerParams;
use Sparrow\PaymentType;
use Sparrow\PayType;
use Sparrow\CreatePaymentPlanParams;
use Sparrow\AssignPaymentPlanToCustomerParams;

function promiseTestA(){
    $client = new SparrowClient("CUK5YODHVAZHFBM6KESZO1J4");
    
    $paramsAddCustomer = new AddCustomerParams();
    $paramsAddCustomer->defaultContactInfo->firstName = "John";
    $paramsAddCustomer->defaultContactInfo->lastName = "Doe";
    $paramsAddCustomer->paymentTypes[0] = new PaymentType();
    $paramsAddCustomer->paymentTypes[0]->payType = PayType::CREDITCARD;
    $paramsAddCustomer->paymentTypes[0]->contactInfo->firstName = "John";
    $paramsAddCustomer->paymentTypes[0]->contactInfo->lastName = "Doe";
    $paramsAddCustomer->paymentTypes[0]->creditCard->cardNum = "4111111111111111";
    $paramsAddCustomer->paymentTypes[0]->creditCard->cardExp = new DateTime('2019-10');
    $resultAddCustomer = $client->addCustomer($paramsAddCustomer)->wait();
    
    $paramsCreatePaymentPlan = new CreatePaymentPlanParams();
    // ...
    //   var resultCreatePaymentPlan = await _sparrow_creditcard.CreatePaymentPlan(
    //                 planName: "PaymentPlan1",
    //                 planDesc: "1st Payment Plan",
    //                 startDate: new DateTime(2019, 10, 21),
    //                 sequenceSteps: new[] { new Sparrow.SequenceStep { Sequence = 1, Amount = 9.99m, ScheduleType = Sparrow.ScheduleType.Monthly, ScheduleDay = 5, Duration = 12 } });
    $resultCreatePaymentPlan = $client->createPaymentPlan($paramsCreatePaymentPlan)->wait();
    
    $paramsAssignPaymentPlanToCustomer = new AssignPaymentPlanToCustomerParams();
    $paramsAssignPaymentPlanToCustomer->customerToken = $resultAddCustomer->customerToken;
    $paramsAssignPaymentPlanToCustomer->planToken = $resultCreatePaymentPlan->planToken;
    $paramsAssignPaymentPlanToCustomer->paymentToken = $resultAddCustomer->paymentTokens[0];
    $resultAssignPaymentPlanToCustomer = $client->assignPaymentPlanToCustomer($paramsAssignPaymentPlanToCustomer)->wait();
    
    // $resultAssignPaymentPlanToCustomer->
 
//     $promise = new Promise(function () use (&$promise) {
//         $client->
//         // $promise->resolve(null);
//     });
    
    //             var resultAddCustomer = await _sparrow_creditcard.AddCustomer(
    //                 defaultContactInfo: new Sparrow.ContactInfo { FirstName = "John", LastName = "Doe" },
    //                 paymentType: new[] { new Sparrow.PaymentType { PayType = Sparrow.PayType.Creditcard, ContactInfo = new Sparrow.ContactInfo { FirstName = "John", LastName = "Doe" }, CreditCard = new Sparrow.CreditCard { CardNum = "4111111111111111", CardExp = new DateTime(2019, 10, 21) } } });
    //             var resultCreatePaymentPlan = await _sparrow_creditcard.CreatePaymentPlan(
    //                 planName: "PaymentPlan1",
    //                 planDesc: "1st Payment Plan",
    //                 startDate: new DateTime(2019, 10, 21),
    //                 sequenceSteps: new[] { new Sparrow.SequenceStep { Sequence = 1, Amount = 9.99m, ScheduleType = Sparrow.ScheduleType.Monthly, ScheduleDay = 5, Duration = 12 } });
    //             var resultAssignPaymentPlanToCustomer = await _sparrow_creditcard.AssignPaymentPlanToCustomer(
    //                 customerToken: resultAddCustomer.CustomerToken,
    //                 planToken: resultCreatePaymentPlan.PlanToken,
    //                 paymentToken: resultAddCustomer.PaymentTokens[0]);
    
    //             TestContext.WriteLine(resultAddCustomer.CreateRawLog("resultAddCustomer"));
    //             TestContext.WriteLine(resultCreatePaymentPlan.CreateRawLog("resultCreatePaymentPlan"));
    //             TestContext.WriteLine(resultAssignPaymentPlanToCustomer.CreateRawLog("resultAssignPaymentPlanToCustomer"));
    
    //             Assert.IsTrue(resultAssignPaymentPlanToCustomer.IsSuccess);
    //             // Assert.AreEqual(1, resultAssignPaymentPlanToCustomer.Response);
    //             // Assert.IsTrue(resultAssignPaymentPlanToCustomer.TextResponse.ToUpper().Contains("SUCCESS"));
    //             // Assert.IsTrue(resultAssignPaymentPlanToCustomer.TextResponse.ToUpper().Contains("SUCCESS"));
}


// Promise Test
function promiseTest(){
    
    
    $promise = new Promise(function () use (&$promise) {
        $promise->resolve(null);
    });
        
        $p1 = $promise->then(function($value){
            // echo $value;
            $promise = new Promise(function () use (&$promise, $value) {
                $promise->resolve($value . ' 1');
            });
                return $promise;
        });
            
            $p2 = $p1->then(function($value){
                echo $value;
                return $promise = new Promise(function () use (&$promise, $value) {$promise->resolve($value . ' 2');});
            });
                
                $final = $p2->then(function($value){
                    echo $value;
                    return $promise = new Promise(function () use (&$promise, $value) {$promise->resolve($value . ' 3');});
                });
                    
                    $promiseResult = $final->wait();
                    
                    echo $promiseResult;
}

promiseTest();