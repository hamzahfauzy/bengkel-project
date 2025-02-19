CREATE TABLE ws_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(100) DEFAULT NULL,
    address TEXT DEFAULT NULL
);

CREATE TABLE ws_employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(100) DEFAULT NULL,
    address TEXT DEFAULT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'REGULAR'
);

CREATE TABLE ws_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'SPARE PART'
);

CREATE TABLE ws_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT DEFAULT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT NULL DEFAULT NULL,
    supplier_name VARCHAR(100) NULL DEFAULT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'SPARE PART'
);

CREATE TABLE ws_product_prices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT DEFAULT NULL,
    amount DOUBLE(15,2) NOT NULL,
    status VARCHAR(100) NOT NULL DEFAULT 'NON ACTIVE'
);

CREATE TABLE ws_product_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT DEFAULT NULL,
    
    amount INT NOT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'OUT',
    description TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_mc_orders_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_mc_orders_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_customer_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT DEFAULT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT NULL DEFAULT NULL
);

CREATE TABLE ws_invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT DEFAULT NULL,
    code VARCHAR(100) NOT NULL,
    total_item INT NOT NULL,
    total_qty INT NOT NULL,
    total_price DOUBLE(15,2) NOT NULL,
    total_discount DOUBLE(15,2) NOT NULL,
    final_price DOUBLE(15,2) NOT NULL,
    total_payment DOUBLE(15,2) DEFAULT NULL,

    record_type VARCHAR(100) NOT NULL DEFAULT 'SALES',
    status VARCHAR(100) NOT NULL DEFAULT 'DRAFT',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_invoices_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_invoices_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT DEFAULT NULL,
    product_id INT DEFAULT NULL,
    qty INT NOT NULL,
    base_price DOUBLE(15,2) NOT NULL,
    total_price DOUBLE(15,2) NOT NULL,
    total_discount DOUBLE(15,2) NOT NULL,
    final_price DOUBLE(15,2) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_invoice_items_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_invoice_items_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_item_id INT DEFAULT NULL,
    employee_id INT DEFAULT NULL,
    start_at TIMESTAMP NULL DEFAULT NULL,
    finish_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE ws_finance_journals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(100) NOT NULL,
    amount DOUBLE(15,2) NOT NULL,
    description TEXT NULL DEFAULT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'OUT',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_finance_journals_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_finance_journals_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_payrolls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT DEFAULT NULL,
    code VARCHAR(100) NOT NULL,
    amount DOUBLE(15,2) NOT NULL,
    description TEXT NULL DEFAULT NULL,

    payroll_date DATE NULL DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_payrolls_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_payrolls_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_employee_presences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT DEFAULT NULL,
    record_type VARCHAR(100) NOT NULL DEFAULT 'PRESENCE',
    record_status VARCHAR(100) NOT NULL DEFAULT 'APPROVED',
    attachment_url VARCHAR(100) NULL DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_employee_presences_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_employee_presences_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);