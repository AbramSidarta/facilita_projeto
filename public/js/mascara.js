//Mascaras De Preço
const mascaraMoeda = (event) => {
    const onlyDigits = event.target.value
        .split("")
        .filter(s => /\d/.test(s))
        .join("")
        .padStart(3, "0");
    const digitsFloat = onlyDigits.slice(0, -2) + "." + onlyDigits.slice(-2);
    event.target.value = maskCurrency(digitsFloat);
}

// Função de formatação de valor em moeda
const maskCurrency = (valor, locale = 'pt-BR', currency = 'BRL') => {
    return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency
    }).format(valor);
}

//Mascaras De Horas
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




