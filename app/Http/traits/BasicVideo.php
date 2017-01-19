<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Log;

trait BasicVideo
{
    protected $kiloBitRate;
    protected $kiloAudioBitRate;
    protected $sizeWidth;
    protected $sizeHeight;
    protected $typeVideo;
    public function __construct(){
        $this->kiloBitRate = 123;
        $this->kiloAudioBitRate = 234;
        $this->sizeHeight = 1000;
        $this->sizeWidth = 1200;
    }
    public function saveVideo($type){
//        Log::info($kiloBitRate.', '.$kiloAudioBitRate.', '.$sizeWidth.', '. $sizeHeight);
        $mtypeVideo = config('constants.typeVideo');
        if($mtypeVideo[$type]){

        }
    }
    public function saveVideo720(){
        Log::info('720 save');
    }

}
trait video720{

}