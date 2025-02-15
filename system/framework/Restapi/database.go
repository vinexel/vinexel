package restapi

import (
	"fmt"
	"log"
	"os"
	"path/filepath"

	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

// InitDB menginisialisasi koneksi database berdasarkan domain yang sedang diakses
func InitDB() *gorm.DB {
	domain := os.Getenv("APP_URL")
	if domain == "" {
		log.Fatal("❌ APP_URL is not set in the environment")
	}

	// Pastikan project sudah dimuat
	if len(RegisteredProjects) == 0 {
		LoadProjects("app")
	}

	projectName, exists := RegisteredProjects[domain]
	if !exists {
		log.Fatalf("❌ No project found for domain: %s", domain)
	}

	// Ambil konfigurasi database dari `.env`
	envVars, err := LoadEnv(filepath.Join("app", projectName, ".env"))
	if err != nil {
		log.Fatalf("❌ Error loading .env file for project: %s, error: %v", projectName, err)
	}

	// Buat DSN & Validasi koneksi
	dsn := fmt.Sprintf("%s:%s@tcp(%s:%s)/%s?parseTime=true",
		envVars["DB_USER"], envVars["DB_PASSWORD"],
		envVars["DB_HOST"], envVars["DB_PORT"],
		envVars["DB_NAME"])

	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{SkipDefaultTransaction: true})
	if err != nil {
		log.Fatalf("❌ Can't connect to database for project: %s, error: %v", projectName, err)
	}

	fmt.Printf("✅ Database connected successfully for project: %s\n", projectName)
	return db
}
