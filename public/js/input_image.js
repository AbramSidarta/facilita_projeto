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

function removeImage() {
    if (confirm('Você tem certeza?')) {
    // Limpa o preview da imagem
    const preview = document.getElementById('preview');
    const fileInput = document.getElementById('fileInput');
    const noImageMessage = document.getElementById('no-image-message');
    const removeButton = document.getElementById('removeImageButton');

    preview.src = ''; // Remove a imagem do preview
    preview.style.display = 'none'; // Esconde o preview
    fileInput.value = ''; // Reseta o input de arquivo
    noImageMessage.style.display = 'block'; // Mostra a mensagem padrão
    removeButton.style.display = 'none'; // Esconde o botão de remoção
    }
}


document.querySelector('form').addEventListener('submit', function (event) {
    const inputFile = document.getElementById('layout');
    const previewImage = document.getElementById('preview');

    // Verifica se há uma imagem no preview ou no input
    if (!inputFile.files.length && (!previewImage.src || previewImage.src === window.location.href)) {
        event.preventDefault(); // Impede o envio do formulário
        alert('Por favor, selecione ou cole uma imagem antes de enviar.');
    }
});



document.addEventListener('DOMContentLoaded', function () {
    const preview = document.getElementById('preview');
    const removeButton = document.getElementById('removeImageButton');
    const noImageMessage = document.getElementById('no-image-message');

    if (preview.src && preview.src !== window.location.href) {
        preview.style.display = 'block';
        removeButton.style.display = 'block';
        noImageMessage.style.display = 'none';
    } else {
        preview.style.display = 'none';
        removeButton.style.display = 'none';
        noImageMessage.style.display = 'block';
    }
});



//para carregar a imgem no edit 
function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const imgElement = document.getElementById('preview');
        const noImageMessage = document.getElementById('no-image-message');
        const removeButton = document.getElementById('removeImageButton');

        imgElement.src = e.target.result; // Atualiza o preview
        imgElement.style.display = 'block'; // Mostra a imagem
        noImageMessage.style.display = 'none'; // Esconde a mensagem padrão
        removeButton.style.display = 'block'; // Mostra o botão de remoção
    };

    if (file) {
        reader.readAsDataURL(file);
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



// Aciona o input de file ao clicar na área
function triggerFileInput() {
    document.getElementById('layout').click();
}

// Função para mostrar a imagem colocada no create
function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const imgElement = document.getElementById('preview');
        imgElement.src = e.target.result;
        imgElement.style.display = 'block'; // Exibe a imagem
        document.getElementById('no-image-message').style.display = 'none'; // Esconde a mensagem
    };

    if (file) {
        reader.readAsDataURL(file);
    }
}

// Função para capturar a imagem da área de transferência (Ctrl + V)
window.addEventListener('paste', function(event) {
    const items = event.clipboardData.items;
    for (let i = 0; i < items.length; i++) {
        // Verifica se o item copiado é uma imagem
        if (items[i].type.indexOf('image') === 0) {
            const file = items[i].getAsFile();
            const reader = new FileReader();

            reader.onload = function(e) {
                // Exibe a imagem no preview
                const imgElement = document.getElementById('preview');
                imgElement.src = e.target.result;
                imgElement.style.display = 'block'; // Exibe a imagem
                document.getElementById('no-image-message').style.display = 'none'; // Esconde a mensagem

                // Cria um 'input' para enviar a imagem no formulário
                const dataUrl = e.target.result;

                // Criando uma simulação do comportamento de input file
                const inputFile = document.getElementById('layout');
                const dataTransfer = new DataTransfer(); // Simula um DataTransfer para adicionar o arquivo

                const blob = dataURLtoBlob(dataUrl); // Converter a DataURL para Blob
                const file = new File([blob], 'image.png', { type: 'image/png' });
                dataTransfer.items.add(file);
                inputFile.files = dataTransfer.files; // Atualiza os arquivos do input
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

// Se não houver imagem prévia, mostrar a mensagem "Nenhuma imagem selecionada"
if (!document.getElementById('preview').src) {
    document.getElementById('no-image-message').style.display = 'block';
}


