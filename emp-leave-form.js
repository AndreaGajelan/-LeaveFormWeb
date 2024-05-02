/*CALCULATE DAYS INTO HOURS
function calculateHours()
{
  var startDate = document.getElementById('startDate').value;
  var endDate = document.getElementById('endDate').value;
  const date1 = new Date(startDate);
  const date2 = new Date(endDate);
  const time = Math.abs(date1 - date2);
  const hours = Math.ceil(time / (1000*60*60));
  document.getElementById('dayToHrs').innerHTML = hours + 'Hours';
}

function calculateHours() {
  var startDate = new Date(document.getElementById('startDate').value);
  var endDate = new Date(document.getElementById('endDate').value);
  var hours = Math.abs(startDate - endDate) / 36e5; // 1 hour = 36e5 milliseconds
  document.getElementById('daysToHrs').value = hours;
}*/


//TYPE OF LEAVE "OTHERS" FUNCTION
window.onload = function() {
  function showInput(select) {
    var otherInput = document.getElementById("textFieldContainer");
    if (select.value === "Others") {
      otherInput.style.display = "block";
    } else {
      otherInput.style.display = "none";
    }
  }
};

//START AND END TIME FUNCTION
// Get the radio buttons and timeRequest element
const halfdayRadio = document.getElementById('check-halfday');
const undertimeRadio = document.getElementById('check-undertime');
const wholedayRadio = document.getElementById('check-wholeday');
const timeRequest = document.getElementById('timeRequest');

// Function to toggle visibility of timeRequest based on selected radio button
function toggleTimeRequest() {
  if (halfdayRadio.checked || undertimeRadio.checked) {
    timeRequest.style.display = 'block';
  } else {
    timeRequest.style.display = 'none';
  }
}

toggleTimeRequest();

halfdayRadio.addEventListener('change', toggleTimeRequest);
undertimeRadio.addEventListener('change', toggleTimeRequest);
wholedayRadio.addEventListener('change', toggleTimeRequest);