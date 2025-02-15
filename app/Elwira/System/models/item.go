package models

type Item struct {
	IdItem      int     `json:"id_item" gorm:"column:id_item;primaryKey;autoIncrement"`
	NamaItem    string  `json:"nama_item" gorm:"column:nama_item"`
	Unit        string  `json:"unit" gorm:"column:unit"`
	Stok        int     `json:"stok" gorm:"column:stok"`
	HargaSatuan float64 `json:"harga_satuan" gorm:"column:harga_satuan"`
}

func (Item) TableName() string {
	return "item"
}
