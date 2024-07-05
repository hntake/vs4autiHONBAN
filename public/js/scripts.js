document.getElementById('deliveryForm').addEventListener('submit', function(event) {
    event.preventDefault(); // フォームのデフォルトの送信を防止

    const formData = {
        name: document.getElementById('name').value,
        address: document.getElementById('address').value,
        postalCode: document.getElementById('postalCode').value,
        phone: document.getElementById('phone').value,
        deliveryDate: document.getElementById('deliveryDate').value
    };

    console.log('配達情報:', formData);
    alert('配達情報が送信されました！');

    // 実際の配達情報の送信はここに書く (例: APIに送信)
});
