var destination = "";
var purpose = "";
var schoolName = "";
var startDate = "";
var startTime = "";
var endTime = "";
var transportation = "";
var otherTransportation = "";
var extendedTrip;
var challengeCourse;
var waterActivity;

function next() {
    getFieldTripInfo();
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
  getTransportation();
  getBonusInfo();

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

function getBonusInfo(){//this funciton may be whack
    extendedTrip = document.getElementById("extended_trip");
    ropeCourse = document.getElementById("rope_course");
    waterActivity = document.getElementById("water_activity");
    sessionStorage.setItem('extended', extendedTrip.checked);
    sessionStorage.setItem('rope', ropeCourse.checked);
    sessionStorage.setItem('water', waterActivity.checked);
}

function setFieldTripInfo () {
  $('#destination_blank').text(sessionStorage.getItem('des') + "\t");
  $('#purpose_blank').text(sessionStorage.getItem('purpose') + "\t");
  $('#school_blank').text(sessionStorage.getItem('school') + "\t");
  $('#start_date_blank').text(sessionStorage.getItem('sDate') + "\t");
  $('#start_time_blank').text(sessionStorage.getItem('sTime') + "\t");
  $('#end_time_blank').text(sessionStorage.getItem('eTime') + "\t");
  setTransportation();
  setBonusInfo();
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

function setBonusInfo(){
  extendedTrip = sessionStorage.getItem('extended');
  ropeCourse = sessionStorage.getItem('rope');
  waterActivity = sessionStorage.getItem('water');

  if (extendedTrip){
    $('#extendedTrip').text("X\t");
  }
  if (ropeCourse){
    $('#ropeCourse').text("X\t");
  }
  if (waterActivity){
    $('#waterActivity').text("X\t");
  }
}
