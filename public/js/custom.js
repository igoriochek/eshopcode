const minuses = document.querySelectorAll('.minus-button');
const pluses = document.querySelectorAll('.plus-button');
const amountNumbers = document.querySelectorAll('.product-add-to-cart-number');

const minValue = 1;
const maxValue = 5;

minuses.forEach((minus, index) => {
    minus.addEventListener('click', e => {
        e.preventDefault();
        const currentValue = Number(amountNumbers[index].value) || 0;
        if (currentValue === minValue) return;
        amountNumbers[index].value = currentValue - 1;
    });
});

pluses.forEach((plus, index) => {
    plus.addEventListener('click', e => {
        e.preventDefault();
        const currentValue = Number(amountNumbers[index].value) || 0;
        if (currentValue === maxValue) return;
        amountNumbers[index].value = currentValue + 1;
    });
});