var k = 0;
function move() {
    if (k == 0) {
        k = 1;
        var elem = document.getElementById("bar");
        var width = 10;
        var id = setInterval(frame, 10);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
                k = 0;
            } else {
                width++;
                elem.style.width = width + "%";
                elem.innerHTML = width + "%";
            }
        }
    }
}
