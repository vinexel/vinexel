package controllers

import (
	"net/http"
	"strconv"
	"vinexel/app/visioniconic/system/models"
	"vinexel/app/visioniconic/system/services"

	vl "github.com/go-playground/validator/v10"
	"github.com/labstack/echo/v4"
	"gorm.io/gorm"
)

type ItemController struct {
	itemService services.ItemService
	validate    vl.Validate
}

func (controller ItemController) Create(c echo.Context) error {
	type payload struct {
		NamaItem    string  `json:"nama_item" validate:"required"`
		Unit        string  `json:"unit" validate:"required"`
		Stok        int     `json:"stok" validate:"required"`
		HargaSatuan float64 `json:"harga_satuan" validate:"required"`
	}

	payloadValidator := new(payload)

	if err := c.Bind(payloadValidator); err != nil {
		return err
	}

	if err := controller.validate.Struct(payloadValidator); err != nil {
		return err
	}

	result := controller.itemService.Create(models.Item{NamaItem: payloadValidator.NamaItem, Unit: payloadValidator.Unit, Stok: payloadValidator.Stok, HargaSatuan: payloadValidator.HargaSatuan})

	return c.JSON(http.StatusOK, result)
}

func (controller ItemController) Update(c echo.Context) error {
	type payload struct {
		NamaItem    string  `json:"nama_item" validate:"required"`
		Unit        string  `json:"unit" validate:"required"`
		Stok        int     `json:"stok" validate:"required"`
		HargaSatuan float64 `json:"harga_satuan" validate:"required"`
	}

	payloadValidator := new(payload)

	if err := c.Bind(payloadValidator); err != nil {
		return err
	}

	idItem, _ := strconv.Atoi(c.Param("id_item"))
	result := controller.itemService.Update(idItem, models.Item{NamaItem: payloadValidator.NamaItem, Unit: payloadValidator.Unit, Stok: payloadValidator.Stok, HargaSatuan: payloadValidator.HargaSatuan})

	return c.JSON(http.StatusOK, result)
}

func (controller ItemController) Delete(c echo.Context) error {
	idItem, _ := strconv.Atoi(c.Param("id_item"))
	result := controller.itemService.Delete(idItem)

	return c.JSON(http.StatusOK, result)
}

func (controller ItemController) GetAll(c echo.Context) error {
	result := controller.itemService.GetAll()
	return c.JSON(http.StatusOK, result)
}

func (controller ItemController) GetById(c echo.Context) error {
	idItem, _ := strconv.Atoi(c.QueryParam("id_item"))
	result := controller.itemService.GetById(idItem)
	return c.JSON(http.StatusOK, result)
}

func NewItemController(db *gorm.DB) ItemController {
	service := services.NewItemService(db)
	controller := ItemController{
		itemService: service,
		validate:    *vl.New(),
	}

	return controller
}
