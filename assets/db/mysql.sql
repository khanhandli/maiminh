
---Tạo database tên QLTT

--Tạo table users
CREATE TABLE users(user VARCHAR(255),password VARCHAR(255));



INSERT INTO users
    VALUES ('huydat','123');



-- TAO BANG 
CREATE TABLE SanPham(
    id INT PRIMARY KEY AUTO_INCREMENT,
    Gioithieu VARCHAR(255),
    TrangBia VARCHAR(255),
    GiaGoc VARCHAR(255),
    GiaGiam VARCHAR(255),
    DaBan VARCHAR(255),
    TenNguoiBan VARCHAR(255),
    QuocGia VARCHAR(255),
    GiamGia VARCHAR(255));


