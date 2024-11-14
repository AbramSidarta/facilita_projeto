//para carregar imagem no create 
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
//para carregar a imgem no edit 
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result; // Atualiza a imagem para a nova
            preview.style.display = 'block'; // Garante que a imagem seja exibida
        }
        reader.readAsDataURL(file);
    } else {
        // Se não houver arquivo, exiba a imagem original ou o texto padrão
        preview.src = "{{ $ordemServico->layout ? asset('uploads/ordemdeservico/' . $ordemServico->layout) : '' }}";
        preview.style.display = "{{ $ordemServico->layout ? '' : 'none' }}";
    }
}