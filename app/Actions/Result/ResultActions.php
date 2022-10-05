<?php

namespace App\Actions\Result;

use App\Models\Result;
use App\Models\ResultDetail;
use HtmlSanitizer\Extension\Details\Node\DetailsNode;

class ResultActions
{



    public static function SetTotalAverage(array $result):array
    {
        //(subjectPoint*StudentCertifiedHour)/TotalHours
        $total_hours = 0;

        $total_point_hour =0 ;

        foreach($result["details"] as $detail){
            $total_point_hour+= $detail["student_certified_hours"]  *  $detail["point"];
            $total_hours += $detail["subject_certified_hours"];
        }

        $result["average"] = $total_point_hour/$total_hours;

        return $result;


    }


    public static function checkCreatedSuccssfuly(Result $result):bool
    {
        #checking
        if(!$result->details || count($result->details)>0){
            //remove this result
            $result->delete();
            return false;
        }
        return true;
    }
}
