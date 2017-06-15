<<?php
  class SampleForm {
      private $destination;
      private $purpose;
      private $schoolName;
      private $startDate;
      private $startTime;
      private $endTime;
      private $transportation;
      private $otherTransportation;
      private $extendedTrip;
      private $challengeCourse;
      private $waterActivity;

      public function __construct($dest, $purp, $school, $sDate, $sTime, $eTime, $trans, $oTrans, $extend, $course, $water){
        $this->$destination = $dest;
        $this->$purpose = $purp;
        $this->$schoolName = $schol;
        $this->$startDate = $sDate;
        $this->$startTime = $sTime;
        $this->$endTime = $eTime;
        $this->$transportation = $trans;
        $this->$otherTransportation = $oTrans;
        $this->$extendedTrip = $extend;
        $this->$challengeCourse = $course;
        $this->$waterActivity = $water;
      }
  }
?>
