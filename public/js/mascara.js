
//datas
function formatPrice(value) {
    // Remove tudo que não é dígito
    let cleanedValue = value.replace(/\D/g, '');

    // Adiciona a vírgula como separador decimal
    cleanedValue = cleanedValue.replace(/(\d{2})$/, ',$1');
    
    // Adiciona o ponto como separador de milhar
    cleanedValue = cleanedValue.replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1.');

    // Adiciona o prefixo "R$"
    return 'R$ ' + cleanedValue;
}

document.getElementById('valor').addEventListener('input', function(event) {
    const input = event.target;
    input.value = formatPrice(input.value);
});

//Horas

function formatTime(value) {
    // Remove todos os caracteres não numéricos
    let cleanedValue = value.replace(/\D/g, '');
    
    // Adiciona os dois pontos após os dois primeiros dígitos
    if (cleanedValue.length > 2) {
        cleanedValue = cleanedValue.slice(0, 2) + ':' + cleanedValue.slice(2, 4);
    }


    if (cleanedValue.length === 5) {
        const [hours, minutes] = cleanedValue.split(':').map(Number);
        if (hours >= 24 || minutes >= 60) {
            return '00:00'; // Define um valor padrão ou pode limpar o campo
        }
    }
    // Limita a quantidade de caracteres
    return cleanedValue.slice(0, 5);
}

document.getElementById('hora_de_entrega').addEventListener('input', function(event) {
    const input = event.target;
    input.value = formatTime(input.value);
});

document.getElementById('hora_do_recebimento_do_controle').addEventListener('input', function(event) {
    const input = event.target;
    input.value = formatTime(input.value);
});

document.getElementById('prazo_da_impressao_hora').addEventListener('input', function(event) {
    const input = event.target;
    input.value = formatTime(input.value);
});