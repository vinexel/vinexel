package repositories

import (
	"visioniconic/restapi/domain/item/models"

	"gorm.io/gorm"
)

type dbItem struct {
	Conn *gorm.DB
}

// Create implements ItemRepository.
func (db *dbItem) Create(item models.Item) error {
	return db.Conn.Create(&item).Error
}

// Delete implements ItemRepository.
func (db *dbItem) Delete(idItem int) error {
	return db.Conn.Delete(&models.Item{IdItem: idItem}).Error
}

// GetAll implements ItemRepository.
func (db *dbItem) GetAll() ([]models.Item, error) {
	var data []models.Item
	result := db.Conn.Find(&data)
	return data, result.Error
}

// GetById implements ItemRepository.
func (db *dbItem) GetById(idItem int) (models.Item, error) {
	var data models.Item
	result := db.Conn.Where("id_item", idItem).First(&data)
	return data, result.Error
}

// Update implements ItemRepository.
func (db *dbItem) Update(idItem int, item models.Item) error {
	return db.Conn.Where("id_item", idItem).Updates(item).Error
}

type ItemRepository interface {
	Create(item models.Item) error
	Update(idItem int, item models.Item) error
	Delete(idItem int) error
	GetById(idItem int) (models.Item, error)
	GetAll() ([]models.Item, error)
}

func NewItemRepository(Conn *gorm.DB) ItemRepository {
	return &dbItem{Conn: Conn}
}
