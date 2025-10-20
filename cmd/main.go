package main

import (
	dashkit "vinexel/app/dashkit/system"
	core "vinexel/system/framework/restapi"
)

func main() {
	// Initialize
	e, db := core.InitApp()

	// Register project routing:
	dashkit.APIRoutes(e, db)

	// Run the server
	core.StartServer(e, "9000")
}
