**REST API WITH <a href ='https://echo.labstack.com'>ECHO FRAMEWORK</a> AND <a href='https://gorm.io'>GORM</a>**

This is example how to use echo framework to create APIs. And in this project I'm use GORM as ORM.<br/>
To follow this tutorial, you can create a table with this structure :

```
CREATE TABLE `item` (
  `id_item` int(10) NOT NULL AUTO_INCREMENT,
  `nama_item` varchar(100) NOT NULL,
  `unit` enum('kg','pcs') NOT NULL,
  `stok` int(10) NOT NULL,
  `harga_satuan` float(15,2) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB;
```
<br/>
Custom your database connection in file <strong>config/database.go<strong>