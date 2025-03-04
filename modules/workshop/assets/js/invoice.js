var record_type = $('#record_type').val()
$('.add-item-button').click(function(){
    const selectedItem = {
        product: $('select[name=product]').find(':selected')[0],
    }
    
    const selectedData = {
        product: sanitizeSelected(selectedItem.product.text)
    }
    
    const data = {
        key:items.length+1,
        name: selectedData.product,
        unit: selectedItem.product.dataset.unit,
        qty: 1,
        price: parseInt(selectedItem.product.dataset.price),
        total_price: parseInt(selectedItem.product.dataset.price),
        product: $('select[name=product]').val(),
        product_type: selectedItem.product.dataset.type,
    }
    
    const row = `<tr id="item_${items.length+1}">
                <td>
                <input type="hidden" name="items[${items.length}][product_id]" value="${data.product}">
                ${record_type == 'SALES' ? `<input type="hidden" name="items[${items.length}][base_price]" value="${data.price}">` : ''}
                ${items.length+1}
                </td>
                <td>${data.name}</td>
                <td>${record_type == 'PROCUREMENT' ? `<input type="text" class="form-control price-input" data-type='currency' name="items[${items.length}][base_price]" value="${format_number(data.price)}" data-key="${items.length+1}">` : format_number(data.price)}</td>
                <td>${data.unit}</td>
                <td><input type="number" class="form-control qty-input" style="width:100px" name="items[${items.length}][qty]" value="${data.qty}" data-key="${items.length+1}"></td>
                <td id="price-${items.length+1}">${format_number(data.price*data.qty)}</td>
                <td><button class="btn btn-sm btn-danger remove-item-button" type="button" data-target="#item_${items.length+1}" data-key="${items.length+1}"><i class="fas fa-trash"></i></button></td>
                </tr>
                `
    $('.table-item tbody').append(row)
    items.push(data)

    refreshRow()

    calculateTotalOrder()
});

$('.add-customer-button').click(function(){
    const customer = $('#customerSelect').find(':selected')[0]
    $('#customer_name').val(customer.text)
    $('#customer_name').attr('readonly','')
    $('#customer_id').val($('#customerSelect').val())
    $('#customerModal').modal('hide')
});

$('.use-walking-guest').click(function(){
    $('#customer_name').val("")
    $('#customer_name').removeAttr('readonly')
})

$(document.body).on('click', '.remove-item-button', function(){
    var target = $(this).data('target')
    var key = $(this).data('key')
    $(target).remove()
    const index = items.findIndex(item => item.key == key);
    if (index > -1) { // only splice array when item is found
        items.splice(index, 1); // 2nd parameter means remove one item only
    }

    refreshRow()
    calculateTotalOrder()
})

$(document.body).on('change', '.price-input', function(){
    var key = $(this).data('key')
    const index = items.findIndex(item => item.key == key);
    const item = items[index]

    item.price = parseInt(cleanCurrencyFormat($(this).val()))
    item.total_price = item.price * item.qty
    $('#price-'+key).html(format_number(item.total_price))
    calculateTotalOrder()
})

$(document.body).on('change', '.qty-input', function(){
    var key = $(this).data('key')
    const index = items.findIndex(item => item.key == key);
    const item = items[index]

    item.qty = parseInt($(this).val())
    item.total_price = item.price * item.qty
    $('#price-'+key).html(format_number(item.total_price))
    calculateTotalOrder()
})

function sanitizeSelected(value)
{
    return value.replace('- Pilih -','')
}

function format_number(value)
{
    return new Intl.NumberFormat().format(value)
}

function refreshRow()
{
    if(items.length)
    {
        $('#empty_item').hide()
    }
    else
    {
        $('#empty_item').show()
    }

}

function calculateTotalOrder()
{
    var totalOrder = 0
    var totalQty = 0
    items.forEach(item => {
        totalOrder += item.total_price
        totalQty += item.qty
    })

    $('input[name="ws_invoices[total_price]"]').val(format_number(totalOrder))

    if($('input[name="ws_invoices[total_qty]"]'))
    {
        $('input[name="ws_invoices[total_qty]"]').val(totalQty)
    }
}

$('#inspection_id').change(function(){
    const selected = $('#inspection_id').find(':selected')[0]
    if(selected.dataset.customername)
    {
        $('#customer_name').val(selected.dataset.customername)
        $('#customer_name').attr('readonly','')
        $('#customer_id').val(selected.dataset.customer)
    }
    else
    {
        $('#customer_name').val("")
        $('#customer_name').removeAttr('readonly')
    }
})