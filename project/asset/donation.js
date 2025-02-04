document.addEventListener('DOMContentLoaded', function () {
    const donationForm = document.getElementById('donation-form');
    const responseContainer = document.getElementById('donation-response');
    const paymentButtons = document.querySelectorAll('.payment-button');

    paymentButtons.forEach(button => {
        button.addEventListener('click', function () {
            const campaignId = document.getElementById('campaign').value;
            const amount = document.getElementById('amount').value;
            const paymentMethod = this.getAttribute('data-method');

            if (!campaignId || !amount) {
                responseContainer.innerHTML = '<p style="color: red;">Please fill in all fields.</p>';
                return;
            }

           
            const data = new FormData();
            data.append('campaign_id', campaignId);
            data.append('amount', amount);
            data.append('payment_method', paymentMethod);

            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/payment_controller.php', true);

            
            xhttp.onload = function () {
                if (xhttp.status === 200) {
                    const response = JSON.parse(xhttp.responseText);

                    if (response.success) {
                        responseContainer.innerHTML = `
                            <p style="color: green;">${response.message}</p>
                            <p>Transaction ID: ${response.transaction_id}</p>
                        `;

                       
                        const campaignOption = document.querySelector(`option[value='${campaignId}']`);
                        if (campaignOption) {
                           
                            const currentRaisedAmount = parseFloat(campaignOption.getAttribute('data-raised-amount')) + parseFloat(amount);
                            campaignOption.setAttribute('data-raised-amount', currentRaisedAmount);

                            const campaignAmountText = campaignOption.textContent;
                            const newAmountText = campaignAmountText.replace(/(Raised: )[\d.]+/, `$1${currentRaisedAmount.toFixed(2)}`);
                            campaignOption.textContent = newAmountText;
                        }
                    } else {
                        responseContainer.innerHTML = `
                            <p style="color: red;">${response.message}</p>
                        `;
                    }
                } else {
                    responseContainer.innerHTML = `
                        <p style="color: red;">An error occurred. Please try again.</p>
                    `;
                }
            };
            xhttp.send(data);
        });
    });
});
