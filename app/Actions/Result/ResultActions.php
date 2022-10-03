<?php

namespace App\Actions\Result;

use App\Models\Result;
use App\Models\ResultDetail;
use HtmlSanitizer\Extension\Details\Node\DetailsNode;

class ResultActions
{



    public static function SetTotalAverage(Result $result)
    {
        //(subjectPoint*StudentCertifiedHour)/TotalHours
        $total_hours = 0;

        $total_point_hour =0 ;

        foreach($result->details as $detail){
            $total_point_hour+= $detail->student_certified_hours  *  $detail->point;
            $total_hours += $detail->subject->certified_hours;
        }

        $result->average = $total_point_hour/$total_hours;

        $result->save();


    }
}
