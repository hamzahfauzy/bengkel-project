CREATE TABLE ws_marketing_templates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_marketing_templates_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_marketing_templates_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_marketing_campaigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    template_id INT DEFAULT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,

    start_at TIMESTAMP NULL DEFAULT NULL,
    finish_at TIMESTAMP NULL DEFAULT NULL,

    status VARCHAR(100) NOT NULL DEFAULT 'DRAFT', -- DRAFT, WAITING, RUNNING, COMPLETED, ERROR

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_marketing_campaigns_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_marketing_campaigns_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE ws_marketing_campaign_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    campaign_id INT DEFAULT NULL,
    customer_id INT DEFAULT NULL,
    message TEXT NOT NULL,
    notes TEXT DEFAULT NULL,

    status VARCHAR(100) NOT NULL DEFAULT 'DRAFT', -- DRAFT, WAITING, SENT, COMPLETED, ERROR

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    created_by INT DEFAULT NULL,
    updated_by INT DEFAULT NULL,

    CONSTRAINT fk_ws_marketing_campaign_items_created_by FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL,
    CONSTRAINT fk_ws_marketing_campaign_items_updated_by FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE SET NULL
);