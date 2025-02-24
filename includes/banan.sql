CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Уникальный идентификатор товара
    name VARCHAR(255) NOT NULL,            -- Название товара (строка до 255 символов)
    description TEXT,                      -- Описание товара (текст)
    price DECIMAL(10, 2) NOT NULL,         -- Цена товара (с точностью до 2 знаков после запятой)
    image VARCHAR(255) NOT NULL            -- Путь к изображению товара (строка до 255 символов)
);
