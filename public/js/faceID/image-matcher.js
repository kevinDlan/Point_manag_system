var video = document.getElementById("video");
var canvas = document.getElementById("canvas");

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri("js/faceID/models/"),
    faceapi.nets.faceLandmark68Net.loadFromUri("js/faceID/models/"),
    faceapi.nets.faceRecognitionNet.loadFromUri("js/faceID/models/"),
]).then(run());

async function run() {
    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices
            .getUserMedia({
                video: { width: { exact: 300 }, height: { exact: 300 } },
            })
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function (err) {
                console.log("Something went wrong!");
            });
    }
}

video.addEventListener("play", async (e) => {
    displaySize = {
        width: 300,
        height: 300,
    };

    var ImageRef = document.getElementById("user");
    var resRef = await faceapi
        .detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
        .withFaceLandmarks()
        .withFaceDescriptor();

    var faceMatcher = new faceapi.FaceMatcher(resRef);

    setInterval(async () => {
        canvas.innerHTML = faceapi.createCanvasFromMedia(video);
        faceapi.matchDimensions(canvas, displaySize);
        var query = await faceapi
            .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceDescriptors();

        const queryDrawBoxes = query.map(async (res) => {
            const bestMatch = faceMatcher.findBestMatch(res.descriptor);
            if (bestMatch.distance < 0.4) {
                // window.location.replace("http://127.0.0.1:8000/login");
                window.location.href = "http://127.0.0.1:8000/login";
                // Swal.fire({
                //     // position: "top-end",
                //     icon: "success",
                //     title: "Your work has been saved",
                //     showConfirmButton: false,
                //     timer: 1500,
                // });
                // Swal.fire("Good job!", "You clicked the button!", "success");
                // console.log("mon pote");
                // Simulate a mouse click:

                // window.location.href = "http://www.w3schools.com";
                // Simulate an HTTP redirect:
                // setTimeout(_=>
                // {

                // },1502)
            }
            // else
            // {

            // }
        });
        // console.log(query);
        let resizeDis = faceapi.resizeResults(query, displaySize);
        faceapi.draw.drawFaceLandmarks(canvas, resizeDis);
    }, 100);
});
