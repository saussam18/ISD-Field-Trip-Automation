var formInfo = new Array(7);

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
    getFieldTripInfo();
    //getDestination();
    //alert(destination);
    //setFieldTripInfo();
    window.location='create-form.php';
}

function getFieldTripInfo() {
  formInfo[0] = $('#place').val();
  formInfo[1] = $('#purp').val();
  formInfo[2] = $('#school').val();
  formInfo[3] = $('#start_date').val();
  formInfo[4] = $('#end_date').val();
  formInfo[5] = $('#start_time').val();
  formInfo[6] = $('#end_time').val();

  var packed = "";
  for(var i = 0; i < formInfo.length; i++){
    if (i > 0) {
      packed += ",";
    }
    packed += escape(formInfo[i]);
  }
  document.data.value = packed;
  document.data.submit();
  //transportation = do later
  //add extended trip and below later
}

function getDestination(){
  window.localStorage.setItem ('dest', $('#place').val());
  alert(window.localStorage.getItem('dest'));
}
destination = getDestination();

function setFieldTripInfo (formInfo) {
  //alert(destination);
  $('#destination_blank').text(formInfo[0] + "\t");
  $('#purpose_blank').val(formInfo[1] + "\t");
  $('#school_blank').val(formInfo[2] + "\t");
  $('#start_date_blank').val(formInfo[3] + "\t");
  $('#start_time_blank').val(formInfo[4] + "\t");
  $('#end_time_blank').val(formInfo[5] + "\t");
}
