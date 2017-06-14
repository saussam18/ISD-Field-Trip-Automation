var destination = "";
var purpose = "";
var schoolName = "";
var startDate = "";
var endDate = "";
var startTime = "";
var endTime = "";
var transportation = "";
var extendedTrip = false;
var challengeCourse = false;
var waterActivity = false;

function main () {
    $("#next").click (function () {
      getFieldTripInfo();
      window.location='create-form.html';
    });
}

function getFieldTripInfo() {
  destination = $('#place').val();
  purpose = $('#purp').val();
  schoolName = $('#school').val();
  startDate = $('#start_date').val();
  endDate = $('#end_date').val();
  startTime = $('#start_time').val();
  endTime = $('#end_time').val();
  //transportation = do later
  //add extended trip and below later
}

function setFieldTripInfo () {
  
}

$(document).ready(main);
