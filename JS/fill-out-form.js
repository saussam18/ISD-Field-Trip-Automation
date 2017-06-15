var destination = "";
var purpose = "";
var schoolName = "";
var startDate = "";
var startTime = "";
var endTime = "";
var transportation = "";
var otherTransportation = "";
var extendedTrip = false;
var challengeCourse = false;
var waterActivity = false;

function next() {
    //getFieldTripInfo();
    getTransportation();
    window.location='create-form.html';
    //alert('button pressed');

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

function getTransportation(){
  var choice = document.getElementById("transportation_select").selectedIndex;

  if(choice == 4){
    getOtherTransportation();
  }
  sessionStorage.setItem('choice', choice);
}

function getOtherTransportation() {
  sessionStorage.setItem('other', $('#other_transportation').val());
  otherTransportation = sessionStorage.getItem('other');
}

function setFieldTripInfo () {
  $('#destination_blank').text(sessionStorage.getItem('des') + "\t");
  $('#purpose_blank').text(sessionStorage.getItem('purpose') + "\t");
  $('#school_blank').text(sessionStorage.getItem('school') + "\t");
  $('#start_date_blank').text(sessionStorage.getItem('sDate') + "\t");
  $('#start_time_blank').text(sessionStorage.getItem('sTime') + "\t");
  $('#end_time_blank').text(sessionStorage.getItem('eTime') + "\t");
  setTransportation();
}

function setTransportation(){
  var choice = sessionStorage.getItem('choice');

  if (choice == 0){
    $('#district').text("X\t")
  }
  else if (choice == 1){
    $('#parent').text("X\t")
  }
  else if (choice == 2){
    $('#private_district').text("X\t")
  }
  else if (choice == 3){
    $('#private_parent').text("X\t")
  }
  else if (choice == 4){
    $('#other').text("X\t")
    $('#other_blank').text(sessionStorage.getItem('other') + "\t");
  }
}
