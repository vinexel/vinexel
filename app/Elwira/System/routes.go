package system

import (
	"vinexel/app/elwira/system/controllers"

	"github.com/labstack/echo/v4"
	"gorm.io/gorm"
)

func APIRoutes(e *echo.Echo, db *gorm.DB) {
	apiV1 := e.Group("/api/v1")

	itemController := controllers.NewItemController(db)

	apiV1.POST("/elwira/create", itemController.Create)
	apiV1.PUT("/elwira/update/:id_item", itemController.Update)
	apiV1.DELETE("/elwira/delete/:id_item", itemController.Delete)
	apiV1.GET("/elwira/get-all", itemController.GetAll)
	apiV1.GET("/elwira/item-detail", itemController.GetById)
}
