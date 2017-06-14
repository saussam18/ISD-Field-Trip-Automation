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

function next() {
    //getFieldTripInfo();
    getDestination();
    window.location='create-form.html';
}

function getFieldTripInfo() {
  purpose = $('#purp').val();
  schoolName = $('#school').val();
  startDate = $('#start_date').val();
  endDate = $('#end_date').val();
  startTime = $('#start_time').val();
  endTime = $('#end_time').val();
  //transportation = do later
  //add extended trip and below later
}

function getDestination(){
  sessionStorage.setItem('des', $('#place').val());
  destination = sessionStorage.getItem('des');
}

function setFieldTripInfo () {
  $('#destination_blank').text(sessionStorage.getItem('des') + "\t");
  /*$('#purpose_blank').val(purpose);
  $('#school_blank').val(schoolName);
  $('#start_date_blank').val() = startDate;
  $('#start_time_blank').val() = startTime;
  $('#end_time_blank').val() = endTime;*/
}
