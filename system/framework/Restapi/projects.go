package restapi

import (
	"fmt"
	"os"
	"path/filepath"
)

// RegisteredProjects menyimpan daftar project yang terdeteksi
var RegisteredProjects = make(map[string]string)

// LoadProjects memuat project secara otomatis dari folder `app/{project}/.env`
func LoadProjects(appFolder string) {
	files, err := os.ReadDir(appFolder)
	if err != nil {
		fmt.Println("Error reading app folder:", err)
		return
	}

	for _, file := range files {
		if file.IsDir() {
			projectPath := filepath.Join(appFolder, file.Name(), ".env")
			envVars, err := LoadEnv(projectPath)
			if err == nil {
				appName := envVars["APP_NAME"]
				appURL := envVars["APP_URL"]
				if appName != "" && appURL != "" {
					RegisteredProjects[appURL] = appName
					fmt.Printf("Loaded project: %s (%s)\n", appName, appURL)
				}
			}
		}
	}
}
