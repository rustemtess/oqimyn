document.addEventListener('DOMContentLoaded', () => {
    
    // Components words
    document.querySelectorAll('.words').forEach(words => {
        words.querySelectorAll('p').forEach(word => {
            word.addEventListener('click', () => {
                speak(word, 1)
            })
        });
    })

})

var activeRequest = null;
var isPlaying = false;

function speak(event, speed = 1) {
    if (activeRequest !== null || isPlaying)
        return;

    activeRequest = new XMLHttpRequest();
    activeRequest.open("GET", "https://tilashar.choices.kz/api/?audio_text=" + event.innerText, true);
    activeRequest.onreadystatechange = function () {
        if (activeRequest.readyState === 4 && activeRequest.status === 200) {
            var source = activeRequest.responseText;
            var audio = document.createElement("audio");
            audio.autoplay = true;
            audio.volume = 1;
            audio.setAttribute('playbackRate', '0.1');
            audio.load()
            audio.addEventListener("canplaythrough", function() {
                audio.playbackRate = speed;
                audio.play();
                isPlaying = true;
            });
            audio.addEventListener("ended", function() {
                isPlaying = false;
                activeRequest = null; 
            });
            audio.src = source;
        }
    };
    activeRequest.send();
}



function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.innerText);
}
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.value = data
}

function getSelectedText() {
    return window.getSelection().toString();
}

