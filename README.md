# Preview-Image-Upload---Disable-Submit
For the uploading of the images create a folder called images

To add a sending message using javascript
<body onbeforeunload="sending()" >

Create a div under the submit button 
<div id="sending" ></div>

<script>
function sending() {
    
    document.getElementById("sending").innerHTML = "sending...";
}
</script>
