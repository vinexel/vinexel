package restapi

import (
	"fmt"

	"github.com/labstack/echo/v4"
)

// StartServer menjalankan server Echo pada port tertentu
func StartServer(e *echo.Echo, port string) {
	fmt.Println("🚀 Starting server on port " + port)

	err := e.Start(":" + port)
	if err != nil {
		fmt.Println("❌ Error starting server:", err)
	}
}
