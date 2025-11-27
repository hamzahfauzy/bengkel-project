$(document).ready(function(){
    // console.log('this is payment')
    $('[name="ws_payments[invoice_id]"]').change(function(){
        const value = $(this).val()
        // console.log(value)
        fetch('/workshop/invoices/get-invoice-by-id?id='+value)
            .then(res => res.json())
            .then(res => {
                if(res.message == 'invoice retrieved')
                {
                    $('[name="ws_payments[amount]"]').val(parseInt(res.data.final_price))
                }
            })
    })
})