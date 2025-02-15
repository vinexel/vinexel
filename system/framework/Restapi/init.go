package restapi

import (
	"fmt"
	"os"

	"github.com/labstack/echo/v4"
	"gorm.io/gorm"
)

// InitApp menginisialisasi proyek, database, dan Echo framework.
func InitApp() (*echo.Echo, *gorm.DB) {
	// Memuat proyek
	LoadProjects("app")

	// Set environment variable
	for appURL, appName := range RegisteredProjects {
		os.Setenv("APP_URL", appURL)
		fmt.Printf("Set environment: APP_URL=%s for %s\n", appURL, appName)
	}

	// Inisialisasi database
	db := InitDB()

	// Inisialisasi Echo
	e := echo.New()

	return e, db
}
