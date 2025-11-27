ALTER TABLE ws_inspections ADD COLUMN gasoline_indicator VARCHAR(100) DEFAULT NULL;
ALTER TABLE ws_inspections ADD COLUMN vehicle_condition TEXT DEFAULT NULL;
ALTER TABLE ws_services ADD COLUMN advisor_id INT DEFAULT NULL;