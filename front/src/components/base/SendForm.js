export default function sendFormPromise(url, data, onPercentageProgress = null) {
  return new Promise((resolve, reject) => {
    const XHR = new XMLHttpRequest();
    const FD = new FormData();

    // Push our data into our FormData object
    for (let name in data) {
      FD.append(name, data[name]);
    }

    if(onPercentageProgress) {
      XHR.upload.addEventListener("progress", function (e) {
        if (e.lengthComputable) {
          onPercentageProgress(Math.round((e.loaded * 100) / e.total));
        }
      }, false);
    }

    // Define what happens on successful data submission
    XHR.addEventListener('load', function (event) {
      resolve(event.target.responseText);
    });

    // Define what happens in case of error
    XHR.addEventListener('error', function (event) {
      reject();
    });

    // Set up our request
    XHR.open('POST', url);

    // Send our FormData object; HTTP headers are set automatically
    XHR.send(FD);

  });
}
