$('.datatable-crud').dataTable({
    // stateSave:true,
    pagingType: 'full_numbers_no_ellipses',
    processing: true,
    search: {
        return: true
    },
    serverSide: true,
    ajax: location.href,
    aLengthMenu: [
        [25, 50, 100, 200],
        [25, 50, 100, 200]
    ],
})

try {
    $('select').select2()
} catch (error) {
    
}

if($("input[data-type='currency']"))
{
    
    $("input[data-type='currency']").each(function(){
        const el = $(this)
        el.attr('type','text')
        formatCurrency(el);
    })
}

$(document)
.on('keyup', "input[data-type='currency']", function(){
  formatCurrency($(this))
})
.on('blur', "input[data-type='currency']", function(){
  formatCurrency($(this), 'blur')
})

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  try {
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
  } catch (error) {
    return n
  }
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side //  + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = input_val;
    
    // final formatting
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

function cleanCurrencyFormat(val)
{
  return val.replaceAll(',','')
}

$('form').on('submit', function(){
    if($(this).find("input[data-type='currency']"))
    {
        $("input[data-type='currency']").each(function(){
            const el = $(this)
            var val = el.val()
            val = cleanCurrencyFormat(val)
            el.val(val)
        })
    }
})