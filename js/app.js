const video = document.getElementById('video');

video.addEventListener('play', function okno() {
    video.removeEventListener('play', okno);
    video.pause();

    alert('Prehrávam video...');
    video.play();
});