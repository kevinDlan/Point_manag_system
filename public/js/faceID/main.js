const video = document.getElementById('video')
const videoContent = document.getElementById("videoContent");

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('js/faceID/models/'),
  faceapi.nets.faceLandmark68Net.loadFromUri('js/faceID/models/'),
  faceapi.nets.faceRecognitionNet.loadFromUri('js/faceID/models/'),
  faceapi.nets.faceExpressionNet.loadFromUri('js/faceID/models/')
]).then(startVideo)

function startVideo() {
  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )
}

video.addEventListener('play', () => {
  const canvas = faceapi.createCanvasFromMedia(video)
  videoContent.append(canvas)
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    faceapi.draw.drawDetections(canvas, resizedDetections)
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
  }, 100)
})