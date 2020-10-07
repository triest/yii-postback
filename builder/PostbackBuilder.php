<?php

    namespace app\builder;
    use app\models\Postback;


    class PostbackBuilder
    {
        public $cid, $campaign_id, $time, $event, $sub1;


        public function getResult()
        {
            $postbackItem=new Postback();
            if($this->cid==null || $this->event==null || $this->time==null || $this->sub1==null){
        //        return null;
            }
            $postbackItem->cid=$this->cid;
            $postbackItem->campaign_id=$this->campaign_id;
            $postbackItem->time=$this->time;
            $postbackItem->event=$this->event;
            $postbackItem->sub1=$this->sub1;
            $postbackItem->save();
            return $postbackItem;
        }

        /**
         * @param mixed $cid
         */
        public function setCid($cid)
        {
            $this->cid = $cid;
        }

        /**
         * @param mixed $campaign_id
         */
        public function setCampaignId($campaign_id)
        {
            $this->campaign_id = $campaign_id;
        }

        /**
         * @param mixed $time
         */
        public function setTime($time)
        {
            $this->time = $time;
        }

        /**
         * @param mixed $event
         */
        public function setEvent($event)
        {
            $this->event = $event;
        }

        /**
         * @param mixed $sub1
         */
        public function setSub1($sub1)
        {
            $this->sub1 = $sub1;
        }


    }