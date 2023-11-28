document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('#verificationCode input');
    
    inputs.forEach((input, index) => {
        input.addEventListener('input', function() {
            if (input.value.length === 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                } else {
                    inputs[index].blur();
                }
            }
        });

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Backspace' && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });
});