<?php
namespace SparrowSamples;

use Sparrow\SparrowResponse;
use PHPUnit\Framework\Constraint\StringStartsWith;

class SparrowResponseSamples{
    public static function CreateCodeSample(string $code){
        return ""
            . "\r\nCODE: \r\n"
            . "\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\n"
            . trim($code)
            . "\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\n"
            ;
    }
    
    public static function EnterSample(string $relativePath, string $name, bool $isSuccess){
        $fail = ($isSuccess ? "" : "(FAIL)");
        return "\r\n### $relativePath: $name $fail\r\n";
    }
    
    public static function ExitSample(string $relativePath, string $name, bool $isSuccess){
        return "";
    }
    
    public static function CreateResponseDemo(SparrowResponse $response, string $instanceName){
        
        $r = "";
        
        foreach ($response as $k => $v)
        {
            if (!$v) { continue; }
            
            if (!is_array($v))
            {
                $r = $r . "$instanceName.$k;    // $v\r\n";
            }
            else if(strpos($k, 'raw') !== 0)
            {
                foreach ($v as $i => $itemValue)
                {
                    $r = $r . "$instanceName.$k[$i];    // $itemValue\r\n";
                }
            }
            
        }
        
        return SparrowResponseSamples::CreateResultBlock($instanceName, $r);
    }
    
    public static function CreateResultBlock(string $instanceName, string $content)
    {
        $resultName = str_replace('$result', "", $instanceName);
        if ($resultName) { $resultName = " " . $resultName; }
        
        return ""
            . "\r\nRESULT" . $resultName . ":\r\n"
            . "\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\n"
            . $content
            . "\r\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\r\n"
                ;
    }
   
}