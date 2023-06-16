var len;
var current;
var urls;
var camefrom=0;
var tabButtons1 = document.querySelector(".self_esteem_button");
tabButtons1.addEventListener("click", function () {
    topicvalue="topic1";
    topicno=1;
    year = 1;
    current=0;
    camefrom=1;
    var checkTick = document.querySelector(".checkbox_video");
    var label=document.querySelector(".completed_label");
    checkTick.style.display = 'none';
    label.style.display = 'none';
    var btn=document.querySelector(".next_button");
    btn.disabled=false;
    //var videoUrls
    //topiccount=getnosofvids(topicvalue);
   // console.log(myValue);
    //checking();
    getVideo(year,topicno,camefrom);
  
    
    

});

var tabButtons2 = document.querySelector(".Attitudes_Emotions_button");
tabButtons2.addEventListener("click", function () {
    topicvalue="topic2";
    topicno=2;
    year = 1;
    camefrom=1;
    current=0;
    var checkTick = document.querySelector(".checkbox_video");
    var label=document.querySelector(".completed_label");
    checkTick.style.display = 'none';
    label.style.display = 'none';
    var btn=document.querySelector(".next_button");
    btn.disabled=false;
    //var videoUrls
    //topiccount=getnosofvids(topicvalue);
   // console.log(myValue);
    //checking();
    getVideo(year,topicno,camefrom);
    
    

});

//----------------------------------------GETVIDEO FUNCTION-----------
function getVideo(year, topicno,camefrom) {
  var xhr = new XMLHttpRequest();

  xhr.open("GET", "menteevideopage.php?year=" + encodeURIComponent(year) + "&topicno=" + encodeURIComponent(topicno), true);

  xhr.onload = function() {
    if (xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      console.log("Response:", response);
      var videoUrls= response.videoUrls;
      console.log(videoUrls);
      urls=videoUrls;
      len=urls.length;
      console.log(len);
      // Call the function to display the video or perform any other necessary tasks
      console.log("should work");
      if(camefrom==1)
      {
        var label1= document.getElementById("tracker");
    label1.textContent = (current+1) + "/" + len;
      }
      displayVideo(urls,current);
    } else {
      console.error("Request failed with status code " + xhr.status);
    }
  };

  xhr.send();
}

  
  function displayVideo(urls,current) {
    // Use the video URL as needed (e.g., assign it to a video element)
    var vid = document.querySelector(".r1");
    console.log("works");
    console.log(current);
    vid.src = urls[current];
    //checking();
  }
  
  
//------------------------------checking function----------------
// Create an XMLHttpRequest object
function checking()
{
var xhrs = new XMLHttpRequest();
console.log(topicvalue);
// Prepare the AJAX request
//var url = "get_completed.php?topicvalue=" + encodeURIComponent(topicvalue + '_');
//console.log("URL:", url);
xhrs.open("GET", "get_completed.php?topicvalue=" + encodeURIComponent(topicvalue), true);
console.log(topicvalue);
console.log("checking()");

// Set the onload callback function
xhrs.onload = function() {
    console.log("checking()");
  if (xhrs.status === 200) {
    // Request was successful
    var response = JSON.parse(xhrs.responseText);
    var completedValue = response.completed;
    console.log(xhrs.responseText)
    console.log("Completed value:", completedValue);
checkTick.checked = (completedValue == 1) ? true : false;
  }
  
}
xhrs.send();
}


//--------------------when u check an unchecked box-------------
var checkTick = document.querySelector(".checkbox_video");
var xhrm = new XMLHttpRequest();
checkTick.addEventListener("change", function() {
  var completedValue = checkTick.checked ? 1 : 0; // 1 if checked, 0 if unchecked

  // Create an XMLHttpRequest object
  

  // Prepare the AJAX request
  xhrm.open("GET", "update_completed.php?topicvalue=" + encodeURIComponent(topicvalue) + "&completed=" + encodeURIComponent(completedValue), true);

  // Set the onload callback function
  xhrm.onload = function() {
    if (xhrm.status === 200) {
      // Request was successful
      console.log("Completed status updated successfully.");
      //checking();
    } else {
      // Request failed
      console.error("Request failed with status code " + xhrm.status);
    }
  };

  // Send the AJAX request
  xhrm.send();
});


var checkTick = document.querySelector(".checkbox_video");
var label=document.querySelector(".completed_label");
checkTick.style.display = 'none';
label.style.display = 'none';

var btn=document.querySelector(".next_button");
    btn.disabled=false;
    btn.addEventListener("click",function()
{
    current=current+1;
    if(current<len)
    {
    console.log(current);
    var label1= document.getElementById("tracker");
    label1.textContent = (current+1) + "/" + len;
    displayVideo(urls,current);
    }
    else{
      checkTick = document.querySelector(".checkbox_video");
      checkTick.style.display = 'block';
      label.style.display = 'block';
      var btn=document.querySelector(".next_button");
    btn.disabled=true;
      console.log("completed");
      checking();
    }


})




  




