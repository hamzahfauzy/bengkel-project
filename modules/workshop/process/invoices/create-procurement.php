<?php

use Core\Database;
use Core\Page;
use Core\Request;

$db = new Database;
$tableName = 'ws_invoices';
$module = 'workshop';
$error_msg  = get_flash_msg('error');
$old        = get_flash_msg('old');

if(Request::isMethod('POST'))
{
    $data = isset($_POST[$tableName]) ? $_POST[$tableName] : [];
    $data['total_price'] = str_replace(',','',$data['total_price']);
    if(empty($data['customer_id']))
    {
        // unset($data['customer_id'])
        // $customer = $db->insert('ws_customers', [
        //     'name' => $_POST['customer_name']
        // ]);

        // $data['customer_id'] = $customer->id;
    }
    $items = $_POST['items'];
    $data['total_item'] = count($items);
    $data['total_qty'] = array_sum(array_column($items, 'qty'));
    $data['total_discount'] = 0;
    $data['final_price'] = $data['total_price'];
    $data['total_payment'] = $data['total_price'];
    $data['created_by'] = auth()->id;
    $order = $db->insert($tableName, $data);

    foreach($items as $index => $item)
    {
        $item['invoice_id'] = $order->id;
        $item['total_price'] = $item['base_price']*$item['qty'];
        $item['total_discount'] = 0;
        $item['final_price'] = $item['total_price'];
        $item['created_by'] = auth()->id;
        $item = $db->insert('ws_invoice_items', $item);

        // create logs
        $db->insert('ws_product_logs', [
            'product_id' => $item->product_id,
            'amount' => $item->qty,
            'record_type' => 'IN',
            'description' => $order->code
        ]);
    }

    // create journals
    // $db->insert('ws_finance_journals', [
    //     'code' => $order->code,
    //     'amount' => $order->final_price,
    //     'description' => 'procurement #'.$order->code,
    //     'record_type' => 'OUT',
    //     'created_by' => auth()->id
    // ]);

    set_flash_msg(['success'=>"Procurement saved"]);

    header('location:'.routeTo('workshop/invoices/detail', ['code' => $data['code']]));
    die();
}

$db->query = "SELECT COUNT(*) as `counter` FROM ws_invoices WHERE created_at LIKE '%".date('Y-m')."%' AND record_type = 'PROCUREMENT'";
$counter = $db->exec('single')?->counter ?? 0;

$counter = sprintf("%05d", $counter+1);
$code    = 'PROC' . date('Ym'). $counter;

$db->query = "SELECT 
                ws_products.*, 
                CONCAT(ws_products.name,' - ',ws_categories.name) name,
                ws_product_prices.amount price
              FROM ws_products 
              LEFT JOIN ws_categories ON ws_categories.id = ws_products.category_id
              LEFT JOIN ws_product_prices ON ws_product_prices.product_id = ws_products.id AND ws_product_prices.status = 'ACTIVE'
              WHERE ws_products.record_type = 'SPARE PART'";
$products = $db->exec('all');

$customers = $db->all('ws_customers');

// page section
$title = 'Create Procurement';
Page::setActive("workshop.invoices.procurement");
Page::setTitle($title);
Page::setModuleName($title);
Page::setBreadcrumbs([
    [
        'url' => routeTo('/'),
        'title' => __('crud.label.home')
    ],
    [
        'url' => '#',
        'title' => 'Procurement'
    ],
    [
        'title' => $title
    ]
]);


Page::pushHead('<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />');
Page::pushHead('<script src="https://cdn.tiny.cloud/1/rsb9a1wqmvtlmij61ssaqj3ttq18xdwmyt7jg23sg1ion6kn/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>');
Page::pushHead("<script>
tinymce.init({
  selector: 'textarea:not(.select2-search__field)',
  relative_urls : false,
  remove_script_host : false,
  convert_urls : true,
  plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
});
</script>");

Page::pushHead('<style>.select2,.select2-selection{height:38px!important;} .select2-container--default .select2-selection--single .select2-selection__rendered{line-height:38px!important;}.select2-selection__arrow{height:34px!important;}</style>');
Page::pushFoot('<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>');
Page::pushFoot("<script src='".asset('assets/crud/js/crud.js')."'></script>");
Page::pushFoot("<script>var items = []</script>");
Page::pushFoot("<script src='".asset('assets/workshop/js/invoice.js?v=1.0')."'></script>");
Page::pushFoot("<script>$('.select2insidemodal').select2({dropdownParent: $('#itemModal .modal-body')});$('.select2insidemodal2').select2({dropdownParent: $('#customerModal .modal-body')});</script>");

Page::pushHook('create');

$record_type = 'PROCUREMENT';

return view('workshop/views/invoices/create', compact('error_msg','old','tableName','code','products','customers','record_type'));