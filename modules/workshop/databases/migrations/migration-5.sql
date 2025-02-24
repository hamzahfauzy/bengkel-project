CREATE TABLE ws_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT DEFAULT NULL,
    payment_type VARCHAR(100) DEFAULT 'CASH',
    amount DOUBLE(15,2) NOT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'IN',
    description TEXT DEFAULT NULL,
    status VARCHAR(100) NOT NULL DEFAULT 'DRAFT',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_payments_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_payments_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_inspections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT DEFAULT NULL,
    vehicle_id INT DEFAULT NULL,
    description TEXT DEFAULT NULL,
    status VARCHAR(100) NOT NULL DEFAULT 'DRAFT',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_inspections_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_inspections_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);
