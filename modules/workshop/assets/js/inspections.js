$('select[name="ws_inspections[customer_id]"]').change(function(){
    const customer_id = $(this).val()

    fetch('/workshop/vehicles/get-by-customer?customer_id='+customer_id)
    .then(res => res.json())
    .then(res => {
        $('select[name="ws_inspections[vehicle_id]"]').html('<option value="" data-price="0" data-unit="PCS">- Pilih -</option>')
        
        res.data.forEach(data => {
            var newOption = `<option value="${data.id}">${data.name + ' - ' + data.police_number}</option>`
            $('select[name="ws_inspections[vehicle_id]"]').append(newOption)
        })
    })
})

$('select[name="ws_inspections[customer_type]"]').change(function(){
    window.location.href = '/crud/create?table=ws_inspections&customer_type='+$(this).val()+'&vehicle_type='+$('select[name="ws_inspections[vehicle_type]"]').val()
})

$('select[name="ws_inspections[vehicle_type]"]').change(function(){
    window.location.href = '/crud/create?table=ws_inspections&vehicle_type='+$(this).val()+'&customer_type='+$('select[name="ws_inspections[customer_type]"]').val()
})