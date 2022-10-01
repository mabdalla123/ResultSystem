<?php

namespace App\Observers;

use App\Models\ResultDetail;
use App\Actions\Result\ResultActions;

class ResultDetailsObserver
{
    /**
     * Handle the ResultDetail "created" event.
     *
     * @param  \App\Models\ResultDetail  $resultDetail
     * @return void
     */
    public function created(ResultDetail $resultDetail)
    {

        ResultActions::SetResultDetailsMarkPoint($resultDetail);
    }

    /**
     * Handle the ResultDetail "updated" event.
     *
     * @param  \App\Models\ResultDetail  $resultDetail
     * @return void
     */
    public function updated(ResultDetail $resultDetail)
    {
        //
        ResultActions::SetResultDetailsMarkPoint($resultDetail);
    }

    /**
     * Handle the ResultDetail "deleted" event.
     *
     * @param  \App\Models\ResultDetail  $resultDetail
     * @return void
     */
    public function deleted(ResultDetail $resultDetail)
    {
        //
    }

    /**
     * Handle the ResultDetail "restored" event.
     *
     * @param  \App\Models\ResultDetail  $resultDetail
     * @return void
     */
    public function restored(ResultDetail $resultDetail)
    {
        //
    }

    /**
     * Handle the ResultDetail "force deleted" event.
     *
     * @param  \App\Models\ResultDetail  $resultDetail
     * @return void
     */
    public function forceDeleted(ResultDetail $resultDetail)
    {
        //
    }
}
