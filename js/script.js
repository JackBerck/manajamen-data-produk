document.querySelectorAll('.price').forEach(function(element) {
    var price = parseFloat(element.textContent);
    element.textContent = price.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
});