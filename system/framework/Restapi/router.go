package restapi

import (
	"fmt"
	"net/http"
	"strings"
)

// ProjectRoutes menyimpan fungsi handler untuk setiap project
var ProjectRoutes = make(map[string]http.HandlerFunc)

// RegisterProjectRoutes mendaftarkan fungsi routing dari project
func RegisterProjectRoutes(projectName string, routeFunc http.HandlerFunc) {
	ProjectRoutes[projectName] = routeFunc
}

// HandleRouting menangani request API berdasarkan prefix "/api/v1/{project}/..."
func HandleRouting(w http.ResponseWriter, r *http.Request) {
	path := strings.Trim(r.URL.Path, "/") // Hapus "/" di awal & akhir path
	segments := strings.Split(path, "/")  // Pisahkan berdasarkan "/"

	// Pastikan path memiliki struktur "/api/v1/{project}/..."
	if len(segments) < 3 || segments[0] != "api" || segments[1] != "v1" {
		http.Error(w, `{"error": "Invalid API route"}`, http.StatusNotFound)
		return
	}

	project := segments[2] // Ambil nama project dari URL

	fmt.Println("Accessing API for project:", project)

	// Periksa apakah project sudah terdaftar dalam `ProjectRoutes`
	routeFunc, exists := ProjectRoutes[project]
	if !exists {
		http.Error(w, `{"error": "Unknown project"}`, http.StatusNotFound)
		return
	}

	// Jalankan handler yang sesuai
	routeFunc(w, r)
}
