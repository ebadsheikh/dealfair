'use strict';

const form = document.querySelector('#email-verification-form');

for (let i = 1; i <= 6; i++) {
    const code = form.querySelector('[name=code_' + i + ']');

    code.addEventListener('input', function () {
        if (this.value.length === 1) {
            const nextCode = form.querySelector('[name=code_' + (i + 1) + ']');
            if (nextCode) {
                nextCode.focus();
            } else {
                code.blur();
            }
        }
    });

    code.addEventListener('paste', function (event) {
        event.preventDefault();
        const pasteData = event.clipboardData.getData('text/plain').trim();
        if (pasteData.length === 6) {
            for (let j = 0; j < 6; j++) {
                const currentCode = form.querySelector('[name=code_' + (i + j) + ']');
                currentCode.value = pasteData.charAt(j);
                if (j < 5) {
                    const nextCode = form.querySelector('[name=code_' + (i + j + 1) + ']');
                    nextCode.focus();
                } else {
                    currentCode.blur();
                }
            }
        }
    });
}
