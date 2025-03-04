ALTER TABLE ws_invoices ADD COLUMN vehicle_id INT DEFAULT NULL;
ALTER TABLE ws_invoice_items ADD COLUMN employee_id INT DEFAULT NULL;

ALTER TABLE ws_invoices ADD COLUMN inspection_id INT DEFAULT NULL;

ALTER TABLE ws_inspections ADD COLUMN code VARCHAR(100) DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN booking_date datetime DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN handover_date datetime DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN waiting_status VARCHAR(100) DEFAULT 'DITUNGGU';
ALTER TABLE ws_inspections ADD COLUMN estimation_price DOUBLE(15,2) DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN estimation_time VARCHAR(100) DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN km_in VARCHAR(100) DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN km_out VARCHAR(100) DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN complaint TEXT DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN recommendation TEXT DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN spareparts TEXT DEFAULT NULL;