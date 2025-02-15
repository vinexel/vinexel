package services

import (
	"fmt"
	"vinexel/app/elwira/system/helpers"
	"vinexel/app/elwira/system/models"
	"vinexel/app/elwira/system/repositories"

	"gorm.io/gorm"
)

type itemService struct {
	itemRepo repositories.ItemRepository
}

// Create implements ItemService.
func (service *itemService) Create(item models.Item) helpers.Response {
	var response helpers.Response
	if err := service.itemRepo.Create(item); err != nil {
		response.Status = 500
		response.Messages = "Failed to create a new item " + err.Error()
	} else {
		response.Status = 200
		response.Messages = "Success to create a new item"
	}
	return response
}

// Delete implements ItemService.
func (service *itemService) Delete(idItem int) helpers.Response {
	var response helpers.Response
	if err := service.itemRepo.Delete(idItem); err != nil {
		response.Status = 500
		response.Messages = fmt.Sprint("Failed to delete item : ", idItem)
	} else {
		response.Status = 200
		response.Messages = "Success to delete item"
	}
	return response
}

// GetAll implements ItemService.
func (service *itemService) GetAll() helpers.Response {
	var response helpers.Response
	data, err := service.itemRepo.GetAll()
	if err != nil {
		response.Status = 500
		response.Messages = "Failed to get items"
	} else {
		response.Status = 200
		response.Messages = "Success to get items"
		response.Data = data
	}
	return response
}

// GetById implements ItemService.
func (service *itemService) GetById(idItem int) helpers.Response {
	var response helpers.Response
	data, err := service.itemRepo.GetById(idItem)
	if err != nil {
		response.Status = 500
		response.Messages = fmt.Sprint("Failed to get item : ", idItem)
	} else {
		response.Status = 200
		response.Messages = "Success to get item"
		response.Data = data
	}
	return response
}

// Update implements ItemService.
func (service *itemService) Update(idItem int, item models.Item) helpers.Response {
	var response helpers.Response
	if err := service.itemRepo.Update(idItem, item); err != nil {
		response.Status = 500
		response.Messages = fmt.Sprint("Failed to update item ", idItem)
	} else {
		response.Status = 200
		response.Messages = "Success to update item"
	}
	return response
}

type ItemService interface {
	Create(item models.Item) helpers.Response
	Update(idItem int, item models.Item) helpers.Response
	Delete(idItem int) helpers.Response
	GetById(idItem int) helpers.Response
	GetAll() helpers.Response
}

func NewItemService(db *gorm.DB) ItemService {
	return &itemService{itemRepo: repositories.NewItemRepository(db)}
}
