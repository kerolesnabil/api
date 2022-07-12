<?php

namespace App\Traits;

trait GeneralTrait
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "", $errNum = "S000")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            $key => $value
        ]);
    }


    //////////////////
    public function returnValidationError($code = "E001", $validator)
    {
        return $this->returnError($code, $validator->errors()->first());
    }


    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

    public function getErrorCode($input)
    {
        $errors=[
            'name'=>'E0011',
            'password'=>'E002',
            'mobile'=>'E003',
            'id_number'=>'E004',
            'birth_date'=>'E005',
            'agreement'=>'E006',
            'email'=>'E007',
            'city_id'=>'E008',
            'insurance_company_id'=>'E009',
            'activation_code'=>'E010',
            'longitude'=>'E011',
            'latitude'=>'E012',
            'id'=>'E013',
            'promocode'=>'E014',
            'doctor_id'=>'E015',
            'payment_method'=>'E016',
            'payment_method_id'=>'E016',
            'day_date'=>'E017',
            'specification_id'=>'E018',
            'importance'=>'E019',
            'type'=>'E020',
            'message'=>'E021',
            'reservation_no'=>'E022',
            'reason'=>'E023',
            'branch_no'=>'E024',
            'name_en'=>'E025',
            'name_ar'=>'E026',
            'gender'=>'E027',
            'nickname_en'=>'E028',
            'nickname_ar'=>'E029',
            'rate'=>'E030',
            'price'=>'E031',
            'information_en'=>'E032',
            'information_ar'=>'E033',
            'street'=>'E034',
            'branch_id'=>'E035',
            'insurance_companies'=>'E036',
            'photo'=>'E037',
            'logo'=>'E038',
            'working_days'=>'E039',
            'reservation_period'=>'E041',
            'nationality_id'=>'E042',
            'commercial_no'=>'E043',
            'nickname_id'=>'E044',
            'reservation_id'=>'E045',
            'attachments'=>'E046',
            'summary'=>'E047',
            'user_id'=>'E048',
            'mobile_id'=>'E049',
            'paid'=>'E050',
            'use_insurance'=>'E051',
            'doctor_rate'=>'E052',
            'provider_rate'=>'E053',
            'message_id'=>'E054',
            'hide'=>'E054',
            'checkoutId'=>'E054',

        ];

        if(!isset($errors[$input]))
        {
            return "";
        }
        return "$errors[$input]";

    }


}
