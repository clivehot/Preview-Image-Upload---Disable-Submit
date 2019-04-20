<html>
<head>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            img {
                height:50px;
                width:50px;
            }
        </style>
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input id="input-file" name="file1" type="file" onchange="previewImage(event)" >
        <input type="submit" name="submit" value="Upload Image" onclick="uploadImage(event)" >
    </form>
    
    <form action="" method="post">
    <input id="submit2" type="submit" name="submit" value="test"  >
    </form>
    
    <script>
    
    function previewImage(event) {
        event.preventDefault();
        var file = event.target.files;
        
        var image = $("<img class='pre' alt='image' src='"+URL.createObjectURL(file[0])+"'><br><progress class='progressBar' value='0' max='100' style='width:125px;' ></progress>");
        $("#demo").append(image);
        
    }
    
    function uploadImage(event) {
            var file = document.getElementById("input-file").files[0];
            
            var formdata = new FormData();
            //append(key,value)
            formdata.append("file1", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "upload.php");
            ajax.send(formdata);
            
    }
    
    function progressHandler(event) {
                                        percentcomplete = Math.round((event.loaded / event.total) * 100);
                                        // This takes the value form the progress bar and gives the new value
                                        $(".progressBar").val (Math.round(percentcomplete));
                                        $(".uploadprog").text(percentcomplete + "%");
                                        if( Math.round(percentcomplete) != 100 ) {
                                                 document.getElementById("submit2").disabled = true;
                                        } else {
                                                  document.getElementById("submit2").disabled = false;
                                        }
                                        
                                        

                                                                         
    } // end of function progressHandler
    
    function completeHandler(event) {
                                      $(".progressBarMain").val(100);
    }
    
    function errorHandler(event) {
                                    alert("Image upload incomplete!");
                                    document.getElementById("status").innerHTML = "Upload Failed";
    
    }
    
    function abortHandler(event) {
                                     alert("Abort");
                                     document.getElementById("status").innerHTML = "Upload Failed";
    }
    
    </script>
    
    <div id="demo"></div>
    <div class="uploadprog"></div>
    <div id="status"></div>
    
    

</body>
</html>