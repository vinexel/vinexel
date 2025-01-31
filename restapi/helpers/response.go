package helpers

type Response struct {
	Status   int         `json:"status"`
	Messages string      `json:"messages"`
	Data     interface{} `json:"data"`
}
