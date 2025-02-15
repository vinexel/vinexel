package restapi

import (
	"bufio"
	"os"
	"strings"
)

// LoadEnv membaca file .env dalam folder project
func LoadEnv(filePath string) (map[string]string, error) {
	envMap := make(map[string]string)
	file, err := os.Open(filePath)
	if err != nil {
		return nil, err
	}
	defer file.Close()

	scanner := bufio.NewScanner(file)
	for scanner.Scan() {
		line := scanner.Text()
		parts := strings.SplitN(line, "=", 2)
		if len(parts) == 2 {
			key := strings.TrimSpace(parts[0])
			value := strings.TrimSpace(parts[1])
			envMap[key] = value
		}
	}

	return envMap, scanner.Err()
}
