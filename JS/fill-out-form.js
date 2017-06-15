var destination = "";
var purpose = "";
var schoolName = "";
var startDate = "";
var startTime = "";
var endTime = "";
var transportation = "";
var extendedTrip = false;
var challengeCourse = false;
var waterActivity = false;

function next() {
    getFieldTripInfo();
    window.location='create-form.html';
}

function getFieldTripInfo() {
  getDestination();
  getPurpose();
  getSchoolName();
  getStartDate();
  getStartTime();
  getEndTime();
}

function getDestination(){
  sessionStorage.setItem('des', $('#place').val());
  destination = sessionStorage.getItem('des');
}

function getPurpose(){
  sessionStorage.setItem('purpose', $('#purp').val());
  purpose = sessionStorage.getItem('purpose ');
}

function getSchoolName() {
  sessionStorage.setItem('school', $('#school').val());
  purpose = sessionStorage.getItem('school');
}

function getStartDate() {
  sessionStorage.setItem('sDate', $('#start_date').val());
  purpose = sessionStorage.getItem('sDate');
}

function getStartTime() {
  sessionStorage.setItem('sTime', $('#start_time').val());
  purpose = sessionStorage.getItem('sTime');
}

function getEndTime() {
  sessionStorage.setItem('eTime', $('#end_time').val());
  purpose = sessionStorage.getItem('eTime');
}

function setFieldTripInfo () {
  $('#destination_blank').text(sessionStorage.getItem('des') + "\t");
  $('#purpose_blank').text(sessionStorage.getItem('purpose') + "\t");
  $('#school_blank').text(sessionStorage.getItem('school') + "\t");
  $('#start_date_blank').text(sessionStorage.getItem('sDate') + "\t");
  $('#start_time_blank').text(sessionStorage.getItem('sTime') + "\t");
  $('#end_time_blank').text(sessionStorage.getItem('eTime') + "\t");
}
