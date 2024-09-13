document.getElementById('layout').addEventListener('change', function(event) {
    var input = event.target;
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.getElementById('preview');
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});