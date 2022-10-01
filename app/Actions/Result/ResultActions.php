<?php

namespace App\Actions\Result;

use App\Models\Result;
use App\Models\ResultDetail;
use HtmlSanitizer\Extension\Details\Node\DetailsNode;

class ResultActions
{

public static function SetResultDetailsMarkPoint(ResultDetail $detail)
    {
        // dd($result);
        //for each details set the mark and Point

            if ($detail->avarege >= 80 && $detail->avarege <= 100) {
                $detail->mark = "A";
                $detail->point = 6;
            } else if ($detail->avarege >= 70 && $detail->avarege <= 79) {
                $detail->mark = "B+";
                $detail->point =  5;
            } else if ($detail->avarege >= 60 && $detail->avarege <= 69) {
                $detail->mark = "B";
                $detail->point = 4;
            } else if ($detail->avarege >= 55 && $detail->avarege <= 59) {
                $detail->mark = "C+";
                $detail->point = 3.5;
            } else if ($detail->avarege >= 50 && $detail->avarege <= 54) {
                $detail->mark = "C";
                $detail->point = 3;
            } else if ($detail->avarege >= 40 && $detail->avarege <= 49) {
                $detail->mark = "D";
                $detail->point = 2.4;
            } else if ($detail->avarege < 40) {
                $detail->mark = "F";
                $detail->point = 0;
            }

            $detail->save();

    }

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
