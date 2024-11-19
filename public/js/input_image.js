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


// Aciona o input de file ao clicar na área
function triggerFileInput() {
    document.getElementById('fileInput').click();
}

// Função para mostrar a imagem selecionada no input
function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const imgElement = document.getElementById('preview');
        imgElement.src = e.target.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}

// Função para capturar a imagem da área de transferência (Ctrl + V)
window.addEventListener('paste', function(event) {
    const items = event.clipboardData.items;
    for (let i = 0; i < items.length; i++) {
        if (items[i].type.indexOf('image') === 0) {
            const file = items[i].getAsFile();
            const reader = new FileReader();

            reader.onload = function(e) {
                // Exibe a imagem no preview
                const imgElement = document.getElementById('preview');
                imgElement.src = e.target.result;

                // Cria um 'input' para enviar a imagem no formulário
                const dataUrl = e.target.result;

                // Criando uma simulação do comportamento de input file
                const inputFile = document.getElementById('fileInput');
                const dataTransfer = new DataTransfer();
                const blob = dataURLtoBlob(dataUrl); // Converter a DataURL para Blob
                const file = new File([blob], 'image.png', { type: 'image/png' });
                dataTransfer.items.add(file);
                inputFile.files = dataTransfer.files;
            };

            reader.readAsDataURL(file);
        }
    }
});

// Função para converter DataURL para Blob
function dataURLtoBlob(dataURL) {
    const [header, base64Data] = dataURL.split(',');
    const mime = header.match(/:(.*?);/)[1];
    const binary = atob(base64Data);
    const array = new Uint8Array(binary.length);

    for (let i = 0; i < binary.length; i++) {
        array[i] = binary.charCodeAt(i);
    }

    return new Blob([array], { type: mime });
}

