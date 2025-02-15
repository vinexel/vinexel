package main

import (
	elwira "vinexel/app/elwira/system"
	core "vinexel/system/framework/restapi"
)

func main() {
	// Inisialisasi
	e, db := core.InitApp()

	// Registrasi routing project:
	elwira.APIRoutes(e, db)

	// Jalankan server
	core.StartServer(e, "9000")
}
