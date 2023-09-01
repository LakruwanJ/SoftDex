 document.addEventListener("DOMContentLoaded", function () {
        const licenseSelect = document.getElementById('license');
        const amountContainer = document.getElementById('amountContainer');

        licenseSelect.addEventListener('change', () => {
            if (licenseSelect.value === 'paid') {
                amountContainer.style.display = 'block';
            } else {
                amountContainer.style.display = 'none';
            }
        });
    });



