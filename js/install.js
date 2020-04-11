/* test page for ajax test / debugging */
/*------------------------------------------*/
/*
readyState	Holds the status of the XMLHttpRequest.
0: request not initialized
1: server connection established
2: request received
3: processing request
4: request finished and response is ready
--------------------------------------------------------
status	Returns the status-number of a request
200: "OK"
403: "Forbidden"
404: "Not Found"
For a complete list go to the Http Messages Reference : https://www.w3schools.com/tags/ref_httpmessages.asp
*/
console.log('[!] Non Deployed Version is unstable')

var loading = document.getElementById('loading');

loading.addEventListener('click', function(){
    const WaitTime = 20000;


    function update() {
        var element = document.getElementById("installer_bar");
        element.style.height = "15px";
        var width = 1;
        var identity = setInterval(scene, 200);
        function scene() {
            if (width >= 100) {
                clearInterval(identity);
            } else {
                width++;
                element.style.width = width + '%';
            }
        }
    }


    var i = 0;
        if (i == 0) {
            i = 1;
            var elem = loading
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    i = 0;
                } else {
                    width++;
                    elem.style.width = width + "%";
                }
            }
        }

        update()

        // Reloads page within 20 secondes ( avg installation time )
        setInterval(function(){
            location.reload();
        }, WaitTime);

});


function download() // create a function to display
{
  var xhttp = new XMLHttpRequest(); // create a new instance of XMLHttpRequest
  xhttp.onreadystatechange = function() { // whenever onreadystate changes
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("zipping_label").innerHTML = this.responseText;
        console.log(this.statusText);
    }
  };
  // todo: ajax on onchange on select / option
  xhttp.open("POST", "install_changes.php", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('test=ok');
}

function build() // create a function to display
{
    console.log("building..")
    var xhttp = new XMLHttpRequest(); // create a new instance of XMLHttpRequest
    xhttp.onreadystatechange = function() { // whenever onreadystate changes then lets execute an anonymous func
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('error').innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "build.php", true);
    xhttp.send();
}
