package system

import (
	"vinexel/app/visioniconic/system/controllers"

	"github.com/labstack/echo/v4"
	"gorm.io/gorm"
)

func APIRoutes(e *echo.Echo, db *gorm.DB) {
	apiV1 := e.Group("/api/v1")

	itemController := controllers.NewItemController(db)

	apiV1.POST("/visioniconic/create", itemController.Create)
	apiV1.PUT("/visioniconic/update/:id_item", itemController.Update)
	apiV1.DELETE("/visioniconic/delete/:id_item", itemController.Delete)
	apiV1.GET("/visioniconic/get_all", itemController.GetAll)
	apiV1.GET("/visioniconic/detail", itemController.GetById)
}
