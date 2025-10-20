package system

import (
	"vinexel/app/dashkit/system/controllers"

	"github.com/labstack/echo/v4"
	"gorm.io/gorm"
)

func APIRoutes(e *echo.Echo, db *gorm.DB) {
	apiV1 := e.Group("/api/v1")

	itemController := controllers.NewItemController(db)

	apiV1.POST("/dashkit/create", itemController.Create)
	apiV1.PUT("/dashkit/update/:id_item", itemController.Update)
	apiV1.DELETE("/dashkit/delete/:id_item", itemController.Delete)
	apiV1.GET("/dashkit/get-all", itemController.GetAll)
	apiV1.GET("/dashkit/item-detail", itemController.GetById)
}
