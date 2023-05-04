const cpfInput = document.getElementsByName('cpf')[0];

cpfInput.addEventListener('input', () => {

    // Garantir que apenas números serão inseridos no campo 'CPF'.
    cpfInput.value = cpfInput.value.replace(/[^0-9]/g, '');
    
    // Quando 11 números forem inseridos, executar a função 'validarCPF'.
    if (cpfInput.value.length === 11) {
        if (validarCPF(cpfInput.value) === false) {
            alert('CPF Inválido');
            cpfInput.value = '';
        } else {
            alert('CPF Válidado.')
            cpfInput.setAttribute("readonly", "readonly");
        };
    };

    
});

function validarCPF(cpf) {
    if (!(cpf.split('').every(char => char === cpf[0]))) {
        let num = 0;
        let pesos = [11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 0];
        for (let i = 0; i < 10; i++) {
            num += parseInt(cpf[i]) * pesos[i+1];
        };

        let resto = num % 11;
        num = 0;
        dig1 = (resto === 0 || resto === 1) ? 0 : 11 - resto;

        for (let i = 0; i < 11; i++) {
            num += parseInt(cpf[i]) * pesos[i];
        };

        resto = num % 11;
        dig2 = (resto === 0 || resto === 1) ? 0 : 11 - resto;

        return (dig1 === parseInt(cpf[9]) && dig2 == parseInt(cpf[10])) ? true : false;

    } else {
        return false;
    };
};
